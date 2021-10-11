<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'Country';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
