<?php

namespace App\Filament\Resources\Armadas\Schemas;

use App\Filament\Support\MediaLibraryPicker;
use App\Support\FileUploadCleanup;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArmadaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Armada')
                    ->columns(2)
                    ->components([
                        TextInput::make('title')
                            ->label('Nama Armada')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug()))
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        TextInput::make('car_type')
                            ->label('Tipe Kendaraan')
                            ->placeholder('contoh: MPV Ultra Mewah'),
                        TextInput::make('car_badge')
                            ->label('Badge')
                            ->placeholder('contoh: Prestige'),
                        TextInput::make('car_icon')
                            ->label('Icon Emoji')
                            ->placeholder('👑'),
                        TextInput::make('price')
                            ->label('Harga per Hari (Rp)')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('contoh: 2200000'),
                        TagsInput::make('features')
                            ->label('Fitur-Fitur')
                            ->placeholder('Tambah fitur lalu tekan Enter')
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ]),

                Section::make('Media')
                    ->columns(2)
                    ->components([
                        FileUpload::make('featured_image')
                            ->label('Foto Unggulan')
                            ->image()
                            ->disk('public')
                            ->directory('armada')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            ->hintAction(MediaLibraryPicker::make('featured_image', 'armada', 'image'))
                            ->columnSpanFull(),
                        Repeater::make('gallery')
                            ->label('Foto Tambahan')
                            ->hintAction(MediaLibraryPicker::makeForRepeater('gallery', 'armada/gallery', 'image'))
                            ->simple(
                                FileUpload::make('path')
                                    ->image()
                                    ->disk('public')
                                    ->directory('armada/gallery')
                                    ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            )
                            ->columnSpanFull(),
                        FileUpload::make('video')
                            ->label('Video')
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/quicktime'])
                            ->disk('public')
                            ->directory('armada/video')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            ->hintAction(MediaLibraryPicker::make('video', 'armada/video', 'video'))
                            ->columnSpanFull(),
                    ]),

                Section::make('Tombol Aksi & Publikasi')
                    ->columns(2)
                    ->components([
                        TextInput::make('cta_text')
                            ->label('Teks Tombol Tanya Harga')
                            ->placeholder('Kosongkan untuk pakai default: "Tanya Harga"'),
                        TextInput::make('cta_url')
                            ->label('Link Tombol Tanya Harga')
                            ->url()
                            ->placeholder('Kosongkan untuk pakai link WhatsApp otomatis'),
                        TextInput::make('sort')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_published')
                            ->label('Tampilkan di Website')
                            ->default(true),
                    ]),
            ]);
    }
}
