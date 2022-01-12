<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatUserMargin extends Model
{
    use HasFactory;
    protected $table = 'product_cat_user_margin';
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
