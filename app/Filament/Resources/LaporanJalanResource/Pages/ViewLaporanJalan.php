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
            ->placeholder($this->record->kota),

            TextInput::make('Kelurahan')
            ->placeholder($this->record->kelurahan),

            TextInput::make('Lingkungan')
            ->placeholder($this->record->lingkungan),

            TextInput::make('Rt')
            ->placeholder($this->record->rt),

            TextInput::make('Rw')
            ->placeholder($this->record->rw),

            TextInput::make('Koordinat')
            ->placeholder($this->record->koordinat)
            ->columnSpanFull(),

            TextInput::make('Lebar Jalan')
            ->placeholder($this->record->lebar_jalan),

            TextInput::make('Panjang Jalan')
            ->placeholder($this->record->panjang_jalan),

            TextInput::make('Kondisi')
            ->placeholder($this->record->kondisi)
            ->columnSpanFull(),

            Forms\Components\Actions::make([
                Forms\Components\Actions\Action::make('Export'),
                Forms\Components\Actions\Action::make('Edit')
                ->action(function() {
                    return redirect(LaporanJalanResource::getUrl('edit', ['record' => $this->record->getKey()]));
                }),
                Forms\Components\Actions\Action::make('Cancel')
                ->action(function() {
                    return redirect(LaporanJalanResource::getUrl('index'));
                })
                ->color('gray')
                ->outlined(),
                Forms\Components\Actions\Action::make('Hapus')
                ->action(fn (LaporanJalan $record) => $record->delete())
                ->color('danger')
                ->requiresConfirmation(),
            ])

        ]);
    }

    
    
    
     
}


