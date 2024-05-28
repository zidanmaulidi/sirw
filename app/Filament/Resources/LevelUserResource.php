<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\LevelUser;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LevelUserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LevelUserResource\RelationManagers;
use App\Filament\Resources\LevelUserResource\Widgets\StatsOverview;

class LevelUserResource extends Resource
{
    protected static ?string $model = LevelUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'Level_Nama';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        TextInput::make('level_kode')->required(),
                        TextInput::make('level_nama')->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->searchable(),
                TextColumn::make('level_kode')->searchable(),
                TextColumn::make('level_nama')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLevelUsers::route('/'),
            'create' => Pages\CreateLevelUser::route('/create'),
            'edit' => Pages\EditLevelUser::route('/{record}/edit'),
        ];
    }
    
    // public static function getWidgets(): array
    // {
    //     return [
    //         StatsOverview::class
    //     ];
    // }
    public static function getStats(): array
    {
        return [
            // Card::make('Unique views', '192.1k'),
            // Card::make('Bounce rate', '21%'),
            // Card::make('Average time on page', '3:12'),
        ];
    }
}
