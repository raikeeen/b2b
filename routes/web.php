<?php

use App\Models\B1Api;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
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
ini_set('max_execution_time', 120);
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
    Route::post('order/{id}/update_b1', [\App\Http\Controllers\Voyager\OrderController::class, 'statusUpdateB1'])->name('statusB1.update');
    Route::post('order/{id}/venipak_push', [\App\Http\Controllers\Voyager\OrderController::class, 'pushVenipak'])->name('venipak.push');
    Route::post('order/{id}/venipak_get_label', [\App\Http\Controllers\Voyager\OrderController::class, 'getLabelVenipak'])->name('venipak.getLabel');
    Route::post('order/{id}/venipak_get_manifest', [\App\Http\Controllers\Voyager\OrderController::class, 'getManifestVenipak'])->name('venipak.getManifest');
    Route::post('users/create', [\App\Http\Controllers\Voyager\UserController::class, 'createNew'])->name('voyager.users.createNew');
    Route::post('product/create', [\App\Http\Controllers\Voyager\ProductController::class, 'createNew'])->name('voyager.product.createNew');
    Route::post('add-image/{id}', [ProductController::class, 'addImage'])->name('add-image');
    Route::post('delete-image/{id}', [ProductController::class, 'deleteImage'])->name('delete-image');
    Route::get('users/{id}/history', [\App\Http\Controllers\Voyager\UserController::class, 'history'])->name('voyager.users.history');
    Route::get('users/{id}/margin', [\App\Http\Controllers\Voyager\UserController::class, 'margin'])->name('voyager.users.margin');
    Route::post('users/{id}/margin/add', [\App\Http\Controllers\Voyager\UserController::class, 'addSpecProduct'])->name('voyager.users.addMargin');
    Route::post('users/{id}/margin/delete', [\App\Http\Controllers\Voyager\UserController::class, 'deleteSpecProduct'])->name('voyager.users.deleteMargin');
    Route::post('users/{id}/margin/add-cat', [\App\Http\Controllers\Voyager\UserController::class, 'addSpecCat'])->name('voyager.users.addCat');
    Route::post('users/{id}/margin/delete-cat', [\App\Http\Controllers\Voyager\UserController::class, 'deleteSpecCat'])->name('voyager.users.deleteCat');

});


Auth::routes();

Route::prefix('emails')->group(function () {
    Route::post('/register', [\App\Http\Controllers\MailController::class, 'sendMail'])->name('emails.register');

});

Route::group(['middleware' => 'auth'], function () {

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
    Route::get('vehicle-cat', [TecDocController::class, 'products'])->name('vehicle.catalog');

    Route::resource('/categories',CategoryController::class);

    Route::resource('/coupon',CouponsController::class);

    Route::get('/cartTest', function (){
        Cart::destroy();
    });
    Route::get('/updateB1', function (){
        B1Api::synchronizationStock();
    });
    Route::get('/zaloguj-sie', function (){
        return redirect()->route('home');
    });
    Route::get('/updateTest', function (){
        $array = [
            'EAS-VW-009'	=>	-2.11,
            'EAS-VW-004'	=>	19.81,
            'EAS-VW-003'	=>	27.40,
            'EAS-VW-002'	=>	29.27,
            'EAS-SK-001'	=>	22.11,
            'EAS-RE-012'	=>	-23.9,
            'EAS-RE-011'	=>	-25.5,
            'EAS-VW-001'	=>	70.18,
            'EAS-RE-010'	=>	-25.5,
            'EAS-RE-008'	=>	-21.7,
            'EAS-RE-009'	=>	-21.7,
            'EAS-RE-005'	=>	-25.5,
            'EAS-RE-003'	=>	-9.08,
            'EAS-RE-002'	=>	40.44,
            'EAS-RE-001'	=>	0.397,
            'EAS-PL-003'	=>	-29.1,
            'EAS-PL-004'	=>	-11.4,
            'EAS-PL-002'	=>	15.97,
            'EAS-PL-000'	=>	20.46,
            'EAS-PE-000'	=>	18.88,
            'EAS-ME-000'	=>	-25.0,
            'EAS-KA-012'	=>	27.40,
            'EAS-FT-001'	=>	-2.11,
            'EAS-FT-000'	=>	-2.11,
            'EAS-FR-006'	=>	14.57,
            'EAS-CH-006'	=>	-29.1,
            'EAS-AU-000'	=>	-3.65,
            'EAS-BM-000'	=>	-22.0,
            'EAS-BM-001'	=>	-22.3,
            'EAS-BM-002'	=>	-19.2,
            'EAS-BM-003'	=>	-22.6,
            'EAS-BM-004'	=>	-24.2,
            'EAS-CH-000'	=>	-26.8,
            'EAS-CH-002'	=>	-29.1,
            'EAS-CH-001'	=>	-25.5,
            'EAS-CH-004'	=>	-22.6,
            'EAS-CH-007'	=>	-26.8,
            'EAS-DW-000'	=>	54.78,
            'EAS-DW-001'	=>	54.78,
            'EAS-DW-002'	=>	54.78,
            'EAS-FR-000'	=>	25.53,
            'EAS-FR-001'	=>	27.40,
            'EAS-FR-003'	=>	9.509,
            'EAS-FR-002'	=>	10.72,
            'EAS-FR-004'	=>	11.97,
            'EAS-FR-005'	=>	-16.8,
            'EAS-FR-007'	=>	27.40,
            'EAS-FT-002'	=>	-18.0,
            'EAS-FT-003'	=>	-1.28,
            'EAS-HD-001'	=>	40.44,
            'EAS-HD-000'	=>	51.53,
            'EAS-HD-002'	=>	40.44,
            'EAS-HD-003'	=>	45.69,
            'EAS-HD-004'	=>	37.96,
            'EAS-HD-005'	=>	37.96,
            'EAS-HD-007'	=>	31.31,
            'EAS-HD-006'	=>	17.43,
            'EAS-HD-008'	=>	29.27,
            'EAS-HD-009'	=>	7.261,
            'EAS-HD-011'	=>	29.27,
            'EAS-HD-010'	=>	20.46,
            'EAS-HD-012'	=>	51.53,
            'EAS-HY-000'	=>	76.59,
            'EAS-HY-001'	=>	76.59,
            'EAS-HY-002'	=>	45.69,
            'EAS-HY-003'	=>	76.59,
            'EAS-HY-004'	=>	45.69,
            'EAS-HY-006'	=>	37.96,
            'EAS-HY-007'	=>	37.96,
            'EAS-HY-005'	=>	45.69,
            'EAS-HY-008'	=>	27.40,
            'EAS-HY-009'	=>	58.23,
            'EAS-IS-000'	=>	-9.69,
            'EAS-KA-001'	=>	45.69,
            'EAS-KA-003'	=>	20.46,
            'EAS-KA-002'	=>	45.69,
            'EAS-KA-005'	=>	45.69,
            'EAS-KA-004'	=>	37.96,
            'EAS-KA-006'	=>	37.96,
            'EAS-KA-008'	=>	27.40,
            'EAS-KA-007'	=>	27.40,
            'EAS-KA-009'	=>	11.97,
            'EAS-KA-011'	=>	45.69,
            'EAS-KA-010'	=>	58.23,
            'EAS-LR-001'	=>	-10.8,
            'EAS-LR-000'	=>	-28.9,
            'EAS-ME-001'	=>	-27.3,
            'EAS-ME-003'	=>	-26.8,
            'EAS-ME-002'	=>	-26.6,
            'EAS-MS-000'	=>	33.46,
            'EAS-LR-002'	=>	-25.5,
            'EAS-MS-001'	=>	38.63,
            'EAS-MS-003'	=>	23.74,
            'EAS-MS-002'	=>	59.87,
            'EAS-MS-004'	=>	40.44,
            'EAS-MS-006'	=>	40.44,
            'EAS-MS-005'	=>	18.88,
            'EAS-MS-007'	=>	29.27,
            'EAS-MS-008'	=>	31.31,
            'EAS-MS-011'	=>	14.57,
            'EAS-MS-010'	=>	-6.52,
            'EAS-MS-012'	=>	10.72,
            'EAS-MS-013'	=>	13.22,
            'EAS-MZ-000'	=>	31.31,
            'EAS-MS-014'	=>	18.88,
            'EAS-MZ-001'	=>	29.27,
            'EAS-MZ-003'	=>	29.27,
            'EAS-MZ-002'	=>	42.94,
            'EAS-MZ-004'	=>	37.96,
            'EAS-MZ-005'	=>	58.23,
            'EAS-MZ-006'	=>	58.23,
            'EAS-MZ-008'	=>	13.22,
            'EAS-MZ-007'	=>	11.97,
            'EAS-NS-000'	=>	37.96,
            'EAS-NS-001'	=>	37.96,
            'EAS-NS-002'	=>	27.93,
            'EAS-NS-003'	=>	-1.28,
            'EAS-NS-004'	=>	4.136,
            'EAS-NS-005'	=>	9.509,
            'EAS-NS-007'	=>	2.229,
            'EAS-NS-010'	=>	20.46,
            'EAS-NS-006'	=>	18.88,
            'EAS-NS-011'	=>	27.40,
            'EAS-NS-012'	=>	101.5,
            'EAS-NS-013'	=>	101.5,
            'EAS-NS-009'	=>	2.229,
            'EAS-NS-014'	=>	7.261,
            'EAS-PL-001'	=>	17.43,
            'EAS-PL-006'	=>	-12.4,
            'EAS-PL-005'	=>	-12.4,
            'EAS-PL-007'	=>	-8.48,
            'EAS-PL-008'	=>	25.53,
            'EAS-PL-009'	=>	25.53,
            'EAS-PL-010'	=>	9.509,
            'EAS-PL-011'	=>	9.509,
            'EAS-RE-007'	=>	-18.8,
            'EAS-RE-014'	=>	-6.52,
            'EAS-SB-000'	=>	-18.8,
            'EAS-SB-001'	=>	-17.2,
            'EAS-SB-002'	=>	-22.6,
            'EAS-SB-003'	=>	-22.6,
            'EAS-SB-005'	=>	-22.0,
            'EAS-SB-004'	=>	-25.5,
            'EAS-SB-006'	=>	-14.9,
            'EAS-SE-000'	=>	18.88,
            'EAS-SU-000'	=>	40.44,
            'EAS-SU-001'	=>	18.88,
            'EAS-SU-002'	=>	37.96,
            'EAS-TY-000'	=>	58.23,
            'EAS-TY-001'	=>	54.32,
            'EAS-TY-002'	=>	40.44,
            'EAS-TY-003'	=>	59.87,
            'EAS-TY-004'	=>	23.74,
            'EAS-TY-005'	=>	27.40,
            'EAS-TY-006'	=>	29.27,
            'EAS-TY-007'	=>	42.94,
            'EAS-TY-008'	=>	40.44,
            'EAS-TY-009'	=>	45.69,
            'EAS-TY-010'	=>	37.96,
            'EAS-TY-011'	=>	35.60,
            'EAS-TY-012'	=>	27.40,
            'EAS-TY-013'	=>	36.77,
            'EAS-TY-014'	=>	69.79,
            'EAS-TY-015'	=>	36.23,
            'EAS-TY-017'	=>	22.11,
            'EAS-TY-016'	=>	6.168,
            'EAS-TY-018'	=>	22.11,
            'EAS-TY-020'	=>	45.69,
            'EAS-TY-021'	=>	27.40,
            'EAS-TY-023'	=>	25.53,
            'EAS-TY-022'	=>	18.88,
            'EAS-TY-024'	=>	35.60,
            'EAS-TY-026'	=>	37.96,
            'EAS-TY-027'	=>	37.96,
            'EAS-TY-029'	=>	35.60,
            'EAS-TY-028'	=>	37.96,
            'EAS-TY-030'	=>	35.60,
            'EAS-TY-032'	=>	-18.8,
            'EAS-TY-033'	=>	-18.8,
            'EAS-VW-000'	=>	70.18,
            'EAS-VW-008'	=>	11.97,
            '96SKV500'	=>	-24.9,
            '96SKV501'	=>	-25.2,
            '96SKV502'	=>	-23.4,
            '96SKV503'	=>	-25.2,
            '96SKV504'	=>	-29.0,
            '96SKV505'	=>	-27.8,
            '96SKV506'	=>	45.18,
            '96SKV507'	=>	7.770,
            '96SKV508'	=>	41.85,
            '96SKV509'	=>	7.565,
            '96SKV510'	=>	13.88,
            '96SKV511'	=>	11.34,
            '96SKV512'	=>	22.96,
            '96SKV513'	=>	27.14,
            '96SKV514'	=>	-4.24,
            '96SKV515'	=>	29.73,
            '96SKV516'	=>	31.22,
            '96SKV517'	=>	27.84,
            '96SKV518'	=>	20.53,
            '96SKV519'	=>	16.69,
            '96SKV520'	=>	28.64,
            '96SKV521'	=>	22.88,
            '96SKV522'	=>	34.57,
            '96SKV523'	=>	-11.7,
            '96SKV524'	=>	17.36,
            '96SKV525'	=>	-18.4,
            '96SKV526'	=>	11.17,
            '96SKV527'	=>	3.057,
            '96SKV528'	=>	1.803,
            '96SKV529'	=>	19.95,
            '96SKV530'	=>	27.06,
            '96SKV531'	=>	-7.68,
            '96SKV532'	=>	18.05,
            '96SKV533'	=>	19.81,
            '96SKV534'	=>	22.11,
            '96SKV535'	=>	22.18,
            '96SKV536'	=>	24.06,
            '96SKV537'	=>	17.16,
            '96SKV538'	=>	18.81,
            '96SKV539'	=>	31.70,
            '96SKV540'	=>	33.26,
            '96SKV541'	=>	-2.80,
            '96SKV542'	=>	32.86,
            '96SKV543'	=>	24.39,
            '96SKV544'	=>	25.95,
            '96SKV545'	=>	42.45,
            '96SKV546'	=>	15.84,
            '96SKV547'	=>	38.96,
            '96SKV548'	=>	-2.73,
            '96SKV549'	=>	42.69,
            '96SKV550'	=>	22.34,
            '96SKV551'	=>	20.98,
            '96SKV552'	=>	23.27,
            '96SKV553'	=>	28.19,
            '96SKV554'	=>	34.26,
            '96SKV555'	=>	19.81,
            '96SKV556'	=>	20.68,
            '96SKV557'	=>	16.89,
            '96SKV558'	=>	25.95,
            '96SKV559'	=>	22.88,
            '96SKV561'	=>	13.58,
            '96SKV562'	=>	-24.2,
            '96SKV563'	=>	-5.31,
            '96SKV564'	=>	23.35,
            '99590099501'	=>	-21.4,
            'EAS-CH-008'	=>	-25.6,
            'EAS-PE-001'	=>	-21.1,
            'EAS-FT-004'	=>	-28.6,
            'EAS-SU-003'	=>	-17.3,


        ];
        foreach ($array as $key => $value) {
            $a = Product::where('supplier_reference', (string)$key)->update(['trade_margin' => $value, 'updated_at' => Carbon::now()]);
        }
    });
    Route::get('/test1', function () {
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
