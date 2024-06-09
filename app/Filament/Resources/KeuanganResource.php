<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Keuangan;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KeuanganResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KeuanganResource\RelationManagers;
use App\Filament\Resources\KeuanganResource\Widgets\StatsOverview;

class KeuanganResource extends Resource
{
    protected static ?string $model = Keuangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';
    
    protected static ?string $navigationLabel = 'Keuangan';

    protected static ?string $navigationGroup = 'Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        DatePicker::make('tanggal')->required(),
                        TextInput::make('keterangan')->required(),
                        TextInput::make('uang_masuk')->required()->numeric(),
                        TextInput::make('uang_keluar')->required()->numeric(),
                        // TextInput::make('saldo_kas'),
                    ])
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('tanggal')->searchable(),
                TextColumn::make('keterangan')->searchable(),
                TextColumn::make('uang_masuk'),
                TextColumn::make('uang_keluar'),
                TextColumn::make('saldo_kas'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                Tables\Actions\EditAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'bendahara_rw'])),
                Tables\Actions\DeleteAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'bendahara_rw'])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'bendahara_rw'])),
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
            'index' => Pages\ListKeuangans::route('/'),
            'create' => Pages\CreateKeuangan::route('/create'),
            'edit' => Pages\EditKeuangan::route('/{record}/edit'),
        ];
    }    

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_keuangans')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
