<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class UsersChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Users registered';

    protected function getData(): array
    {
        // Fallback to null if filters are not set
        $start = $this->filters['startDate'] ?? null;
        $end = $this->filters['endDate'] ?? null;

        $data = Trend::model(User::class)
        ->between(
            start: $start ? Carbon::parse($start) : now()->subDays(7),
            end: $end ? Carbon::parse($end) : now(),
        )
        ->perDay()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Users registered',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
