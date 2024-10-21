<?php

namespace App\Filament\Widgets;

use App\Models\DataImplementation;
use App\Models\DataProker;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 1;
    public static string $resource = DataProker::class;

    protected function getStats(): array
    {
        $totalProker = DataProker::where(filterRole())->count();
        $totalImplementation = DataImplementation::where(filterRole())->count();
        $totalBudged = DataImplementation::where(filterRole())->sum('budget');

        return [
            Stat::make('Total Program Kerja', $totalProker),
            Stat::make('Total Implementasi', $totalImplementation),
            Stat::make('Total Anggaran', "Rp " . number_format($totalBudged, 2, ",", ".")),
        ];
    }
}
