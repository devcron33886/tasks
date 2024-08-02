<?php

namespace App\Filament\Resources\TaskReviewResource\Pages;

use App\Filament\Resources\TaskReviewResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskReview extends CreateRecord
{
    protected static string $resource = TaskReviewResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['team_id'] = auth()->user()->team_id;
        $data['user_id'] = auth()->id();
        $data['status'] = 'submitted';

        return $data;
    }
}
