<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Visitor;
use Filament\Widgets\ChartWidget;

class VisitorsChart extends ChartWidget
{
    protected static ?int $sort = 9;
    protected static ?string $heading = 'Visitors';
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        $visitors = Visitor::select('created_at', 'id')->get()->groupBy(function ($Visitor) {
            return Carbon::parse($Visitor->created_at)->format('M');
        });
        $VisitorCount = [];
        foreach ($visitors as $oneVisitor => $VisitorGroup) {
            $VisitorCount[$oneVisitor] = $VisitorGroup->count();
        }
        $labels = array_keys($VisitorCount);
        $data = array_values($VisitorCount);
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Visitors',
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
