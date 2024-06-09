<?php

namespace App\Filament\Resources;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource\Pages\EditRole;
use Filament\Forms;
use Filament\Tables;
use App\Models\Informasi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InformasiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InformasiResource\RelationManagers;
use Filament\Pages\Actions\ViewAction as ActionsViewAction;
use Filament\Tables\Columns\Layout\View;

class InformasiResource extends Resource
{
    protected static ?string $model = Informasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    protected static ?string $navigationGroup = 'Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()
                    ->schema([
                        TextInput::make('title')->required(),
                        RichEditor::make('content')->required(),
                        FileUpload::make('thumbnail')->directory('informasis_image')->visibility('public'),
                        TextInput::make('users_id')->default(Auth::id())->hidden(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->searchable()->sortable(),
                TextColumn::make('title')->searchable(),
                ImageColumn::make('thumbnail'),
                TextColumn::make('updated_at'),
                TextColumn::make('users.name')->label('auth')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),

                // Tables\Actions\ViewAction::make() -> visible(fn () => auth()->user()->hasRole('admin')),
                Tables\Actions\EditAction::make() -> visible(fn () => !auth()->user()->hasRole('admin')),
                // Tables\Actions\DeleteAction::make()-> visible(fn () => auth()->user()->hasRole('admin')),
                // Tables\Actions\ViewAction::make() -> visible(fn () => !auth()->user()->hasRole('warga')),
                // Tables\Actions\EditAction::make() -> visible(fn () => !auth()->user()->hasRole('warga')),
                // Tables\Actions\DeleteAction::make()-> visible(fn () => !auth()->user()->hasRole('warga')),
                // Tables\Actions\ViewAction::make() -> visible(fn () => auth()->user()->hasRole('sekretaris_rt')),
                // Tables\Actions\EditAction::make() -> visible(fn () => auth()->user()->hasRole('sekretaris_rt')),
                // Tables\Actions\DeleteAction::make()-> visible(fn () => auth()->user()->hasRole('sekretaris_rt')),
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
            'index' => Pages\ListInformasis::route('/'),
            'create' => Pages\CreateInformasi::route('/create'),
            // 'edit' => Pages\EditInformasi::route('/{record}/edit'),
        ];
    }    
}
