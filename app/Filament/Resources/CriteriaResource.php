<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Criteria;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CriteriaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CriteriaResource\RelationManagers;

class CriteriaResource extends Resource
{
    protected static ?string $model = Criteria::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Bantuan Sosial';

    protected static ?string $navigationLabel = 'Kriteria';

    protected static ?Int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Select::make('jenis')->options([
                //     'benefit',
                //     'cost',
                // ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('kriteria')->searchable(),
                TextColumn::make('kode_kriteria'),
                TextColumn::make('bobot'),
                TextColumn::make('jenis'),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCriterias::route('/'),
            // 'create' => Pages\CreateCriteria::route('/create'),
            // 'edit' => Pages\EditCriteria::route('/{record}/edit'),
        ];
    }    

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_criterias')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
