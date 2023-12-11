<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\ServiceOrder;
use Filament\Widgets\ChartWidget;

class ServiceOrdersByCountChart extends ChartWidget
{
    protected static ?int $sort = 5;

    protected static ?string $heading = 'Our Orders In count';
    // protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        $orders = ServiceOrder::select('created_at', 'id')->get()->groupBy(function ($order) {
            return Carbon::parse($order->created_at)->format('M');
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
                    'fill' => [
                        'target' => 'origin',
                        'below' => 'rgba(54, 162, 235, 0.2)',
                        'above' => 'rgba(54, 162, 235, 0.2)',
                    ],
                    'borderColor' => 'rgba(54, 162, 235, 0.7)',
                    'tension' => 0.5,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
