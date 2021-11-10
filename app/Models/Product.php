<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Discount;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Myrzan\TecDocClient\Client;
use Myrzan\TecDocClient\Generated\GetArticleDirectSearchAllNumbersWithState;
use Myrzan\TecDocClient\Generated\GetArticleLinkedAllLinkingTarget3;
use Myrzan\TecDocClient\Generated\GetVehicleByIds3;


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
    protected $appends = ['price_stock'];
    public $increments = true;
    /**
     * @return string
     * @var mixed
     */
    public function getPriceAttribute($value)
    {
        $user = Auth::user();
        return  round($value + ( $value * (
                    (isset($this->margin->value) ? $this->margin->value : 0) +
                    (isset($this->category[0]) ? $this->category[0]->trade_margin : 0) +
                    $this->trade_margin  +
                    (isset($this->supplier->margin) ? $this->supplier->margin : 0 ))/ 100) -
            ( $value * ( isset($user->discount) ? $user->discount : 0 + $this->discount->value ) / 100),2);
    }

    public function getPriceStockAttribute()
    {
        if($this->discount->value === 0){
            return null;
        } else
            return  round(($this->price + ($this->price * $this->discount->value) / 100) * 1.21,2);
    }
    public function priceTax()
    {
            return round($this->price*1.21,2);
    }

    /*public function presentPrice()
    {
        return money_format('$%i', $this->price / 100);
    }

    public function totalMargin($id)
    {
        $user_discount = User::Find($id);
        $price = $this->price;

        return  $this->price = $price + ( $this->price * (
                $this->margin->value +
                (isset($this->category[0]) ? $this->category[0]->trade_margin : 0) +
                $this->trade_margin  +
                $this->supplier->margin )/ 100) -
            ( $price*$user_discount->discount ) / 100;
    }*/


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
    public function orderitem()
    {
        return $this->hasMany('App\Models\Orderitem','product_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }

}
