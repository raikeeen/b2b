<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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
Route::group(['middleware' => 'auth'], function () {
/*
    Route::get('/product/{reference}', [ProductController::class, 'detail'])->name('product.index');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
*/
    Route::get('/product/{id}', function (){
        return view('catalog.product');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('empty', function () {
        Cart::destroy();
    });

    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/{rowId}', [CartController::class, 'edit'])->name('cart.edit');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::prefix('about')->group(function () {

        Route::get('/company', function () {
            return view('cms.company');
        })->name('company');

        Route::get('/contact', function () {
            return view('cms.contact');
        })->name('contact');

        Route::get('/cookie', function () {
            return view('cms.cookie');
        })->name('cookie');

        Route::get('/privacy', function () {
            return view('cms.privacy');
        })->name('privacy');

        Route::get('/regulations', function () {
            return view('cms.regulations');
        })->name('regulations');

    });
    Route::prefix('my-account')->group(function () {
        Route::get('/close-order', function () {
            return view('auth.user.close-order');
        })->name('close-order');

        Route::get('/documents', function () {
            return view('auth.user.documents');
        })->name('documents');

        Route::get('/open-order', function () {
            return view('auth.user.open-order');
        })->name('open-order');

        Route::get('/password-reset', function () {
            return view('auth.user.password-reset');
        })->name('password-reset');

        Route::get('/payments', function () {
            return view('auth.user.payments');
        })->name('payments');

        Route::get('/profile', function () {
            return view('auth.user.profile');
        })->name('profile');

        Route::get('/refunds', function () {
            return view('auth.user.refunds');
        })->name('refunds');

    });
});
