<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebApiController;
use App\Http\Controllers\PlantController;

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


Route::get('/', [WebApiController::class, 'index']);
Route::get('/plant', [PlantController::class, 'index']);
Route::get('/plant/get', [PlantController::class, 'show']);
Route::get('/plant/edit', [PlantController::class, 'edit']);
