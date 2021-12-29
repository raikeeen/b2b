<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenipakManifest extends Model
{
    use HasFactory;
    protected $table = 'venipak_manifest';

    public function venipak()
    {
        return $this->hasMany('App\Models\Venipak', 'manifest_id');
    }
}
