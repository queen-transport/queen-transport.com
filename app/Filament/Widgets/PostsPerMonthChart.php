<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;

class PostsPerMonthChart extends ChartWidget
{
    protected ?string $heading = 'Artikel Dipublikasikan (12 Bulan Terakhir)';

    protected function getData(): array
    {
        $months = collect(range(11, 0))->map(fn (int $i) => now()->subMonths($i)->startOfMonth());

        $counts = Post::query()
            ->published()
            ->where('published_at', '>=', now()->subMonths(11)->startOfMonth())
            ->get()
            ->groupBy(fn (Post $post) => $post->published_at->format('Y-m'));

        return [
            'datasets' => [
                [
                    'label' => 'Artikel',
                    'data' => $months->map(fn ($month) => $counts->get($month->format('Y-m'), collect())->count())->all(),
                    'fill' => 'start',
                ],
            ],
            'labels' => $months->map(fn ($month) => $month->translatedFormat('M Y'))->all(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
