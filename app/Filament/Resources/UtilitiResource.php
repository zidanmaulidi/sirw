<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Utiliti;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UtilitiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UtilitiResource\RelationManagers;

class UtilitiResource extends Resource
{
    protected static ?string $model = Utiliti::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Bantuan Sosial';

    protected static ?Int $navigationSort = 3;

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
                TextColumn::make('id'),
                TextColumn::make('alternatif')->searchable(),
                TextColumn::make('kondisi_rumah'),
                TextColumn::make('kondisi_air'),
                TextColumn::make('penghasilan'),
                TextColumn::make('tegangan_listrik'),
                TextColumn::make('pendidikan'),
                TextColumn::make('pekerjaan'),
                TextColumn::make('sumber_air'),
                TextColumn::make('bahan_bakar_memasak'),
                TextColumn::make('umur'),
                TextColumn::make('tanggungan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // 
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUtilitis::route('/'),
            // 'create' => Pages\CreateUtiliti::route('/create'),
            // 'edit' => Pages\EditUtiliti::route('/{record}/edit'),
        ];
    }    
}
