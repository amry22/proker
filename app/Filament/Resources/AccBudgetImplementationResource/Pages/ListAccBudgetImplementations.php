<?php

namespace App\Filament\Resources\AccBudgetImplementationResource\Pages;

use App\Filament\Resources\AccBudgetImplementationResource;
use App\Filament\Resources\AccBudgetImplementationResource\Widgets\AccBudget;
use App\Filament\Widgets\StatsOverview;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListAccBudgetImplementations extends ListRecords
{
    protected static string $resource = AccBudgetImplementationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AccBudget::class
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
