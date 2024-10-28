<?php

namespace App\Filament\Resources\AccProkerResource\Pages;

use App\Filament\Resources\AccProkerResource;
use App\Models\DataDivision;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListAccProkers extends ListRecords
{
    protected static string $resource = AccProkerResource::class;

    protected static ?string $title = 'Acc Proker';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs() : array
    {
        $divisions = DataDivision::all();
        $tabs = [];

        foreach ($divisions as $division) {
            $tabs[$division->id] = Tab::make($division->name_as)
                ->label($division->name_as)
                ->modifyQueryUsing(function ($query) use ($division) {
                    $query->where('division_id', $division->id)->where('is_acc', null)->orWhere('is_acc', 0);
                });
        }

        return $tabs;
    }


}
