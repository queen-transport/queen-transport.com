@props(['code', 'icon' => '🚧', 'title', 'message'])

<x-layouts::public :title="$code . ' — ' . config('site.brand')">
    <section class="min-h-[70vh] flex items-center py-[100px]">
        <div class="max-w-[700px] mx-auto px-6 text-center">
            <div class="text-6xl mb-6">{{ $icon }}</div>

            <div class="font-[family-name:var(--font-display)] text-[5rem] leading-none font-bold mb-4 max-sm:text-[3.5rem]"
                 style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">
                {{ $code }}
            </div>

            <h1 class="text-white text-[1.75rem] font-bold mb-4 max-sm:text-[1.4rem]">{{ $title }}</h1>

            <p class="text-[var(--color-text-muted)] text-base leading-relaxed mb-10 max-w-[520px] mx-auto">
                {{ $message }}
            </p>

            <div class="flex items-center justify-center gap-4 flex-wrap">
                <a href="{{ route('home') }}"
                   class="px-6 py-3 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-sm no-underline">
                    🏠 Kembali ke Beranda
                </a>
                <a href="{{ \App\Support\WhatsApp::link() }}" target="_blank" rel="noopener noreferrer"
                   class="px-6 py-3 border border-[var(--color-border)] text-[var(--color-light)] rounded-[var(--radius-xl)] font-semibold text-sm no-underline hover:text-white">
                    💬 Hubungi Kami
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
