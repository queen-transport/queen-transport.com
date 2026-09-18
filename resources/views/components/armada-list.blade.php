@props([
    'armadas' => null,
    'keyword' => null,
    'limit' => null,
    'cols' => 3,
    'title' => 'Pilihan Armada Rental Mobil Mewah',
    'subtitle' => 'Layanan Sewa Mobil Terpercaya',
    'description' => 'Setiap unit dipelihara secara presisi, rutin disterilisasi, dan dikemudikan oleh driver profesional berpengalaman.',
    'waText' => null,
    'class' => '',
])

@php
    if (is_null($armadas)) {
        $armadaService = app(\App\Services\ArmadaService::class);
        if ($keyword) {
            $armadas = $armadaService->getByKeyword($keyword);
        } else {
            $armadas = $armadaService->getPublished();
        }
    }

    if ($limit && $armadas instanceof \Illuminate\Support\Collection) {
        $armadas = $armadas->take((int) $limit);
    }

    $gridColsClass = match ((int) $cols) {
        2 => 'grid-cols-2 max-md:grid-cols-1',
        4 => 'grid-cols-4 max-lg:grid-cols-2 max-sm:grid-cols-1',
        default => 'grid-cols-3 max-lg:grid-cols-1',
    };
@endphp

<section class="py-20 bg-[var(--color-bg-2)] border-t border-[var(--color-border)] {{ $class }}">
    <div class="max-w-[1200px] mx-auto px-6">
        @if ($title || $subtitle)
            <div class="text-center max-w-[760px] mx-auto mb-16">
                @if ($subtitle)
                    <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold block mb-2">{{ $subtitle }}</span>
                @endif
                @if ($title)
                    <h2 class="text-white text-3xl font-bold">{!! $title !!}</h2>
                @endif
                @if ($description)
                    <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                        {{ $description }}
                    </p>
                @endif
            </div>
        @endif

        <div class="grid {{ $gridColsClass }} gap-8">
            @foreach ($armadas as $armada)
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg hover:-translate-y-1">
                    <div>
                        @if ($armada->featured_image)
                            <img src="{{ $armada->featured_image }}" alt="{{ $armada->title }}" class="w-full h-48 object-cover rounded-[var(--radius-md)] mb-4">
                        @else
                            <div class="w-full h-48 bg-[var(--color-bg)] rounded-[var(--radius-md)] mb-4 flex items-center justify-center text-4xl">🚘</div>
                        @endif
                        <div class="flex items-center justify-between mb-2">
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold uppercase tracking-wider">{{ $armada->car_badge ?: 'Luxury Class' }}</span>
                            <span class="text-xs text-[var(--color-text-muted)]">{{ $armada->car_type ?? '6-7 Seat' }}</span>
                        </div>
                        <h3 class="text-white text-xl font-bold mb-2">{{ $armada->title }}</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                            {{ Str::limit(strip_tags($armada->description), 110) }}
                        </p>
                        @if (!empty($armada->features))
                            <ul class="flex flex-col gap-2 text-xs text-[var(--color-text-light)] mb-4">
                                @foreach (array_slice($armada->features, 0, 4) as $feature)
                                    <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> {{ $feature }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($armada->formatted_price)
                            <div class="text-lg font-bold text-white mb-4">
                                {{ $armada->formatted_price }} <span class="text-xs text-[var(--color-text-muted)] font-normal">/ hari</span>
                            </div>
                        @endif
                    </div>
                    @php
                        $msg = 'Halo '.config('site.brand').', saya ingin pesan armada '.$armada->title.($waText ? ' '.$waText : '');
                    @endphp
                    <a href="{{ \App\Support\WhatsApp::link($msg) }}"
                       class="w-full py-3 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-sm text-center no-underline hover:opacity-90 transition-opacity block"
                       target="_blank" rel="noopener noreferrer">
                        💬 Sewa {{ $armada->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
