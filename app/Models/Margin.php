<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Margin extends Model
{
    use HasFactory;
    protected $table = 'margin';

    public function product()
    {
        //return $this->belongsTo('App\Models\Product','supplier');
        return $this->hasMany('App\Models\Product','margin_id');
    }
}
