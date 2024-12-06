<?php

namespace App\Filament\Widgets;

use App\Models\jobPostApplicants;
use App\Models\JobPosts;
use App\Models\User;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Stats extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        // Fallback to null if filters are not set
        $start = $this->filters['startDate'] ?? null;
        $end = $this->filters['endDate'] ?? null;

        return [
            Stat::make('Total users', User::
            when($start, fn ($query) => $query->whereDate('created_at', '>', $start))
            ->when($end, fn ($query) => $query->whereDate('created_at','<',$end))
            ->count())

            ->chart([0, 50, 10, 70, 20, 150])
            ->color('success'),

            Stat::make('Total job posts', JobPosts::
            when($start, fn ($query) => $query->whereDate('created_at', '>', $start))
            ->when($end, fn ($query) => $query->whereDate('created_at','<',$end))
            ->count())

            ->chart([0, 50, 10, 70, 20, 150])
            ->color('success'),

            Stat::make('Total job applicants', jobPostApplicants::
            when($start, fn ($query) => $query->whereDate('created_at', '>', $start))
            ->when($end, fn ($query) => $query->whereDate('created_at','<',$end))
            ->count())

            ->chart([0, 50, 10, 70, 20, 150])
            ->color('success')

        ];
    }
}
