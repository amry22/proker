<?php

namespace App\Filament\Resources\AccBudgetImplementationResource\Pages;

use App\Filament\Resources\AccBudgetImplementationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditAccBudgetImplementation extends EditRecord
{
    protected static string $resource = AccBudgetImplementationResource::class;

    protected static ?string $title = 'Acc Anggaran';

    
    
}
