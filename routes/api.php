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

Route::post('/addToCart',[App\Http\Controllers\OrderController::class , 'addToCart']);
Route::get('/cartItems',[App\Http\Controllers\OrderController::class , 'cartItems']);
Route::post('/changeType',[App\Http\Controllers\OrderController::class , 'changeType']);
Route::post('/removeItem',[App\Http\Controllers\OrderController::class , 'removeItem']);
Route::post('/incQuantity',[App\Http\Controllers\OrderController::class , 'incQuantity']);
Route::post('/decQuantity',[App\Http\Controllers\OrderController::class , 'decQuantity']);








Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


