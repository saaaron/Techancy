<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Filament\Resources\AboutPageResource\RelationManagers;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    public static function canCreate(): bool
    {
        return false;
    }

    protected static ?string $modelLabel = 'About';

    protected static ?string $navigationGroup = 'PAGES';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                MarkdownEditor::make('about')->required()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('about'),
                TextColumn::make('created_at')->date('d M, Y H:i a'),
                TextColumn::make('updated_at')->date('d M, Y H:i a')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAboutPages::route('/'),
            // 'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
