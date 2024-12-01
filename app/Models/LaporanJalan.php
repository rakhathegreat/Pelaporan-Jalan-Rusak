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
            $fullImagePath = "/home/dadang/Documents/Pelaporan-Jalan-Rusak/storage/app/public/" . $imagePath;

            // Send POST request to FastAPI
            $response = Http::post('http://127.0.0.1:8001/extract-gps/', [
                'path' => $fullImagePath,
            ]);

            // Check for the response
            if ($response->successful()) {
                $gpsData = $response->json();

                // Save GPS coordinates to the Koordinat table
                $koordinat = Koordinat::create([
                    'id' => $model->id,
                    'latitude' => $gpsData['latitude'], 
                    'longitude' => $gpsData['longitude'],
                ]);

                // Update LaporanJalan with the coordinate id
                $model->update([
                    'id_koordinat' => $koordinat->id,
                ]);

                // Notify the user
                $recipient = auth()->user();
                Notification::make()
                    ->title('Saved successfully')
                    ->sendToDatabase($recipient);
            } else {
                // Handle error if the FastAPI response fails
                // You can log the error or send a notification
                Log::error('Failed to extract GPS data', ['response' => $response->body()]);
            }
        }
    });
}

    
}
