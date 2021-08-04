<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('v1/noticias', App\Http\Controllers\Api\V1\NoticiasController::class)->middleware('api');
Route::apiResource('v1/jugadores', App\Http\Controllers\Api\V1\JugadoresController::class)->middleware('api');
Route::apiResource('v1/calendario', App\Http\Controllers\Api\V1\CalendarioController::class)->middleware('api');
Route::apiResource('v1/banners', App\Http\Controllers\Api\V1\BannersController::class)->middleware('api');
Route::apiResource('v1/media', App\Http\Controllers\Api\V1\MediaController::class)->middleware('api');