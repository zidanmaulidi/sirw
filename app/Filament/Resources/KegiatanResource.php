<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AduanResource\Pages\EditAduan;
use Filament\Forms;
use Filament\Tables;
use App\Models\Kegiatan;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KegiatanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use Filament\Tables\Actions\EditAction;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Menu';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        TextInput::make('kegiatan'),
                        DatePicker::make('waktu'),
                        TextInput::make('lokasi'),
                        TextInput::make('peserta'),
                        TextInput::make('agenda'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('kegiatan')->searchable(),
                TextColumn::make('waktu')->searchable(),
                TextColumn::make('lokasi')->searchable(),
                TextColumn::make('peserta')->searchable(),
                TextColumn::make('agenda')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                Tables\Actions\EditAction::make() -> visible(fn () => !auth()->user()->hasRole('bendahara_rw')),
                Tables\Actions\DeleteAction::make()-> visible(fn () => !auth()->user()->hasRole('bendahara_rw')),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()-> visible(fn () => !auth()->user()->hasRole('bendahara_rw')),
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
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }    

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_kegiatans')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
