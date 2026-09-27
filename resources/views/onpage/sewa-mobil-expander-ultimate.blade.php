<?php

use function Laravel\Folio\name;

name('sewa-mobil-expander-ultimate');
?>

@php
$faqs = [
    [
        'q' => 'Apakah sewa Xpander Ultimate di Surabaya sudah termasuk driver?',
        'a' => 'Ya, seluruh layanan sewa mobil Xpander Ultimate di Queen Transport sudah termasuk driver profesional, ramah, berpakaian rapi, dan menguasai rute jalan di Surabaya serta destinasi wisata di seluruh Jawa Timur.',
    ],
    [
        'q' => 'Apa keunggulan Mitsubishi Xpander varian Ultimate dibanding varian lainnya?',
        'a' => 'Varian Ultimate merupakan tipe flagship tertinggi dengan kelengkapan fitur maksimal: Electric Parking Brake (EPB) dengan Brake Auto Hold, Cruise Control, Keyless Operating System (KOS) + Start/Stop Engine, audio touchscreen modern dengan konektivitas smartphone, dan suspensi ternyaman di kelas MPV.',
    ],
    [
        'q' => 'Berapa kapasitas penumpang dan bagasi mobil Xpander Ultimate?',
        'a' => 'Xpander Ultimate mampu memuat hingga 7 penumpang (dewasa & anak) dengan legroom yang sangat lega. Kursi baris ketiga juga dapat dilipat rata dengan lantai untuk ruang bagasi ekstra besar yang muat hingga 4-5 koper.',
    ],
    [
        'q' => 'Apakah melayani penjemputan Bandara Juanda (SUB) dan rute antar-kota?',
        'a' => 'Tentu saja! Kami melayani drop-off / pick-up Bandara Internasional Juanda Surabaya tepat waktu, serta perjalanan antar-kota seperti Malang, Batu, Bromo, Pasuruan, Probolinggo, Kediri, Jember, hingga Banyuwangi.',
    ],
    [
        'q' => 'Fasilitas apa saja yang didapatkan di dalam armada?',
        'a' => 'Setiap unit Xpander Ultimate kami selalu dalam kondisi prima, bersih dan wangi, full AC dingin double blower, charger port di setiap baris, serta gratis air mineral untuk kenyamanan perjalanan Anda.',
    ],
    [
        'q' => 'Bagaimana cara pemesanan dan pembayaran sewa Xpander Ultimate?',
        'a' => 'Pemesanan sangat praktis melalui WhatsApp. Cukup kirimkan tanggal sewa, durasi waktu, rute tujuan, dan lokasi penjemputan. Tim kami akan segera mengonfirmasi ketersediaan unit dan petunjuk pembayaran DP resmi.',
    ],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$pelanggans = $armadaService->getPelanggans();

$title = 'Sewa Mobil Expander Ultimate Surabaya Murah + Driver | ' . config('site.brand');
$description = 'Sewa mobil Mitsubishi Xpander Ultimate di Surabaya termurah include driver profesional. Kabin 7-seater luas, suspensi empuk, bersih & irit. Cocok untuk dinas kantor, keluarga & wisata.';
@endphp

<x-layouts::public :title="$title" :description="$description">
    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Xpander Ultimate Surabaya #1 Nyaman &amp; Terpercaya
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Expander Ultimate</span> Surabaya
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.82rem] tracking-[0.18em] uppercase font-semibold">
                        ✦ MPV 7-Seater Modern &bull; Suspensi Nyaman &bull; Tipe Flagship &bull; Include Driver
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan sewa mobil <strong class="text-white">Mitsubishi Xpander Ultimate</strong> terbaik di Surabaya. Nikmati kenyamanan MPV keluarga kelas atas dengan suspensi empuk ala SUV tangguh, kabin senyap 7 penumpang, AC dingin double blower, dan driver profesional berpengalaman.
                    </p>

                    <div class="flex items-baseline gap-3 my-1">
                        <span class="text-xs text-[var(--color-text-muted)] uppercase tracking-wider font-semibold">Tarif Sewa Mulai:</span>
                        <div class="text-white text-3xl font-extrabold flex items-baseline gap-1">
                            <span class="text-sm font-medium text-[var(--color-accent)]">Rp</span>
                            <span>650.000</span>
                            <span class="text-xs font-normal text-[var(--color-text-muted)]">/ 12 Jam</span>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-semibold">Unit Ready</span>
                    </div>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & pesan Sewa Mobil Xpander Ultimate di Surabaya.') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Xpander Sekarang
                        </a>
                        <a href="#paket-harga"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Paket &amp; Tarif
                        </a>
                    </div>

                    <div class="flex items-center gap-6 mt-3 pt-3 border-t border-[rgba(124,58,237,0.2)] text-xs text-[var(--color-text-muted)]">
                        <span class="flex items-center gap-1.5"><span class="text-[var(--color-accent)]">✓</span> Unit Bersih &amp; Wangi</span>
                        <span class="flex items-center gap-1.5"><span class="text-[var(--color-accent)]">✓</span> Driver Berpengalaman</span>
                        <span class="flex items-center gap-1.5"><span class="text-[var(--color-accent)]">✓</span> Respon Cepat 24 Jam</span>
                    </div>
                </div>

                {{-- Hero Right Feature Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🚗</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Tipe Ultimate Flagship</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Kenapa Pilih Xpander {{ config('site.brand') }}?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Pilihan cerdas untuk kenyamanan keluarga dan operasional kantor di Surabaya dengan efisiensi bahan bakar maksimal.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">7 Kursi</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kabin Lapang &amp; Lega</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Include Driver Handal</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">220 mm</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Ground Clearance Tinggi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">EPB + BAH</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Electric Parking Brake</div>
                            </div>
                        </div>

                        <div class="p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.06)] border border-[rgba(34,211,238,0.2)] flex items-center justify-between">
                            <div>
                                <span class="text-xs text-[var(--color-text-muted)] block">Booking Mudah &amp; Cepat</span>
                                <strong class="text-white text-sm">Tanpa Ribet, Cukup via WhatsApp</strong>
                            </div>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya mau booking Xpander Ultimate.') }}"
                               class="px-4 py-2 bg-[image:var(--gradient-btn)] text-white text-xs font-bold rounded-full no-underline hover:opacity-90"
                               target="_blank" rel="noopener noreferrer">
                                Chat CS
                            </a>
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
                    <span class="text-3xl">🛋️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Suspensi Empuk Juara</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Stabil, nyaman &amp; bebas mabuk</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">❄️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">AC Double Blower</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Sejuk merata hingga baris ke-3</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👔</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Standar VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Sopan, rapi &amp; tepat waktu</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⚡</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Mesin Irit &amp; Bertenaga</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">1.5L MIVEC responsif &amp; halus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SPESIFIKASI & FITUR XPANDER ULTIMATE --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="spesifikasi">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block font-[family-name:var(--font-accent)]">Fitur &amp; Keunggulan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Kenikmatan Berkendara Kelas Atas di <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Xpander Ultimate</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Mitsubishi Xpander Ultimate menghadirkan standar baru mobil keluarga dan dinas eksekutif dengan perpaduan desain modern, interior senyap, dan teknologi canggih:
                    </p>

                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['🛡️', 'Electric Parking Brake (EPB) + Auto Hold', 'Fitur rem tangan elektrik modern dengan tombol praktis dan fitur Auto Hold yang sangat nyaman saat berhenti di lampu merah atau kemacetan.'],
                            ['⚡', 'Cruise Control untuk Jalan Tol', 'Memudahkan perjalanan jarak jauh di Tol Trans Jawa dengan menjaga kecepatan konstan secara otomatis, membuat laju kendaraan sangat stabil.'],
                            ['💺', 'Kabin 7-Seater Super Nyaman & Ergonomis', 'Jok dengan busa tebal berlapis bahan premium, armrest tengah baris kedua, dan fleksibilitas lipat kursi rata lantai.'],
                            ['📱', 'Head Unit 8-inch Touchscreen + Smartphone Link', 'Hiburan audio jernih dengan konektivitas Bluetooth, Apple CarPlay, dan Android Auto untuk memutar musik kesukaan Anda.'],
                            ['⛰️', 'Ground Clearance 220 mm & Suspensi Tangguh', 'Tangguh melewati jalan berlubang, polisi tidur, jalan bergelombang, hingga tanjakan pegunungan tanpa limbung.'],
                        ] as [$icon, $featureTitle, $desc])
                            <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                                <span class="text-2xl mt-0.5">{{ $icon }}</span>
                                <div>
                                    <h4 class="text-white font-bold text-sm mb-1">{{ $featureTitle }}</h4>
                                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Side Specs Card --}}
                <div class="relative">
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                            <span class="text-3xl">📋</span>
                            <div>
                                <h3 class="text-white text-xl font-bold">Spesifikasi Unit Xpander Ultimate</h3>
                                <p class="text-[var(--color-text-muted)] text-xs">Data teknis dan kapasitas armada</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3 text-sm">
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Tipe Kendaraan</span>
                                <strong class="text-white">Multi Purpose Vehicle (MPV)</strong>
                            </div>
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Kapasitas Kursi</span>
                                <strong class="text-white">7 Penumpang Dewasa/Anak</strong>
                            </div>
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Mesin</span>
                                <strong class="text-white">1.5L MIVEC DOHC 16-Valve</strong>
                            </div>
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Transmisi</span>
                                <strong class="text-white">CVT Halus &amp; Efisien</strong>
                            </div>
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Sistem AC</span>
                                <strong class="text-white">Digital AC + Double Blower</strong>
                            </div>
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Sistem Keselamatan</span>
                                <strong class="text-white">ABS, EBD, BA, HSA, ASC, Dual SRS</strong>
                            </div>
                            <div class="flex justify-between py-2.5 border-b border-[rgba(124,58,237,0.15)]">
                                <span class="text-[var(--color-text-muted)]">Kapasitas Bagasi</span>
                                <strong class="text-white">Hingga 5 Koper (Lipat Baris 3)</strong>
                            </div>
                        </div>

                        <div class="mt-8 p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm">Butuh Sewa Xpander untuk Kunjungan Dinas atau Wisata?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya mau booking unit Xpander Ultimate.') }}"
                               class="mt-3 block py-2.5 px-4 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-xs no-underline hover:opacity-95"
                               target="_blank" rel="noopener noreferrer">
                                Konsultasi Gratis via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PERUNTUKAN LAYANAN TRANSAKSIONAL --}}
    <section class="py-[90px] bg-[var(--color-bg)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Solusi Perjalanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Sewa Xpander Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Segala Keperluan Anda</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Queen Transport berpengalaman melayani kebutuhan transportasi perorangan, keluarga, instansi pemerintah, dan korporasi di Surabaya dan Jawa Timur.
                </p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all">
                    <div>
                        <span class="text-3xl block mb-3">🏢</span>
                        <h3 class="text-white font-bold text-base mb-2">Operasional &amp; Dinas Kantor</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                            Layanan sewa profesional untuk kegiatan meeting kantor, inspeksi proyek luar kota, maupun transportasi tamu bisnis.
                        </p>
                    </div>
                    <span class="mt-4 text-[var(--color-accent)] text-xs font-semibold">Tersedia invoice resmi</span>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all">
                    <div>
                        <span class="text-3xl block mb-3">🏖️</span>
                        <h3 class="text-white font-bold text-base mb-2">Wisata &amp; Liburan Keluarga</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                            Perjalanan seru keliling destinasi Surabaya, Malang Kota Apel, Kota Wisata Batu, Bromo, hingga pantai pesisir Jatim.
                        </p>
                    </div>
                    <span class="mt-4 text-[var(--color-accent)] text-xs font-semibold">Suspensi empuk anti capek</span>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all">
                    <div>
                        <span class="text-3xl block mb-3">✈️</span>
                        <h3 class="text-white font-bold text-base mb-2">Antar-Jemput Bandara Juanda</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                            Transfer in &amp; out Bandara Juanda tepat waktu dengan fasilitas bagasi lapang dan penjemputan dengan name board jika diperlukan.
                        </p>
                    </div>
                    <span class="mt-4 text-[var(--color-accent)] text-xs font-semibold">On-time guarantee</span>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all">
                    <div>
                        <span class="text-3xl block mb-3">💍</span>
                        <h3 class="text-white font-bold text-base mb-2">Acara Keluarga &amp; Hajatan</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                            Akomodasi keluarga pengantin, rombongan besan, wisuda kampus, atau hajatan keluarga dengan mobil yang bersih dan wangi.
                        </p>
                    </div>
                    <span class="mt-4 text-[var(--color-accent)] text-xs font-semibold">Penampilan driver rapi</span>
                </div>
            </div>
        </div>
    </section>

    {{-- PILIHAN ARMADA LAINNYA --}}
    <div id="katalog-armada">
        <x-armada-list 
            subtitle="Pilihan Armada Terlengkap"
            title="Katalog Mobil Rental Surabaya"
            description="Selain Mitsubishi Xpander Ultimate, kami juga menyediakan lini mobil mewah dan eksekutif lainnya seperti Toyota Alphard, Hiace Premio Luxury, Fortuner, dan Innova Zenix."
            wa-text="sewa mobil di Surabaya"
        />
    </div>

    {{-- CARA PEMESANAN (HOW TO BOOK) --}}
    <section class="py-[80px] bg-[var(--color-bg)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Prosedur Praktis</span>
                <h2 class="text-white text-2xl font-bold">4 Langkah Mudah Sewa Expander Ultimate</h2>
                <p class="text-[var(--color-text-muted)] text-sm max-w-[500px] mx-auto mt-2">Pemesanan online cepat via WhatsApp tanpa proses berbelit-belit.</p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Hubungi WhatsApp</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Klik tombol WhatsApp dan informasikan tanggal sewa, durasi waktu, serta rute tujuan perjalanan Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">📝</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Paket Sewa</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tentukan pilihan paket: 12 Jam, Full Day Harian, Paket All-In, atau Drop Bandara Juanda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Lakukan konfirmasi pemesanan dan pembayaran uang muka (DP) aman ke rekening resmi Queen Transport.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Driver Siap Menjemput</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Driver profesional bersama unit Xpander Ultimate kinclong dan wangi tiba tepat waktu di lokasi Anda.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONI PELANGGAN --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Testimoni Klien</span>
                <h2 class="text-white text-2xl font-bold">Apa Kata Pelanggan Setia Kami?</h2>
                <p class="text-[var(--color-text-muted)] text-sm max-w-[550px] mx-auto mt-2">Kepuasan dan kenyamanan perjalanan Anda adalah prioritas utama kami.</p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-1">
                @foreach ($pelanggans->take(3) as $pelanggan)
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 flex flex-col justify-between">
                        <div class="mb-4">
                            <div class="text-amber-400 text-sm mb-3">★★★★★</div>
                            <p class="text-[var(--color-text-light)] text-xs leading-relaxed italic">
                                &ldquo;{{ $pelanggan->content }}&rdquo;
                            </p>
                        </div>
                        <div class="flex items-center gap-3 pt-4 border-t border-[var(--color-border)]">
                            <div class="w-9 h-9 rounded-full bg-[rgba(124,58,237,0.3)] flex items-center justify-center font-bold text-[var(--color-accent)] text-sm">
                                {{ substr($pelanggan->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xs">{{ $pelanggan->name }}</h4>
                                <p class="text-[var(--color-text-muted)] text-[11px]">{{ $pelanggan->title ?? 'Pelanggan Setia' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg)]" id="faq">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-2xl font-bold">Pertanyaan Populer Sewa Xpander Ultimate Surabaya</h2>
                <p class="text-[var(--color-text-muted)] text-xs max-w-[550px] mx-auto mt-2">
                    Informasi lengkap mengenai ketentuan sewa, rute, fasilitas, dan pembayaran.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <details class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-5 transition-all">
                        <summary class="font-semibold text-white cursor-pointer list-none flex justify-between items-center text-sm md:text-base">
                            <span>{{ $faq['q'] }}</span>
                            <span class="text-[var(--color-accent)] transition-transform duration-200 group-open:rotate-180">▼</span>
                        </summary>
                        <p class="mt-4 text-[var(--color-text-muted)] text-xs md:text-sm leading-relaxed border-t border-[var(--color-border)] pt-4">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BOTTOM CTA BANNER --}}
    <section class="py-[80px] relative overflow-hidden bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.4)] rounded-[var(--radius-xl)] p-12 text-center relative z-10 shadow-[0_15px_50px_rgba(0,0,0,0.6)]">
                <span class="text-4xl block mb-3">🚗✨</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold mb-4">
                    Pesan Sewa Mitsubishi Xpander Ultimate Hari Ini!
                </h2>
                <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto text-sm md:text-base mb-8 leading-relaxed">
                    Nikmati kenyamanan suspensi empuk, kabin senyap 7 kursi, dan pengemudi profesional dari {{ config('site.brand') }}. Konsultasikan rencana perjalanan Anda bersama kami sekarang juga!
                </p>

                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking Sewa Mobil Xpander Ultimate di Surabaya.') }}"
                       class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.5)] transition-transform hover:scale-105"
                       target="_blank" rel="noopener noreferrer">
                        💬 Hubungi WhatsApp Sekarang (Fast Response)
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SCHEMA STRUCTURED DATA (JSON-LD) UNTUK SEO ONPAGE --}}
    @php
    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Product',
                '@id' => url('/sewa-mobil-expander-ultimate').'#product',
                'name' => 'Sewa Mobil Mitsubishi Xpander Ultimate Surabaya',
                'description' => 'Layanan rental mobil Mitsubishi Xpander Ultimate di Surabaya include driver profesional, kabin 7 penumpang, suspensi nyaman kelas atas.',
                'brand' => [
                    '@type' => 'Brand',
                    'name' => 'Mitsubishi',
                ],
                'offers' => [
                    '@type' => 'AggregateOffer',
                    'priceCurrency' => 'IDR',
                    'lowPrice' => '650000',
                    'highPrice' => '1100000',
                    'offerCount' => '3',
                    'availability' => 'https://schema.org/InStock',
                ],
                'provider' => [
                    '@type' => 'AutoRental',
                    'name' => config('site.brand'),
                    'telephone' => config('site.whatsapp_number'),
                    'url' => url('/'),
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => config('site.address'),
                        'addressLocality' => 'Surabaya',
                        'addressRegion' => 'Jawa Timur',
                        'addressCountry' => 'ID',
                    ],
                ],
            ],
            [
                '@type' => 'FAQPage',
                '@id' => url('/sewa-mobil-expander-ultimate').'#faq',
                'mainEntity' => array_map(fn ($faq) => [
                    '@type' => 'Question',
                    'name' => $faq['q'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq['a'],
                    ],
                ], $faqs),
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => url('/sewa-mobil-expander-ultimate').'#breadcrumb',
                'itemListElement' => [
                    [
                        '@type' => 'ListItem',
                        'position' => 1,
                        'name' => 'Home',
                        'item' => route('home'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 2,
                        'name' => 'Armada',
                        'item' => route('armada.index'),
                    ],
                    [
                        '@type' => 'ListItem',
                        'position' => 3,
                        'name' => 'Sewa Mobil Expander Ultimate',
                        'item' => url('/sewa-mobil-expander-ultimate'),
                    ],
                ],
            ],
        ],
    ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
    </script>
</x-layouts::public>
