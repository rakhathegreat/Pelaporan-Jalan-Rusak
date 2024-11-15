<?php

namespace App\Filament\Resources\LaporanJalanResource\Pages;

use App\Filament\Resources\LaporanJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanJalan extends EditRecord
{
    protected static string $resource = LaporanJalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
