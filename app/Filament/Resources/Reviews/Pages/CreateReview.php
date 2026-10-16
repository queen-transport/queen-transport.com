<?php

namespace App\Filament\Resources\Reviews\Pages;

use App\Filament\Resources\Reviews\ReviewResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by_admin'] = true;

        logger()->info('Admin creating review record from Filament', [
            'user_id' => $data['user_id'] ?? null,
            'rating' => $data['rating'] ?? null,
            'status' => $data['status'] ?? null,
        ]);

        return $data;
    }
}
