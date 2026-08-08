<?php

namespace App\Filament\Resources\Attachments\Pages;

use App\Filament\Resources\Attachments\AttachmentResource;
use App\Models\Attachment;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CreateAttachment extends CreateRecord
{
    protected static string $resource = AttachmentResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $paths = Arr::wrap($data['upload'] ?? []);
        unset($data['upload']);

        $firstPath = array_shift($paths);

        $record = Attachment::create([
            ...$data,
            'title' => $data['title'] ?: $this->titleFromPath($firstPath),
        ]);
        $record->addMediaFromDisk($firstPath, 'public')->toMediaCollection('file');

        foreach ($paths as $path) {
            $extra = Attachment::create(['title' => $this->titleFromPath($path)]);
            $extra->addMediaFromDisk($path, 'public')->toMediaCollection('file');
        }

        return $record;
    }

    private function titleFromPath(string $path): string
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }
}
