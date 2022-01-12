<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUserMargin extends Model
{
    use HasFactory;
    protected $table = 'product_user_margin';
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
