<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';

    public function product()
    {
        //return $this->belongsTo('App\Models\Product','supplier');
        return $this->hasMany('App\Models\Product','supplier_id');
    }
}
