<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Warga;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WargaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\WargaResource\RelationManagers;
use Filament\Tables\Columns\ImageColumn;

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
                // TextColumn::make('no_KK')->searchable(),
                // TextColumn::make('NIK')->searchable(),
                // TextColumn::make('jenis_kelamin')->searchable(),
                // TextColumn::make('tempat_lahir')->searchable(),
                // TextColumn::make('tanggal_lahir')->searchable(),
                // TextColumn::make('agama')->searchable(),
                // TextColumn::make('pendidikan')->searchable(),
                // TextColumn::make('jenis_pekerjaan')->searchable(),
                // TextColumn::make('status')->searchable(),
                TextColumn::make('domisilis.domisili')->label('domisili')->searchable(),
                TextColumn::make('kependudukan')->searchable(),
                ImageColumn::make('profile'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                // role admin
                Tables\Actions\EditAction::make() -> visible(fn () => auth()->user()->hasRole('admin')),
                Tables\Actions\DeleteAction::make() -> visible(fn () => auth()->user()->hasRole('admin')),

                // role RW
                Tables\Actions\EditAction::make() -> visible(fn () => !auth()->user()->hasRole('rw')),
                Tables\Actions\DeleteAction::make() -> visible(fn () => !auth()->user()->hasRole('rw')),
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
}
