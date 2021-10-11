<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';

    public function products()
    {
        $this->hasMany('App\Models\Product','discount_id');
    }
}
