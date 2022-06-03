<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\V1\Bear;

class BearController extends Controller
{
     //
     public function index() {
        return Bear::paginate(100);
    }

    public function show(Bear $id) {
        return $id;
    }

    public function filter($latitude, $longitude) {

        return Bear::nearby([
            $latitude,
            $longitude
        ], 25)->paginate(15);
    }

    public function create(Request $request) {
        $newBear = Bear::create($request->all());
        return response()->json($newBear, 201);
    }
}
