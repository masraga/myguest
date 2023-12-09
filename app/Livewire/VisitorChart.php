<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Visitor;

class VisitorChart extends ChartWidget
{
    protected static ?string $heading = 'Pengunjung';

    protected static ?array $options = [
        'scales' => [
            'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => false,
                    ],
                ],
            ],
        ],
    ];

    protected function getData(): array
    {
        $data = Trend::model(Visitor::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung yang hadir',
                    'data' => $data->map(fn (TrendValue $value) => intval($value->aggregate)),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
