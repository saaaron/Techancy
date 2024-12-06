<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentDaysResource\Pages;
use App\Filament\Resources\PaymentDaysResource\RelationManagers;
use App\Models\JobPaymentDays;
use App\Models\PaymentDays;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentDaysResource extends Resource
{
    protected static ?string $model = JobPaymentDays::class;

    protected static ?string $label = 'Payment Days';

    protected static ?string $navigationParentItem = 'Job Posts';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() ? 'secondary' : 'secondary';
    }

    protected static ?string $navigationBadgeTooltip = 'Total number of payment days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->minLength(2)->required(),
                TextInput::make('slug')->minLength(2)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('slug'),
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
            'index' => Pages\ListPaymentDays::route('/'),
            'create' => Pages\CreatePaymentDays::route('/create'),
            'edit' => Pages\EditPaymentDays::route('/{record}/edit'),
        ];
    }
}
