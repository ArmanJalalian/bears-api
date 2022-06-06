<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Register new account function,
     * returns authentication code used to access the resource routes.
     * @param name,
     * @param email,
     * @param password
     * todo add correct error codes for validation
     */
    public function register(Request $request) {
        
        //Validate all fields
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        //Create new user
        $newUser = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        //Create new authentication token for user
        $authToken = $newUser->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $newUser,
            'token' => $authToken
        ];

        //Return user and authentication code.
        return response()->json($response, 201);
    }

    /**
     * Login to be able to access resource routes using the given authentication token
     * @param email
     * @param password
     * todo add correct rest error codes for validation
     */
    public function login(Request $request) {

        //Validate fields
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Search user in database
        $loginUser = User::where('email', $fields['email'])->first();

        //Check if email and password are correct
        if(!$loginUser || !Hash::check($fields['password'], $loginUser->password)) {
            return response([
                'message' => 'Try other emailadress!'
            ], 401);
        }

        //Create new login token
        $loginToken = $loginUser->createToken('myapptoken')->plainTextToken;

        $reponse = [
            'user' => $loginUser,
            'token' => $loginToken
        ];

        return response($reponse, 201);
    }

    /**
     * Logout function delete authentication token
     * ! needs a set authentication token using bearer token when requesting this route.
     */
    public function logout(Request $request) {
        
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged Out'
        ];

    }
}
