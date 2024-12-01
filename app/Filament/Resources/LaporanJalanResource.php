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
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Filament\Exports\LaporanJalanExporter;
use Filament\Tables\Actions\ExportAction;

class LaporanJalanResource extends Resource
{
    protected static ?string $model = LaporanJalan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $navigationLabel = 'Laporan';

    // public static function canCreate(): bool
    // {
    //     return false;
    // }

    protected static ?string $actionButton = 'Buat Laporan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                ->label("Rw")
                ->required(),

                // TextInput::make('koordinat')
                // ->label("Koordinat")
                // ->required()
                // ->columnSpanFull(),

                TextInput::make('nama_jalan')
                ->label("Nama Jalan")
                ->required(),

                TextInput::make('lebar_jalan')
                ->label("Lebar Jalan")
                ->required(),

                TextInput::make('panjang_jalan')
                ->label("Panjang Jalan")
                ->required(),

                Select::make('kondisi')
                ->label("Kondisi")
                ->options([
                    'Bagus' => 'Bagus',
                    'Rusak Sedang' => 'Rusak Sedang',
                    'Rusak Berat' => 'Rusak Berat',
                ]),

                Forms\Components\FileUpload::make('image')
                ->label('Gambar')
                ->image()
                ->directory('uploads/images')
                ->columnSpanFull(),
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label("No Laporan")
                ->searchable()
                ->toggleable(),
                TextColumn::make('tanggal')
                ->dateTime('d M Y')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('nama_jalan')
                ->sortable()
                ->searchable()
                ->toggleable(),
                TextColumn::make('rt')
                ->searchable()
                ->toggleable(),
                TextColumn::make('rw')
                ->searchable()
                ->toggleable(),
                TextColumn::make('lingkungan')
                ->searchable()
                ->toggleable(),
                TextColumn::make('kondisi')
                ->searchable()
                ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(LaporanJalanExporter::class)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
        'create' => Pages\CreateLaporanJalan::route('/create'),
        'edit' => Pages\EditLaporanJalan::route('/{record}/edit'),
        'view' => Pages\ViewLaporanJalan::route('/{record}/view'),
    ];
}
}
