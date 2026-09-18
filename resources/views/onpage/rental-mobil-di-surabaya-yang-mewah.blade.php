<?php

use function Laravel\Folio\name;

name('rental-mobil-di-surabaya-yang-mewah');
?>

@php
$faqs = [
    [
        'q' => 'Mengapa memilih tempat rental mobil di Surabaya yang mewah di Queen Transport?',
        'a' => 'Queen Transport menghadirkan armada rental mobil di Surabaya yang mewah dengan kondisi fisik dan mesin terawat sempurna. Setiap unit dilengkapi driver profesional yang sopan, rapi, dan berpengalaman melayani perjalanan VIP.',
    ],
    [
        'q' => 'Jenis mobil mewah apa saja yang disewakan di Surabaya?',
        'a' => 'Pilihan unit mewah kami meliputi Toyota Alphard (Transformer & All New Hybrid), Toyota Hiace Premio Luxury (9 Captain Seats VIP), Toyota Fortuner VRZ, dan Innova Zenix Hybrid.',
    ],
    [
        'q' => 'Apakah rental mobil mewah di Surabaya sudah termasuk pengemudi?',
        'a' => 'Ya, semua paket rental mobil mewah di Queen Transport sudah termasuk pengemudi (driver) profesional. Kami mengutamakan keamanan, kenyamanan, serta ketepatan waktu.',
    ],
    [
        'q' => 'Apakah melayani penjemputan tamu VIP di Bandara Juanda?',
        'a' => 'Tentu saja! Kami siap melayani penjemputan dan pengantaran (transfer in/out) di Bandara Internasional Juanda Surabaya, hotel bintang lima, hingga lokasi kediaman/kantor Anda.',
    ],
    [
        'q' => 'Apakah mobil bisa disewa untuk acara pernikahan (Wedding Car) atau acara dinas?',
        'a' => 'Sangat bisa. Kami berpengalaman melayani acara pernikahan mewah (lengkap dengan opsi dekorasi pita & bunga), kunjungan dinas kenegaraan, hingga event korporasi skala nasional.',
    ],
    [
        'q' => 'Bagaimana cara melakukan reservasi rental mobil mewah di Surabaya?',
        'a' => 'Reservasi sangat mudah melalui WhatsApp. Tim kami siap merespon pertanyaan Anda sepanjang hari dan membantu proses pemesanan dengan cepat dan transparan.',
    ],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$pelanggans = $armadaService->getPelanggans();

$title = 'Rental Mobil di Surabaya yang Mewah & Premium VIP + Driver — ' . config('site.brand');
$description = 'Rental mobil di Surabaya yang mewah dan berkelas tinggi (Alphard, Hiace Premio Luxury, Fortuner, Innova Zenix VIP) include driver profesional. Cocok untuk dinas, event, wedding & airport Juanda.';
@endphp

<x-layouts::public :title="$title" :description="$description">
    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Layanan Rental Mobil Mewah Terbaik Surabaya
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Rental Mobil di Surabaya <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">yang Mewah</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Toyota Alphard &bull; Hiace Premio VIP &bull; Fortuner &bull; Innova Zenix
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Solusi rental mobil di Surabaya yang mewah bagi Anda yang mengutamakan kenyamanan, prestise, dan keamanan tingkat tinggi. Dilengkapi driver handal untuk dinas, pernikahan, penjemputan tamu VIP, dan wisata.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat konsultasi Rental Mobil di Surabaya yang Mewah') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Mobil Mewah Now
                        </a>
                        <a href="#katalog-rental-mewah"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Pilihan Armada
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🌟</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Executive Choice</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Keunggulan {{ config('site.brand') }}</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Pengalaman perjalanan paling berkesan dengan standar pelayanan VIP tertinggi di Surabaya.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">VIP</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Professional</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">TERAWAT</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Unit Prima &amp; Wangi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sepanjang Hari</div>
                                <div class="text-[var(--color-text-muted)] text-xs">CS Fast Response</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Air Mineral &amp; Snack</div>
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
                        <h4 class="text-white font-bold text-sm">Captain Seats VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Kabin empuk &amp; lega</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Rapi &amp; Sopan</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Berpengalaman &amp; jujur</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">❄️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Full AC Per-Kepala</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Sejuk &amp; bebas bau rokok</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🏆</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Layanan Bintang Lima</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Kepercayaan klien korporat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- REUSABLE ARMADA LIST COMPONENT --}}
    <div id="katalog-rental-mewah">
        <x-armada-list 
            subtitle="Pilihan Unit Mewah"
            title="Daftar Rental Mobil di Surabaya yang Mewah"
            description="Katalog unit kendaraan mewah terlengkap di Surabaya mencakup Toyota Alphard, Hiace Premio Luxury, Fortuner, dan Innova Zenix VIP include driver."
            wa-text="rental mobil mewah di Surabaya"
        />
    </div>

    {{-- PRICING SUMMARY SECTION --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Rincian Paket &amp; Tarif</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Rental <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mobil Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga resmi bersaing mencakup pengemudi handal untuk perjalanan di Surabaya dan sekitarnya.
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

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa unit ' . $price['name'] . ' di Surabaya. Mohon ketersediaannya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Rental {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- SERVICES SECTION --}}
    <section class="py-[90px]" id="layanan-mewah">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Peruntukan Perjalanan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Layanan Rental Mobil Mewah Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Kebutuhan Eksklusif</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Kami menjadi mitra utama perjalanan berkelas tinggi untuk berbagai keperluan pribadi, dinas, dan korporat di Surabaya:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['💼', 'Dinas Kantor & Kunjungan VIP', 'Layanan transportasi profesional bagi jajaran manajemen, pejabat instansi, dan tamu VIP.'],
                            ['💒', 'Mobil Pengantin (Luxury Wedding Car)', 'Hadirkan keanggunan di hari spesial Anda dengan armada Alphard lengkap dengan dekorasi pita & bunga.'],
                            ['✈️', 'Penjemputan Bandara Juanda (SUB)', 'Pengantaran dan penjemputan bandara secara tepat waktu dengan layanan standar VIP.'],
                            ['🗺️', 'Perjalanan Antar Kota & Tour Wisata', 'Jelajahi berbagai destinasi di Jawa Timur hingga Bali dengan kenyamanan kabin kelas atas.'],
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

                {{-- Feature box --}}
                <div class="flex flex-col gap-6 p-8 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] shadow-2xl">
                    <h3 class="text-white text-xl font-bold border-b border-[var(--color-border)] pb-4">
                        Jaminan Kualitas Queen Transport
                    </h3>

                    <div class="grid grid-cols-1 gap-4 text-sm">
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Driver Berpengalaman Rute Jawa &amp; Bali</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Kabin Steril, Nyaman, &amp; Tidak Bau Apek</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Suspensi Nyaman untuk Perjalanan Jarak Jauh</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Proses Pemesanan Praktis &amp; Terpercaya</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Tim CS Responsif Sepanjang Hari</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-6 border-t border-[var(--color-border)]">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi rental mobil mewah di Surabaya.') }}"
                           class="block text-center py-4 rounded-[var(--radius-xl)] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Konsultasi &amp; Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIAL SECTION --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Testimoni Klien</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Apa Kata Klien <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rental Mobil Mewah</span>
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
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    FAQ <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rental Mobil Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">
                    Informasi penting terkait penyewaan rental mobil di Surabaya yang mewah.
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
                ✦ Tempat Rental Mobil Mewah Pilihan Utama Surabaya
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Pesan Rental Mobil Mewah di Surabaya Sekarang
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[650px] mx-auto leading-relaxed">
                Dapatkan penawaran harga terbaik dan pelayanan bintang lima untuk armada mewah pilihan Anda di {{ config('site.brand') }}.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat rental mobil di Surabaya yang mewah.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi Tim Reservasi WhatsApp
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
