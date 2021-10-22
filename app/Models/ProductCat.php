<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    use HasFactory;

    protected $table = 'product_cat';

    protected $fillable = ['product_id', 'category_id'];
}
