<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public function order()
    {
        return $this->belongsToMany('App\Models\Order', 'order_status');
    }
    public function order_status()
    {
        $this->hasOne('App\Models\OrderStatus', 'status_id');
    }
}
