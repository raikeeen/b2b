<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
    static function createOrderItem($user_id, $order_id, $cart_item)
    {
        $orderItem = new OrderItem;
        $orderItem->price = $cart_item->price;
        $orderItem->product_id = $cart_item->id;
        $orderItem->order_id = $order_id;
        $orderItem->user_id = $user_id;
        $orderItem->amount = $cart_item->qty;

        $orderItem->save();
    }
}
