<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GPSController;
use App\Http\Controllers\InteractiveMapController;
use App\Filament\Pages\InteractiveMaps;

Route::get('/', function () {
    return view('vendor/filament-panels.pages.auth.login');
});

Route::redirect('/', '/admin/login');

use App\Http\Controllers\LaporanTamuController;

Route::view('/laporan-tamu', 'laporan_tamu')->name('laporan.tamu'); // Menampilkan form
Route::post('/laporan-tamu', [LaporanTamuController::class, 'store'])->name('laporan.tamu.store'); // Menangani penyimpanan

