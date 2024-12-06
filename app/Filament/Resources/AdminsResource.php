<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminsResource\Pages;
use App\Filament\Resources\AdminsResource\RelationManagers;
use App\Models\Admin;
use App\Models\Admins;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminsResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $label = 'Admin';

    protected static ?string $navigationGroup = 'USERS';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() ? 'success' : 'success';
    }

    protected static ?string $navigationBadgeTooltip = 'Total number of admins';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->minLength(2)->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('password')->password()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('password'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmins::route('/create'),
            'edit' => Pages\EditAdmins::route('/{record}/edit'),
        ];
    }
}
