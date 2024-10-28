<?php

namespace App\Filament\Resources\AccProkerResource\Pages;

use App\Filament\Resources\AccProkerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccProker extends EditRecord
{
    protected static string $resource = AccProkerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
