<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'tax';


    static function priceWithTax($price)
    {
        return round($price + ($price * config('cart.tax')) / 100, 2);
    }
}
