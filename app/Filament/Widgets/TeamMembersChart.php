<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class TeamMembersChart extends ChartWidget
{
    protected static ?string $heading = 'TechClouds Team';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        $teams = User::select('role', 'id')
            ->get()
            ->groupBy(function ($team) {
                return $team->role;
            });
        $userCount = [];
        foreach ($teams as $team => $teamgroup) {
            $userCount[$team] = $teamgroup->count();
        }
        $labels = array_keys($userCount);
        $data = array_values($userCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Members',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(0, 255, 40, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    'borderColor' =>  [
                        'rgb(255, 99, 132)',
                        'rgb(0, 255, 40)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    'borderWidth' =>  1
                ],

            ],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
