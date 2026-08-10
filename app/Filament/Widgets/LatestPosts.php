<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Posts\Pages\EditPost;
use App\Models\Post;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestPosts extends TableWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Artikel Terbaru')
            ->query(fn (): Builder => Post::query()->latest('created_at')->limit(5))
            ->paginated(false)
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Foto')
                    ->disk('public')
                    ->square(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->limit(40),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'published' ? 'success' : 'gray'),
                TextColumn::make('published_at')
                    ->label('Publikasi')
                    ->dateTime('d M Y H:i'),
            ])
            ->recordActions([
                EditAction::make()
                    ->url(fn (Post $record): string => EditPost::getUrl(['record' => $record])),
            ]);
    }
}
