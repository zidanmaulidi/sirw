<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Aduan;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AduanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AduanResource\RelationManagers;

class AduanResource extends Resource
{
    protected static ?string $model = Aduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat';

    protected static ?string $navigationGroup = 'Menu';

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        TextInput::make('nama_pengadu')->required(),
                        TextInput::make('aduan')->required(),
                        RichEditor::make('isi_aduan')->required(),
                        FileUpload::make('bukti')->required()->directory('aduans_image')->visibility('public'), 
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('nama_pengadu'),
                TextColumn::make('aduan'),
                ImageColumn::make('bukti'),
                TextColumn::make('updated_at'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                Tables\Actions\DeleteAction::make() -> visible(fn () => !auth()->user()->hasRole('bendahara_rw')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make() -> visible(fn () => !auth()->user()->hasRole('bendahara_rw')),
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
            'index' => Pages\ListAduans::route('/'),
            'create' => Pages\CreateAduan::route('/create'),
            'edit' => Pages\EditAduan::route('/{record}/edit'),
        ];
    }    

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_aduans')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
