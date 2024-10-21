<?php

namespace App\Filament\Widgets;

use App\Models\DataImplementation;
use Filament\Widgets\ChartWidget;

class TimelineChart extends ChartWidget
{
    protected static ?string $heading = 'Data Implementasi';
    protected static ?string $Group = 'Master Data';
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $dataTimeline = DataImplementation::where(filterRole());

        $months = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember','Isidentil'];
        $count = [];

        foreach ($months as $key => $data) {
           $count [$key] = DataImplementation::where(filterRole())->whereJsonContains('timeline',$data)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Implementasi',
                    'data' => $count,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des','Isiden'],
        ];
        
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
