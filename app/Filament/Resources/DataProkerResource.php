<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataProkerResource\Pages;
use App\Filament\Resources\DataProkerResource\RelationManagers;
use App\Models\DataProker;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DataProkerResource extends Resource
{
    protected static ?string $model = DataProker::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Proker';
    protected static ?string $breadcrumb = 'Program Kerja';
    protected static ?string $navigationLabel = 'Program Kerja';
    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

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
                    
                    TextInput::make('division_edit')->label('Bidang')->placeholder(fn (Model $record): string => $record->division->name)->readOnly()->hidden(fn (string $operation): bool => $operation === 'create'),
                    TextInput::make('department_edit')->label('Departemen')->visible(Auth::user()->department_id != null)->placeholder(fn (Model $record): string => $record->department->name)->readOnly()->hidden(fn (string $operation): bool => $operation === 'create'),
                    TextInput::make('division')->label('Bidang')->placeholder(Auth::user()->division->name)->readOnly()->hidden(fn (string $operation): bool => $operation === 'view' || $operation === 'edit'),
                    TextInput::make('department')->label('Departemen')->visible(Auth::user()->department_id != null)->placeholder($departmenName)->readOnly()->hidden(fn (string $operation): bool => $operation === 'edit' || $operation === 'view'),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn (Model $record): string => $record->is_acc != 1 && Auth::user()->role_id > 2 ),
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\ImplementationRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataProkers::route('/'),
            'create' => Pages\CreateDataProker::route('/create'),
            'edit' => Pages\EditDataProker::route('/{record}/edit'),
            'view' => Pages\ViewDataProker::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        // $devision => User::whereHas('role', function ($query) {
        //     $query->where('devisioon')
        // })->get()->pluck('id')

        

        return parent::getEloquentQuery()->where(filterRole());
    }
}
