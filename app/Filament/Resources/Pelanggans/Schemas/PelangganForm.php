<?php

namespace App\Filament\Resources\Pelanggans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Pelanggan')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug()))
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull(),
                        TextInput::make('jabatan')
                            ->label('Jabatan / Posisi')
                            ->placeholder('contoh: Direktur, Manager HRD, Ibu Rumah Tangga'),
                        TextInput::make('instansi')
                            ->label('Perusahaan / Instansi')
                            ->placeholder('contoh: PT Pertamina, Pribadi'),
                        Textarea::make('kutipan')
                            ->label('Kutipan / Testimoni')
                            ->rows(4)
                            ->columnSpanFull(),
                        Select::make('bintang')
                            ->label('Jumlah Bintang')
                            ->options([
                                1 => '⭐ (1)',
                                2 => '⭐⭐ (2)',
                                3 => '⭐⭐⭐ (3)',
                                4 => '⭐⭐⭐⭐ (4)',
                                5 => '⭐⭐⭐⭐⭐ (5)',
                            ])
                            ->default(5)
                            ->required(),
                        TextInput::make('sort')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_published')
                            ->label('Tampilkan di Website')
                            ->default(true),
                    ]),

                Section::make('Foto Pelanggan')
                    ->components([
                        FileUpload::make('photo')
                            ->label('Foto Profil')
                            ->image()
                            ->disk('public')
                            ->directory('pelanggan')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
