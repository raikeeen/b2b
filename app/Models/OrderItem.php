<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $fillable = [
        'price',
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    public function img()
    {
        return $this->hasMany('App\Models\Img','product_id', 'product_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    static function createOrderItem($user_id, $order_id, $cart_item)
    {
        $orderItem = new OrderItem;

        $orderItem->name = $cart_item->name;
        $orderItem->price = $cart_item->price;
        $orderItem->product_id = $cart_item->id;
        $orderItem->order_id = $order_id;
        $orderItem->user_id = $user_id;
        $orderItem->amount = $cart_item->qty;

        $orderItem->save();

        $product = Product::find($cart_item->id);

        $amount = $product->stock_shop - $cart_item->qty;

        if($amount > 0) {

            $product->stock_shop = $amount;
            $amount = 0;

        }

        if($amount < 0) {
            $amount = $product->stock_supplier - abs($amount);

            if($amount > 0) {

                $product->stock_shop = 0;
                $product->stock_supplier = $amount;
                $amount = 0;
            } else {
                $amount = $product->stock_supplier2 - abs($amount);
                if($amount > 0) {
                    $product->stock_shop = 0;
                    $product->stock_supplier = 0;
                    $product->stock_supplier2 = $amount;
                } else {
                    $product->stock_shop = 0;
                    $product->stock_supplier = 0;
                    $product->stock_supplier2 = 0;
                }
            }
        }

        $product->save();

        return $orderItem;
    }
    public function priceTax()
    {
        return round($this->price*1.21,2);
    }
}
