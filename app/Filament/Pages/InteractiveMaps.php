<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use App\Models\LaporanJalan;

class InteractiveMaps extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.interactive-maps';

    protected static ?string $title = 'Peta Sebaran Jalan Rusak';
    protected static ?string $navigationLabel = 'Maps';

    public function getHeader(): ?view
    {
        return null; // This removes the <h1> header
    }

    public $locations;

    public function mount()
    {
        $this->locations = LaporanJalan::with('koordinat')->get();
    }


}
