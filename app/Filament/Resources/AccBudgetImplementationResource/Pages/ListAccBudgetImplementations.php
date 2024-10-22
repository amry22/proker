<?php

namespace App\Filament\Resources\AccBudgetImplementationResource\Pages;

use App\Filament\Resources\AccBudgetImplementationResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListAccBudgetImplementations extends ListRecords
{
    protected static string $resource = AccBudgetImplementationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs() : array {
        return [
            'Belum Acc' => Tab::make()->modifyQueryUsing(function ($query){
                $query->where('is_budget_acc',null);
            }),
            'Sudah Acc' => Tab::make()->modifyQueryUsing(function ($query){
                $query->where('is_budget_acc','1');
            })
        ];
    }
}
