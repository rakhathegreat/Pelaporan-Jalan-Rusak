<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataJalanResource\Pages;
use App\Filament\Resources\DataJalanResource\RelationManagers;
use App\Models\DataJalan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataJalanResource extends Resource
{
    protected static ?string $model = DataJalan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Jalan';

    public static function getPluralLabel(): string
    {
        return 'Data Jalan'; // Mengubah label jamak, hilangkan "s"
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
                //
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
            'index' => Pages\ListDataJalans::route('/'),
            'create' => Pages\CreateDataJalan::route('/create'),
            'edit' => Pages\EditDataJalan::route('/{record}/edit'),
        ];
    }
}
