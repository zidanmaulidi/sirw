<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Warga;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WargaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WargaResource\RelationManagers;
use App\Filament\Resources\WargaResource\Widgets\WargaOverview;

class WargaResource extends Resource
{
    protected static ?string $model = Warga::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigatiosort = 3;

    protected static ?string $navigationGroup = 'Data Warga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('nama_lengkap')->required(),
                TextInput::make('alamat')->required(),
                TextInput::make('no_telepon')->required(),
                Select::make('domisilis_id')
                            ->relationship('domisilis', 'domisili')
                            ->required(),
                TextInput::make('no_KK')->required(),
                TextInput::make('NIK')->required()->unique(ignoreRecord: true),
                Select::make('kependudukan')->options([
                            'warga tetap' => 'warga tetap',
                            'warga pendatang' => 'warga pendatang',
                        ])->required(),
                Select::make('jenis_kelamin')->options([
                    'laki-laki' => 'laki-laki',
                    'perempuan' => 'perempuan',
                ])->required(),
                TextInput::make('tempat_lahir')->required(),
                DatePicker::make('tanggal_lahir')->required(),
                Select::make('agama')->options([
                    'islam' => 'islam',
                    'protestan' => 'protestan',
                    'katholik' => 'katholik',
                    'hindu' => 'hindu',
                    'budha' => 'budha',
                    'khonghucu' => 'khonghucu',
                ])->required(),
                TextInput::make('pendidikan')->required(),
                TextInput::make('jenis_pekerjaan')->required(),
                Select::make('status')->options([
                    'kawin' => 'kawin',
                    'belum kawin' => 'belum kawin',
                ])->required(),
                FileUpload::make('profile')->required()->directory('wargas_image')->visibility('public'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('nama_lengkap')->searchable(),
                TextColumn::make('alamat')->searchable(),
                TextColumn::make('no_telepon')->searchable(),
                TextColumn::make('domisilis.domisili')->label('domisili')->searchable(),
                TextColumn::make('kependudukan')->searchable(),
                ImageColumn::make('profile'),

            ])
            ->filters([
                //
                SelectFilter::make('domisilis_id')
                    ->options([
                        '1' => 'RT 10',
                        '2' => 'RT 11'
                    ]),
                SelectFilter::make('kependudukan')
                    ->options([
                        'warga tetap' => 'warga tetap',
                        'warga pendatang' => 'warga pendatang'
                    ]),
                
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                // role yang dapat action saja
                Tables\Actions\EditAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'sekretaris_rw'])),
                Tables\Actions\DeleteAction::make() -> visible(fn () => auth()->user()->hasRole(['admin', 'sekretaris_rw'])),

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
            'index' => Pages\ListWargas::route('/'),
            'create' => Pages\CreateWarga::route('/create'),
            // 'edit' => Pages\EditWarga::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            WargaOverview::class,
        ];
    }

    public static function shouldRegisterNavigation(): bool // Sembunyiin dari navigasi
    {
        if (auth()->user()->can('view_wargas')) // string dalem can sesuain sama permission yang dibuat
            return true;
        else
            return false;
    }
}
