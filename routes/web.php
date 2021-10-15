<?php

use App\Models\B1Api;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\UserController;
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
Route::get('ajaxRequest', [AjaxController::class, 'ajaxRequest']);
Route::post('ajaxRequest', [AjaxController::class, 'ajaxCartPost'])->name('ajax.cart');

Route::prefix('emails')->group(function () {
    Route::post('/register', [\App\Http\Controllers\MailController::class, 'sendMail'])->name('emails.register');

});
Route::group(['middleware' => 'auth'], function () {
/*
    Route::get('/product/{reference}', [ProductController::class, 'detail'])->name('product.index');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
*/
    Route::resource('/catalog',CategoryController::class);

    Route::resource('/coupon',CouponsController::class);
    //Route::resource('/order', OrderController::class);
    Route::get('/cartTest', function (){
        Cart::destroy();
    });
    Route::get('/test1', function (){
        //ump(B1Api::getInvoice(\App\Models\Order::latest()->first()));
        dump(config('cart.tax'));
    });
    Route::resource('/products',ProductController::class);
    /*Route::get('/product/{reference}', [ProductController::class, 'detail'])->name('product.index');
    Route::get('/products', function (){
        return view('catalog.products');
    });*/

    Route::get('/', [HomeController::class, 'index'])->name('home');

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
        Route::resource('/orders', OrderController::class);

        Route::resource('/documents',DocumentController::class);

        Route::get('/open-order', function () {
            return redirect()->route('cart.index');
        })->name('open-order');

        Route::get('/password-reset', [UserController::class, 'reset'])->name('password-reset');

        Route::get('/payments', function () {
            return view('auth.user.payments');
        })->name('payments');

        Route::get('/profile',[UserController::class, 'show'])->name('profile.show');
        Route::post('/profile',[UserController::class, 'edit'])->name('profile.edit');

        Route::get('/refunds', function () {
            return view('auth.user.refunds');
        })->name('refunds');

    });
});
