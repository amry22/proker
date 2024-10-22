<?php

namespace App\Filament\Resources\DataImplementationReportResource\Pages;

use App\Filament\Resources\DataImplementationReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDataImplementationReport extends ViewRecord
{
    protected static string $resource = DataImplementationReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
