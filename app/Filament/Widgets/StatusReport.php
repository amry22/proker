<?php

namespace App\Filament\Widgets;

use App\Models\DataImplementationReport;
use Filament\Widgets\ChartWidget;

class StatusReport extends ChartWidget
{
    protected static ?string $heading = 'Status Implementasi';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $statusTerlaksana = DataImplementationReport::where(filterRole())->where('status','Terlaksana')->count();
        $statusKurangTerlaksana = DataImplementationReport::where(filterRole())->where('status','Kurang Terlaksana')->count();
        $statusTidakTerlaksana = DataImplementationReport::where(filterRole())->where('status','Tidak Terlaksana')->count();

        return [
           
            

            'datasets' => [
            [
                'data' => [$statusTerlaksana, $statusKurangTerlaksana, $statusTidakTerlaksana],
                'backgroundColor' => ['rgb(255, 205, 86)', 'rgb(54, 162, 235)','rgb(255, 99, 132)' ],
                'borderColor' => '#9BD0F5',
            ],
        ],
        'labels' => ['Terlaksana', 'Kurang Terlaksana', 'Tidak Terlaksana'],
        
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
