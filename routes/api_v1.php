<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/bears', [BearController::class, 'index']);
Route::get('/bears/{longitude}/{latitude}', function ($longitude, $latitude) {
    return;
});

Route::controller(BearController::class)->group(function(){
    Route::get('/bears', 'index');
    Route::get('/bear/{id}', 'show');
    Route::get('/bears/{longitude}/{latitude}', 'filter');
    Route::post('/bears', 'create');
});