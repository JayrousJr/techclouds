<?php

namespace App\Filament\Resources\ProjectClassResource\Pages;

use App\Filament\Resources\ProjectClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectClasses extends ListRecords
{
    protected static string $resource = ProjectClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
