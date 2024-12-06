<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqPageResource\Pages;
use App\Filament\Resources\FaqPageResource\RelationManagers;
use App\Models\FaqPage;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqPageResource extends Resource
{
    protected static ?string $model = FaqPage::class;

    protected static ?string $modelLabel = 'FAQ';

    protected static ?string $navigationGroup = 'PAGES';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('question')->required()->columnSpanFull(),
                MarkdownEditor::make('answer')->required()->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('#'),
                TextColumn::make('question'),
                TextColumn::make('answer'),
                TextColumn::make('created_at')->date('d M, Y H:i a'),
                TextColumn::make('updated_at')->date('d M, Y H:i a')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListFaqPages::route('/'),
            'create' => Pages\CreateFaqPage::route('/create'),
            'edit' => Pages\EditFaqPage::route('/{record}/edit'),
        ];
    }
}
