<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentB1Status extends Model
{
    use HasFactory;
    protected $table = 'document_b1_status';

    public function document()
    {
        return $this->belongsTo('App\Models\DocumentB1');
    }
}
