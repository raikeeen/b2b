<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentB1 extends Model
{
    use HasFactory;
    protected $table = 'document_b1';

    public function status()
    {
        return $this->hasOne('App\Models\DocumentB1Status','status_id');
    }
    public function order()
    {
        return $this->hasOne('App\Models\Order','document_b1_id');
    }
}
