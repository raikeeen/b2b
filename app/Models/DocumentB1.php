<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentB1 extends Model
{
    use HasFactory;
    protected $table = 'document_b1';
    protected $fillable = [
        'id',
        'name',
        'price',
        'status_id'
    ];
    public function status()
    {
        return $this->belongsTo('App\Models\DocumentB1Status');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order','document_b1_id');
    }
}
