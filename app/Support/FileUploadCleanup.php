<?php

namespace App\Support;

use Closure;
use Illuminate\Support\Facades\Storage;

class FileUploadCleanup
{
    /**
     * Closure for FileUpload::deleteUploadedFileUsing() that deletes a
     * removed/replaced file from disk. Filament does not do this by default
     * (see filament/filament docs on file uploads), leaving orphaned files
     * behind whenever a user removes or replaces a file in the form.
     */
    public static function deleteOnRemove(string $disk = 'public'): Closure
    {
        return function (mixed $file) use ($disk): void {
            if (is_string($file)) {
                Storage::disk($disk)->delete($file);
            }
        };
    }
}
