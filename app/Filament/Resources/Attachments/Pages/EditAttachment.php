<?php

namespace App\Filament\Resources\Attachments\Pages;

use App\Filament\Resources\Attachments\AttachmentResource;
use App\Models\Attachment;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EditAttachment extends EditRecord
{
    protected static string $resource = AttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        /** @var Attachment $record */
        $newPath = Arr::first(Arr::wrap($data['upload'] ?? []));
        unset($data['upload']);

        $record->update($data);

        if ($newPath && $newPath !== $record->path) {
            $record->addMediaFromDisk($newPath, 'public')->toMediaCollection('file');
        }

        return $record;
    }
}
