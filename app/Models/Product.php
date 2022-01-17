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
        'margin_id',
        'trade_margin',
        'description',
        'short_description',
        'price',
        'discount_product',
        'discount_global',
        'price_add',
        'b1_product_id'
    ];
    protected $appends = ['price_stock', 'price_base', 'price_recommend'];
    public $increments = true;
    public $additional_attributes = ['price_base'];

    /**
     * @return string
     * @var mixed
     */
    public function getPriceBaseAttribute()
    {
        return (float)$this->attributes['price'];
    }
    public function getPriceAttribute($value)
    {
        if(isset($this->global_price->price)) {
            return $this->global_price->price;
        }

        $user = Auth::user();

        if($user->role_id === 5) {
            $margin_sup = $this->supplier->margin_pard;
            $trade_margin = $this->trade_margin_pard;
            if(isset($this->category[0])) {
                $margin_cat = $this->category[0]->trade_margin_pard;
            }
        } else {
            $margin_sup = $this->supplier->margin;
            $trade_margin = $this->trade_margin;
            if(isset($this->category[0])) {
                $margin_cat = $this->category[0]->trade_margin;
            }
        }
        if(!empty($user->product_user_margin($this->id))) {
            $spec_user_product = $user->product_user_margin($this->id)->margin;
        } else {
            $spec_user_product = 0;
        }
        if(isset($this->category[0]->id) && !empty($user->product_cat_user_margin($this->category[0]->id)->first())) {
            $spec_user_category = $user->product_cat_user_margin($this->category[0]->id)->first()->margin;
        } else {
            $spec_user_category = 0;
        }

        return round($value + ( $value * (
                    (isset($this->margin->value) ? $this->margin->value : 0) +
                    (isset($margin_cat) ? $margin_cat : 0) +
                    $trade_margin  +
                    $spec_user_product +
                    $spec_user_category +
                    (isset($margin_sup) ? $margin_sup : 0 ))/ 100) -
            ( $value * ( isset($user->discount) ? $user->discount : 0) / 100) + $this->price_add,2);
    }
    public function getPriceRecommendAttribute()
    {
      return  round($this->getPriceBaseAttribute() * 2.07 + 2.5,2);
    }
    public function getPriceStockAttribute()
    {

            return null;
            //return  round(($this->price + ($this->price * $this->discount->value) / 100) * 1.21,2);
    }
    public function priceTax()
    {
            return round($this->price*1.21,2);
    }

    public function commonsMargin()
    {
        return (isset($this->margin->value) ? $this->margin->value : 0) +
            (isset($this->category[0]) ? $this->category[0]->trade_margin : 0) +
            (isset($this->trade_margin) ? $this->trade_margin : 0) +
            (isset($this->supplier->margin) ? $this->supplier->margin : 0);


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
    public function orderitem()
    {
        return $this->hasMany('App\Models\Orderitem','product_id');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier');
    }

    public function global_price()
    {
        return $this->hasOne('App\Models\ProductGlobalPrice');
    }
    public function product_user_margin()
    {
        return $this->hasOne('App\Models\ProductUserMargin');
    }
    public function product_cat_user_margin()
    {
        return $this->hasOne('App\Models\ProductCatUserMargin');
    }
}
