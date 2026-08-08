<?php

namespace App\Filament\Resources\Galeris\Schemas;

use App\Filament\Support\MediaLibraryPicker;
use App\Support\FileUploadCleanup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Galeri')
                    ->columns(2)
                    ->components([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug()))
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        TextInput::make('sort')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_published')
                            ->label('Tampilkan di Website')
                            ->default(true),
                    ]),

                Section::make('Media')
                    ->columns(2)
                    ->components([
                        FileUpload::make('featured_image')
                            ->label('Foto Utama')
                            ->image()
                            ->disk('public')
                            ->directory('galeri')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            ->hintAction(MediaLibraryPicker::make('featured_image', 'galeri', 'image'))
                            ->columnSpanFull(),
                        Repeater::make('gallery')
                            ->label('Foto Tambahan')
                            ->hintAction(MediaLibraryPicker::makeForRepeater('gallery', 'galeri/extra', 'image'))
                            ->simple(
                                FileUpload::make('path')
                                    ->image()
                                    ->disk('public')
                                    ->directory('galeri/extra')
                                    ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            )
                            ->columnSpanFull(),
                        FileUpload::make('video')
                            ->label('Video')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/quicktime'])
                            ->disk('public')
                            ->directory('galeri/video')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            ->hintAction(MediaLibraryPicker::make('video', 'galeri/video', 'video'))
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
