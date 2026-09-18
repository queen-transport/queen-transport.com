<header class="sticky top-0 z-[999] py-4 bg-[var(--color-bg)]/95 backdrop-blur-md border-b border-[var(--color-border)]">
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

            <div class="hidden md:flex items-center gap-7" id="navMenu">
                <a href="{{ route('armada.index') }}" class="text-sm text-[var(--color-light)] hover:text-white transition-colors">Armada</a>

                <div class="relative group">
                    <button class="flex items-center gap-1.5 text-sm text-[var(--color-light)] hover:text-white py-2 focus:outline-none transition-colors">
                        <span>Layanan</span>
                        <svg class="w-3.5 h-3.5 opacity-70 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-0 top-full hidden group-hover:flex flex-col w-64 py-2 bg-[var(--color-bg-2)] border border-[var(--color-border)] rounded-xl shadow-2xl z-50">
                        <a href="{{ route('sewa-hiace-surabaya') }}" class="px-4 py-2.5 text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Hiace Surabaya</a>
                        <a href="{{ route('sewa-alphard-surabaya') }}" class="px-4 py-2.5 text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Alphard Surabaya</a>
                        <a href="{{ url('/harga-sewa-mobil-surabaya-luar-kota-kelas-atas') }}" class="px-4 py-2.5 text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.15)] transition-colors">Sewa Mobil Luar Kota VIP</a>
                        <a href="{{ route('rute-ziarah-wali-5-di-jawa-timur-menyusuri-jejak-lima-wali') }}" class="px-4 py-2.5 text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.15)] transition-colors">Ziarah Wali 5 Jatim</a>
                        <a href="{{ route('air-mancur-menari-surabaya-perjalanan-mewah') }}" class="px-4 py-2.5 text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.15)] transition-colors">Air Mancur Menari VIP</a>
                    </div>
                </div>

                <a href="{{ route('blog.index') }}" class="text-sm text-[var(--color-light)] hover:text-white transition-colors">Blog</a>
                <a href="{{ route('home') }}#faq" class="text-sm text-[var(--color-light)] hover:text-white transition-colors">FAQ</a>

                <a href="{{ \App\Support\WhatsApp::link() }}"
                   class="px-5 py-2.5 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-sm no-underline hover:opacity-95 transition-opacity"
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
            <a href="{{ route('armada.index') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Armada</a>
            <a href="{{ route('sewa-hiace-surabaya') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Sewa Hiace Surabaya</a>
            <a href="{{ route('sewa-alphard-surabaya') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Sewa Alphard Surabaya</a>
            <a href="{{ url('/harga-sewa-mobil-surabaya-luar-kota-kelas-atas') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Sewa Luar Kota VIP</a>
            <a href="{{ route('rute-ziarah-wali-5-di-jawa-timur-menyusuri-jejak-lima-wali') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Ziarah Wali 5 Jatim</a>
            <a href="{{ route('air-mancur-menari-surabaya-perjalanan-mewah') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Air Mancur Menari VIP</a>
            <a href="{{ route('blog.index') }}" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">Blog / Artikel</a>
            <a href="{{ route('home') }}#faq" class="px-4 py-3 rounded-[var(--radius-sm)] text-sm text-[var(--color-light)] hover:text-white hover:bg-[rgba(124,58,237,0.1)]">FAQ</a>
            <a href="{{ \App\Support\WhatsApp::link() }}"
               class="mt-2 px-5 py-3 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-sm text-center no-underline"
               target="_blank" rel="noopener noreferrer">
                📞 Hubungi Kami
            </a>
        </div>
    </div>
</header>
