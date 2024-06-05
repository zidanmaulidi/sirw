<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\Widgets\StatsOverview;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = -2;

    protected static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}
    protected static ?string $navigationGroup = 'Data Warga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        TextInput::make('password')->required(),
                        Select::make('level_users_id')
                            ->relationship('level_users', 'level_nama')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if (in_array($state, [1, 2])) { // Assuming level 1 and 2 are admin and rw
                                    $set('domisilis_id', null);
                                }
                            }),
                        Select::make('domisilis_id')
                            ->relationship('domisilis', 'domisili')
                            ->required()
                            ->visible(fn ($get) => !in_array($get('level_users_id'), [1, 2])),
                        // select::make('level_users_id')->relationship(
                        //     'level_users','level_nama',
                        // )->required(),
                        // select::make('domisilis_id')->relationship(
                        //     'domisilis','domisili')
                        //     ->required(),
                        select::make('roles')->multiple()->relationship('roles','name'),
                        Select::make('kependudukan')->options([
                            'warga tetap' => 'warga tetap',
                            'warga pendatang' => 'warga pendatang',
                        ])->required(),
                        TextInput::make('no_KK')->required(),
                        TextInput::make('NIK')->required(),
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
                        FileUpload::make('profile')->required()->directory('users_image')->visibility('public'),

                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                // TextColumn::make('password'),
                TextColumn::make('level_users.level_nama')->label('level')->searchable(),
                TextColumn::make('domisilis.domisili')->searchable(),
                TextColumn::make('kependudukan')->searchable(),
                // TextColumn::make('no_KK')->searchable(),
                // TextColumn::make('NIK')->searchable(),
                // TextColumn::make('jenis_kelamin')->searchable(),
                // TextColumn::make('tempat_lahir')->searchable(),
                // TextColumn::make('tanggal_lahir')->searchable(),
                // TextColumn::make('agama')->searchable(),
                // TextColumn::make('pendidikan')->searchable(),
                // TextColumn::make('jenis_pekerjaan')->searchable(),
                // TextColumn::make('status')->searchable(),
                ImageColumn::make('profile')->square(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
