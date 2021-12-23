<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $fillable = [
        'id',
        'company_name',
        'vat',
        'country_id',
        'city_id',
        'street',
        'building',
        'apartment',
        'pvm',
        'post_code',
        'discount',
        'phone'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'address_id');
    }
}
