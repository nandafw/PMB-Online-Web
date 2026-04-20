<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $fillable = ['provinsi_id', 'nama_kabupaten'];
    public function provinsi() 
    { 
        return $this->belongsTo(Provinsi::class); 
    }
}