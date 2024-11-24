<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanJalan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan
    protected $table = 'laporan_jalan';

    // Kolom yang dapat diisi (jika diperlukan)
    protected $fillable = [
        'nama_jalan',
        'kota',
        'kelurahan',
        'lingkungan',
        'rt',
        'rw',
        'koordinat',
        'panjang_jalan',
        'lebar_jalan',
        'kondisi',
    ];
}
