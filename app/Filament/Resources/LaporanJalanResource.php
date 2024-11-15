<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanJalanResource\Pages;
use App\Filament\Resources\LaporanJalanResource\RelationManagers;
use App\Models\LaporanJalan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Support\Htmlable;

class LaporanJalanResource extends Resource
{
    protected static ?string $model = LaporanJalan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $navigationLabel = 'Laporan';

    public static function canCreate(): bool
    {
        return false;
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->searchable()
                ->toggleable(),
                TextColumn::make('tanggal')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('nama_jalan')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('kota')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('kelurahan')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('lingkungan')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('rt')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('rw')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('koordinat')
                ->searchable()
                ->toggleable(),
                TextColumn::make('panjang_jalan')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('lebar_jalan')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('kondisi')
                ->searchable()
                ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanJalans::route('/'),
            // 'create' => Pages\CreateLaporanJalan::route('/create'),
            'edit' => Pages\EditLaporanJalan::route('/{record}/edit'),
        ];
    }
}
