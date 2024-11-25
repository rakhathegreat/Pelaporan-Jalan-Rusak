<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koordinat extends Model
{
    protected $table = 'koordinat';

    protected $fillable = [
        'id',
        'latitude',
        'longitude',
    ];

    // Relasi ke LaporanJalan
    public function laporanJalan()
    {
        return $this->belongsTo(LaporanJalan::class);
    }
}
