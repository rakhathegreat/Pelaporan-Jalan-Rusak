<?php

namespace App\Filament\Resources\LaporanJalanResource\Pages;

use App\Filament\Resources\LaporanJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanJalans extends ListRecords
{
    protected static string $resource = LaporanJalanResource::class;

    protected static ?string $title = 'Laporan Jalan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label("Buat Laporan")
            ,
        ];
    }
}
