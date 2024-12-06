<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPostsResource\Pages;
use App\Filament\Resources\JobPostsResource\RelationManagers;
use App\Models\JobPosts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostsResource extends Resource
{
    protected static ?string $model = JobPosts::class;

    protected static ?string $label = 'Job Posts';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() ? 'success' : 'success';
    }

    protected static ?string $navigationBadgeTooltip = 'Total number of job posts';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('unique_id')
                ->label('Post ID'),
                TextColumn::make('user.name')
                ->label('By')
                ->searchable(),
                TextColumn::make('jobRole.name')
                ->label('Role')
                ->toggleable(),
                TextColumn::make('jobLevel.name')
                ->label('Level')
                ->toggleable(),
                TextColumn::make('description'),
                TextColumn::make('jobType.name')
                ->label('Type')
                ->toggleable(),
                TextColumn::make('applicants'),
                TextColumn::make('payment'),
                TextColumn::make('jobPaymentDay.name')
                ->label('Payment Day')
                ->toggleable(),
                TextColumn::make('created_at')->date('d M, Y H:i a'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListJobPosts::route('/'),
            // 'create' => Pages\CreateJobPosts::route('/create'),
            // 'edit' => Pages\EditJobPosts::route('/{record}/edit'),
        ];
    }
}
