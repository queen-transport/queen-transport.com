@php
    $thumbs = collect([$armada->featured_image, ...($armada->gallery ?? [])])
        ->filter()
        ->unique()
        ->values();
    $ctaText = $armada->cta_text ?: 'Tanya Harga via WhatsApp';
    $ctaUrl = $armada->cta_url ?: \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga sewa '.$armada->title);
@endphp
<x-layouts::public
    :title="$armada->seo_title"
    :description="$armada->seo_description"
    :image="$armada->seo_image"
    :canonical="$armada->url"
>
    <section class="py-[100px]">
        <div class="max-w-[1200px] mx-auto px-6">

            @if ($thumbs->isNotEmpty())
                <div class="mb-12">
                    <div class="text-center mb-6">
                        <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Lihat Lebih Dekat</span>
                        <h2 class="text-white text-[1.8rem] font-bold">Galeri Foto</h2>
                    </div>

                    <div class="relative rounded-[var(--radius-lg)] overflow-hidden bg-[var(--color-surface)] mb-4 flex items-center justify-center border border-[var(--color-border)]" style="max-height:520px; min-height:280px;">
                        <img id="armada-viewer-img"
                             src="{{ Storage::disk('public')->url($thumbs->first()) }}"
                             alt="{{ $armada->title }}"
                             class="w-full object-contain transition-opacity duration-150"
                             style="max-height:520px;">
                        @if ($thumbs->count() > 1)
                            <button class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(10,12,20,0.7)] border border-[var(--color-border)] text-white text-xl flex items-center justify-center cursor-pointer" id="armadaPrev" aria-label="Sebelumnya">&#8249;</button>
                            <button class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(10,12,20,0.7)] border border-[var(--color-border)] text-white text-xl flex items-center justify-center cursor-pointer" id="armadaNext" aria-label="Berikutnya">&#8250;</button>
                            <div class="absolute bottom-4 right-4 bg-[rgba(0,0,0,0.6)] text-white text-xs px-3 py-1 rounded-full" id="armadaCounter">1 / {{ $thumbs->count() }}</div>
                        @endif
                    </div>

                    @if ($thumbs->count() > 1)
                        <div class="grid grid-cols-6 gap-2 max-md:grid-cols-4">
                            @foreach ($thumbs as $i => $path)
                                <div class="armada-gallery-item relative rounded-[var(--radius-sm)] overflow-hidden border-2 border-[var(--color-border)] cursor-pointer aspect-square {{ $i === 0 ? 'border-[var(--color-accent)]' : '' }}"
                                     data-index="{{ $i }}"
                                     data-full="{{ Storage::disk('public')->url($path) }}">
                                    <img src="{{ Storage::disk('public')->url($path) }}" alt="{{ $armada->title }}" loading="lazy" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            @if ($armada->video)
                <div class="mb-12">
                    <div class="text-center mb-6">
                        <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Tonton Langsung</span>
                        <h2 class="text-white text-[1.8rem] font-bold">Video Armada</h2>
                    </div>
                    <div class="rounded-[var(--radius-xl)] overflow-hidden bg-[var(--color-surface)] border border-[var(--color-border)]">
                        <video controls preload="metadata" playsinline class="w-full h-full object-cover">
                            <source src="{{ Storage::disk('public')->url($armada->video) }}">
                            Browser Anda tidak mendukung video.
                        </video>
                    </div>
                </div>
            @endif

            <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-10 max-md:p-6">
                <div class="mb-6">
                    @if ($armada->car_badge)
                        <span class="inline-block px-4 py-1.5 rounded-full bg-[rgba(124,58,237,0.2)] border border-[rgba(124,58,237,0.4)] text-[var(--color-primary)] text-xs uppercase mb-4">{{ $armada->car_badge }}</span>
                    @endif
                    <h1 class="text-white text-[2rem] font-bold mb-2">{{ $armada->title }}</h1>
                    @if ($armada->car_type)
                        <p class="text-[var(--color-text-muted)] text-sm">{{ $armada->car_icon }} {{ $armada->car_type }}</p>
                    @endif
                    @if ($armada->price)
                        <div class="text-white font-bold text-2xl mt-3 flex items-baseline gap-1">
                            <span class="text-sm font-normal text-[var(--color-accent)]">Rp</span>
                            <span>{{ number_format($armada->price, 0, ',', '.') }}</span>
                            <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                        </div>
                    @endif
                </div>

                <div class="my-6 border-t border-b border-[var(--color-border)] py-6">
                    @if (!empty($armada->features))
                        <div class="mb-6">
                            <h3 class="text-white text-sm mb-3 font-bold">Fitur Unggulan</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($armada->features as $feature)
                                    <span class="px-3 py-1.5 rounded-[var(--radius-sm)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs">{{ $feature }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($armada->description)
                        <div class="text-[var(--color-text-light)] leading-relaxed">
                            {!! $armada->description !!}
                        </div>
                    @endif
                </div>

                <div class="flex gap-4 flex-wrap">
                    <a href="{{ $ctaUrl }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-gradient-to-br from-[#25d366] to-[#128c7e] text-white"
                       target="_blank" rel="noopener noreferrer">
                        💬 {{ $ctaText }}
                    </a>
                    <a href="{{ route('dashboard', ['review_armada' => $armada->id]) }}"
                       class="inline-flex items-center gap-2 px-6 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border border-amber-500/40 bg-amber-500/10 text-amber-300 hover:bg-amber-500/20 transition">
                        ⭐ Beri Ulasan
                    </a>
                    <a href="{{ route('armada.index') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)]">
                        ← Lihat Armada Lain
                    </a>
                </div>
            </div>

            {{-- ULASAN PELANGGAN UNTUK ARMADA INI --}}
            <div class="mt-[72px] pt-[48px] border-t border-[var(--color-border)]">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div>
                        <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-2 block">Pengalaman Nyata</span>
                        <h2 class="text-white text-[1.8rem] font-bold flex items-center gap-3">
                            <span>⭐</span> Ulasan Pelanggan
                            @if ($armada->approvedReviews->isNotEmpty())
                                @php
                                    $avgRating = round($armada->approvedReviews->avg('rating'), 1);
                                @endphp
                                <span class="text-sm font-semibold px-3 py-1 rounded-full bg-amber-500/15 text-amber-400 border border-amber-500/30">
                                    ★ {{ number_format($avgRating, 1) }} / 5.0 ({{ $armada->approvedReviews->count() }} ulasan)
                                </span>
                            @endif
                        </h2>
                    </div>

                    <a href="{{ route('dashboard', ['review_armada' => $armada->id]) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[image:var(--gradient-btn)] text-white text-sm font-semibold shadow-[0_0_15px_rgba(124,58,237,0.4)] transition no-underline self-start sm:self-auto hover:opacity-95">
                        ✍️ Tulis Ulasan untuk {{ $armada->title }}
                    </a>
                </div>

                @if ($armada->approvedReviews->isEmpty())
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 text-center max-w-lg mx-auto">
                        <span class="text-3xl block mb-2">🚗✨</span>
                        <p class="text-white font-semibold">Belum ada ulasan untuk {{ $armada->title }}</p>
                        <p class="text-[var(--color-text-muted)] text-sm mt-1 mb-4">Pernah menyewa kendaraan ini? Bagikan pengalaman Anda kepada pelanggan lain.</p>
                        <a href="{{ route('dashboard', ['review_armada' => $armada->id]) }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-purple-600 hover:bg-purple-500 text-white text-xs font-semibold no-underline transition">
                            Tulis Ulasan Sekarang
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-2 gap-6 max-md:grid-cols-1">
                        @foreach ($armada->approvedReviews as $rev)
                            <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 flex flex-col justify-between gap-4">
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between gap-2">
                                        <div class="flex items-center gap-3">
                                            @if ($rev->user?->avatar)
                                                <img src="{{ $rev->user->avatar }}" alt="{{ $rev->user->name }}" class="w-10 h-10 rounded-full object-cover border border-purple-500/40">
                                            @else
                                                <div class="w-10 h-10 rounded-full bg-purple-900/50 border border-purple-500/30 text-purple-200 text-xs font-bold flex items-center justify-center">
                                                    {{ $rev->user ? $rev->user->initials() : 'P' }}
                                                </div>
                                            @endif
                                            <div>
                                                <h4 class="text-white font-semibold text-sm leading-tight">{{ $rev->user?->name ?? 'Pelanggan Queen' }}</h4>
                                                <span class="text-[0.7rem] text-[var(--color-text-muted)]">{{ $rev->created_at?->translatedFormat('d M Y') }}</span>
                                            </div>
                                        </div>

                                        <div class="flex text-amber-400 text-sm">
                                            @for ($s = 1; $s <= 5; $s++)
                                                <span>{{ $s <= $rev->rating ? '★' : '☆' }}</span>
                                            @endfor
                                        </div>
                                    </div>

                                    @if ($rev->title)
                                        <h5 class="text-white font-medium text-sm">{{ $rev->title }}</h5>
                                    @endif

                                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed">{{ $rev->comment }}</p>

                                    @php
                                        $revPhotos = $rev->getMedia('photos');
                                        $revVideos = $rev->getMedia('videos');
                                    @endphp

                                    @if ($revPhotos->isNotEmpty())
                                        <div class="flex flex-wrap gap-2 pt-2">
                                            @foreach ($revPhotos as $p)
                                                <a href="{{ $p->getUrl() }}" target="_blank" class="w-16 h-16 rounded-lg overflow-hidden border border-[var(--color-border)] hover:border-purple-400 transition block">
                                                    <img src="{{ $p->getUrl() }}" alt="Foto ulasan" class="w-full h-full object-cover">
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if ($revVideos->isNotEmpty())
                                        <div class="pt-2">
                                            @foreach ($revVideos as $v)
                                                <div class="w-full max-w-xs rounded-lg overflow-hidden border border-[var(--color-border)] bg-black">
                                                    <video src="{{ $v->getUrl() }}" controls class="w-full h-32 object-contain"></video>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            @if ($related->isNotEmpty())
                <div class="mt-[72px]">
                    <div class="text-center mb-8">
                        <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Pilihan Lainnya</span>
                        <h2 class="text-white text-[1.8rem] font-bold">Armada Lainnya</h2>
                    </div>
                    <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                        @foreach ($related as $r)
                            <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden">
                                <div class="relative h-48 overflow-hidden bg-[var(--color-surface)] flex items-center justify-center text-5xl">
                                    @if ($r->featured_image)
                                        <img src="{{ Storage::disk('public')->url($r->featured_image) }}" alt="{{ $r->title }}" class="w-full h-full object-cover">
                                    @else
                                        <span>{{ $r->car_icon ?: '🚗' }}</span>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <div class="text-white font-bold text-[0.95rem] mb-1">{{ $r->title }}</div>
                                    <div class="text-[var(--color-text-muted)] text-xs mb-4">{{ $r->car_type }}</div>
                                    <div class="border-t border-[var(--color-border)] pt-3">
                                        <a href="{{ route('armada.show', $r) }}" class="text-[var(--color-accent)] text-sm font-medium no-underline">Lihat Detail →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        (function () {
            var thumbs = document.querySelectorAll('.armada-gallery-item');
            var viewer = document.getElementById('armada-viewer-img');
            var counter = document.getElementById('armadaCounter');
            var prevBtn = document.getElementById('armadaPrev');
            var nextBtn = document.getElementById('armadaNext');
            var current = 0;
            var total = thumbs.length;

            function goTo(idx) {
                if (!total) return;
                idx = (idx + total) % total;
                current = idx;
                viewer.style.opacity = '0';
                setTimeout(function () {
                    viewer.src = thumbs[idx].dataset.full;
                    viewer.style.opacity = '1';
                }, 150);
                if (counter) counter.textContent = (idx + 1) + ' / ' + total;
            }

            thumbs.forEach(function (item, i) {
                item.addEventListener('click', function () { goTo(i); });
            });
            if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
            if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });
        })();
    </script>
</x-layouts::public>
