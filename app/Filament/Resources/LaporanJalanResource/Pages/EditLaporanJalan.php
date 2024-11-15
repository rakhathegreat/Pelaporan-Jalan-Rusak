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
            ->label("Nama Jalan"),

            TextInput::make('kota')
            ->label("Kota"),

            TextInput::make('kelurahan')
            ->label("Kelurahan"),

            TextInput::make('lingkungan')
            ->label("Lingkungan"),

            TextInput::make('rt')
            ->label("Rt"),

            TextInput::make('rw')
            ->label("Rw"),

            TextInput::make('koordinat')
            ->label("Koordinat")
            ->columnSpanFull(),

            TextInput::make('lebar_jalan')
            ->label("Lebar Jalan"),

            TextInput::make("panjang_jalan")
            ->label("panjang_jalan"),

            TextInput::make('kondisi')
            ->label('Kondisi')
            ->columnSpanFull(),

        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
