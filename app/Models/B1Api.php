<?php

namespace App\Models;
include('B1.php');

use App\Jobs\SendMail;
use B1;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\SynchronizationMail;
ini_set('max_execution_time', 1800);

class B1Api extends Model
{
    use HasFactory;
    private $b1;

    // Using version 2.0.0 and up of the B1.php library.

    function __construct()
    {
        $this->b1 = new B1([
            'apiKey' => 'b99bbcf19048a9434998e14c5ea2cf384f4ef75ac812f4b629ebae3a78ec6ad2',
            'privateKey' => 'cd11bdec3162c3019d331fb822eec0e8f874ce70e35f10d56a7f9ef8c6663640'
        ]);
    }

    static function pushOrder($order, $itemsB1)
    {
        try {
            $keys = new B1Api;

            // Using version 2.0.0 and up of the B1.php library.

                $data = [
                    'prefix' => '32B2B',
                    'orderId' => $order->id,//$order->id,
                    'orderDate' => date('Y-m-d'),
                    'orderNo' => $order->reference,
                    'discount' => isset($order->coupon->value) ? $order->coupon->value*100: 0,
                    'total' => $order->total*100,
                    'orderEmail' => $order->user->email,
                    'writeOff' => 1,
                    'vatRate' => config('cart.tax'),
                    'currency' => 'EUR',
                    'billing' => array
                    (
                        'isCompany' => 1,
                        'name' => $order->user->address->company_name,
                        'code' => $order->user->address->vat,
                        'address' => $order->user->address->street
                            ." ".$order->user->address->building,
                        'city' => $order->user->address->city->name,
                        'postcode' => $order->user->address->post_code,
                        'country' => 'LT',
                    ),
                    'delivery' => array
                    (
                        'isCompany' => 1,
                        'name' => $order->user->email,
                        'code' => $order->user->address->vat,
                        'address' => $order->user->address->street
                            ." ".$order->user->address->building,
                        'city' => $order->user->address->city->name,
                        'postcode' => $order->user->address->post_code,
                        'country' => 'LT',
                    ),
                    'payer' => [
                        'name' => $order->user->address->company_name,
                        'code' => $order->user->address->vat,
                        'countryCode' => 'LT',
                    ],
                    'shippingAmount' => $order->delivery_price*100,
                    'items' => $itemsB1
                ];
                /*$data = [
                    'shopId' => '32a99',
                    'prefix' => '32a99',
                    'internalId' => $order->id,//$order->id,
                    'date' => date('Y-m-d'),
                    'number' => $order->reference,
                    'discount' => isset($order->coupon->value) ? $order->coupon->value*100: 0,
                    'total' => $order->total*100,
                    'email' => $order->user->email,
                    'writeOff' => 1,
                    'vatRate' => 0.21,
                    'currencyCode' => 'EUR',
                    'billing' => array
                    (
                        'isJuridical' => 1,
                        'name' => $order->user->address->company_name,
                        'code' => $order->user->address->vat,
                        'address' => $order->user->address->street
                            ." ".$order->user->address->building,
                        'city' => $order->user->address->city->name,
                        'postcode' => $order->user->address->post_code,
                        'countryCode' => 'LT',
                    ),
                    'delivery' => array
                    (
                        'isJuridical' => 1,
                        'name' => $order->user->email,
                        'code' => $order->user->address->vat,
                        'address' => $order->user->address->street
                            ." ".$order->user->address->building,
                        'city' => $order->user->address->city->name,
                        'postcode' => $order->user->address->post_code,
                        'countryCode' => 'LT',
                    ),
                    'payer' => [
                        'name' => $order->user->address->company_name,
                        'code' => $order->user->address->vat,
                        'countryCode' => 'LT',
                    ],
                    'shipping' => $order->delivery_price*100,
                    'items' => $itemsB1
                ];*/
                $result = $keys->b1->request('shop/orders/add', $data);

                if($result->getContent()['code'] !== 200)
                {
                    dump($result);
                    print_r($result);
                }
                return $result->getContent();
                //print_r($result);
        } catch (\B1Exception $e) {
            //dd($e->getMessage());
            //dd($e->getExtraData());
            //dd($e->getMessage(),$e->getExtraData());
            SendMail::dispatch(['name' => 'order '.$order->id.' got any errors it dont sent to b1'])->onQueue('mail');
            //Mail::to(config('mail')['admin'])->send(new SynchronizationMail(['name' => 'order '.$order->id.' got any errors it dont sent to b1']));
        }
    }
    static function synchronizationStock()
    {
        try {
            $start = microtime(true);

            \DB::table('product')->update(array('stock_shop' => 0));

            // Using version 2.0.0 and up of the B1.php library.
            $keys = new B1Api;
            /*$products =\DB::table('product')
                ->where('b1_product_id', '!=',null)
                ->select(['b1_product_id'])
                ->orderBy('b1_product_id', 'ASC')
                ->get();*/

           /* foreach ($products as $product) {

                $count = 0;

                /*$data = [
                    'warehouseId' => 1,
                    'page' => 1,
                    'pageSize' => 20,
                    'rows' => 100,
                    'filters' => [
                        'groupOp' => 'AND',
                        'rules' => [
                            [
                                'field' => 'id',
                                'op' => 'eq',
                                'data' => $product->b1_product_id
                            ]
                        ],
                    ],

                ];

                $result = $keys->b1->request('warehouse/stock/list', $data);
                $filter = $result->getContent()['data'];

                if(empty($filter)) {

                    \DB::table('product')
                        ->where('b1_product_id', '=', $product->b1_product_id)
                        ->update(['stock_shop' => $count]);
                    continue;
                }

                foreach ($filter as $item) {

                    $count += $item['stock'];
                }

                $product->stock_shop = $count;

                \DB::table('product')
                    ->where('b1_product_id', '=', $product->b1_product_id)
                    ->update(['stock_shop' => $count]);*/
            //}*/

            for ($i = 1; $i <= 20; $i++) {

                $data = [
                    'warehouseId' => 1,
                    'page' => $i,
                    'rows' => 100,
                    'filters' => [
                        'groupOp' => 'AND',
                        'rules' => [
                            [
                                'field' => 'id',
                                'op' => 'ge',
                                'data' => 0
                            ]
                        ],
                    ],

                ];

                $result = $keys->b1->request('warehouse/stock/list', $data);
                $filter = $result->getContent()['data'];


                foreach ($filter as $itemB1) {

                    $stock = DB::table('product')
                        ->where('b1_product_id', '=', $itemB1['id'])
                        ->select(['stock_shop'])
                        ->first();

                    if(!empty($stock)) {

                        DB::table('product')
                            ->where('b1_product_id', '=', $itemB1['id'])
                            ->update(array('stock_shop' => $stock->stock_shop + $itemB1['stock']));

                    }

                }


            }
            //Mail::to(config('mail')['admin'])->send(new SynchronizationMail(['name' => 'Synchronization b1 stocks success', 'time' => 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.']));
            SendMail::dispatch(['name' => 'Synchronization b1 stocks success', 'time' => 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'])->onQueue('mail');

        } catch (B1Exception $e) {

            SendMail::dispatch(['name' => 'ERROR Synchronization b1 stocks'])->onQueue('mail');
        }
    }

    static function pushItem($id,$item)
    {
        try {
            $keys = new B1Api;

            $data = [
                'orderId' => $id,
                //'id' => 1001,
                'name' => $item->name,
                'quantity' => $item->qty,
                'vatRate' => 21,
                'price' => round($item->price),
                'sum' => round($item->price*$item->qty),
            ];
            $result = $keys->b1->request('e-commerce/order-items/create', $data);

            if($result->getContent()['code'] !== 200)
            {

                print_r($result);
            }
            return $result->getContent();

        } catch (\B1Exception $e) {

            print_r([
                'message' => $e->getMessage(),
                'extraData' => $e->getExtraData(),
            ]);
        }
    }

    static function getInvoice($order)
    {
        try {
            $keys = new B1Api;

            $data = [
                'prefix' => '32B2B',
                'orderId' => $order->id,
            ];

            $result = $keys->b1->request('shop/invoices/get', $data);

            $path = "users/".$order->user_id."/invoice/".$order->invoice.".pdf";

            Storage::disk('local')->put("/public/".$path, $result->content);

            $order->invoice = "/storage/".$path;
            $order->save();

            if($result->code !== 200)
            {
                dump($result);
                print_r($result);
            }
            return true;
        } catch (\B1Exception $e) {

            Mail::to(config('mail')['admin'])->send(new SynchronizationMail(['name' => 'order '.$order->id.' got any errors it dont gave factura']));
        }
    }
}
