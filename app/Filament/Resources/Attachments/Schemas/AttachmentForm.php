<?php

namespace App\Filament\Resources\Attachments\Schemas;

use App\Models\Attachment;
use App\Support\FileUploadCleanup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttachmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('File')
                    ->components([
                        FileUpload::make('upload')
                            ->label('File')
                            ->disk('public')
                            ->directory('attachments/uploads')
                            ->acceptedFileTypes(['image/*', 'video/*'])
                            ->multiple(fn (string $operation) => $operation === 'create')
                            ->previewable()
                            ->downloadable()
                            ->openable()
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            ->required(fn (?Attachment $record) => $record === null)
                            ->helperText('Unggah satu atau beberapa file sekaligus. Setiap file akan menjadi satu entri Media Library.')
                            ->afterStateHydrated(function (FileUpload $component, ?Attachment $record) {
                                if ($record?->path) {
                                    $component->state([$record->path]);
                                }
                            })
                            ->columnSpanFull(),
                        TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Kosongkan untuk pakai nama file'),
                        TextInput::make('alt_text')
                            ->label('Teks Alternatif (Alt)')
                            ->helperText('Dipakai untuk aksesibilitas & SEO gambar.'),
                    ]),
            ]);
    }
}
