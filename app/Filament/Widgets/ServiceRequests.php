<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\ServiceRequest;
use Filament\Widgets\ChartWidget;

class ServiceRequests extends ChartWidget
{
    protected static ?string $heading = 'Servces Requested';
    protected static ?int $sort = 7;

    protected function getData(): array
    {
        $requests = ServiceRequest::select('created_at', 'id')->get()->groupBy(function ($request) {
            return Carbon::parse($request->created_at)->format('F');
        });
        $requestCount = [];

        foreach ($requests as $oneRequest => $requestGroup) {
            $requestCount[$oneRequest] = $requestGroup->count();
        }

        $labels = array_keys($requestCount);
        $data = array_values($requestCount);

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'fill' => true,
                    'label' => 'Requests',
                    'backgroundColor' =>
                    'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgb(255,99,132)',
                    'pointBackgroundColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgb(255,99,132)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
