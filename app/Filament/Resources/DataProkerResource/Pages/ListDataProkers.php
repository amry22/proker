<?php

namespace App\Filament\Resources\DataProkerResource\Pages;

use App\Filament\Resources\DataProkerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataProkers extends ListRecords
{
    protected static string $resource = DataProkerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
