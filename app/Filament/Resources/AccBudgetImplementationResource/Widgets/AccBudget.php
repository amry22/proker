<?php

namespace App\Filament\Resources\AccBudgetImplementationResource\Widgets;

use App\Models\DataImplementation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AccBudget extends BaseWidget
{
    protected function getStats(): array
    {
        
        $totalBudged = DataImplementation::where(filterRole())->sum('budget');

        return [
            Stat::make('Total Anggaran', "Rp " . number_format($totalBudged, 2, ",", ".")),
            Stat::make('Total Anggaran', "Rp " . number_format($totalBudged, 2, ",", ".")),
        ];
    }
}
