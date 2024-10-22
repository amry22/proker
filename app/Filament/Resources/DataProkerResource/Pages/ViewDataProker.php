<?php

namespace App\Filament\Resources\DataProkerResource\Pages;

use App\Filament\Resources\DataProkerResource;
use App\Models\DataProker;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Auth;

class ViewDataProker extends ViewRecord
{
    protected static string $resource = DataProkerResource::class;

    protected function getHeaderActions(): array
    {

        $is_acc = $this->record->is_acc == 1;

        return [
            Actions\EditAction::make()->visible((Auth::user()->role_id == '3' || Auth::user()->role_id == '4') && $this->record->is_acc != '1'),
            Actions\Action::make($is_acc ? 'Batal Acc' : 'Acc Proker')->visible(Auth::user()->role_id == '2')
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
