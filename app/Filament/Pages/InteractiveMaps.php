<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\LaporanJalan;

class InteractiveMaps extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static string $view = 'filament.pages.interactive-maps';

    protected static ?string $title = 'Peta Sebaran Jalan Rusak';
    protected static ?string $navigationLabel = 'Maps';

    public $locations; // Properti untuk menyimpan data

    public function mount()
    {
        // Ambil data dari tabel laporan_jalan
        $this->locations = LaporanJalan::all();
    }
}
