<?php

namespace App\Filament\Resources\PaymentDaysResource\Pages;

use App\Filament\Resources\PaymentDaysResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentDays extends ListRecords
{
    protected static string $resource = PaymentDaysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
