<?php

namespace App\Filament\Resources\DataProkerResource\Pages;

use App\Filament\Resources\DataProkerResource;
use Filament\Actions;
// use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Support\Facades\Auth;

class ListDataProkers extends ListRecords
{
    protected static string $resource = DataProkerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->visible(Auth::user()->role_id > 2 ),
        ];
    }

    public function getTabs() : array {
        return [
            'Belum Acc' => Tab::make()->modifyQueryUsing(function ($query){
                $query->where('is_acc',null);
            }),
            'Sudah Acc' => Tab::make()->modifyQueryUsing(function ($query){
                $query->where('is_acc','1');
            })
        ];
    }
    
}


