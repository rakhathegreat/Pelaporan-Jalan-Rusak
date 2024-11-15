<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanJalan extends Model
{
    protected $table = 'laporan_jalan';

    protected $fillable = [
        "nama_jalan",
        "kota",
        "kelurahan", 
        "lingkungan",
        "rt",
        "rw",
        "koordinat",
        "panjang_jalan",
        "lebar_jalan",
        "kondisi"
    ];
}
