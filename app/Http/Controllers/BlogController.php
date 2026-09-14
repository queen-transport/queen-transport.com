<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->toString();

        $posts = Post::query()
            ->published()
            ->with('category')
            ->when($search !== '', fn ($query) => $query->where('title', 'like', '%'.$search.'%'))
            ->orderByDesc('published_at')
            ->paginate(10)
            ->withQueryString();

        return view('blog.index', ['posts' => $posts, 'search' => $search]);
    }

    public function show(string $year, string $month, string $slug): View
    {
        $post = Post::query()
            ->published()
            ->whereYear('published_at', $year)
            ->whereMonth('published_at', $month)
            ->where('slug', $slug)
            ->with(['category', 'tags'])
            ->firstOrFail();

        return $this->showPost($post);
    }

    public function showPlain(string $slug): View|RedirectResponse
    {
        $post = Post::query()
            ->published()
            ->where('slug', $slug)
            ->orderByDesc('published_at')
            ->first();

        if ($post) {
            return redirect()->to($post->url, 301);
        }

        if (view()->exists('onpage.' . $slug)) {
            return view('onpage.' . $slug);
        }

        abort(404);
    }

    private function showPost(Post $post): View
    {
        $previous = Post::published()->where('published_at', '<', $post->published_at)->orderByDesc('published_at')->first();
        $next = Post::published()->where('published_at', '>', $post->published_at)->orderBy('published_at')->first();
        $others = Post::published()->where('id', '!=', $post->id)->orderByDesc('published_at')->limit(5)->get();

        return view('blog.show', compact('post', 'previous', 'next', 'others'));
    }
}
