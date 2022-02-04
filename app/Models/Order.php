<?php

namespace App\Models;

use App\Jobs\SendMailOrder;
use Doctrine\DBAL\Driver\SQLSrv\Exception\Error;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'name',
        'order_b1',
        'total',
        'payment_price',
        'delivery_price'
    ];
    protected $appends = ['company', 'status_latest'];
    public $additional_attributes = ['company', 'status_latest', 'status_last', 'status_factura'];

    public function getCompanyAttribute()
    {
        return $this->user->address->company_name;
    }

    public function getStatusLatestAttribute()
    {
        $status = $this->status->last();
        $color = $status->color;
        if(!isset($color)) {
            $color = '#CCCCC';
        }

        $html = '<span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
        white-space: nowrap;background-color:'. $color.'">'.$status->name.'</span>';
        return $html;
    }

    public function getStatusFacturaAttribute()
    {
        $status = $this->document_b1;

        if(isset($status->status)) {
            //dump($status->status);

            $status = $status->status->name;


            if (isset($status->status->color)){
                dd($status);
            }
            $color = $status->status->color;

            if (!isset($color)) {
                $color = 'lightblue';
            }

            $html = '<span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
white-space: nowrap;background-color:' . $color . '">' . $status->name . '</span>';
            return $html;
        } else
            return '<span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
    white-space: nowrap;background-color:">' . 'nėra' . '</span>';
    }
    public function getStatusLastAttribute()
    {
        return $this->status->last()->name;
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
        $idOrderOld = 1;
        $orderOld = null;

        if(isset(Order::latest()->first()->id)) {
            $orderOld = Order::latest()->first();
            $idOrderOld = $orderOld->id + 1;
        }

        $order = new order;
        $delivery = Delivery::find($request->delivery)->price;
        $payment = Payment::find($request->payment)->price;

        if(isset(session()->get('coupon')['id'])){
            $coupon = floatval(Coupons::find(session()->get('coupon')['id'])->value);
        } else $coupon = 0;

        if(Order::checkDate($orderOld->created_at)) {
            $order->increments = $orderOld->increments + 1;
        }

        if($orderOld == null) {
            $order->reference = "B2B".date("ym").str_pad(1, 4, "0", STR_PAD_LEFT);
        } else {
            $order->reference = Order::generateReference($orderOld);
        }
        $total = Tax::priceWithTax(Cart::subtotal(2,'.',''));
        if($total > 150) {
            $delivery = 0.00;
        }
        if($request->delivery == 1) {
            $payment = 0.00;
        }
        $order->user_id = $user_id;
        $order->delivery_id = $request->delivery;
        $order->delivery_price = $delivery;
        $order->payment_id = $request->payment;
        $order->payment_price = $payment;
        $order->document_id = $request->document;
        $order->coupon_id = $coupon === 0 ? null : $coupon;
        $order->total = $total + $delivery + $payment - $coupon;
        $order->save();

        $order->status()->attach(1);


        foreach (Cart::content() as $item) {

            $orderItem = OrderItem::createOrderItem($user_id, $order->id, $item);
        }

        Cart::destroy();
        session()->forget('coupon');

        $mail = ['name' => 'Užsakymas '.$order->reference, 'order' => Order::detailOrder($order)];

        SendMailOrder::dispatch($mail, $order)->onQueue('mail');

        return $order;
    }
    static function detailOrder($order)
    {
        $invoice = null;
        if(isset($order->document_b1->name)) {
            $invoice = $order->getFactura();
        }
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
            'company' =>$order->company,
            'user' =>$order->user,
            'invoice' => $invoice,
            'status' => $order->status->last()->name,
            'type_doc' => $order->document->name,
            'coupon' => '',
            'total' => $order->total,
            'tax' => Tax::first()->tax_count,
            'created_at' => $order->created_at,
            'venipak' => isset($order->venipak->label) ? $order->venipak->label : null
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
                    'price' => $product->price
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
    static function generateReference($order)
    {
        $orderDate = $order->created_at;

        if(!Order::checkDate($orderDate)) {

            return "B2B".date("ym").str_pad(1, 4, "0", STR_PAD_LEFT);
        }

        return "B2B".date("ym").str_pad($order->increments + 1, 4, "0", STR_PAD_LEFT);
    }
    static function checkDate($orderDate)
    {
        $orderOldDateMount = substr($orderDate,5,2);

        if(date("m") == $orderOldDateMount) {

            return true;
        }
        return false;
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
    public function getFactura()
    {
        return 'storage/users/'.$this->user_id.'/invoice/'.$this->document_b1->name.".pdf";
    }

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
    public function document_b1()
    {
        return $this->belongsTo('App\Models\DocumentB1');
    }
    public function venipak()
    {
        return $this->hasOne('App\Models\Venipak', 'order_id');
    }


}
