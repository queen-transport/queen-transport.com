<header class="sticky top-0 z-[999] py-4 bg-[var(--color-bg)]/95 backdrop-blur-md border-b border-[var(--color-border)] transition-colors duration-200">
    <div class="max-w-[1200px] mx-auto px-6">
        <nav class="flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="group flex items-center gap-3 no-underline">
                <img src="{{ asset('apple-touch-icon.png') }}" alt="{{ config('site.brand') }}"
                     class="w-11 h-11 rounded-full border border-purple-200/80 dark:border-[var(--color-primary)] shadow-sm dark:shadow-[0_0_25px_rgba(124,58,237,0.4)] object-cover bg-[var(--color-surface)] transition-transform duration-200 group-hover:scale-105">
                <div class="flex flex-col">
                    <span class="font-[family-name:var(--font-display)] text-[1rem] font-bold text-zinc-900 dark:text-white leading-[1.1] tracking-[0.05em]">{{ config('site.brand') }}</span>
                    <span class="font-[family-name:var(--font-accent)] text-[0.6rem] text-zinc-500 dark:text-[var(--color-accent)] tracking-[0.2em] uppercase font-semibold">Premium Transport</span>
                </div>
            </a>

            <div class="hidden md:flex items-center gap-6" id="navMenu">
                <a href="{{ route('armada.index') }}" class="text-sm text-zinc-600 dark:text-[var(--color-light)] hover:text-zinc-900 dark:hover:text-white transition-colors {{ request()->routeIs('armada.*') ? 'text-purple-600 dark:text-white font-semibold' : '' }}">Armada</a>

                <div class="relative group">
                    <button class="flex items-center gap-1.5 text-sm text-zinc-600 dark:text-[var(--color-light)] hover:text-zinc-900 dark:hover:text-white py-2 focus:outline-none transition-colors">
                        <span>Layanan</span>
                        <svg class="w-3.5 h-3.5 opacity-70 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-0 top-full hidden group-hover:flex flex-col w-64 py-2 bg-white dark:bg-[var(--color-bg-2)] border border-purple-500/15 dark:border-[var(--color-border)] rounded-xl shadow-xl dark:shadow-2xl z-50">
                        <a href="{{ route('sewa-hiace-surabaya') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Hiace Surabaya</a>
                        <a href="{{ route('sewa-alphard-surabaya') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Alphard Surabaya</a>
                        <a href="{{ route('sewa-mobil-mewah-surabaya') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Mobil Mewah Surabaya</a>
                        <a href="{{ route('sewa-mobil-expander-ultimate') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Xpander Ultimate</a>
                        <a href="{{ url('/harga-sewa-mobil-surabaya-luar-kota-kelas-atas') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Mobil Luar Kota VIP</a>
                        <a href="{{ route('rute-ziarah-wali-5-di-jawa-timur-menyusuri-jejak-lima-wali') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Ziarah Wali 5 Jatim</a>
                        <a href="{{ route('air-mancur-menari-surabaya-perjalanan-mewah') }}" class="px-4 py-2.5 text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.15)] transition-colors">Air Mancur Menari VIP</a>
                    </div>
                </div>

                <a href="{{ route('blog.index') }}" class="text-sm text-zinc-600 dark:text-[var(--color-light)] hover:text-zinc-900 dark:hover:text-white transition-colors {{ request()->routeIs('blog.*') ? 'text-purple-600 dark:text-white font-semibold' : '' }}">Blog</a>
                <a href="{{ route('home') }}#faq" class="text-sm text-zinc-600 dark:text-[var(--color-light)] hover:text-zinc-900 dark:hover:text-white transition-colors">FAQ</a>
                <a href="{{ route('kontak') }}" class="text-sm text-zinc-600 dark:text-[var(--color-light)] hover:text-zinc-900 dark:hover:text-white transition-colors {{ request()->routeIs('kontak') ? 'text-purple-600 dark:text-white font-semibold' : '' }}">Kontak</a>
                <a href="{{ route('dashboard') }}" class="text-sm text-[var(--color-accent)] hover:text-purple-600 dark:hover:text-white transition-colors font-medium {{ request()->routeIs('dashboard') ? 'font-bold' : '' }}">
                    📊 Dashboard
                </a>

                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 bg-gradient-to-r from-purple-600/20 to-indigo-600/20 dark:from-purple-600/30 dark:to-indigo-600/30 border border-[var(--color-primary)] text-purple-700 dark:text-white hover:bg-purple-600/30 dark:hover:bg-purple-600/50 rounded-[var(--radius-xl)] font-semibold text-sm no-underline transition shadow-xs">
                        👤 {{ \Illuminate\Support\Str::limit(auth()->user()->name, 14) }}
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm text-zinc-600 dark:text-[var(--color-light)] hover:text-zinc-900 dark:hover:text-white transition-colors font-medium">
                        Masuk / Daftar
                    </a>
                @endauth
            </div>

            <div class="flex items-center md:hidden">
                <button class="group relative flex flex-col items-center justify-center gap-[5px] w-11 h-11 shrink-0 rounded-[var(--radius-sm)] border border-purple-500/30 dark:border-[rgba(124,58,237,0.4)] bg-purple-50 dark:bg-[rgba(124,58,237,0.08)]"
                        id="navToggle" aria-label="Toggle Menu" aria-expanded="false" aria-controls="navMenuMobile">
                    <span class="block w-6 h-[2px] bg-[var(--color-accent)] rounded-[2px] transition-transform duration-200 group-aria-expanded:translate-y-[7px] group-aria-expanded:rotate-45"></span>
                    <span class="block w-6 h-[2px] bg-[var(--color-accent)] rounded-[2px] transition-opacity duration-200 group-aria-expanded:opacity-0"></span>
                    <span class="block w-6 h-[2px] bg-[var(--color-accent)] rounded-[2px] transition-transform duration-200 group-aria-expanded:-translate-y-[7px] group-aria-expanded:-rotate-45"></span>
                </button>
            </div>
        </nav>

        <div class="hidden flex-col gap-1 mt-4 pb-2 md:hidden border-t border-purple-500/15 dark:border-transparent pt-3" id="navMenuMobile">
            <a href="{{ route('armada.index') }}" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-zinc-950 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)]">Armada</a>
            <a href="{{ route('blog.index') }}" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-zinc-950 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)]">Blog / Artikel</a>
            <a href="{{ route('home') }}#faq" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-zinc-950 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)]">FAQ</a>
            <a href="{{ route('kontak') }}" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-zinc-950 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)] {{ request()->routeIs('kontak') ? 'text-purple-600 dark:text-white font-semibold bg-purple-50 dark:bg-[rgba(124,58,237,0.15)]' : '' }}">Kontak</a>
            <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-[var(--color-accent)] font-semibold hover:text-purple-600 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)] flex items-center gap-2">
                <span>📊</span> <span>Dashboard Pengguna</span>
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-zinc-700 dark:text-zinc-300 font-medium hover:text-zinc-950 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)]">
                    👤 Profil: {{ auth()->user()->name }}
                </a>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2.5 rounded-[var(--radius-sm)] text-sm text-zinc-700 dark:text-[var(--color-light)] hover:text-zinc-950 dark:hover:text-white hover:bg-purple-50 dark:hover:bg-[rgba(124,58,237,0.1)]">
                    🔑 Masuk / Daftar
                </a>
            @endauth
            <a href="{{ route('kontak') }}"
               class="mt-2 px-5 py-3 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-sm text-center no-underline shadow-sm">
                📞 Hubungi Kami
            </a>
        </div>
    </div>
</header>
