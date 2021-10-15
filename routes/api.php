<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
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
Route::get('/products', function (){
    return Product::all();
});
//Route::get('/products/{id}', [ProductController::class,'show']);
Route::resource('/products', App\Http\Controllers\Api\ApiProductController::class);
Route::get('/products/search/{name}', [App\Http\Controllers\Api\ApiProductController::class, 'search']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
