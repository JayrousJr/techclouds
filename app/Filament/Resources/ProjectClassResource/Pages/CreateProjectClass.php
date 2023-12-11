<?php

namespace App\Filament\Resources\ProjectClassResource\Pages;

use App\Filament\Resources\ProjectClassResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectClass extends CreateRecord
{
    protected static string $resource = ProjectClassResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
