<footer class="mt-auto border-t border-[var(--color-border)] bg-[var(--color-bg-2)]">
    <div class="py-16">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div class="flex flex-col gap-5 md:col-span-1">
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
                           class="w-10 h-10 rounded-[var(--radius-sm)] bg-[var(--color-surface)] border border-[var(--color-border)] flex items-center justify-center text-lg hover:border-[var(--color-accent)] transition-colors">💬</a>
                        <a href="{{ config('site.instagram_url') }}" target="_blank" rel="nofollow noopener noreferrer" title="Instagram"
                           class="w-10 h-10 rounded-[var(--radius-sm)] bg-[var(--color-surface)] border border-[var(--color-border)] flex items-center justify-center text-lg hover:border-[var(--color-accent)] transition-colors">📸</a>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <h4 class="text-white text-sm font-bold tracking-[0.08em] uppercase pb-3 border-b border-[var(--color-border)]">Navigasi</h4>
                    <div class="flex flex-col gap-2 text-sm">
                        <a href="{{ route('home') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Beranda</a>
                        <a href="{{ route('armada.index') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Armada Kami</a>
                        <a href="{{ route('blog.index') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Blog / Artikel</a>
                        <a href="{{ route('home') }}#struktur-organisasi" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Struktur Organisasi</a>
                        <a href="{{ route('home') }}#galeri" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Galeri</a>
                        <a href="{{ route('home') }}#faq" class="text-[var(--color-text-muted)] hover:text-white transition-colors">FAQ</a>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <h4 class="text-white text-sm font-bold tracking-[0.08em] uppercase pb-3 border-b border-[var(--color-border)]">Layanan Sewa</h4>
                    <div class="flex flex-col gap-2 text-sm">
                        <a href="{{ route('sewa-hiace-surabaya') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Sewa Hiace Surabaya</a>
                        <a href="{{ route('sewa-alphard-surabaya') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Sewa Alphard Surabaya</a>
                        <a href="{{ url('/harga-sewa-mobil-surabaya-luar-kota-kelas-atas') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Sewa Luar Kota VIP</a>
                        <a href="{{ route('rute-ziarah-wali-5-di-jawa-timur-menyusuri-jejak-lima-wali') }}" class="text-[var(--color-text-muted)] hover:text-white transition-colors">Rute Ziarah Wali 5 Jatim</a>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <h4 class="text-white text-sm font-bold tracking-[0.08em] uppercase pb-3 border-b border-[var(--color-border)]">Kontak</h4>
                    <div class="flex flex-col gap-3 text-sm text-[var(--color-text-muted)]">
                        <a href="{{ \App\Support\WhatsApp::link() }}" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--color-accent)] transition-colors">📞 {{ config('site.whatsapp_number') }} (CS)</a>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Pak Fauzan, saya ingin menghubungi Anda melalui website', '6282231037255') }}" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--color-accent)] transition-colors">💬 6282231037255 (Direktur - Pak Fauzan)</a>
                        <a href="{{ config('site.instagram_url') }}" target="_blank" rel="nofollow noopener noreferrer" class="hover:text-[var(--color-accent)] transition-colors">📸 Instagram</a>
                        <span>🕐 Layanan Sepanjang Hari</span>
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
