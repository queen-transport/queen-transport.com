<x-layouts::public :title="'Blog — ' . config('site.brand')">
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-[1fr_300px] gap-12 max-md:grid-cols-1">
                <main>
                    <div class="mb-8">
                        <h1 class="text-white text-[1.8rem] font-bold mb-4">Blog</h1>
                        <form method="GET" action="{{ route('blog.index') }}" class="flex gap-2">
                            <input type="text" name="q" value="{{ $search }}" placeholder="Cari artikel..."
                                   class="flex-1 bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-sm)] px-4 py-2 text-sm text-white placeholder:text-[var(--color-text-muted)] focus:outline-none focus:border-[var(--color-primary)]">
                            <button type="submit" class="px-5 py-2 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-sm)] text-sm font-semibold">Cari</button>
                        </form>
                    </div>

                    @if ($posts->isNotEmpty())
                        <div class="grid grid-cols-2 gap-8 max-md:grid-cols-1">
                            @foreach ($posts as $post)
                                <article class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden transition-all hover:-translate-y-1">
                                    <div class="h-48 overflow-hidden relative">
                                        @if ($post->featured_image)
                                            <img src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="flex items-center justify-center h-full text-5xl bg-[var(--color-surface)]">🚗</span>
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        @if ($post->category)
                                            <span class="inline-block mb-3 px-3 py-1 rounded-[var(--radius-sm)] bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] text-[var(--color-primary)] text-xs font-semibold">{{ $post->category->name }}</span>
                                        @endif
                                        <h2 class="text-white mb-3 font-bold text-[1rem]">
                                            <a href="{{ $post->url }}" class="text-white hover:text-[var(--color-accent)] no-underline">{{ $post->title }}</a>
                                        </h2>
                                        <p class="text-[var(--color-text-muted)] text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                                        <a href="{{ $post->url }}" class="text-[var(--color-accent)] text-sm font-medium no-underline">Baca Selengkapnya →</a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                        <div class="mt-8 flex justify-center">
                            {{ $posts->links('pagination.queen-transport') }}
                        </div>
                    @else
                        <p class="text-center text-[var(--color-text-muted)] py-16">Tidak ada artikel ditemukan.</p>
                    @endif
                </main>

                <aside class="flex flex-col gap-6">
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 text-center">
                        <p class="text-[2rem] mb-2">💬</p>
                        <h4 class="text-white mb-2 text-[1rem] font-bold">Sewa Mobil Mewah?</h4>
                        <a href="{{ \App\Support\WhatsApp::link() }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[32px] font-semibold text-[0.88rem] no-underline bg-gradient-to-br from-[#25d366] to-[#128c7e] text-white"
                           target="_blank" rel="noopener noreferrer">
                            Chat WhatsApp
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</x-layouts::public>
