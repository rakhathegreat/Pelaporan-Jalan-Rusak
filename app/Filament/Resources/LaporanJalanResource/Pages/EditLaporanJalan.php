<?php

namespace App\Filament\Resources\LaporanJalanResource\Pages;

use App\Filament\Resources\LaporanJalanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\LaporanJalanResource\Pages;
use App\Models\LaporanJalan;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms;

class EditLaporanJalan extends EditRecord
{
    protected static string $resource = LaporanJalanResource::class;

    public function form(Form $form): Form
    {
        
        return $form->schema([
            TextInput::make('nama_jalan')
            ->label("Nama Jalan")
            ->required(),

            TextInput::make('kota')
            ->label("Kota")
            ->required(),

            TextInput::make('kelurahan')
            ->label("Kelurahan")
            ->required(),

            TextInput::make('lingkungan')
            ->label("Lingkungan")
            ->required(),

            TextInput::make('rt')
            ->label("Rt")
            ->required(),

            TextInput::make('rw')
            ->label("Rw"),

            TextInput::make('koordinat')
            ->label("Koordinat")
            ->columnSpanFull()
            ->required(),

            TextInput::make('lebar_jalan')
            ->label("Lebar Jalan")
            ->required(),

            TextInput::make("panjang_jalan")
            ->label("panjang_jalan")
            ->required(),

            TextInput::make('kondisi')
            ->label('Kondisi')
            ->columnSpanFull()
            ->required(),

        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
