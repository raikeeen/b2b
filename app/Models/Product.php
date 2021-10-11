<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Discount;
use App\Models\Category;
use App\Models\User;

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
        'discount_id',
        'supplier_id',
        'description',
        'short_description',
        'price',
        'discount_product',
        'discount_global'
    ];
    public $increments = true;
    /**
     * @return string
     * @var mixed
     */

    public function presentPrice()
    {
        return money_format('$%i', $this->price / 100);
    }

    public function totalMargin($id)
    {
        $user_discount = User::Find($id);
        $price = (float)$this->price;

        return  $price + ( $this->price * (
                $this->margin->value +
                (isset($this->category[0]) ? $this->category[0]->trade_margin : 0) +
                $this->trade_margin  +
                $this->supplier->margin )/ 100) -
            ( $price*$user_discount->discount ) / 100;
    }

    public function totalDiscount()
    {
        return $this->price - $this->price * $this->discount->value / 100;
    }

    public function order()
    {
        return $this->belongsToMany('App\Models\Order','order_item');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category','product_cat','product_id');
    }

    public function discount()
    {
        return $this->belongsTo('App\Models\Discount');
    }
    public function margin()
    {
        return $this->belongsTo('App\Models\Margin');
    }

    public function img()
    {
        return $this->hasMany('App\Models\Img','product_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }

}
