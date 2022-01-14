<?php

use App\Jobs\SendMail;
use App\Models\B1Api;
use App\Models\DocumentB1;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tax;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
use Illuminate\Support\Facades\Storage;

ini_set('max_execution_time', 300);
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
/*        $array = [
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
        }*/
        $arrayTrade = [
            'EZC-ME-010'	=>	56,
            'EZC-ME-011'	=>	25,
            'ESD-NS-000'	=>	4,
            'EZC-NS-004'	=>	51,
            'EZC-NS-004A'	=>	51,
            'EZC-NS-004B'	=>	51,
            'EZC-NS-004C'	=>	51,
            'EZC-NS-004D'	=>	51,
            'EZC-VW-115'	=>	39,
            'eas-ch-000a'	=>	-5,
            'EAS-VW-009'	=>	25,
            'EAS-VW-004'	=>	51,
            'EAS-VW-003'	=>	61,
            'EAS-VW-002'	=>	63,
            'EAS-SK-001'	=>	55,
            'EAS-RE-012'	=>	0,
            'EAS-RE-011'	=>	-2,
            'EAS-VW-001'	=>	112,
            'EAS-RE-010'	=>	-2,
            'EAS-RE-008'	=>	2,
            'EAS-RE-009'	=>	2,
            'EAS-RE-005'	=>	-2,
            'EAS-RE-003'	=>	17,
            'EAS-RE-002'	=>	77,
            'EAS-RE-001'	=>	29,
            'EAS-PL-003'	=>	-6,
            'EAS-PL-004'	=>	15,
            'EAS-PL-002'	=>	47,
            'EAS-PL-000'	=>	53,
            'EAS-PE-000'	=>	51,
            'EAS-ME-000'	=>	-2,
            'EAS-KA-012'	=>	61,
            'EAS-FT-001'	=>	26,
            'EAS-FT-000'	=>	26,
            'EAS-FR-006'	=>	44,
            'EAS-AU-000'	=>	23,
            'EAS-BM-000'	=>	2,
            'EAS-BM-001'	=>	2,
            'EAS-BM-002'	=>	4,
            'EAS-BM-003'	=>	0,
            'EAS-BM-004'	=>	-1,
            'EAS-CH-000'	=>	-4,
            'EAS-CH-002'	=>	-6,
            'EAS-CH-001'	=>	-2,
            'EAS-CH-004'	=>	1,
            'EAS-CH-007'	=>	-4,
            'EAS-DW-000'	=>	90,
            'EAS-DW-001'	=>	90,
            'EAS-DW-002'	=>	94,
            'EAS-FR-000'	=>	59,
            'EAS-FR-001'	=>	59,
            'EAS-FR-003'	=>	40,
            'EAS-FR-002'	=>	41,
            'EAS-FR-004'	=>	43,
            'EAS-FR-005'	=>	8,
            'EAS-FR-007'	=>	61,
            'EAS-FT-002'	=>	7,
            'EAS-FT-003'	=>	26,
            'EAS-HD-001'	=>	77,
            'EAS-HD-000'	=>	90,
            'EAS-HD-002'	=>	77,
            'EAS-HD-003'	=>	83,
            'EAS-HD-004'	=>	74,
            'EAS-HD-005'	=>	74,
            'EAS-HD-007'	=>	66,
            'EAS-HD-006'	=>	49,
            'EAS-HD-008'	=>	63,
            'EAS-HD-009'	=>	37,
            'EAS-HD-011'	=>	63,
            'EAS-HD-010'	=>	53,
            'EAS-HD-012'	=>	90,
            'EAS-HY-000'	=>	120,
            'EAS-HY-001'	=>	120,
            'EAS-HY-002'	=>	83,
            'EAS-HY-003'	=>	120,
            'EAS-HY-004'	=>	83,
            'EAS-HY-006'	=>	74,
            'EAS-HY-007'	=>	74,
            'EAS-HY-005'	=>	83,
            'EAS-HY-008'	=>	61,
            'EAS-HY-009'	=>	98,
            'EAS-IS-000'	=>	17,
            'EAS-KA-001'	=>	83,
            'EAS-KA-003'	=>	53,
            'EAS-KA-002'	=>	83,
            'EAS-KA-005'	=>	83,
            'EAS-KA-004'	=>	74,
            'EAS-KA-006'	=>	74,
            'EAS-KA-008'	=>	61,
            'EAS-KA-007'	=>	61,
            'EAS-KA-009'	=>	41,
            'EAS-KA-011'	=>	83,
            'EAS-KA-010'	=>	98,
            'EAS-LR-001'	=>	14,
            'EAS-LR-000'	=>	-6,
            'EAS-ME-001'	=>	-4,
            'EAS-ME-003'	=>	-4,
            'EAS-ME-002'	=>	-3,
            'EAS-MS-000'	=>	68,
            'EAS-LR-002'	=>	-2,
            'EAS-MS-001'	=>	75,
            'EAS-MS-003'	=>	57,
            'EAS-MS-002'	=>	100,
            'EAS-MS-004'	=>	77,
            'EAS-MS-006'	=>	77,
            'EAS-MS-005'	=>	51,
            'EAS-MS-007'	=>	63,
            'EAS-MS-008'	=>	66,
            'EAS-MS-011'	=>	46,
            'EAS-MS-010'	=>	21,
            'EAS-MS-012'	=>	41,
            'EAS-MS-013'	=>	44,
            'EAS-MZ-000'	=>	66,
            'EAS-MS-014'	=>	51,
            'EAS-MZ-001'	=>	63,
            'EAS-MZ-003'	=>	63,
            'EAS-MZ-002'	=>	80,
            'EAS-MZ-004'	=>	74,
            'EAS-MZ-005'	=>	98,
            'EAS-MZ-006'	=>	94,
            'EAS-MZ-008'	=>	44,
            'EAS-MZ-007'	=>	43,
            'EAS-NS-000'	=>	71,
            'EAS-NS-001'	=>	71,
            'EAS-NS-002'	=>	59,
            'EAS-NS-003'	=>	27,
            'EAS-NS-004'	=>	33,
            'EAS-NS-005'	=>	40,
            'EAS-NS-007'	=>	31,
            'EAS-NS-010'	=>	53,
            'EAS-NS-006'	=>	51,
            'EAS-NS-011'	=>	61,
            'EAS-NS-012'	=>	149,
            'EAS-NS-013'	=>	149,
            'EAS-NS-009'	=>	31,
            'EAS-NS-014'	=>	36,
            'EAS-PL-001'	=>	49,
            'EAS-PL-006'	=>	13,
            'EAS-PL-005'	=>	13,
            'EAS-PL-007'	=>	18,
            'EAS-PL-008'	=>	59,
            'EAS-PL-009'	=>	59,
            'EAS-PL-010'	=>	40,
            'EAS-PL-011'	=>	40,
            'EAS-RE-007'	=>	6,
            'EAS-RE-014'	=>	21,
            'EAS-SB-000'	=>	5,
            'EAS-SB-001'	=>	7,
            'EAS-SB-002'	=>	1,
            'EAS-SB-003'	=>	1,
            'EAS-SB-005'	=>	2,
            'EAS-SB-004'	=>	-2,
            'EAS-SB-006'	=>	11,
            'EAS-SE-000'	=>	51,
            'EAS-SU-000'	=>	77,
            'EAS-SU-001'	=>	51,
            'EAS-SU-002'	=>	74,
            'EAS-TY-000'	=>	98,
            'EAS-TY-001'	=>	93,
            'EAS-TY-002'	=>	77,
            'EAS-TY-003'	=>	100,
            'EAS-TY-004'	=>	57,
            'EAS-TY-005'	=>	61,
            'EAS-TY-006'	=>	63,
            'EAS-TY-007'	=>	80,
            'EAS-TY-008'	=>	77,
            'EAS-TY-009'	=>	83,
            'EAS-TY-010'	=>	74,
            'EAS-TY-011'	=>	71,
            'EAS-TY-012'	=>	61,
            'EAS-TY-013'	=>	72,
            'EAS-TY-014'	=>	112,
            'EAS-TY-015'	=>	72,
            'EAS-TY-017'	=>	55,
            'EAS-TY-016'	=>	36,
            'EAS-TY-018'	=>	55,
            'EAS-TY-020'	=>	83,
            'EAS-TY-021'	=>	61,
            'EAS-TY-023'	=>	59,
            'EAS-TY-022'	=>	51,
            'EAS-TY-024'	=>	71,
            'EAS-TY-026'	=>	74,
            'EAS-TY-027'	=>	74,
            'EAS-TY-029'	=>	71,
            'EAS-TY-028'	=>	74,
            'EAS-TY-030'	=>	71,
            'EAS-TY-032'	=>	6,
            'EAS-TY-033'	=>	6,
            'EAS-VW-000'	=>	112,
            'EAS-VW-008'	=>	43,
            '96SKV500'	=>	-1,
            '96SKV501'	=>	-1,
            '96SKV502'	=>	1,
            '96SKV503'	=>	-1,
            '96SKV504'	=>	-6,
            '96SKV505'	=>	-4,
            '96SKV506'	=>	84,
            '96SKV507'	=>	39,
            '96SKV508'	=>	80,
            '96SKV509'	=>	39,
            '96SKV510'	=>	46,
            '96SKV511'	=>	43,
            '96SKV512'	=>	57,
            '96SKV513'	=>	62,
            '96SKV514'	=>	24,
            '96SKV515'	=>	65,
            '96SKV516'	=>	67,
            '96SKV517'	=>	63,
            '96SKV518'	=>	54,
            '96SKV519'	=>	50,
            '96SKV520'	=>	64,
            '96SKV521'	=>	57,
            '96SKV522'	=>	71,
            '96SKV523'	=>	15,
            '96SKV524'	=>	50,
            '96SKV525'	=>	7,
            '96SKV526'	=>	43,
            '96SKV527'	=>	33,
            '96SKV528'	=>	32,
            '96SKV529'	=>	54,
            '96SKV530'	=>	62,
            '96SKV531'	=>	20,
            '96SKV532'	=>	51,
            '96SKV533'	=>	53,
            '96SKV534'	=>	56,
            '96SKV535'	=>	56,
            '96SKV536'	=>	59,
            '96SKV537'	=>	50,
            '96SKV538'	=>	52,
            '96SKV539'	=>	68,
            '96SKV540'	=>	70,
            '96SKV541'	=>	26,
            '96SKV542'	=>	69,
            '96SKV543'	=>	59,
            '96SKV544'	=>	61,
            '96SKV545'	=>	81,
            '96SKV546'	=>	49,
            '96SKV547'	=>	77,
            '96SKV548'	=>	26,
            '96SKV549'	=>	81,
            '96SKV550'	=>	56,
            '96SKV551'	=>	55,
            '96SKV552'	=>	58,
            '96SKV553'	=>	64,
            '96SKV554'	=>	71,
            '96SKV555'	=>	53,
            '96SKV556'	=>	54,
            '96SKV557'	=>	50,
            '96SKV558'	=>	61,
            '96SKV559'	=>	57,
            '96SKV561'	=>	46,
            '96SKV563'	=>	23,
            '96SKV564'	=>	58,
            '99590099501'	=>	3,
            'EAS-CH-008'	=>	-2,
            'EAS-PE-001'	=>	3,
            'EAS-FT-004'	=>	23,
            'EAS-RE-015'	=>	-3,
            'EAS-SU-003'	=>	51,



        ];
        $arrayShop = [
            'EZC-ME-010'	=>	32,
            'EZC-ME-011'	=>	18,
            'ESD-NS-000'	=>	0,
            'EZC-NS-004'	=>	23,
            'EZC-NS-004A'	=>	23,
            'EZC-NS-004B'	=>	18,
            'EZC-NS-004C'	=>	18,
            'EZC-NS-004D'	=>	21,
            'EZC-VW-115'	=>	2,
            'eas-ch-000a'	=>	-7,
            'EAS-VW-009'	=>	30,
            'EAS-VW-004'	=>	49,
            'EAS-VW-003'	=>	56,
            'EAS-VW-002'	=>	57,
            'EAS-SK-001'	=>	51,
            'EAS-RE-012'	=>	13,
            'EAS-RE-011'	=>	12,
            'EAS-VW-001'	=>	91,
            'EAS-RE-010'	=>	12,
            'EAS-RE-008'	=>	14,
            'EAS-RE-009'	=>	15,
            'EAS-RE-005'	=>	12,
            'EAS-RE-003'	=>	25,
            'EAS-RE-002'	=>	67,
            'EAS-RE-001'	=>	33,
            'EAS-PL-003'	=>	9,
            'EAS-PL-004'	=>	23,
            'EAS-PL-002'	=>	46,
            'EAS-PL-000'	=>	50,
            'EAS-PE-000'	=>	49,
            'EAS-ME-000'	=>	12,
            'EAS-KA-012'	=>	56,
            'EAS-FT-001'	=>	31,
            'EAS-FT-000'	=>	31,
            'EAS-FR-006'	=>	44,
            'EAS-AU-000'	=>	29,
            'EAS-BM-000'	=>	14,
            'EAS-BM-001'	=>	14,
            'EAS-BM-002'	=>	16,
            'EAS-BM-003'	=>	13,
            'EAS-BM-004'	=>	12,
            'EAS-CH-000'	=>	10,
            'EAS-CH-002'	=>	9,
            'EAS-CH-001'	=>	12,
            'EAS-CH-004'	=>	14,
            'EAS-CH-007'	=>	10,
            'EAS-DW-000'	=>	76,
            'EAS-DW-001'	=>	76,
            'EAS-DW-002'	=>	79,
            'EAS-FR-000'	=>	54,
            'EAS-FR-001'	=>	54,
            'EAS-FR-003'	=>	41,
            'EAS-FR-002'	=>	42,
            'EAS-FR-004'	=>	43,
            'EAS-FR-005'	=>	18,
            'EAS-FR-007'	=>	56,
            'EAS-FT-002'	=>	18,
            'EAS-FT-003'	=>	31,
            'EAS-HD-001'	=>	67,
            'EAS-HD-000'	=>	76,
            'EAS-HD-002'	=>	67,
            'EAS-HD-003'	=>	71,
            'EAS-HD-004'	=>	65,
            'EAS-HD-005'	=>	65,
            'EAS-HD-007'	=>	59,
            'EAS-HD-006'	=>	47,
            'EAS-HD-008'	=>	57,
            'EAS-HD-009'	=>	39,
            'EAS-HD-011'	=>	57,
            'EAS-HD-010'	=>	50,
            'EAS-HD-012'	=>	76,
            'EAS-HY-000'	=>	97,
            'EAS-HY-001'	=>	97,
            'EAS-HY-002'	=>	71,
            'EAS-HY-003'	=>	97,
            'EAS-HY-004'	=>	71,
            'EAS-HY-006'	=>	65,
            'EAS-HY-007'	=>	65,
            'EAS-HY-005'	=>	71,
            'EAS-HY-008'	=>	56,
            'EAS-HY-009'	=>	81,
            'EAS-IS-000'	=>	25,
            'EAS-KA-001'	=>	71,
            'EAS-KA-003'	=>	50,
            'EAS-KA-002'	=>	71,
            'EAS-KA-005'	=>	71,
            'EAS-KA-004'	=>	65,
            'EAS-KA-006'	=>	65,
            'EAS-KA-008'	=>	56,
            'EAS-KA-007'	=>	56,
            'EAS-KA-009'	=>	42,
            'EAS-KA-011'	=>	71,
            'EAS-KA-010'	=>	81,
            'EAS-LR-001'	=>	23,
            'EAS-LR-000'	=>	9,
            'EAS-ME-001'	=>	10,
            'EAS-ME-003'	=>	10,
            'EAS-ME-002'	=>	11,
            'EAS-MS-000'	=>	61,
            'EAS-LR-002'	=>	12,
            'EAS-MS-001'	=>	65,
            'EAS-MS-003'	=>	53,
            'EAS-MS-002'	=>	83,
            'EAS-MS-004'	=>	67,
            'EAS-MS-006'	=>	67,
            'EAS-MS-005'	=>	49,
            'EAS-MS-007'	=>	57,
            'EAS-MS-008'	=>	59,
            'EAS-MS-011'	=>	45,
            'EAS-MS-010'	=>	27,
            'EAS-MS-012'	=>	42,
            'EAS-MS-013'	=>	44,
            'EAS-MZ-000'	=>	59,
            'EAS-MS-014'	=>	49,
            'EAS-MZ-001'	=>	57,
            'EAS-MZ-003'	=>	57,
            'EAS-MZ-002'	=>	69,
            'EAS-MZ-004'	=>	65,
            'EAS-MZ-005'	=>	81,
            'EAS-MZ-006'	=>	79,
            'EAS-MZ-008'	=>	44,
            'EAS-MZ-007'	=>	43,
            'EAS-NS-000'	=>	63,
            'EAS-NS-001'	=>	63,
            'EAS-NS-002'	=>	54,
            'EAS-NS-003'	=>	32,
            'EAS-NS-004'	=>	36,
            'EAS-NS-005'	=>	41,
            'EAS-NS-007'	=>	35,
            'EAS-NS-010'	=>	50,
            'EAS-NS-006'	=>	49,
            'EAS-NS-011'	=>	56,
            'EAS-NS-012'	=>	118,
            'EAS-NS-013'	=>	118,
            'EAS-NS-009'	=>	35,
            'EAS-NS-014'	=>	38,
            'EAS-PL-001'	=>	47,
            'EAS-PL-006'	=>	22,
            'EAS-PL-005'	=>	22,
            'EAS-PL-007'	=>	26,
            'EAS-PL-008'	=>	54,
            'EAS-PL-009'	=>	54,
            'EAS-PL-010'	=>	41,
            'EAS-PL-011'	=>	41,
            'EAS-RE-007'	=>	17,
            'EAS-RE-014'	=>	27,
            'EAS-SB-000'	=>	17,
            'EAS-SB-001'	=>	18,
            'EAS-SB-002'	=>	14,
            'EAS-SB-003'	=>	14,
            'EAS-SB-005'	=>	14,
            'EAS-SB-004'	=>	12,
            'EAS-SB-006'	=>	20,
            'EAS-SE-000'	=>	49,
            'EAS-SU-000'	=>	67,
            'EAS-SU-001'	=>	49,
            'EAS-SU-002'	=>	65,
            'EAS-TY-000'	=>	81,
            'EAS-TY-001'	=>	78,
            'EAS-TY-002'	=>	67,
            'EAS-TY-003'	=>	83,
            'EAS-TY-004'	=>	53,
            'EAS-TY-005'	=>	56,
            'EAS-TY-006'	=>	57,
            'EAS-TY-007'	=>	69,
            'EAS-TY-008'	=>	67,
            'EAS-TY-009'	=>	71,
            'EAS-TY-010'	=>	65,
            'EAS-TY-011'	=>	63,
            'EAS-TY-012'	=>	56,
            'EAS-TY-013'	=>	64,
            'EAS-TY-014'	=>	91,
            'EAS-TY-015'	=>	63,
            'EAS-TY-017'	=>	51,
            'EAS-TY-016'	=>	38,
            'EAS-TY-018'	=>	51,
            'EAS-TY-020'	=>	71,
            'EAS-TY-021'	=>	56,
            'EAS-TY-023'	=>	54,
            'EAS-TY-022'	=>	49,
            'EAS-TY-024'	=>	63,
            'EAS-TY-026'	=>	65,
            'EAS-TY-027'	=>	65,
            'EAS-TY-029'	=>	63,
            'EAS-TY-028'	=>	65,
            'EAS-TY-030'	=>	63,
            'EAS-TY-032'	=>	17,
            'EAS-TY-033'	=>	17,
            'EAS-VW-000'	=>	91,
            'EAS-VW-008'	=>	43,
            '96SKV500'	=>	12,
            '96SKV501'	=>	12,
            '96SKV502'	=>	14,
            '96SKV503'	=>	12,
            '96SKV504'	=>	9,
            '96SKV505'	=>	10,
            '96SKV506'	=>	72,
            '96SKV507'	=>	40,
            '96SKV508'	=>	69,
            '96SKV509'	=>	40,
            '96SKV510'	=>	45,
            '96SKV511'	=>	43,
            '96SKV512'	=>	53,
            '96SKV513'	=>	57,
            '96SKV514'	=>	30,
            '96SKV515'	=>	59,
            '96SKV516'	=>	60,
            '96SKV517'	=>	57,
            '96SKV518'	=>	51,
            '96SKV519'	=>	48,
            '96SKV520'	=>	58,
            '96SKV521'	=>	53,
            '96SKV522'	=>	63,
            '96SKV523'	=>	24,
            '96SKV524'	=>	48,
            '96SKV525'	=>	18,
            '96SKV526'	=>	43,
            '96SKV527'	=>	36,
            '96SKV528'	=>	35,
            '96SKV529'	=>	50,
            '96SKV530'	=>	57,
            '96SKV531'	=>	27,
            '96SKV532'	=>	49,
            '96SKV533'	=>	50,
            '96SKV534'	=>	52,
            '96SKV535'	=>	52,
            '96SKV536'	=>	54,
            '96SKV537'	=>	48,
            '96SKV538'	=>	50,
            '96SKV539'	=>	60,
            '96SKV540'	=>	62,
            '96SKV541'	=>	31,
            '96SKV542'	=>	61,
            '96SKV543'	=>	54,
            '96SKV544'	=>	56,
            '96SKV545'	=>	70,
            '96SKV546'	=>	47,
            '96SKV547'	=>	67,
            '96SKV548'	=>	31,
            '96SKV549'	=>	70,
            '96SKV550'	=>	53,
            '96SKV551'	=>	51,
            '96SKV552'	=>	53,
            '96SKV553'	=>	57,
            '96SKV554'	=>	63,
            '96SKV555'	=>	50,
            '96SKV556'	=>	51,
            '96SKV557'	=>	48,
            '96SKV558'	=>	56,
            '96SKV559'	=>	53,
            '96SKV561'	=>	45,
            '96SKV563'	=>	29,
            '96SKV564'	=>	53,
            '99590099501'	=>	15,
            'EAS-CH-008'	=>	12,
            'EAS-PE-001'	=>	15,
            'EAS-FT-004'	=>	29,
            'EAS-RE-015'	=>	11,
            'EAS-SU-003'	=>	49,
        ];
        foreach ($arrayTrade as $key => $value) {
            $a = Product::where('supplier_reference', (string)$key)->update(['trade_margin' => $value, 'updated_at' => Carbon::now()]);
        }
        foreach ($arrayShop as $key => $value) {
            $a = Product::where('supplier_reference', (string)$key)->update(['trade_margin_pard' => $value, 'updated_at' => Carbon::now()]);
        }
    });
    Route::get('/test1', function () {

        $order = Order::Find(82);

        B1Api::getInvoice($order);
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
