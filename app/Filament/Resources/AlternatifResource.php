<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Alternatif;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\AlternatifResource\Pages;
use App\Filament\Resources\AlternatifResource\RelationManagers;

class AlternatifResource extends Resource
{
    protected static ?string $model = Alternatif::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Bantuan Sosial';

    protected static ?string $navigationLabel = 'Alternatif';

    protected static ?Int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('alternatif')->required(),
                Select::make('kondisi_rumah')->options([
                    100 => 'tidak layak',
                    50 => 'layak'
                    ])->required(),
                Select::make('kondisi_air')->options([
                    100 => 'tidak mampu',
                    50 => 'mampu'
                    ])->required(),
                Select::make('penghasilan')->options([
                    100 => '< 1.000.000' ,
                    75 => '1.000.000 - 1.500.000',
                    50 => '1.600.000 - 2.000.000',
                    25 => '> 2.000.000' 
                    ])->required(),
                Select::make('tegangan_listrik')->options([
                    100 => '450' ,
                    75 => '900' ,
                    50 => '1300' ,
                    25 => '2100' 
                    ])->required(),
                Select::make('pendidikan')->options([
                    100 => 'SD' ,
                    75 => 'SMP' ,
                    50 => 'SMA' ,
                    25 => 'Kuliah' 
                ])->required(),
                Select::make('pekerjaan')->options([
                    100 => 'buruh' ,
                    80 => 'petani' ,
                    60 => 'pedagang' ,
                    40 => 'guru' ,
                    20 => 'angkatan' 
                    ])->required(),
                Select::make('sumber_air')->options([
                    100 => 'sumur' ,
                    50 => 'PDAM' 
                    ])->required(),
                Select::make('bahan_bakar_memasak')->options([
                    100 => 'kayu bakar' ,
                    50 => 'LPG' 
                    ])->required(),
                Select::make('umur')
                ->options([
                    100 => '> 55 ' ,
                    75 => '51 - 55',
                    50=> '45-50',
                    25=> '< 45'

                    ])->required(),
                Select::make('tanggungan')
                ->options([
                    100 => '>= 4 ' ,
                    75 => '3',
                    50=> '2',
                    25=> '1'

                    ])
                ->required(),
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
                Tables\Actions\EditAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'rw'])),
                Tables\Actions\DeleteAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'rw'])),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'rw'])),
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
            'index' => Pages\ListAlternatifs::route('/'),
            'create' => Pages\CreateAlternatif::route('/create'),
            'edit' => Pages\EditAlternatif::route('/{record}/edit'),
        ];
    }    

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_alternatifs')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
