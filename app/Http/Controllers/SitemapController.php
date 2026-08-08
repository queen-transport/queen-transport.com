<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Post;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $armadas = Armada::query()
            ->where('is_published', true)
            ->get();

        $posts = Post::published()->get();

        $xml = view('sitemap', [
            'armadas' => $armadas,
            'posts' => $posts,
        ])->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
