<?php

use function Laravel\Folio\name;

name('sewa-mobil-mewah-surabaya');
?>

@php
$faqs = [
    [
        'q' => 'Berapa tarif sewa mobil mewah di Surabaya?',
        'a' => 'Tarif sewa mobil mewah di Surabaya bervariasi tergantung tipe armada yang Anda pilih, mulai dari Toyota Innova Zenix Hybrid, Fortuner VRZ, Hiace Premio Luxury, hingga Toyota Alphard Transformer. Semua harga kami sangat kompetitif dan sudah termasuk driver profesional.',
    ],
    [
        'q' => 'Pilihan mobil mewah apa saja yang tersedia di Queen Transport?',
        'a' => 'Kami menyediakan lini armada VIP terlengkap meliputi Toyota Alphard Gen 2/3 Transformer/Gen 4 Hybrid, Toyota Hiace Premio Luxury 9 Captain Seat, Toyota Fortuner VRZ/GR, dan Toyota Innova Zenix Hybrid.',
    ],
    [
        'q' => 'Apakah sewa mobil mewah di Surabaya sudah termasuk driver?',
        'a' => 'Ya, seluruh layanan rental mobil mewah di Queen Transport sudah termasuk driver profesional yang berpengalaman, berseragam rapi, ramah, dan berpengalaman melayani tamu eksekutif serta VIP.',
    ],
    [
        'q' => 'Apakah melayani penjemputan VIP di Bandara Juanda (SUB)?',
        'a' => 'Sangat bisa. Kami melayani penjemputan dan pengantaran (transfer in/out) VIP di Bandara Internasional Juanda Surabaya, hotel bintang lima, stasiun, hingga area perkantoran.',
    ],
    [
        'q' => 'Apakah bisa menyewa mobil mewah untuk acara pernikahan (Wedding Car)?',
        'a' => 'Bisa sekali! Kami menyediakan paket Wedding Car Luxury (terutama Toyota Alphard) lengkap dengan hiasan bunga eksklusif, pita pengantin, dan driver profesional berpenampilan formal.',
    ],
    [
        'q' => 'Bagaimana prosedur pemesanan dan pembayaran sewa mobil mewah?',
        'a' => 'Pemesanan sangat praktis via WhatsApp. Cukup informasikan jadwal pemakaian, jenis mobil mewah yang diinginkan, serta titik penjemputan. Customer service kami siap membantu Anda sepanjang hari.',
    ],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$pelanggans = $armadaService->getPelanggans();

$title = 'Sewa Mobil Mewah Surabaya Murah & Rental VIP Premium + Driver — ' . config('site.brand');
$description = 'Sewa mobil mewah Surabaya termurah & paling lengkap (Alphard Transformer, Hiace Premio Luxury, Fortuner, Innova Zenix VIP) include driver profesional. Layanan untuk dinas, wedding, event & airport Juanda.';
@endphp

<x-layouts::public :title="$title" :description="$description">
    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Mobil Mewah Surabaya #1 VIP &amp; Executive
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Toyota Alphard &bull; Hiace Premio Luxury &bull; Fortuner &bull; Innova Zenix
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan rental mobil mewah terbaik dan paling terpercaya di Surabaya. Nikmati kenyamanan perjalanan VIP untuk kebutuhan kunjungan dinas, tamu eksekutif, acara pernikahan, hingga trip luar kota bersama driver profesional.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & pesan Sewa Mobil Mewah di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Mobil Mewah Sekarang
                        </a>
                        <a href="#katalog-mewah"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Armada &amp; Tarif
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">💎</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Standar VIP Premium</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Mengapa Sewa Mobil Mewah di {{ config('site.brand') }}?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Simbol prestise, kenyamanan, dan rasa aman maksimal selama perjalanan Anda di Surabaya dan Jawa Timur.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Profesional</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">TERAWAT</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kabin Bersih &amp; Wangi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sepanjang Hari</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Layanan Fast Response</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">INCLUDED</div>
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
                    <span class="text-3xl">👔</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Standar VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Rapi, ramah &amp; berpengalaman</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💺</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Interior Luxury</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Captain seat &amp; kabin senyap</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🛡️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Unit Terawat &amp; Prima</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Servis rutin bengkel resmi</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⭐</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Reputasi Terpercaya</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Ratusan klien VIP puas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- REUSABLE ARMADA LIST COMPONENT --}}
    <div id="katalog-mewah">
        <x-armada-list 
            subtitle="Pilihan Armada Premium"
            title="Katalog Mobil Mewah Surabaya"
            description="Pilihan mobil mewah terbaik di Surabaya mencakup Toyota Alphard, Hiace Premio Luxury, Fortuner, dan Innova Zenix Hybrid include driver profesional."
            wa-text="sewa mobil mewah di Surabaya"
        />
    </div>

    {{-- PRICING SUMMARY SECTION --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Harga</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Sewa <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mobil Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga sewa transparan sudah termasuk driver profesional untuk area Surabaya dan sekitarnya.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach (array_slice($kelasAtasPrices, 0, 3) as $price)
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
    @endif

    {{-- SERVICES / PERUNTUKAN LAYANAN SECTION --}}
    <section class="py-[90px]" id="peruntukan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Solusi Transportasi VIP</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Sewa Mobil Mewah Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Segala Keperluan Premium</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Kami berpengalaman melayani berbagai klien korporasi, instansi pemerintah, keluarga VIP, hingga kebutuhan acara eksklusif di Surabaya dan sekitarnya:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['👔', 'Kunjungan Dinas & Tamu Kehormatan VIP', 'Armada mobil mewah dengan driver profesional berseragam rapi untuk menyambut pejabat, direksi, dan tamu kehormatan.'],
                            ['💍', 'Mobil Pengantin Mewah (Wedding Car)', 'Mobil pengantin berkesan mewah dan elegan dengan pilihan hiasan pita & dekorasi bunga spesial untuk momen bahagia Anda.'],
                            ['✈️', 'Transfer Bandara Juanda VIP (SUB)', 'Penjemputan tepat waktu di Bandara Juanda Surabaya dengan penanganan bagasi dan kenyamanan kabin berkelas.'],
                            ['🏖️', 'Perjalanan Luar Kota & Tour Eksklusif', 'Akomodasi perjalanan antar kota Jawa Timur, Jawa Tengah, hingga Bali dengan kabin senyap dan fasilitas lengkap.'],
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

                {{-- Feature list --}}
                <div class="flex flex-col gap-6 p-8 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] shadow-2xl">
                    <h3 class="text-white text-xl font-bold border-b border-[var(--color-border)] pb-4">
                        Fasilitas Standar Mobil Mewah Queen Transport
                    </h3>

                    <div class="grid grid-cols-1 gap-4 text-sm">
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Driver Berpengalaman &amp; Berpenampilan Rapi</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Kabin Selalu Steril, Bersih, &amp; Wangi</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Captain Seat &amp; Reclining Seat Empuk</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Full AC Dingin Seluruh Baris Kabin</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Complimentary Air Mineral &amp; Snack</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Layanan Customer Service Fast Response</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-6 border-t border-[var(--color-border)]">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi kebutuhan Sewa Mobil Mewah di Surabaya.') }}"
                           class="block text-center py-4 rounded-[var(--radius-xl)] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Hubungi Tim VIP Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIAL / PELANGGAN SECTION --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Ulasan Klien VIP</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pengalaman <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Pelanggan Kami</span>
                </h2>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($pelanggans->take(3) as $pelanggan)
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between">
                    <p class="text-[var(--color-text-light)] text-sm italic mb-6 leading-relaxed">
                        &ldquo;{{ $pelanggan->content }}&rdquo;
                    </p>
                    <div class="flex items-center gap-3 border-t border-[var(--color-border)] pt-4">
                        <div class="w-10 h-10 rounded-full bg-[rgba(124,58,237,0.3)] border border-[var(--color-primary)] flex items-center justify-center font-bold text-white text-sm">
                            {{ substr($pelanggan->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">{{ $pelanggan->name }}</h4>
                            <p class="text-[var(--color-text-muted)] text-xs">{{ $pelanggan->title ?? 'Pelanggan VIP' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="faq">
        <div class="max-w-[850px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pertanyaan Umum</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    FAQ <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Mobil Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">
                    Jawaban ringkas atas pertanyaan yang sering diajukan pelanggan mengenai layanan rental mobil mewah kami.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <details class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 [&_summary::-webkit-details-marker]:hidden transition-all hover:border-[rgba(124,58,237,0.4)]">
                        <summary class="flex items-center justify-between cursor-pointer font-bold text-white text-base max-sm:text-sm">
                            <span>{{ $faq['q'] }}</span>
                            <span class="ml-4 text-[var(--color-accent)] transition-transform duration-200 group-open:rotate-180">▼</span>
                        </summary>
                        <p class="mt-4 text-[var(--color-text-muted)] text-sm leading-relaxed border-t border-[var(--color-border)] pt-4">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FINAL CTA BANNER --}}
    <section class="py-[80px] relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[900px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-6 inline-block">
                ✦ Reservasi Sewa Mobil Mewah Sekarang
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Siap Menikmati Perjalanan Berkelas VIP di Surabaya?
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[650px] mx-auto leading-relaxed">
                Hubungi tim CS {{ config('site.brand') }} sekarang juga untuk mendapatkan armada mobil mewah pilihan Anda dengan pelayanan terbaik dan harga bersaing.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi Sewa Mobil Mewah di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS Via WhatsApp
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
