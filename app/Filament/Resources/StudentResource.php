<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;
use Filament\Tables\Columns\ImageColumn;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'contoh navigasi';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // membuat form
                Card::make()
                    ->schema([
                        TextInput::make('nim')->required()->unique(ignorable: fn ($record) => $record),
                        FileUpload::make('image')->required()->directory('student_image')->visibility('public'),
                        TextInput::make('nama')->required(),
                        Select::make('fakultas')->options([
                            'TI' => 'TI',
                            'SIB' => 'SIB',
                            'FT' => 'FT'
                        ])
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // menampilkan data tabel
                TextColumn::make('id')->sortable()->searchable(),
                ImageColumn::make('image')->width(40),
                TextColumn::make('nim')->sortable()->searchable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('fakultas')->sortable()->searchable(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    // protected function getStats(): array
    // {
    //     return [
    //         Card::make('nama', '192.1k')
    //             ->description('32k increase')
    //             ->descriptionIcon('heroicon-m-arrow-trending-up'),
    //         Card::make('Bounce rate', '21%')
    //             ->description('7% decrease')
    //             ->descriptionIcon('heroicon-m-arrow-trending-down'),
    //         Card::make('Average time on page', '3:12')
    //             ->description('3% increase')
    //             ->descriptionIcon('heroicon-m-arrow-trending-up'),
    //     ];
    // }
}
