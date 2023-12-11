<?php

namespace App\Filament\Resources\ProjectClassResource\Pages;

use App\Filament\Resources\ProjectClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectClass extends ViewRecord
{
    protected static string $resource = ProjectClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
