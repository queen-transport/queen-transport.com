<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('site.brand') }}</title>
    <meta name="description" content="{{ $description ?? config('site.tagline') }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:title" content="{{ $title ?? config('site.brand') }}">
    <meta property="og:description" content="{{ $description ?? config('site.tagline') }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:site_name" content="{{ config('site.brand') }}">
    @isset($image)
        <meta property="og:image" content="{{ Storage::disk('public')->url($image) }}">
        @if ($imageDimensions = @getimagesize(Storage::disk('public')->path($image)))
            <meta property="og:image:width" content="{{ $imageDimensions[0] }}">
            <meta property="og:image:height" content="{{ $imageDimensions[1] }}">
        @endif
        <meta name="twitter:card" content="summary_large_image">
    @endisset
    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>
<body class="min-h-screen flex flex-col">

<a href="{{ \App\Support\WhatsApp::link() }}"
   class="wa-float fixed bottom-7 right-7 z-[9999] w-[60px] h-[60px] rounded-full bg-gradient-to-br from-[#25d366] to-[#128c7e] flex items-center justify-center text-[1.8rem] text-white shadow-[0_4px_20px_rgba(37,211,102,0.45)] transition-all no-underline hover:scale-[1.1] hover:-translate-y-[3px]"
   target="_blank" rel="noopener noreferrer" aria-label="Hubungi via WhatsApp">
    💬
</a>

<header class="fixed top-0 left-0 right-0 z-[999] py-4 bg-[var(--color-bg)]/90 backdrop-blur border-b border-[var(--color-border)]">
    <div class="max-w-[1200px] mx-auto px-6">
        <nav class="flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3 no-underline">
                <img src="{{ asset('apple-touch-icon.png') }}" alt="{{ config('site.brand') }}"
                     class="w-11 h-11 rounded-full border-2 border-[var(--color-primary)] shadow-[0_0_30px_rgba(124,58,237,0.4)] object-cover bg-[var(--color-surface)]">
                <div class="flex flex-col">
                    <span class="font-[family-name:var(--font-display)] text-[1rem] font-bold text-white leading-[1.1] tracking-[0.05em]">{{ config('site.brand') }}</span>
                    <span class="font-[family-name:var(--font-accent)] text-[0.6rem] text-[var(--color-accent)] tracking-[0.2em] uppercase">Premium Transport</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-6" id="navMenu">
                <a href="{{ route('home') }}" class="text-sm text-[var(--color-light)] hover:text-white">Beranda</a>
                <a href="{{ route('armada.index') }}" class="text-sm text-[var(--color-light)] hover:text-white">Armada</a>
                <a href="{{ route('home') }}#galeri" class="text-sm text-[var(--color-light)] hover:text-white">Galeri</a>
                <a href="{{ route('home') }}#faq" class="text-sm text-[var(--color-light)] hover:text-white">FAQ</a>
                <a href="{{ \App\Support\WhatsApp::link() }}"
                   class="px-5 py-2.5 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-sm no-underline"
                   target="_blank" rel="noopener noreferrer">
                    📞 Hubungi Kami
                </a>
            </div>

            <button class="group relative flex md:hidden flex-col items-center justify-center gap-[5px] w-11 h-11 shrink-0 rounded-[var(--radius-sm)] border border-[rgba(124,58,237,0.4)] bg-[rgba(124,58,237,0.08)]"
                    id="navToggle" aria-label="Toggle Menu" aria-expanded="false" aria-controls="navMenuMobile">
                <span class="block w-6 h-[2px] bg-[var(--color-accent)] rounded-[2px] transition-transform duration-200 group-aria-expanded:translate-y-[7px] group-aria-expanded:rotate-45"></span>
                <span class="block w-6 h-[2px] bg-[var(--color-accent)] rounded-[2px] transition-opacity duration-200 group-aria-expanded:opacity-0"></span>
                <span class="block w-6 h-[2px] bg-[var(--color-accent)] rounded-[2px] transition-transform duration-200 group-aria-expanded:-translate-y-[7px] group-aria-expanded:-rotate-45"></span>
            </button>
        </nav>

        <div class="hidden flex-col gap-1 mt-4 pb-2 md:hidden" id="navMenuMobile">
            <a href="{{ route('home') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Beranda</a>
            <a href="{{ route('armada.index') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Armada</a>
            <a href="{{ route('home') }}#galeri" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Galeri</a>
            <a href="{{ route('home') }}#faq" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">FAQ</a>
            <a href="{{ \App\Support\WhatsApp::link() }}"
               class="mt-2 px-5 py-3 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-sm text-center no-underline"
               target="_blank" rel="noopener noreferrer">
                📞 Hubungi Kami
            </a>
        </div>
    </div>
</header>

<main class="flex-1 pt-[80px]">
    {{ $slot }}
</main>

<footer class="mt-auto border-t border-[var(--color-border)] bg-[var(--color-bg-2)]">
    <div class="py-16">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-[2fr_1fr_1fr] gap-12 max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('apple-touch-icon.png') }}" alt="{{ config('site.brand') }}"
                             class="w-12 h-12 rounded-full border-2 border-[var(--color-primary)] object-cover bg-[var(--color-surface)] flex-shrink-0">
                        <div>
                            <div class="font-[family-name:var(--font-display)] text-white font-bold text-[1rem] tracking-[0.05em]">{{ config('site.brand') }}</div>
                            <div class="font-[family-name:var(--font-accent)] text-[var(--color-accent)] text-[0.6rem] tracking-[0.2em] uppercase">{{ config('site.brand') }}</div>
                        </div>
                    </div>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Solusi terpercaya untuk kebutuhan sewa mobil mewah. Armada premium, driver
                        profesional, dan layanan sepanjang hari siap melayani Anda.
                    </p>
                    <div class="flex gap-3">
                        <a href="{{ \App\Support\WhatsApp::link() }}" target="_blank" rel="noopener noreferrer" title="WhatsApp"
                           class="w-10 h-10 rounded-[var(--radius-sm)] bg-[var(--color-surface)] border border-[var(--color-border)] flex items-center justify-center text-lg">💬</a>
                        <a href="{{ config('site.instagram_url') }}" target="_blank" rel="noopener noreferrer" title="Instagram"
                           class="w-10 h-10 rounded-[var(--radius-sm)] bg-[var(--color-surface)] border border-[var(--color-border)] flex items-center justify-center text-lg">📸</a>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <h4 class="text-white text-sm font-bold tracking-[0.08em] uppercase pb-3 border-b border-[var(--color-border)]">Menu</h4>
                    <div class="flex flex-col gap-2 text-sm">
                        <a href="{{ route('home') }}" class="text-[var(--color-text-muted)] hover:text-white">Beranda</a>
                        <a href="{{ route('armada.index') }}" class="text-[var(--color-text-muted)] hover:text-white">Armada Kami</a>
                        <a href="{{ route('home') }}#galeri" class="text-[var(--color-text-muted)] hover:text-white">Galeri</a>
                        <a href="{{ route('home') }}#faq" class="text-[var(--color-text-muted)] hover:text-white">FAQ</a>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <h4 class="text-white text-sm font-bold tracking-[0.08em] uppercase pb-3 border-b border-[var(--color-border)]">Kontak</h4>
                    <div class="flex flex-col gap-3 text-sm text-[var(--color-text-muted)]">
                        <a href="{{ \App\Support\WhatsApp::link() }}" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--color-accent)]">📞 {{ config('site.whatsapp_number') }}</a>
                        <a href="{{ config('site.instagram_url') }}" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--color-accent)]">📸 Instagram</a>
                        <span>🕐 Siap Melayani Sepanjang Hari / 7 Hari</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[1200px] mx-auto px-6">
        <div class="py-5 border-t border-[var(--color-border)] text-center text-[var(--color-text-muted)] text-sm">
            <p>&copy; {{ date('Y') }} {{ config('site.brand') }}. All rights reserved. &mdash; {{ config('site.tagline') }}</p>
        </div>
    </div>
</footer>

</body>
</html>
