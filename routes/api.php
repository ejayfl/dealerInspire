<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherApiController;

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

Route::get('/geocode', function (Request $request) {
    $geocoder = new App\Services\GoogleGeocoder();

    return $geocoder->geocode($request->address);
});

Route::get('/weather-info/{appid}/{cityname}', [WeatherApiController::class, 'index']);