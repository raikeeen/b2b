<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public function delivery()
    {
        return $this->hasOne('App\Delivery','delivery_id');
    }
}
