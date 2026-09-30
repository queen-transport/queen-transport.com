<?php

use function Laravel\Folio\name;

name('sewa-mobil-surabaya-timur');
?>

@php
$faqs = [
    [
        'q' => 'Apakah layanan sewa mobil ini menjangkau seluruh wilayah Surabaya Timur?',
        'a' => 'Ya, kami melayani penjemputan dan pengantaran di seluruh kecamatan Surabaya Timur, termasuk Rungkut, Sukolilo, Mulyorejo, Gubeng, Tambaksari, Kenjeran, Semampir, dan Tenggilis Mejoyo. Cukup sampaikan alamat lengkap Anda via WhatsApp.',
    ],
    [
        'q' => 'Pilihan mobil apa saja yang bisa disewa untuk Surabaya Timur?',
        'a' => 'Kami menyediakan beragam armada mulai dari Toyota Alphard (VIP & Wedding), Toyota Hiace Premio (9-14 seat untuk rombongan), Toyota Fortuner (SUV premium), Toyota Innova Zenix Hybrid, hingga Mitsubishi Xpander — semua include driver profesional.',
    ],
    [
        'q' => 'Apakah ada biaya tambahan untuk penjemputan di Surabaya Timur?',
        'a' => 'Tidak ada biaya tambahan untuk penjemputan dalam area Surabaya Timur. Tarif sudah mencakup layanan jemput-antar di seluruh wilayah Surabaya Timur. Untuk luar kota, penyesuaian hanya pada BBM, tol, dan parkir.',
    ],
    [
        'q' => 'Apakah melayani transfer ke Bandara Juanda dari Surabaya Timur?',
        'a' => 'Tentu. Transfer dari Surabaya Timur ke Bandara Internasional Juanda sangat bisa kami layani. Kami rekomendasikan keberangkatan minimal 1,5–2 jam sebelum jadwal penerbangan, mengantisipasi kondisi lalu lintas Waru–Juanda.',
    ],
    [
        'q' => 'Bisakah menyewa mobil untuk wisata seharian dari Surabaya Timur?',
        'a' => 'Bisa sekali! Kami melayani paket sewa harian (full day) dari Surabaya Timur ke berbagai destinasi wisata Jawa Timur seperti Taman Safari Prigen, Gunung Bromo, Kota Batu-Malang, Pantai Banyuwangi, hingga Bali Overland.',
    ],
    [
        'q' => 'Bagaimana cara memesan sewa mobil di Surabaya Timur?',
        'a' => 'Pemesanan sangat mudah via WhatsApp. Informasikan lokasi penjemputan (alamat di Surabaya Timur), tanggal & jam keberangkatan, tujuan, serta tipe kendaraan yang diinginkan. Tim kami akan merespons cepat dan memberikan konfirmasi ketersediaan.',
    ],
    [
        'q' => 'Apakah tersedia layanan sewa mobil malam hari di Surabaya Timur?',
        'a' => 'Ya, tim kami siap melayani pemesanan dan penjemputan selama 24 jam. Tidak ada batasan waktu untuk layanan sewa mobil di Surabaya Timur — baik dini hari untuk kejar penerbangan pagi maupun malam hari untuk acara.',
    ],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$allArmadas    = $armadaService->getPublished();
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$pelanggans    = $armadaService->getPelanggans();

$title       = 'Sewa Mobil Surabaya Timur — Rental Harian Include Driver Profesional | ' . config('site.brand');
$description = 'Sewa mobil Surabaya Timur ✓ Jemput di Rungkut, Sukolilo, Mulyorejo, Gubeng & sekitarnya ✓ Alphard, Hiace Premio, Fortuner, Innova Zenix ✓ Include driver ✓ Harga transparan. Pesan sekarang!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Mobil Surabaya Timur — Jemput di Lokasi Anda
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya Timur</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Rungkut &bull; Sukolilo &bull; Mulyorejo &bull; Gubeng &bull; Kenjeran &bull; Tambaksari
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan sewa mobil terpercaya yang menjangkau seluruh wilayah Surabaya Timur. Armada lengkap — dari MPV mewah, SUV, minibus rombongan, hingga van premium — semua siap dengan driver profesional berpengalaman. Penjemputan langsung di depan pintu Anda.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin pesan Sewa Mobil di Surabaya Timur') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Sekarang — Gratis Konsultasi
                        </a>
                        <a href="#armada"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            🚗 Lihat Pilihan Armada
                        </a>
                    </div>
                </div>

                {{-- Hero card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">📍</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Jemput di Surabaya Timur</span>
                        </div>

                        <h3 class="text-white text-lg font-bold mb-2">Area Penjemputan Kami</h3>
                        <p class="text-[var(--color-text-muted)] text-xs mb-5 leading-relaxed">
                            Kami melayani penjemputan di seluruh kawasan Surabaya Timur tanpa biaya tambahan.
                        </p>

                        <div class="grid grid-cols-2 gap-3 text-xs">
                            @foreach ([
                                'Rungkut', 'Sukolilo', 'Mulyorejo', 'Gubeng',
                                'Tambaksari', 'Kenjeran', 'Semampir', 'Tenggilis Mejoyo',
                            ] as $area)
                                <div class="flex items-center gap-2 text-[var(--color-text-light)]">
                                    <span class="text-[var(--color-accent)] font-bold">✓</span>
                                    <span>{{ $area }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-5 pt-4 border-t border-[var(--color-border)] text-center">
                            <span class="text-[var(--color-accent)] text-xs font-semibold">+ Seluruh kelurahan & perumahan di Surabaya Timur</span>
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
                    <span class="text-3xl">📍</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Jemput Lokasi Anda</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Seluruh area Surabaya Timur</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">100% Include Driver</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Profesional, rapi, berpengalaman</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚗</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Armada Lengkap</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Alphard, Hiace, Fortuner, Innova</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💬</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Respons Cepat</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">CS aktif sepanjang hari</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- AREA COVERAGE SECTION --}}
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Cakupan Wilayah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Area <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya Timur</span> yang Kami Layani
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Dari kawasan perumahan elit, kampus, hingga pusat bisnis Surabaya Timur — driver kami siap menjemput tepat di lokasi Anda.
                </p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                @foreach ([
                    ['🏘️', 'Rungkut', 'MERR, Pandugo, Rungkut Industri, Kali Rungkut, Rungkut Kidul, Wonorejo'],
                    ['🎓', 'Sukolilo', 'ITS, UNAIR Kampus C, Keputih, Semolowaru, Medokan Semampir, Klampis'],
                    ['🏡', 'Mulyorejo', 'Mulyorejo, Kalijudan, Kalisari, Kejawan Putih Tambak, Manyar Sabrangan'],
                    ['🏢', 'Gubeng', 'Stasiun Gubeng, Mojo, Airlangga, Pucangsewu, Kertajaya, Baratajaya'],
                    ['🏙️', 'Tambaksari', 'Tambaksari, Rangkah, Dukuh Setro, Ploso, Pacarkeling, Kapas Madya'],
                    ['🌊', 'Kenjeran', 'Bulak, Kenjeran, Tanah Kali Kedinding, Sidotopo Wetan, Tambak Wedi'],
                    ['🕌', 'Semampir', 'Wonokusumo, Ujung, Sidotopo, Ampel, Pegirian'],
                    ['🌿', 'Tenggilis Mejoyo', 'Tenggilis Mejoyo, Kendangsari, Kutisari, Prapen, Panjang Jiwo'],
                ] as [$icon, $name, $sub])
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-5 hover:border-[var(--color-accent)] transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-2xl">{{ $icon }}</span>
                            <h3 class="text-white font-bold text-base">Kec. {{ $name }}</h3>
                        </div>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $sub }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Extra destinations nearby --}}
            <div class="mt-10 p-6 rounded-[var(--radius-xl)] bg-[rgba(124,58,237,0.06)] border border-[rgba(124,58,237,0.2)] text-center">
                <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                    Juga melayani area sekitar Surabaya Timur:
                    <span class="text-[var(--color-accent)] font-semibold">Sidoarjo (via Waru &amp; Gedangan)</span> •
                    <span class="text-[var(--color-accent)] font-semibold">Bandara Juanda</span> •
                    <span class="text-[var(--color-accent)] font-semibold">Gresik (via Suramadu)</span> •
                    <span class="text-[var(--color-accent)] font-semibold">Malang &amp; Batu</span>
                </p>
            </div>
        </div>
    </section>

    {{-- ARMADA CATALOG --}}
    <div id="armada">
        <x-armada-list
            subtitle="Pilihan Kendaraan"
            title="Armada Sewa Mobil Surabaya Timur"
            description="Seluruh armada tersedia untuk penjemputan di Surabaya Timur — include driver profesional, AC dingin, kabin bersih &amp; terawat."
            wa-text="sewa mobil di Surabaya Timur"
        />
    </div>

    {{-- PRICING SECTION --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Harga</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Mobil Surabaya Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga berlaku untuk area Surabaya &amp; sekitarnya (termasuk Surabaya Timur). Sudah termasuk driver profesional — tanpa biaya jemput tambahan.
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

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa ' . $price['name'] . ' dengan penjemputan di Surabaya Timur. Mohon info ketersediaan.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Sewa {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <p class="text-center text-[var(--color-text-muted)] text-xs mt-8">
                * Harga belum termasuk BBM, tol, &amp; parkir. Untuk luar kota &amp; multi-hari, hubungi tim kami untuk penawaran khusus.
            </p>
        </div>
    </section>
    @endif

    {{-- POPULAR DESTINATIONS FROM SURABAYA TIMUR --}}
    <section class="py-[90px]" id="destinasi">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tujuan Populer</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Destinasi Favorit dari <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Driver kami hafal rute terbaik dari Surabaya Timur ke berbagai destinasi wisata, bisnis, dan bandara.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                @foreach ([
                    ['✈️', 'Bandara Juanda (SUB)', '~35–50 menit dari Surabaya Timur via Tol MERR–Waru', 'Transfer bandara tepat waktu, tersedia 24 jam'],
                    ['🌋', 'Gunung Bromo', '~3–4 jam dari Surabaya Timur via Tol Surabaya–Malang', 'Sunrise tour, wisata alam & camping rombongan'],
                    ['🍎', 'Malang & Batu', '~2–2,5 jam dari Surabaya Timur', 'Wisata kuliner, BNS, Jatim Park, Selecta & sekitarnya'],
                    ['🌊', 'Banyuwangi & Ijen', '~4,5–5 jam dari Surabaya Timur', 'Kawah Ijen Blue Fire, Pantai Plengkung G-Land'],
                    ['🏝️', 'Bali Overland', '~7–8 jam dari Surabaya Timur via Ketapang–Gilimanuk', 'Perjalanan wisata keluarga lintas pulau tanpa berganti kendaraan'],
                    ['🕌', 'Ziarah Wali Songo Jatim', '~2–6 jam tergantung rute ziarah', 'Sunan Ampel, Sunan Giri, Sunan Drajat, Sunan Bonang & lainnya'],
                ] as [$icon, $dest, $duration, $desc])
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 hover:border-[var(--color-accent)] hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl mb-3">{{ $icon }}</div>
                        <h3 class="text-white font-bold text-base mb-1">{{ $dest }}</h3>
                        <p class="text-[var(--color-accent)] text-xs font-semibold mb-2">{{ $duration }}</p>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya rute & harga sewa mobil dari Surabaya Timur ke tujuan saya.') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_20px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Tanya Rute &amp; Harga via WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="keunggulan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Mengapa Pilih Kami</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Sewa Mobil Surabaya Timur Lebih Mudah &amp; Terpercaya bersama <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Kami memahami karakteristik dan kebutuhan mobilitas warga Surabaya Timur — dari perjalanan bisnis ke pusat kota, wisata keluarga akhir pekan, hingga transfer bandara yang tepat waktu:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['🗺️', 'Driver Hafal Rute Surabaya Timur', 'Driver kami familiar dengan jalan tikus, kondisi lalu lintas MERR, Arif Rahman Hakim, Ahmad Yani, hingga Tol Surabaya–Gempol untuk efisiensi waktu tempuh.'],
                            ['⏱️', 'Penjemputan On-Time Setiap Saat', 'Kami memastikan armada siap di lokasi Anda tepat waktu — tidak ada alasan terlambat ke bandara, rapat, atau acara penting.'],
                            ['🧹', 'Kabin Selalu Bersih &amp; Nyaman', 'Setiap unit disanitasi dan dibersihkan sebelum penjemputan. Kabin wangi, AC dingin, bebas asap rokok.'],
                            ['📱', 'Pemesanan Mudah via WhatsApp', 'Tidak perlu aplikasi khusus. Chat WhatsApp sudah cukup — sampaikan kebutuhan, tim kami konfirmasi dalam hitungan menit.'],
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
                        <h3 class="text-white text-xl font-bold mb-6">Fasilitas Standar Semua Armada</h3>

                        <div class="flex flex-col gap-4 text-sm">
                            @foreach ([
                                ['👨‍✈️', 'Driver Profesional &amp; Berseragam Rapi'],
                                ['❄️', 'Full AC — Dingin Merata ke Seluruh Kabin'],
                                ['🧹', 'Interior Disanitasi Sebelum Keberangkatan'],
                                ['💺', 'Kursi Nyaman — Reclining / Captain Seat'],
                                ['🍎', 'Gratis Snack, Buah &amp; Air Mineral (Hari Pertama)'],
                                ['🔌', 'Charger USB / Power Point Tersedia'],
                                ['🛡️', 'Armada Terawat, Servis Rutin Bengkel Resmi'],
                                ['📞', 'CS Aktif Sepanjang Hari — Fast Response'],
                            ] as [$icon, $feat])
                                <div class="flex items-center gap-3 text-[var(--color-text-light)] pb-3 border-b border-[var(--color-border)] last:border-0 last:pb-0">
                                    <span class="text-lg">{{ $icon }}</span>
                                    <span class="text-sm">{!! $feat !!}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6 pt-4 border-t border-[var(--color-border)]">
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin pesan sewa mobil dengan penjemputan di Surabaya Timur.') }}"
                               class="block text-center py-4 rounded-[var(--radius-xl)] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:opacity-95 transition-opacity"
                               target="_blank" rel="noopener noreferrer">
                                💬 Pesan via WhatsApp Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW TO BOOK --}}
    <section class="py-[80px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Cara Pemesanan</span>
                <h2 class="text-white text-2xl font-bold">Cara Mudah Sewa Mobil di Surabaya Timur</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Chat WhatsApp</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Klik tombol WA, sampaikan lokasi jemput di Surabaya Timur, tanggal, tujuan, dan jumlah penumpang.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">🚗</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Armada</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tim kami membantu memilihkan kendaraan yang paling sesuai dengan kebutuhan &amp; budget Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Bayar DP untuk mengunci jadwal. Pelunasan bisa dilakukan saat hari H atau sesuai kesepakatan.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Driver Datang Tepat Waktu</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Armada bersih &amp; driver berseragam tiba di alamat Anda di Surabaya Timur tepat sesuai jadwal.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIAL --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Ulasan Pelanggan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Kata Mereka tentang <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
                </h2>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($pelanggans->take(3) as $pelanggan)
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between">
                    <div class="text-[var(--color-accent)] text-2xl mb-4">★★★★★</div>
                    <p class="text-[var(--color-text-light)] text-sm italic mb-6 leading-relaxed">
                        &ldquo;{{ $pelanggan->content }}&rdquo;
                    </p>
                    <div class="flex items-center gap-3 border-t border-[var(--color-border)] pt-4">
                        <div class="w-10 h-10 rounded-full bg-[rgba(124,58,237,0.3)] border border-[var(--color-primary)] flex items-center justify-center font-bold text-white text-sm">
                            {{ substr($pelanggan->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">{{ $pelanggan->name }}</h4>
                            <p class="text-[var(--color-text-muted)] text-xs">{{ $pelanggan->title ?? 'Pelanggan Setia' }}</p>
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
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-2xl font-bold">FAQ Sewa Mobil Surabaya Timur</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">Jawaban atas pertanyaan yang sering ditanyakan seputar sewa mobil di area Surabaya Timur.</p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <details class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-5 transition-all hover:border-[rgba(124,58,237,0.4)]">
                        <summary class="font-semibold text-white cursor-pointer list-none flex justify-between items-center text-base">
                            <span>{{ $faq['q'] }}</span>
                            <span class="text-[var(--color-accent)] transition-transform duration-200 group-open:rotate-180 ml-4 flex-shrink-0">▼</span>
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
    <section class="py-[80px] relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[900px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-6 inline-block">
                ✦ Jemput di Surabaya Timur — Kapanpun Anda Butuhkan
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Siap Pesan Sewa Mobil di Surabaya Timur?
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[650px] mx-auto leading-relaxed">
                Dari Rungkut, Sukolilo, Mulyorejo hingga Gubeng — armada kami siap menjemput Anda. Hubungi tim {{ config('site.brand') }} sekarang untuk konfirmasi ketersediaan &amp; harga terbaik.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking sewa mobil dengan penjemputan di Surabaya Timur.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
