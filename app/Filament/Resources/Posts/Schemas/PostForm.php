<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Support\MediaLibraryPicker;
use App\Models\Post;
use App\Support\FileUploadCleanup;
use App\Support\SeoLength;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Post')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Konten')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug()))
                                    ->hint(fn (?string $state) => SeoLength::title($state)['label'])
                                    ->hintColor(fn (?string $state) => SeoLength::title($state)['color'])
                                    ->helperText('Dipakai sebagai judul SEO jika Meta Title kosong. Panjang ideal: 50-60 karakter.')
                                    ->columnSpanFull(),
                                Radio::make('permalink_type')
                                    ->label('Tipe Permalink')
                                    ->options([
                                        'date' => 'Dengan tanggal — /tahun/bulan/slug',
                                        'plain' => 'Tanpa tanggal — /slug',
                                    ])
                                    ->default('date')
                                    ->required()
                                    ->live()
                                    ->columnSpanFull(),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->helperText(fn (callable $get) => $get('permalink_type') === 'plain'
                                        ? 'Permalink: /slug — slug harus unik karena dipakai langsung sebagai URL.'
                                        : 'Permalink: /tahun/bulan/slug — slug tidak perlu unik karena tanggal publikasi membedakannya.')
                                    ->rules(fn (callable $get, ?Post $record) => $get('permalink_type') === 'plain'
                                        ? [Rule::unique('posts', 'slug')->where('permalink_type', 'plain')->ignore($record?->id)]
                                        : [])
                                    ->columnSpanFull(),
                                Textarea::make('excerpt')
                                    ->label('Ringkasan')
                                    ->rows(3)
                                    ->live(onBlur: true)
                                    ->hint(fn (?string $state) => SeoLength::description($state)['label'])
                                    ->hintColor(fn (?string $state) => SeoLength::description($state)['color'])
                                    ->helperText('Dipakai sebagai meta description jika Meta Description kosong. Panjang ideal: 120-160 karakter.')
                                    ->columnSpanFull(),
                                RichEditor::make('content')
                                    ->label('Konten')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('blog/attachments')
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('SEO')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->live(onBlur: true)
                                    ->hint(fn (?string $state, callable $get) => SeoLength::title($state ?: $get('title'))['label'])
                                    ->hintColor(fn (?string $state, callable $get) => SeoLength::title($state ?: $get('title'))['color'])
                                    ->helperText('Kosongkan untuk pakai judul artikel. Panjang ideal: 50-60 karakter.')
                                    ->columnSpanFull(),
                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->rows(3)
                                    ->live(onBlur: true)
                                    ->hint(fn (?string $state, callable $get) => SeoLength::description($state ?: $get('excerpt'))['label'])
                                    ->hintColor(fn (?string $state, callable $get) => SeoLength::description($state ?: $get('excerpt'))['color'])
                                    ->helperText('Kosongkan untuk pakai ringkasan artikel. Panjang ideal: 120-160 karakter.')
                                    ->columnSpanFull(),
                                FileUpload::make('og_image')
                                    ->label('OG Image (Share Sosial Media)')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios(['1.91:1', '16:9'])
                                    ->disk('public')
                                    ->directory('blog/og')
                                    ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                                    ->hintAction(MediaLibraryPicker::make('og_image', 'blog/og', 'image'))
                                    ->helperText('Kosongkan untuk pakai Foto Unggulan. Wajib landscape (mis. 1.91:1) agar preview link WhatsApp/Facebook muncul dengan benar.')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('Publikasi')
                    ->columns(2)
                    ->components([
                        FileUpload::make('featured_image')
                            ->label('Foto Unggulan')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['1.91:1', '16:9'])
                            ->disk('public')
                            ->directory('blog')
                            ->deleteUploadedFileUsing(FileUploadCleanup::deleteOnRemove())
                            ->hintAction(MediaLibraryPicker::make('featured_image', 'blog', 'image'))
                            ->helperText('Wajib landscape (mis. 1.91:1) agar dipakai sebagai preview link WhatsApp/Facebook saat OG Image kosong.')
                            ->columnSpanFull(),
                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug())),
                                TextInput::make('slug')->required(),
                            ]),
                        Select::make('tags')
                            ->label('Tags')
                            ->relationship('tags', 'name')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug())),
                                TextInput::make('slug')->required(),
                            ]),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Publikasikan',
                            ])
                            ->default('draft')
                            ->required()
                            ->live(),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now())
                            ->required(fn (callable $get) => $get('status') === 'published'),
                    ]),
            ]);
    }
}
