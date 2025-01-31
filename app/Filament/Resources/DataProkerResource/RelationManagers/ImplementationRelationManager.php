<?php

namespace App\Filament\Resources\DataProkerResource\RelationManagers;

use App\Models\ItemBudgetSource;
use App\Models\ItemTimeline;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ImplementationRelationManager extends RelationManager
{
    protected static string $relationship = 'implementation';
    protected static ?string $title = 'Data Implementasi';

    public function form(Form $form): Form
    {
        return $form

        
            ->schema([
                
                Textarea::make('name')->label('Implementasi')
                ->required()
                ->maxLength(255)->columnSpan('full'),
                Textarea::make('qualitative')->required()->label('Target Kualitatif'),
                Textarea::make('quantitative')->required()->label('Target Kuantitatif'),
                Select::make('timeline')->label('Bulan')
                ->options(fn (): array => ItemTimeline::pluck('name', 'name')->toArray())
                ->searchable()
                ->multiple()->required()->native(false)->placeholder(''),
                TextInput::make('budget')->label('Anggaran')->numeric()->required(),
                Select::make('budget_source')->label('Sumber Dana')
                ->options(fn (): array => ItemBudgetSource::pluck('name', 'name')->toArray())
                ->searchable()
                ->multiple()->required()->native(false)->placeholder(''),
                Hidden::make('division_id')->default(Auth::user()->division_id),
                Hidden::make('department_id')->default(Auth::user()->department_id),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Implementasi'),
                TextColumn::make('qualitative')->label('Target Kualitatif'),
                TextColumn::make('quantitative')->label('Target Kuantitatif'),
                TextColumn::make('timeline')->badge()->label('Bulan'),
                TextColumn::make('budget')->money('IDR')->label('Anggaran'),
                TextColumn::make('budget_source')->badge()->label('Sumber Dana'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
