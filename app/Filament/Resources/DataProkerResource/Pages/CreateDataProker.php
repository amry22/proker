<?php

namespace App\Filament\Resources\DataProkerResource\Pages;

use App\Filament\Resources\DataProkerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateDataProker extends CreateRecord
{
    protected static string $resource = DataProkerResource::class;

    protected static ?string $title = 'Tambah Program Kerja';

    protected function handleRecordCreation(array $data) : Model {
        return static::getModel()::create([
            'name' => $data['name'],
            'division_id' => Auth::user()->division_id,
            'department_id' => Auth::user()->department_id,
            'year' => $data['year'],
        ]);
    }
}
