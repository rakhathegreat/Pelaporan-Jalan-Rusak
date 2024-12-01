<?php

namespace App\Filament\Exports;

use App\Models\LaporanJalan;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Style;    

class LaporanJalanExporter extends Exporter
{
    protected static ?string $model = LaporanJalan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nama_jalan'),
            ExportColumn::make('kelurahan'),
            ExportColumn::make('lingkungan'),
            ExportColumn::make('rt'),
            ExportColumn::make('rw'),
            ExportColumn::make('panjang_jalan'),
            ExportColumn::make('lebar_jalan'),
            ExportColumn::make('kondisi'),
        ];
    }
 
    public function getXlsxHeaderCellStyle(): ?Style
    {
        return (new Style())
            ->setFontBold()
            ->setFontItalic()
            ->setFontSize(14)
            ->setFontName('Consolas')
            ->setFontColor(Color::rgb(255, 255, 77))
            ->setBackgroundColor(Color::rgb(0, 0, 0))
            ->setCellAlignment(CellAlignment::CENTER)
            ->setCellVerticalAlignment(CellVerticalAlignment::CENTER);
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your laporan jalan export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
