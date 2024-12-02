<?php

namespace App\Filament\Resources\LaporanJalanResource\Pages;

use App\Filament\Resources\LaporanJalanResource;
use App\Filament\Resources\LaporanJalanResource\Pages;
use App\Models\LaporanJalan;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Pages\Actions;
use Filament\Forms\Components\Select;

class ViewLaporanJalan extends ViewRecord
{
    protected static string $resource = LaporanJalanResource::class;

    // Overridden mount method to ensure the record is properly loaded
    public function mount($record): void
    {
        $this->record = LaporanJalan::findOrFail($record);
        parent::mount($record);
    }

    protected ?string $subheading = 'Custom Page Subheading';

    public function form(Form $form): Form
    {
        
        return $form->schema([
            TextInput::make('Nama Jalan')
            ->placeholder($this->record->nama_jalan),

            TextInput::make('Kota')
            ->placeholder('Banjar'),

            TextInput::make('Kelurahan')
            ->placeholder($this->record->kelurahan),

            TextInput::make('Lingkungan')
            ->placeholder($this->record->lingkungan),

            TextInput::make('Rt')
            ->placeholder($this->record->rt),

            TextInput::make('Rw')
            ->placeholder($this->record->rw),

            TextInput::make('Koordinat')
            ->placeholder(fn () => $this->record->koordinat
            ? $this->record->koordinat->latitude . ', ' . $this->record->koordinat->longitude
            : 'Tidak Ada')
            ->columnSpanFull(),

            TextInput::make('Lebar Jalan')
            ->placeholder($this->record->lebar_jalan),

            TextInput::make('Panjang Jalan')
            ->placeholder($this->record->panjang_jalan),

            TextInput::make('Kondisi')
            ->placeholder($this->record->kondisi)
            ->columnSpanFull(),

            Forms\Components\Actions::make([
                Forms\Components\Actions\Action::make('Lihat di map')
                ->action(function () {
                    return redirect()->route('interactive-maps');
                }),
                Forms\Components\Actions\Action::make('Edit')
                ->action(function() {
                    return redirect(LaporanJalanResource::getUrl('edit', ['record' => $this->record->getKey()]));
                }),
                Forms\Components\Actions\Action::make('Kembali')
                ->action(function() {
                    return redirect(LaporanJalanResource::getUrl('index'));
                })
                ->color('gray')
                ->outlined(),
                Forms\Components\Actions\Action::make('Hapus')
                ->action(function (LaporanJalan $record) {
                    $record->delete();
                    // Redirect ke rute dashboard
                    return redirect()->route('filament.admin.resources.laporan-jalans.index');
                })
                ->color('danger')
                ->requiresConfirmation(),
            ])

        ]);
    }

    
    
    
     
}


