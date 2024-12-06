<?php

namespace App\Filament\Resources\JobPostsResource\Pages;

use App\Filament\Resources\JobPostsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJobPosts extends CreateRecord
{
    protected static string $resource = JobPostsResource::class;
}
