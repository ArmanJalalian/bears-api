<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BearController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
* Authentication register and login routes.
*/
Route::controller(AuthController::class)->group(function(){

    Route::post('/register', 'register');
    Route::post('/login', 'login');

});

/**
 * Route to be able to log out, needs a set authentication token to be able to work!
 */
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

/** 
* All routes for the api are grouped pointing to the necessary controller
* Needs authentication in the form of an token required by registering or login in.
*/
Route::controller(BearController::class)->middleware('auth:sanctum')->group(function(){

    /**
     * Collection api endpoints
     */
    Route::get('/bears', 'index');
    Route::get('/bears/{latitude}/{longitude}', 'filter');
    Route::post('/bears', 'create');

    /**
     * Single resource endpoints
     * @param bear_id
     */
    Route::get('/bear/{bear}', 'show');
    Route::put('/bear/{bear}', 'update');
    Route::delete('/bear/{bear}', 'delete');

});