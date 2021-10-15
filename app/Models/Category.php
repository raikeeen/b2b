<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    protected $table = 'category';

    protected $fillable = [
        'name', 'trade_margin', 'parent_id'
    ];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_cat','category_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
