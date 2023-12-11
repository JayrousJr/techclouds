<?php

namespace App\Filament\Resources\ProjectClassResource\Pages;

use App\Filament\Resources\ProjectClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectClass extends EditRecord
{
    protected static string $resource = ProjectClassResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
