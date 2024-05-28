<?php

namespace App\Filament\Widgets;

use App\Models\Keuangan;
use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Carbon\Carbon;

class BlogPostsChart extends ChartWidget
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
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'kas',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            // 'labels' => $data->map(fn (TrendValue $value) {
            //     $date = Carbon::createFromFormat('Y-m,', $value->date);
            //     $formattedDate
            // }=> $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
