<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class VisitorOverview extends BaseWidget
{
    protected static ?int $sort = 8;

    protected function getStats(): array
    {
        $totalVisitors = DB::table('shetabit_visits')->count();

        $currentWeekStart = Carbon::now()->startOfWeek();
        $weeklyVisitors = DB::table('shetabit_visits')
            ->where('created_at', '>=', $currentWeekStart)
            ->count();

        $currentMonthStart = Carbon::now()->startOfMonth();
        $monthlyVisitors = DB::table('shetabit_visits')
            ->where('created_at', '>=', $currentMonthStart)
            ->count();

        $currentDay = Carbon::now()->startOfDay();
        $dailyVisitors = DB::table('shetabit_visits')
            ->where('created_at', '>=', $currentDay)
            ->count();
        return [
            Stat::make('Total Visitors', $totalVisitors),
            Stat::make('This Month', $monthlyVisitors),
            Stat::make('This Week', $weeklyVisitors),
            Stat::make('Today', $dailyVisitors),
        ];
    }
}
