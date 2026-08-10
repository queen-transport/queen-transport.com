<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Models\Post;
use App\Support\SeoLength;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),
                TextColumn::make('seo_title')
                    ->label('SEO Judul')
                    ->badge()
                    ->state(fn (Post $record): string => SeoLength::title($record->seo_title)['label'])
                    ->color(fn (Post $record): string => SeoLength::title($record->seo_title)['color'])
                    ->tooltip('Panjang ideal judul untuk hasil pencarian Google: 50-60 karakter.'),
                TextColumn::make('seo_description')
                    ->label('SEO Deskripsi')
                    ->badge()
                    ->state(fn (Post $record): string => SeoLength::description($record->seo_description)['label'])
                    ->color(fn (Post $record): string => SeoLength::description($record->seo_description)['color'])
                    ->tooltip('Panjang ideal meta description untuk hasil pencarian Google: 120-160 karakter.'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'published' ? 'success' : 'gray'),
                TextColumn::make('published_at')
                    ->label('Publikasi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Publikasikan',
                    ]),
                SelectFilter::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
