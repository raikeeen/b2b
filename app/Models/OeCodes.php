<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OeCodes extends Model
{
    use HasFactory;
    protected $table = 'oe_code';
    protected $fillable = [
        'name',
        'product_id',
        'code'
    ];
}
