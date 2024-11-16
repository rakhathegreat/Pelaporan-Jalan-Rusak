<?php

namespace App\Filament\Resources\LaporanJalanResource\Pages;

use App\Filament\Resources\LaporanJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaporanJalan extends CreateRecord
{
    protected static string $resource = LaporanJalanResource::class;

    protected function getCreateButtonLabel(): string
    {
        return 'Tambah Post Baru'; // Sesuaikan nama tombol yang kamu inginkan
    }
    
    protected static ?string $title = 'Buat Laporan Jalan';
}
