<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use App\Models\LaporanJalan;
use Illuminate\Support\Facades\Redirect;

class LaporanTamuPage extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.laporan-tamu-page';

    use Forms\Concerns\InteractsWithForms;

    public $kelurahan;
    public $lingkungan;
    public $rt;
    public $rw;
    public $nama_jalan;
    public $lebar_jalan;
    public $panjang_jalan;
    public $kondisi;
    public $image;

    protected static ?string $title = 'Laporan Tamu';
    protected static ?string $slug = 'laporan-tamu';

    public function submit()
    {
        LaporanJalan::create([
            'kelurahan' => $this->kelurahan,
            'lingkungan' => $this->lingkungan,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'nama_jalan' => $this->nama_jalan,
            'lebar_jalan' => $this->lebar_jalan,
            'panjang_jalan' => $this->panjang_jalan,
            'kondisi' => $this->kondisi,
            'image' => $this->image,
            // 'koordinat' => $this->koordinat,
        ]);
    
        \Filament\Notifications\Notification::make()
            ->title('Laporan berhasil dibuat!')
            ->success()
            ->send();
    }
    


    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make(2) // Atur grid dengan 2 kolom
                ->schema([
                    Forms\Components\TextInput::make('kelurahan')
                        ->label('Kelurahan')
                        ->required(),
    
                    Forms\Components\TextInput::make('lingkungan')
                        ->label('Lingkungan')
                        ->required(),
    
                    Forms\Components\TextInput::make('rt')
                        ->label('RT')
                        ->required(),
    
                    Forms\Components\TextInput::make('rw')
                        ->label('RW')
                        ->required(),
    
                    Forms\Components\TextInput::make('nama_jalan')
                        ->label('Nama Jalan')
                        ->required(),
    
                    Forms\Components\TextInput::make('lebar_jalan')
                        ->label('Lebar Jalan')
                        ->required(),
    
                    Forms\Components\TextInput::make('panjang_jalan')
                        ->label('Panjang Jalan')
                        ->required(),
    
                    Forms\Components\Select::make('kondisi')
                        ->label('Kondisi')
                        ->options([
                            'Bagus' => 'Bagus',
                            'Rusak Sedang' => 'Rusak Sedang',
                            'Rusak Berat' => 'Rusak Berat',
                        ])
                        ->required(),
                ]),
    
            Forms\Components\FileUpload::make('image') // Gambar dalam satu kolom penuh
                ->label('Gambar')
                ->image()
                ->directory('uploads/images')
                ->columnSpanFull(),
        ];
    }

}
