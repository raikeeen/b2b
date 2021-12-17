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
use App\Http\Controllers\TecDocController;
use App\Models\AjsApi;

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
    Route::post('order/{id}/update', [\App\Http\Controllers\Voyager\OrderController::class, 'statusUpdate'])->name('status.update');
    Route::post('users/create', [\App\Http\Controllers\Voyager\UserController::class, 'createNew'])->name('voyager.users.createNew');
    Route::post('product/create', [\App\Http\Controllers\Voyager\ProductController::class, 'createNew'])->name('voyager.product.createNew');
    Route::post('add-image/{id}', [ProductController::class, 'addImage'])->name('add-image');
    Route::post('delete-image/{id}', [ProductController::class, 'deleteImage'])->name('delete-image');

});

Auth::routes();
Route::get('ajaxRequest', [TecDocController::class, 'ajaxRequest']);
Route::post('ajaxRequest', [TecDocController::class, 'ajaxCartPost'])->name('ajax.cart');
Route::post('ajax/getModels', [TecDocController::class, 'ajaxGetModelSeries2Post'])->name('ajax.getModels');
Route::post('ajax/getVehicleIdsByCriteria', [TecDocController::class, 'ajaxGetVehicleIdsByCriteriaPost'])->name('ajax.getVehicleByCriteria');
Route::get('vehicle/{modification}', [TecDocController::class, 'tecDocCatalog'])->name('tecDocCatalog');
Route::post('vehicle', [TecDocController::class, 'tecDocCatalog'])->name('tecDocCatalog1');
Route::post('ajax/getParentCategory', [TecDocController::class, 'getParentCategory'])->name('ajax.getParentCategory');
Route::post('vehicleCat/products', [TecDocController::class, 'products'])->name('tecProducts');
Route::get('vehicleСat/products', [TecDocController::class, 'products']);
/*Route::get('vehicle/search', [TecDocController::class, 'search'])->name('tecSearch');*/
Route::post('ajax/getCars', [TecDocController::class, 'getCars'])->name('getCars1');
Route::get('ajax/getCars', [TecDocController::class, 'getCars'])->name('getCars');
Route::post('ajax/getCarsAndOecodes', [TecDocController::class, 'getCarsAndOecodes'])->name('getCarsAndOecodes');
Route::post('ajax/getArticleManufacturer', [TecDocController::class, 'getArticleManufacturer'])->name('getArticleManufacturer');
Route::get('vehicle-cat', [TecDocController::class, 'products']);

Route::prefix('emails')->group(function () {
    Route::post('/register', [\App\Http\Controllers\MailController::class, 'sendMail'])->name('emails.register');

});



Route::group(['middleware' => 'auth'], function () {

    Route::resource('/categories',CategoryController::class);

    Route::resource('/coupon',CouponsController::class);

    Route::get('/cartTest', function (){
        Cart::destroy();
    });
    Route::get('/test1', function (){
        //AjsApi::synchronizationStock();
    });
    Route::resource('/products',ProductController::class);
    Route::get('/new-products',[ProductController::class, 'newProduct'])->name('product.new');

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

Route::get('/storage/products/nty/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/skv/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/vika_dpa/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/borsehung/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/maxgear/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
