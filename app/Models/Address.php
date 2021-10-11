<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'address_id');
    }
}
