<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bear;
use Illuminate\Support\Facades\DB;

class BearController extends Controller
{
    //
    public function index() {
        return Bear::all();
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
        return response()->json($id, 201, $headers);
    }

}
