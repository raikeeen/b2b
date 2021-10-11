<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table = 'img';

    public function product()
    {
        $this->belongsTo('App\Models\Product');
    }
}
