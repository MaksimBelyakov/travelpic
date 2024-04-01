<?php

use App\Http\Controllers\PictureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('pictures', PictureController::class);

Route::get('/profiles', [ProfileController::class, 'index'] );
Route::post('/profiles', [ProfileController::class, 'store'] );
Route::get('/profiles/{profile}', [ProfileController::class, 'show'] );

Route::apiResource('posts', PostController::class);
