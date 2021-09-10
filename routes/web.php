<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['prefix' => 'admin-kavateka'], function () {
    Voyager::routes();
});

Auth::routes();
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/product',[App\Http\Controllers\ProductController::class, 'index'])->name('product');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

