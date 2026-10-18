<?php

namespace App\Filament\Widgets;

use App\Models\Armada;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BusinessOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Armada Aktif', Armada::query()->where('is_published', true)->count())
                ->description(Armada::query()->count().' total armada')
                ->descriptionIcon('heroicon-m-truck')
                ->color('success'),

            Stat::make('Artikel Terpublikasi', Post::query()->published()->count())
                ->description(Post::query()->where('status', 'draft')->count().' draft menunggu')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary'),
        ];
    }
}
