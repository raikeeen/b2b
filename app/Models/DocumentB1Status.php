<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentB1Status extends Model
{
    use HasFactory;
    protected $table = 'document_b1_status';

    public $additional_attributes = ['status_latest'];

    public function getStatusLatestAttribute()
    {
        return '<span style="border-radius: 0.25em;color: #fff;display: inline;font-size: 90%;font-weight: 700;line-height: 1;padding: 0.15em 0.4em;text-align: center;vertical-align: baseline;
        white-space: nowrap;background-color:'. $this->color.'">'.$this->name.'</span>';
    }

    public function document()
    {
        return $this->hasMany('App\Models\DocumentB1','status_id');
    }
}
