<?php

namespace App\Filament\Resources\ServiceOrderResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ServiceOrderResource;

class CreateServiceOrder extends CreateRecord
{
    protected static string $resource = ServiceOrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Project approved')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Project has been approved Successifully');
    }
}
