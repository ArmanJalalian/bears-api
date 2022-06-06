<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\V1\Bear;

class BearController extends Controller
{
     /**
      * Show all bears, but keep it 100 per page.
      */
     public function index() {
        return Bear::paginate(100);
    }

    /**
     * Filter all bears in 25km radius around coordinates
     * Uses Bagusindrayana/LaravelCoordinate package
     * @param latitude
     * @param longitude
     * todo add validation to latitude and longitude fields.
     */
    public function filter($latitude, $longitude) {
        return Bear::nearby([
            $latitude,
            $longitude
        ], 25)->paginate(15);
    }

    /**
     * Create new bears, needs the following parameters.
     * @param name
     * @param city
     * @param province
     * @param latitude
     * @param longitude
     * todo Add validation to fields. 
     */
    public function create(Request $request) {        
        $newBear = Bear::create($request->all());
        return response()->json($newBear, 201);
    }

    /**
     * Show one specific Bear
     * @param id
     */
    public function show(Bear $bear) {
        return $bear;
    }

    /**
     * Update existing bears
     * @param id
     * todo add validation to fields.
     */
    public function update(Request $request, Bear $bear) {
        Bear::where('id', $bear['id'])->update($request->all());
        return $response()->json($bear, 200);
    }

    /**
     * Hunt those bears and delete them ;)
     * @param id
     */
    public function delete (Bear $bear) {
        Bear::where('id', $bear['id'])->delete();
        return response()->json(null, 204);
    }
}
