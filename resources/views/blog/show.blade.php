<x-layouts::public
    :title="$post->seo_title . ' — ' . config('site.brand')"
    :description="$post->seo_description"
    :image="$post->seo_image"
    :canonical="$post->url"
    og-type="article"
>
    <section class="py-16">
        <div class="max-w-[1200px] mx-auto px-6 max-md:px-2">
            <div class="grid grid-cols-[1fr_300px] gap-12 max-md:grid-cols-1">
                <main>
                    <article class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden">
                        @if ($post->featured_image)
                            <div class="h-[400px] overflow-hidden">
                                <img src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-contain">
                            </div>
                        @endif

                        <div class="p-8 max-md:p-5">
                            <div class="flex items-center gap-3 flex-wrap mb-5">
                                @if ($post->category)
                                    <span class="px-3 py-1 rounded-[var(--radius-sm)] bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] text-[var(--color-primary)] text-xs font-semibold">{{ $post->category->name }}</span>
                                @endif
                                @if ($post->permalink_type !== 'plain')
                                    <span class="text-[var(--color-text-muted)] text-xs">{{ $post->published_at->translatedFormat('d M Y') }}</span>
                                @endif
                            </div>

                            <h1 class="text-[clamp(1.5rem,3vw,2.2rem)] mb-6 leading-[1.3]">{{ $post->title }}</h1>

                            <div class="text-[var(--color-text-light)] leading-[1.9] [&>p]:mb-4 [&>h2]:mt-7 [&>h2]:mb-3 [&>h3]:mt-6 [&>h3]:mb-2 [&_a]:text-[var(--color-accent)] [&_img]:rounded-[var(--radius-md)] [&_img]:my-5 [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4 [&_blockquote]:border-l-4 [&_blockquote]:border-[var(--color-primary)] [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-[var(--color-text-muted)] [&_blockquote]:my-5 [&_table]:block [&_table]:w-full [&_table]:overflow-x-auto [&_table]:my-5 [&_table]:border-collapse [&_table]:text-sm [&_th]:border [&_th]:border-[var(--color-border)] [&_th]:bg-[var(--color-surface)] [&_th]:text-white [&_th]:p-3 [&_th]:text-left [&_th]:font-semibold [&_td]:border [&_td]:border-[var(--color-border)] [&_td]:p-3 [&_tr:nth-child(even)_td]:bg-[rgba(255,255,255,0.03)]">
                                {!! $post->content !!}
                            </div>

                            @if ($post->tags->isNotEmpty())
                                <div class="mt-8 pt-6 border-t border-[var(--color-border)]">
                                    <span class="text-xs text-[var(--color-text-muted)] mr-2">🏷️ Tags:</span>
                                    <span class="inline-flex flex-wrap gap-2">
                                        @foreach ($post->tags as $tag)
                                            <span class="px-2.5 py-1 rounded-[var(--radius-sm)] bg-[var(--color-surface)] text-[var(--color-text-muted)] text-xs">{{ $tag->name }}</span>
                                        @endforeach
                                    </span>
                                </div>
                            @endif

                            <div class="mt-8 p-6 bg-[rgba(124,58,237,0.08)] border border-[var(--color-border)] rounded-[var(--radius-md)] text-center">
                                <p class="mb-4 text-[0.95rem]">💬 Butuh informasi sewa mobil? Hubungi kami sekarang!</p>
                                <a href="{{ \App\Support\WhatsApp::link() }}"
                                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-gradient-to-br from-[#25d366] to-[#128c7e] text-white"
                                   target="_blank" rel="noopener noreferrer">
                                    Chat WhatsApp
                                </a>
                            </div>
                        </div>
                    </article>

                    <div class="flex gap-4 mt-8 flex-wrap">
                        @if ($previous)
                            <a href="{{ $previous->url }}" class="flex-1 min-w-[200px] bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-md)] p-4 px-5 text-sm no-underline">
                                <span class="block text-[0.7rem] uppercase tracking-[0.1em] text-[var(--color-text-muted)] mb-1.5">← Sebelumnya</span>
                                <span class="text-white">{{ $previous->title }}</span>
                            </a>
                        @endif
                        @if ($next)
                            <a href="{{ $next->url }}" class="flex-1 min-w-[200px] bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-md)] p-4 px-5 text-sm text-right no-underline">
                                <span class="block text-[0.7rem] uppercase tracking-[0.1em] text-[var(--color-text-muted)] mb-1.5">Selanjutnya →</span>
                                <span class="text-white">{{ $next->title }}</span>
                            </a>
                        @endif
                    </div>
                </main>

                <aside class="flex flex-col gap-6">
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6">
                        <h4 class="text-white text-sm mb-4 pb-3 border-b border-[var(--color-border)] font-bold">Kontak Kami</h4>
                        <div class="flex flex-col gap-3 text-sm text-[var(--color-text-muted)]">
                            <a href="{{ \App\Support\WhatsApp::link() }}" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--color-accent)]">📞 WhatsApp</a>
                            <a href="{{ config('site.instagram_url') }}" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--color-accent)]">📸 Instagram</a>
                        </div>
                    </div>

                    @if ($others->isNotEmpty())
                        <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6">
                            <h4 class="text-white text-sm mb-4 pb-3 border-b border-[var(--color-border)] font-bold">Artikel Lainnya</h4>
                            <div class="flex flex-col gap-4">
                                @foreach ($others as $other)
                                    <div class="flex items-center gap-3">
                                        <div class="w-[60px] h-[60px] rounded-[var(--radius-sm)] overflow-hidden flex-shrink-0 bg-[var(--color-surface)] flex items-center justify-center text-xl">
                                            @if ($other->featured_image)
                                                <img src="{{ Storage::disk('public')->url($other->featured_image) }}" alt="{{ $other->title }}" class="w-full h-full object-cover">
                                            @else
                                                🚗
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ $other->url }}" class="text-white text-xs font-medium leading-tight hover:text-[var(--color-accent)] no-underline line-clamp-2">{{ $other->title }}</a>
                                            <span class="text-[var(--color-text-muted)] text-[0.7rem] block mt-1">{{ $other->published_at->translatedFormat('d M Y') }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>
</x-layouts::public>
