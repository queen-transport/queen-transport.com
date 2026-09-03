<x-layouts::public :title="'Armada Kami — ' . config('site.brand')">
    <section class="py-[100px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Pilihan Armada</span>
                <h1 class="text-white text-[2rem] font-bold">Armada <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Kami</span></h1>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                @foreach ($armadas as $armada)
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden transition-all hover:-translate-y-1 hover:border-[rgba(124,58,237,0.4)]">
                        <div class="relative h-48 overflow-hidden bg-[var(--color-surface)] flex items-center justify-center text-5xl">
                            @if ($armada->featured_image)
                                <img src="{{ Storage::disk('public')->url($armada->featured_image) }}" alt="{{ $armada->title }}" class="w-full h-full object-cover">
                            @else
                                <span>{{ $armada->car_icon ?: '🚗' }}</span>
                            @endif
                            @if ($armada->car_badge)
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-[rgba(124,58,237,0.8)] text-white text-xs font-semibold">{{ $armada->car_badge }}</span>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="text-white font-bold text-[0.95rem] mb-1">{{ $armada->title }}</div>
                            <div class="text-[var(--color-text-muted)] text-xs mb-2">{{ $armada->car_type }}</div>
                            @if ($armada->price)
                                <div class="text-[var(--color-accent)] font-bold text-sm mb-3">
                                    Rp {{ number_format($armada->price, 0, ',', '.') }} <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                                </div>
                            @endif
                            <div class="border-t border-[var(--color-border)] pt-3">
                                <a href="{{ route('armada.show', $armada) }}" class="text-[var(--color-accent)] text-sm font-medium no-underline">Lihat Detail →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($armadas->isEmpty())
                <p class="text-center text-[var(--color-text-muted)]">Belum ada armada yang tersedia.</p>
            @endif
        </div>
    </section>
</x-layouts::public>
