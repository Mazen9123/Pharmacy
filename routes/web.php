<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use TCG\Voyager\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\MainController::class , 'index']);
Route::post('/SignIn', [App\Http\Controllers\MainController::class , 'SignIn']);

Route::get('/AddProduct', [App\Http\Controllers\ProductController::class , 'Add']);
Route::get('/EditProduct', [App\Http\Controllers\ProductController::class , 'Edit']);
Route::get('/DeleteProduct', [App\Http\Controllers\ProductController::class , 'Del']);
Route::post('/AddProduct', [App\Http\Controllers\ProductController::class , 'AddProduct']);
Route::post('/EditProduct', [App\Http\Controllers\ProductController::class , 'EditProduct']);
Route::get('/Products', [App\Http\Controllers\ProductController::class , 'Products']);
Route::get('/NewOrder', [App\Http\Controllers\OrderController::class , 'New']);

Route::get('/logout',function (){
    Auth::logout();
    return redirect('/');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
