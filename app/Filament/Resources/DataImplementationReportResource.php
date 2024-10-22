<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataImplementationReportResource\Pages;
use App\Filament\Resources\DataImplementationReportResource\RelationManagers;
use App\Models\DataImplementationReport;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataImplementationReportResource extends Resource
{
    protected static ?string $model = DataImplementationReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('gh')->default('1'),
                TextInput::make('aasas')->default(3123),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataImplementationReports::route('/'),
            'create' => Pages\CreateDataImplementationReport::route('/create'),
            'view' => Pages\ViewDataImplementationReport::route('/{record}'),
            'edit' => Pages\EditDataImplementationReport::route('/{record}/edit'),
        ];
    }
}
