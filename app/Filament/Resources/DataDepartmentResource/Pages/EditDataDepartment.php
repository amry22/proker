<?php

namespace App\Filament\Resources\DataDepartmentResource\Pages;

use App\Filament\Resources\DataDepartmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataDepartment extends EditRecord
{
    protected static string $resource = DataDepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
