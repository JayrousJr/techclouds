<?php

namespace App\Filament\Widgets;

use App\Models\ServiceOrder;
use Filament\Widgets\ChartWidget;

class ServiceOrdersByCategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Our Orders by Service';
    protected static ?int $sort = 6;

    protected function getData(): array
    {
        $orders = ServiceOrder::select('service_name', 'id')->get()->groupBy(function ($order) {
            return $order->service_name;
        });
        $orderCount = [];
        foreach ($orders as $oneorder => $orderGroup) {
            $orderCount[$oneorder] = $orderGroup->count();
        }
        $labels = array_keys($orderCount);
        $data = array_values($orderCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $data,
                    'backgroundColor' =>  [
                        'rgb(233,114,77)',
                        'rgb(215,215,39)',
                        'rgb(146,202,209)',
                        'rgb(121,204,179)',
                        'rgb(134,134,134)',
                    ],
                    'hoverOffset' => 4
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
