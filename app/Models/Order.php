<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Order extends Model
{
    protected $table = 'order';

    public $increments = true;

    protected $fillable = [
        'name',
        'order_b1'
    ];
    public $additional_attributes = ['company', 'status_latest'];

    public function getCompanyAttribute()
    {
        return $this->user->address->company_name;
    }

    public function getStatusLatestAttribute()
    {
        $div = '<span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
        white-space: nowrap;background-color:'. $this->status->last()->color.'">'.$this->status->last()->name.'</span>';
        return $div;
    }

    static function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        if(isset(session()->get('coupon')['discount'])){
            $discount = floatval(session()->get('coupon')['discount']);
        } else $discount = 0;

        $newTotal = round(Cart::total(2,'.','') - $discount);
        $newSubTotal = round($newTotal / (1 + $tax), 2);

        return collect([
            'discount' => $discount,
            'newSubTotal' => $newSubTotal,
            'newTotal' => $newTotal
        ]);
    }
    static function createOrder($user_id, $request)
    {
        $idOrderOld = Order::latest()->first()->id + 1;
        $order = new order;
        $delivery = Delivery::find($request->delivery)->price;
        $payment = Payment::find($request->payment)->price;
        if(isset(session()->get('coupon')['id'])){
            $coupon = floatval(Coupons::find(session()->get('coupon')['id'])->value);
        } else $coupon = 0;

        $order->user_id = $user_id;
        $order->delivery_id = $request->delivery;
        $order->delivery_price = $delivery;
        $order->payment_id = $request->payment;
        $order->payment_price = $payment;
        $order->document_id = $request->document;
        $order->coupon_id = $coupon === 0 ? null : $coupon;
        $order->secure_key = $request->_token;
        $order->reference = $idOrderOld.strtoupper(Str::random(4)).$user_id;
        $order->total = Tax::priceWithTax(Cart::subtotal(2,'.','')) + $delivery + $payment - $coupon;
        $order->save();

        $order->status()->attach(1);


        foreach (Cart::content() as $item) {

            $orderItem = OrderItem::createOrderItem($user_id, $order->id, $item);
        }

        Cart::destroy();
        session()->forget('coupon');

        return $order;
    }
    static function detailOrder($order)
    {
        $orderdata = [
            'products',
            'order_reference' => $order->reference,
            'payment' => [
                'name' => $order->payment->name,
                'price' => $order->payment_price
            ],
            'delivery' => [
                'name' => $order->delivery->name,
                'price' => $order->delivery_price
            ],
            'user' =>$order->user,
            'invoice' => $order->invoice,
            'status' => $order->status->last()->name,
            'type_doc' => $order->document->name,
            'coupon' => '',
            'total' => $order->total,
            'tax' => Tax::first()->tax_count,
            'created_at' => $order->creared_at
        ];
        $coupon = $order->coupon;
        if(isset($coupon)) {
            $orderdata['coupon'] = [
                'name' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value
            ];
        } else $coupon = collect(['value' => 0]);

        $products = [];

        foreach ($order->orderitem as $product) {

            if(isset($product->product_id)) {

                array_push($products, [
                    'reference' => $product->product->reference,
                    'name' => $product->product->name,
                    'amount' => $product->amount,
                    'price' => $product->product->price
                ]);

            } else {

                array_push($products, [
                    'reference' => '',
                    'name' => $product->name,
                    'amount' => $product->amount,
                    'price' => $product->price
                ]);
            }
        }
        $orderdata['products'] = $products;

        return $orderdata;
    }
    static function generateReference($id)
    {
        //U000083/2021/000003

        /*return "U".str_pad($id, 6, "0", STR_PAD_LEFT)
            .'/'.date('Y',strtotime('now')).'/'
            .str_pad($id, 6, "0", STR_PAD_LEFT);*/
    }
   /* public static function orderTotal($order)
    {
        $orderdata = [
            'products',
            'total' => 0
        ];
        $products = [];

        foreach ($order->orderitem as $product) {
            $productFind = Product::find($product->product_id);
            array_push($products, [
                'reference' => $productFind->reference,
                'name' => $productFind->name,
                'amount' => $product->amount,
                'price' => $product->price
            ]);
            $orderdata['total'] += $product->price * $product->amount;
        }
        $orderdata['products'] = $products;

        return $orderdata;
    }*/

    public function delivery()
    {
        return $this->belongsTo('App\Models\Delivery');
    }
    public function document()
    {
        return $this->belongsTo('App\Models\Document');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }
    public function status()
    {
        return $this->belongsToMany('App\Models\Status', 'order_status');
    }
    public function orderitem()
    {
        return $this->hasMany('App\Models\OrderItem','order_id');
    }
    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupons');
    }


}
