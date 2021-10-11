<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';

    public function order()
    {
        return $this->hasMany('App\Models\Order','delivery_id');
    }
}
