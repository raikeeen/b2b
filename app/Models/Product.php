<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'product';
    protected $fillable = [
        'id',
        'name',
        'reference',
        'supplier_reference',
        'stock_shop',
        'stock_supplier',
        'description',
        'short_description',
        'price',
        'discount_product',
        'discount_global'
    ];
    public $increments = true;
    /**
     * @var mixed
     */
    //public $name;

}
