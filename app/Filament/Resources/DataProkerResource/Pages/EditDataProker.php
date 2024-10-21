<?php

namespace App\Filament\Resources\DataProkerResource\Pages;

use App\Filament\Resources\DataProkerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataProker extends EditRecord
{
    protected static string $resource = DataProkerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
