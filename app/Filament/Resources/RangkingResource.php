<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Rangking;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RangkingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RangkingResource\RelationManagers;

class RangkingResource extends Resource
{
    protected static ?string $model = Rangking::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Bantuan Sosial';

    protected static ?Int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                // TextColumn::make('id'),
                TextColumn::make('alternatif')->searchable(),
                TextColumn::make('skor')->sortable(),
                TextColumn::make('rangking'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // 

                Tables\Actions\DeleteAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'rw'])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()-> visible(fn () => auth()->user()->hasRole(['admin', 'rw'])),
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
            'index' => Pages\ListRangkings::route('/'),
            // 'create' => Pages\CreateRangking::route('/create'),
            // 'edit' => Pages\EditRangking::route('/{record}/edit'),
        ];
    }    

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_nilai_akhirs')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
