<?php

namespace App\Filament\Widgets;

use App\Models\ServiceOrder;
use Filament\Widgets\ChartWidget;

class ServiceOrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Our Orders in Status';
    protected static ?int $sort = 4;
    protected function getData(): array
    {
        $orders = ServiceOrder::select('project_status', 'id')
            ->get()
            ->groupBy(function ($order) {
                return $order->project_status;
            });
        $orderCount = [];
        foreach ($orders as $order => $ordergroup) {
            $orderCount[$order] = $ordergroup->count();
        }
        $labels = array_keys($orderCount);
        $data = array_values($orderCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Order(s)',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgba(0, 255, 246, 0.2)',
                        'rgba(0, 255, 40, 0.2)',
                        'rgba(255, 3, 3, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    'borderColor' =>  [
                        'rgb(0, 255, 246)',
                        'rgb(0, 255, 40)',
                        'rgb(255, 3, 3)',
                        'rgb(201, 203, 207)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
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
