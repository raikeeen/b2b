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
}
