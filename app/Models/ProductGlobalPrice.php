<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGlobalPrice extends Model
{
    use HasFactory;
    protected $table = 'product_global_price';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
