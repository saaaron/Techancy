<?php

namespace App\Filament\Resources\JobPostsResource\Pages;

use App\Filament\Resources\JobPostsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobPosts extends ListRecords
{
    protected static string $resource = JobPostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
