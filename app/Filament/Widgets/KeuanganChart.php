<?php

namespace App\Filament\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class KeuanganChart extends ChartWidget
{
    protected static ?string $heading = 'Keuangan';

    protected function getData(): array
    {
        $data = Trend::model(Keuangan::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            // ->count();
            ->sum('uang_masuk');  // Menggunakan sum pada kolom 'uang_masuk'

        return [
            'datasets' => [
                [
                    'label' => 'Uang Masuk',
                    // 'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    // 'borderColor' => '#9BD0F5',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#9BD0F5',
                ],
            ],
            // 'labels' => $data->map(fn (TrendValue $value) => $value->date),
            // 'labels' => $data->map(fn (TrendValue $value) => $value->date->format('F')), // Format label sebagai nama bulan
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
