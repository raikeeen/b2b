<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'Delivery';
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
