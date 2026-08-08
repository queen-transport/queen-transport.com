<?php

namespace App\Filament\Support;

use App\Models\Attachment;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * A reusable Filament form action that lets a user reuse a file already
 * uploaded to the Media Library instead of uploading it again. The chosen
 * file is copied into the target field's own directory so every field keeps
 * behaving exactly like a normal upload (same disk, plain path string).
 */
class MediaLibraryPicker
{
    public static function make(string $fieldName, string $directory, ?string $mediaType = null): Action
    {
        return Action::make('pickFromMediaLibrary_'.$fieldName)
            ->label('Pilih dari Media Library')
            ->icon('heroicon-o-photo')
            ->color('gray')
            ->modalHeading('Pilih dari Media Library')
            ->modalSubmitActionLabel('Gunakan File Ini')
            ->schema([
                Select::make('attachment_id')
                    ->label('Media')
                    ->searchable()
                    ->allowHtml()
                    ->options(fn () => self::options($mediaType))
                    ->getSearchResultsUsing(fn (string $search) => self::options($mediaType, $search))
                    ->getOptionLabelUsing(fn ($value) => Attachment::query()->whereKey($value)->first()?->title)
                    ->required(),
            ])
            ->action(function (array $data, Set $set) use ($fieldName, $directory): void {
                $attachment = Attachment::query()->whereKey($data['attachment_id'])->first();
                $newPath = self::copyIntoDirectory($attachment, $directory);

                if ($newPath !== null) {
                    $set($fieldName, $newPath);
                }
            });
    }

    /**
     * For a `Repeater::simple(FileUpload::make($itemKey))` gallery field —
     * lets the user append one or more existing Media Library files as new
     * repeater items. While being edited, a simple repeater's live state is
     * still the raw per-item shape (`[itemUuid => [$itemKey => [fileUuid =>
     * $path]]]`, matching FileUpload's own raw state); it is only flattened
     * to a plain array of paths once the form is dehydrated for saving, so
     * new items must be appended in that same raw nested shape.
     */
    public static function makeForRepeater(string $fieldName, string $directory, ?string $mediaType = null, string $itemKey = 'path'): Action
    {
        return Action::make('pickFromMediaLibraryRepeater_'.$fieldName)
            ->label('Pilih dari Media Library')
            ->icon('heroicon-o-photo')
            ->color('gray')
            ->modalHeading('Pilih dari Media Library')
            ->modalSubmitActionLabel('Tambahkan')
            ->schema([
                Select::make('attachment_ids')
                    ->label('Media')
                    ->multiple()
                    ->searchable()
                    ->allowHtml()
                    ->options(fn () => self::options($mediaType))
                    ->getSearchResultsUsing(fn (string $search) => self::options($mediaType, $search))
                    ->required(),
            ])
            ->action(function (array $data, Get $get, Set $set) use ($fieldName, $directory, $itemKey): void {
                $newItems = Attachment::query()
                    ->whereKey($data['attachment_ids'])
                    ->get()
                    ->map(fn (Attachment $attachment) => self::copyIntoDirectory($attachment, $directory))
                    ->filter()
                    ->mapWithKeys(fn (string $path) => [(string) Str::uuid() => [$itemKey => [(string) Str::uuid() => $path]]])
                    ->all();

                $set($fieldName, [...Arr::wrap($get($fieldName)), ...$newItems]);
            });
    }

    private static function copyIntoDirectory(?Attachment $attachment, string $directory): ?string
    {
        $sourcePath = $attachment?->path;

        if (blank($sourcePath) || (! Storage::disk('public')->exists($sourcePath))) {
            return null;
        }

        $extension = pathinfo($sourcePath, PATHINFO_EXTENSION);
        $newPath = trim($directory, '/').'/'.Str::uuid().($extension !== '' ? ".{$extension}" : '');

        Storage::disk('public')->copy($sourcePath, $newPath);

        return $newPath;
    }

    /**
     * @return array<int, string>
     */
    private static function options(?string $mediaType, ?string $search = null): array
    {
        return Attachment::query()
            ->when(filled($search), fn ($query) => $query->where('title', 'like', "%{$search}%"))
            ->latest()
            ->limit(60)
            ->get()
            ->filter(fn (Attachment $attachment) => match ($mediaType) {
                'image' => $attachment->isImage(),
                'video' => $attachment->isVideo(),
                default => true,
            })
            ->mapWithKeys(fn (Attachment $attachment) => [
                $attachment->id => view('filament.partials.attachment-option', ['attachment' => $attachment])->render(),
            ])
            ->all();
    }
}
