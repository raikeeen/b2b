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
                    'shippingAmount' => ($order->delivery_price + $order->payment_price) * 100,
                    'items' => $itemsB1
                ];
                $result = $keys->b1->request('shop/orders/add', $data);

                if($result->getContent()['code'] !== 200)
                {
                    dump($result);
                    print_r($result);
                }
                return $result->getContent();
        } catch (\B1Exception $e) {
            SendMail::dispatch(['name' => 'order '.$order->id.' got any errors it dont sent to b1'])->onQueue('mail');
        }
    }
    static function synchronizationStock()
    {
        try {
            $start = microtime(true);

            \DB::table('product')->update(array('stock_shop' => 0));

            // Using version 2.0.0 and up of the B1.php library.
            $keys = new B1Api;

            $totalPages = 1;
            $i = 1;
            while($i <= $totalPages) {

                $data = [
                    'warehouseId' => 1,
                    'page' => $i,
                    'rows' => 100,
                    'filters' => [
                        'groupOp' => 'AND',
                        'rules' => [
                            [
                                'field' => 'warehouseId',
                                'op' => 'eq',
                                'data' => 11
                            ]
                        ],
                    ],

                ];
                $i++;
                $result = $keys->b1->request('warehouse/stock/list', $data);
                $filter = $result->getContent()['data'];
                $totalPages = $result->getContent()['pages'];

                foreach ($filter as $itemB1) {

                    $stock = DB::table('product')
                        ->where('b1_product_id', $itemB1['id'])
                        ->select(['stock_shop'])
                        ->first();
                    if ($itemB1['code'] === '0206-05-5023006P') {
                        $stock_shop = DB::table('product')
                            ->where('supplier_reference', '=', 'ZRZ-PL-000')->first()->stock_shop;
                        DB::table('product')
                            ->where('supplier_reference', '=', 'ZRZ-PL-000')
                            ->update(array(
                                'stock_shop' => $stock_shop + $itemB1['stock'],
                                'updated_at' => date('Y-m-d H:i:s')
                            ));
                        $stock_shop = DB::table('product')
                            ->where('supplier_reference', '=', 'ZRZ-PL-004')->first()->stock_shop;
                        DB::table('product')
                            ->where('supplier_reference', '=', 'ZRZ-PL-004')
                            ->update(array(
                                'stock_shop' => $stock_shop + $itemB1['stock'],
                                'updated_at' => date('Y-m-d H:i:s')
                            ));
                    }
                    if(!empty($stock)) {

                        DB::table('product')
                            ->where('b1_product_id', $itemB1['id'])
                            ->update(array(
                                'stock_shop' => $stock->stock_shop + $itemB1['stock'],
                                'updated_at' =>  date('Y-m-d H:i:s')
                            ));

                        //bad codes
                        $code = $itemB1['code'];
                        if($code == 'ZRZ-PL-004') {
                            $stock_shop = DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-PL-000')->first()->stock_shop;
                            DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-PL-000')
                                ->update(array(
                                    'stock_shop' => $stock_shop + $itemB1['stock'],
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ));
                        } elseif ($code == 'ZRZ-PL-000') {
                            $stock_shop = DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-PL-004')->first()->stock_shop;
                            DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-PL-004')
                                ->update(array(
                                    'stock_shop' => $stock_shop + $itemB1['stock'],
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ));
                        } elseif ($code == 'ZRZ-CH-003') {
                            $stock_shop = DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-CH-004')->first()->stock_shop;
                            DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-CH-004')
                                ->update(array(
                                    'stock_shop' => $stock_shop + $itemB1['stock'],
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ));
                        } elseif ($code == 'ZRZ-CH-004') {
                            $stock_shop = DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-CH-003')->first()->stock_shop;
                            DB::table('product')
                                ->where('supplier_reference', '=', 'ZRZ-CH-003')
                                ->update(array(
                                    'stock_shop' => $stock_shop + $itemB1['stock'],
                                    'updated_at' =>  date('Y-m-d H:i:s')
                                ));
                        }

                    }

                }


            }
            SendMail::dispatch(['name' => 'Synchronization b1 stocks success', 'time' => '?????????? ???????????????????? ??????????????: '.round(microtime(true) - $start, 4).' ??????.'])->onQueue('mail');

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

            $path = "users/".$order->user_id."/invoice/".$order->document_b1->name.".pdf";

            Storage::disk('local')->put("/public/".$path, $result->content);

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
