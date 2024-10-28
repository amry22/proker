<?php

namespace App\Filament\Resources\AccBudgetImplementationResource\Pages;

use App\Filament\Resources\AccBudgetImplementationResource;
use App\Filament\Resources\AccBudgetImplementationResource\Widgets\AccBudget;
use App\Filament\Widgets\StatsOverview;
use App\Models\DataDivision;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListAccBudgetImplementations extends ListRecords
{
    protected static string $resource = AccBudgetImplementationResource::class;
    protected static ?string $title = 'Acc Anggaran';

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

    public function getTabs() : array
    {
        $divisions = DataDivision::all();
        $tabs = [];

        foreach ($divisions as $division) {
            $tabs[$division->id] = Tab::make($division->name_as)
                ->label($division->name_as)
                ->modifyQueryUsing(function ($query) use ($division) {
                    $query->where('division_id', $division->id)
                    ->whereRelation('proker', 'is_acc', 1)
                    ->where(function ($query) {
                        $query->where('is_budget_acc', 0)
                                ->orWhereNull('is_budget_acc');
                    });
                });
        }

        return $tabs;
    }

    // public function getTabs() : array {
    //     return [
    //         'Belum Acc' => Tab::make()->modifyQueryUsing(function ($query){
    //             $query->where('is_budget_acc',null);
    //         }),
    //         'Sudah Acc' => Tab::make()->modifyQueryUsing(function ($query){
    //             $query->where('is_budget_acc','1');
    //         })
    //     ];
    // }
}
