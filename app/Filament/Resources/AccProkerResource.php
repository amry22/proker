<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccProkerResource\Pages;
use App\Filament\Resources\AccProkerResource\RelationManagers;
use App\Filament\Resources\AccProkerResource\RelationManagers\ImplementationRelationManager;
use App\Models\AccProker;
use App\Models\DataProker;
use Filament\Forms;
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

class AccProkerResource extends Resource
{
    protected static ?string $model = DataProker::class;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Acc Proker';
    protected static ?string $navigationLabel = 'Acc Proker';

    public static function form(Form $form): Form
    {
        $departmenName = '';
        if (Auth::user()->department_id != null) {
            $departmenName = Auth::user()->department->name;
        }
        
        return $form
        // ->relationship('division')
            ->schema([
                Section::make([
                    Textarea::make('name')->label('Program Kerja')->required()
                        ->columnSpan([
                            'sm' => 2,
                            'xl' => 3,
                            '2xl' => 4,
                    ]),
                    
                    TextInput::make('division_edit')->label('Bidang')->placeholder(fn (Model $record): string => $record->division->name)->readOnly(),
                    TextInput::make('department_edit')->label('Departemen')->visible(fn (Model $record): string => $record->department->name != null)->placeholder(fn (Model $record): string => $record->department->name),
                    // TextInput::make('departement')->label('Departemen')->default(Auth::user()->division->name)->readOnly()->visible(Auth::user()->department_id != null),
                    Select::make('year')
                        ->native(false)
                        ->default(now()->format('Y'))
                        ->options([
                            '2020' => '2020',
                            '2021' => '2021',
                            '2022' => '2022',
                            '2023' => '2023',
                            '2024' => '2024',
                            '2025' => '2025',
                            '2026' => '2026',
                        ])->label('Tahun'),
                ])->columns([
                    'md' => 2,
                    'lg' => 3,
                ])
                

                // Toggle::make('is_acc')->label('Acc Program'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Program Kerja')->searchable(),
                TextColumn::make('implementation_count')->counts('implementation')->label('Implementasi'),
                TextColumn::make('division.name')->label('Bidang')->badge(),
                TextColumn::make('department.name')->label('Departemen')->badge(),
            ])
            ->filters([
                SelectFilter::make('department')
                    ->relationship('department', 'name'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
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
            ImplementationRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccProkers::route('/'),
            'create' => Pages\CreateAccProker::route('/create'),
            'view' => Pages\ViewAccProker::route('/{record}'),
            'edit' => Pages\EditAccProker::route('/{record}/edit'),
        ];
    }
}
