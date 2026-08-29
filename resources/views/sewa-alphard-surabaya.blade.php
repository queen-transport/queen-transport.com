<div>
    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Alphard Surabaya #1 VIP &amp; Luxury
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Alphard <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Alphard Gen 2 &bull; Transformer Gen 3 &bull; All New Hybrid VIP
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan sewa mobil Alphard paling mewah dan terpercaya di Surabaya. Nikmati perjalanan eksekutif, dinas kantor, penjemputan tamu VIP, hingga acara pernikahan dengan driver profesional berpengalaman.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & pesan Sewa Alphard di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Alphard Sekarang
                        </a>
                        <a href="#tipe-alphard"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Tipe &amp; Harga
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card on Hero right side --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🚘</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Unit Ready VIP</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Kenapa Pilih Alphard {{ config('site.brand') }}?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Simbol kemewahan dan kenyamanan perjalanan berkelas tinggi di Surabaya.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">6 &ndash; 7</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kapasitas Kursi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Include Driver</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">24/7</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Respon Cepat</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Snack &amp; Air Mineral</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HIGHLIGHT FEATURES BANNER --}}
    <section class="py-8 border-y border-[var(--color-border)] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💺</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Executive Captain Seat</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Jok kulit &amp; legrest empuk</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">☀️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Dual Sunroof</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Kabin terang &amp; berkelas</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Standar VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Rapi, sopan &amp; profesional</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🍷</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Senyap &amp; Wangi</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Steril &amp; nyaman sepanjang hari</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRICING & TYPES SECTION --}}
    <section class="py-[90px]" id="tipe-alphard">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pilihan Unit &amp; Harga</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Alphard Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Penawaran harga terbaik untuk armada luxury MPV Toyota Alphard di Surabaya. Sudah termasuk pengemudi profesional.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($alphardPrices as $price)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:border-[var(--color-accent)] hover:shadow-[0_10px_30px_rgba(124,58,237,0.25)]">
                        @if ($price['badge'])
                            <span class="absolute -top-3.5 right-6 px-4 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold shadow-md">
                                {{ $price['badge'] }}
                            </span>
                        @endif

                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-white text-xl font-bold">{{ $price['name'] }}</h3>
                                    <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">
                                        {{ $price['seat'] }}
                                    </span>
                                </div>
                            </div>

                            <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                                {{ $price['desc'] }}
                            </p>

                            <div class="mb-6 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-text-muted)] text-xs mb-1">Mulai dari</div>
                                <div class="text-white font-bold text-2xl flex items-baseline gap-1">
                                    <span class="text-sm font-normal text-[var(--color-accent)]">Rp</span>
                                    <span>{{ $price['price_label'] }}</span>
                                    <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                                </div>
                            </div>

                            <ul class="flex flex-col gap-3 mb-8 text-sm">
                                @foreach ($price['features'] as $feat)
                                    <li class="flex items-center gap-2.5 text-[var(--color-text-light)]">
                                        <span class="text-[var(--color-accent)] text-base">✓</span>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat sewa unit ' . $price['name'] . ' di Surabaya. Mohon info ketersediaan dan detail penawaran.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Sewa {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ALPHARD FLEET FROM DATABASE IF AVAILABLE --}}
    @if ($alphardArmadas->isNotEmpty())
        <section class="py-[80px] bg-[var(--color-bg-2)]">
            <div class="max-w-[1200px] mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Katalog Armada</span>
                    <h2 class="text-white text-2xl font-bold">Detail Unit Toyota Alphard Ready</h2>
                </div>

                <div class="grid grid-cols-3 gap-6 max-md:grid-cols-1">
                    @foreach ($alphardArmadas as $armada)
                        <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden transition-all hover:-translate-y-1 hover:border-[rgba(124,58,237,0.4)]">
                            <div class="relative h-52 overflow-hidden bg-[var(--color-surface)] flex items-center justify-center text-5xl">
                                @if ($armada->featured_image)
                                    <img src="{{ Storage::disk('public')->url($armada->featured_image) }}" alt="{{ $armada->title }}" class="w-full h-full object-cover">
                                @else
                                    <span>🚘</span>
                                @endif
                                @if ($armada->car_badge)
                                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-[rgba(124,58,237,0.8)] text-white text-xs font-semibold">{{ $armada->car_badge }}</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="text-white font-bold text-lg mb-1">{{ $armada->title }}</div>
                                <div class="text-[var(--color-accent)] text-xs font-semibold mb-3">{{ $armada->car_type }}</div>
                                <p class="text-[var(--color-text-muted)] text-sm line-clamp-2 mb-4">
                                    {{ $armada->description }}
                                </p>
                                <div class="border-t border-[var(--color-border)] pt-4 flex items-center justify-between">
                                    <a href="{{ route('armada.show', $armada) }}" class="text-[var(--color-accent)] text-sm font-medium no-underline hover:underline">
                                        Lihat Spesifikasi →
                                    </a>
                                    <a href="{{ \App\Support\WhatsApp::link('Halo, saya ingin pesan armada ' . $armada->title) }}"
                                       class="px-4 py-2 bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] border border-[rgba(34,211,238,0.3)] rounded-full text-xs font-semibold no-underline"
                                       target="_blank" rel="noopener noreferrer">
                                        Booking
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- WHY US & SERVICES SECTION --}}
    <section class="py-[90px]" id="layanan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Peruntukan Layanan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Solusi Sewa Alphard Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Segala Kebutuhan VIP</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Toyota Alphard merupakan pilihan utama untuk perjalanan dinas, penjemputan tamu penting, dan acara istimewa di Surabaya. Kami menjamin standar pelayanan berkelas tinggi:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['👑', 'Kunjungan Dinas & Tamu Eksekutif VIP', 'Perjalanan dinas instansi, pejabat pemerintah, direksi perusahaan, dan rombongan tamu VIP.'],
                            ['💍', 'Mobil Pengantin (Wedding Car Luxury)', 'Mobil pengantin super mewah dengan pilihan dekorasi pita & bunga eksklusif untuk momen pernikahan Anda.'],
                            ['✈️', 'Transfer Bandara Juanda (SUB)', 'Penjemputan dan antar langsung ke Bandara Juanda secara tepat waktu dengan layanan standar VIP.'],
                            ['🏖️', 'Perjalanan Luar Kota & Event Khusus', 'Akomodasi berkelas tinggi untuk perjalanan antar kota di Jawa Timur hingga Bali dengan kenyamanan ekstra.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                                <div class="text-2xl flex-shrink-0 w-11 h-11 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1 text-sm">{{ $title }}</h4>
                                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative">
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                        <span class="text-5xl block mb-4">🏆</span>
                        <h3 class="text-white text-xl font-bold mb-4">Keunggulan Rental Alphard di {{ config('site.brand') }}</h3>
                        
                        <div class="flex flex-col gap-4 text-sm text-[var(--color-text-light)]">
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">01.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Armada Alphard Terbaru &amp; Terawat</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Semua unit selalu dalam performa optimal, body mulus kinclong, dan rutin servis berkala.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">02.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Driver Berstandar VVIP</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Driver berpakaian rapi, berpengalaman mendampingi tamu VIP/VVIP, dan sangat mengutamakan kerahasiaan &amp; keselamatan.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">03.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Kabin Bersih, Wangi &amp; Disanitasi</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Kabin disemprot cairan desinfektan, bebas asap rokok, serta dilengkapi fasilitas pendingin udara maksimal.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-[var(--color-accent)] font-bold text-lg">04.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Amenities Gratis di Kabin</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Setiap unit sudah dilengkapi snack premium, buah-buahan segar, dan air mineral botol gratis.</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm">Butuh Layanan Protokol VVIP atau Wedding Car?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi sewa Alphard untuk tamu VIP / Wedding Car.') }}"
                               class="mt-3 block py-2.5 px-4 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-xs no-underline"
                               target="_blank" rel="noopener noreferrer">
                                Hubungi Tim WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW TO BOOK --}}
    <section class="py-[80px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Cara Pemesanan</span>
                <h2 class="text-white text-2xl font-bold">4 Langkah Mudah Sewa Alphard di Surabaya</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Hubungi Tim WA</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Klik tombol WhatsApp dan sampaikan tanggal serta rute atau kebutuhan acara Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">🚘</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Tipe Alphard</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Pilih tipe unit: Alphard Gen 2, Alphard Transformer Gen 3, atau All New Alphard Hybrid Gen 4.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Lakukan konfirmasi pemesanan dan pembayaran DP untuk mengamankan unit armada.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Penjemputan On-Time</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Driver &amp; armada Alphard kinclong siap menjemput lokasi Anda tepat waktu.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="faq">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-2xl font-bold">FAQ Sewa Alphard Surabaya</h2>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <details class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-5 transition-all">
                        <summary class="font-semibold text-white cursor-pointer list-none flex justify-between items-center text-base">
                            <span>{{ $faq['q'] }}</span>
                            <span class="text-[var(--color-accent)] transition-transform duration-200 group-open:rotate-180">▼</span>
                        </summary>
                        <p class="mt-4 text-[var(--color-text-muted)] text-sm leading-relaxed border-t border-[var(--color-border)] pt-4">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BOTTOM CTA BANNER --}}
    <section class="py-[80px] relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.4)] rounded-[var(--radius-xl)] p-12 text-center relative z-10 shadow-[0_15px_50px_rgba(0,0,0,0.6)]">
                <span class="text-4xl block mb-3">🚘👑</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold mb-4">
                    Pesan Toyota Alphard Impian Anda Sekarang!
                </h2>
                <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto text-base mb-8">
                    Nikmati sensasi perjalanan berkelas, mewah, dan aman di Surabaya bersama layanan profesional dari {{ config('site.brand') }}.
                </p>

                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking Sewa Alphard di Surabaya.') }}"
                       class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.5)] transition-transform hover:scale-105"
                       target="_blank" rel="noopener noreferrer">
                        💬 Hubungi via WhatsApp (24 Jam)
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
