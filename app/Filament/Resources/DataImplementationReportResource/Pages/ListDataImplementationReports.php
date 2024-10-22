<?php

namespace App\Filament\Resources\DataImplementationReportResource\Pages;

use App\Filament\Resources\DataImplementationReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataImplementationReports extends ListRecords
{
    protected static string $resource = DataImplementationReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
