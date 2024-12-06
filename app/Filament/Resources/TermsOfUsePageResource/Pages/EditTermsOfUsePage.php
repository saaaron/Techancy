<?php

namespace App\Filament\Resources\TermsOfUsePageResource\Pages;

use App\Filament\Resources\TermsOfUsePageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTermsOfUsePage extends EditRecord
{
    protected static string $resource = TermsOfUsePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
