<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccBudgetImplementationResource\Pages;
use App\Filament\Resources\AccBudgetImplementationResource\RelationManagers;
use App\Models\AccBudgetImplementation;
use App\Models\DataImplementation;
use App\Models\ItemBudgetSource;
use App\Models\ItemTimeline;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AccBudgetImplementationResource extends Resource
{
    protected static ?string $model = DataImplementation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Acc Proker';
    protected static ?string $navigationLabel = 'Acc Anggaran';

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::user()->role_id == 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema(([
                    
                    TextInput::make('division_edit')->label('Bidang')->placeholder(fn (Model $record): string => $record->proker->division->name)->readOnly(),
                    TextInput::make('department_edit')->label('Departemen')->placeholder(fn (Model $record): string => $record->proker->department->name)->readOnly(),
                    Textarea::make('name')->label('Implementasi')
                        ->required()
                        ->maxLength(255)->columnSpan('full')->readOnly(),
                    Textarea::make('qualitative')->required()->label('Target Kualitatif')->readOnly(),
                    Textarea::make('quantitative')->required()->label('Target Kuantitatif')->readOnly(),
                    Select::make('timeline')->label('Bulan')
                        ->options(fn (): array => ItemTimeline::pluck('name', 'name')->toArray())
                        ->searchable()
                        ->multiple()->required()->native(false)->placeholder('')->disabled(),
                        Select::make('budget_source')->label('Sumber Dana')
                        ->options(fn (): array => ItemBudgetSource::pluck('name', 'name')->toArray())
                        ->searchable()
                        ->multiple()->required()->native(false)->placeholder('')->disabled(),
                    TextInput::make('budget')->label('Anggaran')->numeric()->required()->readOnly(),
                    TextInput::make('budget_acc')->label('Acc Anggaran')->numeric()->required(),
                    Textarea::make('note')->label('Catatan'),
                    Textarea::make('is_budget_acc')->value('sasas')
                    
                ]))->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('proker.division.name')->label('Bidang'),
                Tables\Columns\TextColumn::make('proker.department.name')->label('Departemen'),
                Tables\Columns\TextColumn::make('name')->label('Implementasi'),
                TextColumn::make('qualitative')->label('Target Kualitatif'),
                TextColumn::make('quantitative')->label('Target Kuantitatif'),
                TextColumn::make('timeline')->badge()->label('Bulan'),
                TextColumn::make('budget')->money('IDR')->label('Anggaran'),
                TextColumn::make('budget')->money('IDR')->label('Anggaran'),
                TextColumn::make('budget_source')->badge()->label('Sumber Dana'),

            ])
            ->filters([
                SelectFilter::make('division')
                    ->relationship('proker.division', 'name'),
                SelectFilter::make('department')
                    ->relationship('proker.department', 'name')

            ])
            ->actions([
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
            'index' => Pages\ListAccBudgetImplementations::route('/'),
            'create' => Pages\CreateAccBudgetImplementation::route('/create'),
            'edit' => Pages\EditAccBudgetImplementation::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        // $devision => User::whereHas('role', function ($query) {
        //     $query->where('devisioon')
        // })->get()->pluck('id')

        

        return parent::getEloquentQuery()->whereRelation('proker', 'is_acc', 1);
    }

    

}
