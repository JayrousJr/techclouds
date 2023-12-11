<?php

namespace App\Filament\Resources\VisitorResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\VisitorResource;
use Filament\Pages\Concerns\ExposesTableToWidgets;

class ListVisitors extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = VisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            VisitorResource\Widgets\VisitorOverview::class,
        ];
    }
}
