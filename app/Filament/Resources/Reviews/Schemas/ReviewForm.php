<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Ulasan')
                    ->columns(2)
                    ->components([
                        Select::make('user_id')
                            ->label('Pengguna')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('armadas')
                            ->label('Armada Terkait (Bisa Banyak / Opsional)')
                            ->relationship('armadas', 'title')
                            ->multiple()
                            ->searchable()
                            ->preload(),

                        Select::make('rating')
                            ->label('Rating Bintang')
                            ->options([
                                5 => '★★★★★ (5 - Sangat Puas)',
                                4 => '★★★★☆ (4 - Puas)',
                                3 => '★★★☆☆ (3 - Cukup)',
                                2 => '★★☆☆☆ (2 - Kurang)',
                                1 => '★☆☆☆☆ (1 - Kecewa)',
                            ])
                            ->default(5)
                            ->required(),

                        Select::make('status')
                            ->label('Status Moderasi')
                            ->options([
                                'pending' => 'Pending (Menunggu Persetujuan)',
                                'approved' => 'Approved (Ditayangkan ke Publik)',
                                'rejected' => 'Rejected (Ditolak)',
                            ])
                            ->default('approved')
                            ->required(),

                        TextInput::make('title')
                            ->label('Judul Ulasan (Opsional)')
                            ->placeholder('Contoh: Layanan Alphard Sangat Nyaman')
                            ->maxLength(150)
                            ->columnSpanFull(),

                        TextInput::make('car_review')
                            ->label('Ulasan Tentang Mobil (Opsional)')
                            ->placeholder('Contoh: Mobil sangat bersih, wangi, dan nyaman dikendarai.')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        TextInput::make('driver_review')
                            ->label('Ulasan Tentang Driver (Opsional)')
                            ->placeholder('Contoh: Driver ramah, tepat waktu, dan mengemudi dengan halus.')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        TextInput::make('facilities_review')
                            ->label('Ulasan Tentang Kualitas & Fasilitas (Opsional)')
                            ->placeholder('Contoh: Fasilitas lengkap dan pelayanan admin sangat responsif.')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Textarea::make('comment')
                            ->label('Isi Komentar / Ulasan')
                            ->placeholder('Tulis ulasan pelanggan...')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('Foto & Video Ulasan')
                    ->columns(2)
                    ->components([
                        SpatieMediaLibraryFileUpload::make('photos')
                            ->label('Foto Ulasan')
                            ->collection('photos')
                            ->multiple()
                            ->image()
                            ->reorderable()
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('videos')
                            ->label('Video Ulasan')
                            ->collection('videos')
                            ->multiple()
                            ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/quicktime', 'video/x-msvideo'])
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
