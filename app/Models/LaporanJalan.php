<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;


class LaporanJalan extends Model
{
    protected $table = 'laporan_jalan';

    protected $fillable = [
        "nama_jalan",
        "kelurahan", 
        "lingkungan",
        "rt",
        "rw",
        "koordinat",
        "panjang_jalan",
        "lebar_jalan",
        "kondisi",
        "image",
        "id_koordinat"
    ];

    public function koordinat()
    {
        return $this->hasOne(Koordinat::class, 'id');
    }


    public static function booted()
    {
        static::created(function ($model) {
            if ($model->image) {
                $imagePath = $model->image;
                
                $response = Http::post('http://127.0.0.1:8001/extract-gps/', [
                    'path' => $imagePath,
                ]);

                $gpsData = $response->json();
                
                if ($gpsData) {
                    // Simpan ke tabel koordinat
                    $koordinat = Koordinat::create([
                        'id' => $model->id,
                        'latitude' => $gpsData[0][0],
                        'longitude' => $gpsData[0][1],
                    ]);

                    // Update LaporanJalan dengan id_koordinat
                    $model->update([
                        'id_koordinat' => $koordinat->id,
                    ]);

                    $recipient = auth()->user();
 
                    Notification::make()
                        ->title('Saved successfully')
                        ->sendToDatabase($recipient);
                }
            }
        });
    }

    
}
