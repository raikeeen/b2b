<?php

use App\Jobs\GetDocumentB1;
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


ini_set('max_execution_time', 1000);
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
    Route::post('order/{id}/update_order_info', [\App\Http\Controllers\Voyager\OrderController::class, 'orderInfo'])->name('order.info.update');
    Route::post('order/{id}/update_order_item', [\App\Http\Controllers\Voyager\OrderController::class, 'itemUpdate'])->name('order.item.update');
    Route::post('order/{id}/update_order_item_delete', [\App\Http\Controllers\Voyager\OrderController::class, 'itemDelete'])->name('order.item.delete');
    Route::post('order/{id}/update_order_item_add', [\App\Http\Controllers\Voyager\OrderController::class, 'itemAdd'])->name('order.item.add');
    Route::post('order/{id}/update_order_name_fac', [\App\Http\Controllers\Voyager\OrderController::class, 'updateNameFac'])->name('order.fac.update');
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
        \App\Jobs\UpdateStockB1::dispatch()->onQueue('update_stock');
    });
    Route::get('/updateB1_test', function (){
        B1Api::synchronizationStock();
    });
    Route::get('/updateAJS', function (){
        \App\Jobs\UpdateStockAjs::dispatch()->onQueue('update_stock');
    });
    Route::get('/updateAJS_test', function (){
        AjsApi::synchronizationStock();
    });
    Route::get('/updateMax', function (){
        \App\Jobs\UpdateStockMaxgear::dispatch()->onQueue('update_stock');
    });
    Route::get('/updateSKV_test', function (){
      \App\Jobs\UpdateStockSkv::dispatch()->onQueue('update_stock');
    });
    Route::get('/updatePolcar', function (){
        \App\Jobs\UpdateStockPolcar::dispatch()->onQueue('update_stock');
    });
    Route::get('/updateHart', function (){
        \App\Jobs\UpdateStockHart::dispatch()->onQueue('update_stock');
    });
    Route::get('/updateTomala', function (){
        \App\Jobs\UpdateStockTomala::dispatch()->onQueue('update_stock');
    });
    Route::get('/zaloguj-sie', function (){
        return redirect()->route('home');
    });
    Route::get('updatecat', function (){
       /* $xlsx = @(new SimpleXLSX('/var/www/rm-autodalys.eu/public_html/app/Http/Controllers/import cat.xlsx'));

        $nam = '';
        $rows = $xlsx->rows();
        unset($rows[0]);
        for ($i = 1; $i <= count($rows); $i++) {
            //$cat = ProductCat::where('product_id', $rows[$i][2])->delete();


            $cat = explode(', ',$rows[$i][1]);

            foreach ($cat as $category_elem) {
                $product = $rows[$i][2];
                $category = Db::table('category')->select(['id'])->where('name', '=', $category_elem)->first();

                if (isset($product) && isset($category)) {
                    DB::table('product_cat')->insert([
                        'category_id' => $category->id,
                        'product_id' => $product,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                } else
                    $nam .= '      :'.$category_elem;
            }

        }
dd($nam);*/
    });
    Route::get('facturos/{id}', function (\Illuminate\Http\Request $request){
        GetDocumentB1::dispatch($request->id)->onQueue('high');
    });
    Route::get('/updateTest', function (){
        $img = \App\Models\Img::where('id', '>', 213321)->get();

        foreach ($img as $item) {
            $product = $item->product;
            $arr = explode('/', $item->name);

            if($arr[2] == 1) {
                $exArr = explode('_', $arr[3]);

                if(isset($exArr[0]) && isset($exArr[1])) {
                    $supp = DB::table('product')
                        ->select(['reference', 'supplier_reference'])
                        ->where('supplier_reference', 'like', strtoupper($exArr[0]))
                        ->first();

                    if(!empty($supp)) {

                        $string = 'storage/products/1/' . $supp->reference . '_' . $exArr[1];
                        $item->update(['name' => $string]);
                    }
                }
            }
        }
       /* foreach ($img as $item) {
            $product = $item->product;
            if($product->supplier->id == 1) {
                $arr = explode('/', $item->name);
                $supplier = $arr[2] ?? 0;
                if(count($arr) == 5) {

                    $string = 'storage/products/1/' . $arr[3] . '-' . $arr[4];
                    $item->update(['name' => $string]);
                    continue;
                }
                if($supplier == 1) {
                    $codeArr = explode('_', $arr[3]);
                    if(isset($codeArr[1])) {
                        $string = 'storage/products/1/' . $product->reference . '_' . $codeArr[1];
                        $item->update(['name' => $string]);
                    } else dump($item);
                }
            }


        }*/
    });
    Route::get('/test1', function () {
        $order = Order::Find(96);

        $itemB1 = [];
        foreach ($order->orderitem as $item) {

            array_push($itemB1, [
                'id' => $item->product->b1_product_id,
                'name' => $item->name,
                'quantity' => $item->amount*100,
                'vatRate' => config('cart.tax'),
                'price' => Tax::priceWithTax($item->price)*100,
                'sum' => Tax::priceWithTax($item->price*$item->qty)*100,
            ]);
        }

        $referenceOrderB1 = B1Api::pushOrder($order,$itemB1);
dump($referenceOrderB1);
        $order->order_b1 = $referenceOrderB1['data']['orderId'];

        $newDocumentB1 = new DocumentB1();
        $newDocumentB1->name = $referenceOrderB1['data']['invoiceDocument'];
        $newDocumentB1->price = $order->total;
        $newDocumentB1->save();

        $order->document_b1_id = $newDocumentB1->id;
        $order->save();

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

Route::get('/storage/products/1/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/7/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/4-5/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/6/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
Route::get('/storage/products/3/{filename}', function($filename) {

    return response( file_get_contents('./storage/products/no_photo_500.jpg') )
        ->header('Content-Type','image/png');

});
