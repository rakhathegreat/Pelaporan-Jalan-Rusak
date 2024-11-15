<?php

namespace App\Filament\Resources\DataJalanResource\Pages;

use App\Filament\Resources\DataJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataJalan extends EditRecord
{
    protected static string $resource = DataJalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
