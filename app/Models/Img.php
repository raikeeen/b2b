<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table = 'img';
    protected $fillable = [
        'id',
        'name',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
