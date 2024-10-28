<?php

namespace App\Filament\Resources\AccProkerResource\Pages;

use App\Filament\Resources\AccProkerResource;
use App\Models\DataProker;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAccProker extends ViewRecord
{
    protected static string $resource = AccProkerResource::class;

    protected function getHeaderActions(): array
    {
        $is_acc = $this->record->is_acc == 1;

        return [
           
            Actions\Action::make($is_acc ? 'Batal Acc' : 'Acc Proker')
                ->requiresConfirmation()
                // ->action(function() {
                //     return DataProker::find($this->record->id)->update(['is_acc', 1]);
                   
                // })
                ->action(fn (DataProker $record) => $record->update(['is_acc'=> $is_acc ? null : 1]))
                ->color($is_acc ? 'warning' : 'success')
                ->modalDescription($is_acc ? 'Anda yakin batal Acc ?' : 'Anda yakin Acc Proker ?')
                ->modalIcon('heroicon-o-trash')
                ->modalIconColor($is_acc ? 'warning' : 'success')
        ];
    }
}
