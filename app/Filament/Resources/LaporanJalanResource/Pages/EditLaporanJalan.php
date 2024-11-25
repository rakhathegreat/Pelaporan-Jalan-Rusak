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
use Filament\Forms\Components\Select;

class EditLaporanJalan extends EditRecord
{
    protected static string $resource = LaporanJalanResource::class;

    public function form(Form $form): Form
    {
        
        return $form->schema([
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

            TextInput::make('Koordinat')
            ->placeholder(function() {
                // Cek apakah ada data koordinat terkait
                if ($this->record->koordinat) {
                    // Ambil data koordinat yang terkait dengan LaporanJalan
                    return $this->record->koordinat->latitude . ', ' . $this->record->koordinat->longitude;
                }
                return '';
            })
            ->disabled()
            ->columnSpanFull(),

            TextInput::make('nama_jalan')
            ->label("Nama Jalan")
            ->required(),

            TextInput::make('lebar_jalan')
            ->label("Lebar Jalan")
            ->required(),

            TextInput::make("panjang_jalan")
            ->label("Panjang Palan")
            ->required(),

            Select::make('kondisi')
            ->label('Kondisi')
            ->options([
                'bagus' => 'Bagus',
                'Rusak Sedang' => 'Rusak Sedang',
                'Rusak Berat' => 'Rusak Berat',
            ])
            ->extraAttributes(['class' => 'focus:ring-0 border-none'])
            ->native(false),

        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
