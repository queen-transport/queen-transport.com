<?php

namespace App\Filament\Widgets;

use App\Models\Armada;
use App\Models\Pelanggan;
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

            Stat::make('Testimoni Pelanggan', Pelanggan::query()->where('is_published', true)->count())
                ->description('Rata-rata bintang: '.number_format((float) (Pelanggan::query()->where('is_published', true)->avg('bintang') ?? 0), 1))
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
        ];
    }
}
