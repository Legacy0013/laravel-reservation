<?php

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Resources\HotelResource;
use Illuminate\Support\Facades\Route;

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

Route::get('/hotels', function() {
    return HotelResource::collection(Hotel::paginate(10));
});
Route::get('/hotel/{id}', function($id) {
    return new HotelResource(Hotel::findOrFail($id));
});
