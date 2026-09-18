<?php

use function Laravel\Folio\name;

name('harga-sewa-mobil-surabaya-luar-kota-kelas-atas');
?>

@php
$faqs = [
    [
        'q' => 'Berapa harga sewa mobil kelas atas di Surabaya?',
        'a' => 'Harga sewa armada kami diambil resmi dari database tiap unit. Semua harga berlaku sama dengan keterangan untuk Surabaya dan sekitarnya.',
    ],
    [
        'q' => 'Apakah tarif sewa mobil sudah mencakup seluruh layanan?',
        'a' => 'Tarif dasar sewa armada kami adalah sama dengan tarif Surabaya dan sekitarnya. Untuk perjalanan antar kota atau kebutuhan operasional khusus, penyesuaian hanya berlaku pada BBM, tol, dan penginapan driver jika menginap.',
    ],
    [
        'q' => 'Apakah tarif sewa sudah termasuk Driver, BBM, dan Tol?',
        'a' => 'Harga tertera adalah tarif rental armada per hari (Surabaya dan sekitarnya) yang sudah termasuk driver profesional. Untuk BBM, tol, parkir, dan penyeberangan dapat disesuaikan rute atau memilih paket All In.',
    ],
    [
        'q' => 'Kota mana saja yang dapat dilayani dari Surabaya?',
        'a' => 'Kami melayani perjalanan ke seluruh wilayah Jawa Timur (Malang, Batu, Bromo, Banyuwangi, Kediri, Madiun, Jember), Jawa Tengah & DIY (Solo, Jogja, Semarang), Jawa Barat, Jakarta, hingga Overland Tour ke Bali.',
    ],
    [
        'q' => 'Apakah driver berpengalaman untuk perjalanan jarak jauh dan rute pegunungan?',
        'a' => 'Tentu. Seluruh driver Queen Transport telah melalui seleksi ketat, berpengalaman menangani berbagai rute, hafal jalur wisata pegunungan (seperti Bromo, Batu, Ijen), serta ramah dan mengutamakan keselamatan.',
    ],
    [
        'q' => 'Apakah bisa jemput langsung di Bandara Juanda atau Hotel di Surabaya?',
        'a' => 'Bisa sekali! Driver kami siap melakukan penjemputan di Bandara Internasional Juanda Surabaya, Stasiun Pasar Turi/Gubeng, hotel, maupun kediaman Anda di Surabaya dan Sidoarjo.',
    ],
    [
        'q' => 'Bagaimana cara pemesanan sewa mobil kelas atas?',
        'a' => 'Pemesanan sangat praktis via WhatsApp. Informasikan tanggal pemakaian, destinasi tujuan, serta tipe unit yang diinginkan. Tim CS kami siap melayani sepanjang hari.',
    ],
];

$title = 'Harga Sewa Mobil Surabaya Luar Kota Kelas Atas & Premium VIP — ' . config('site.brand');
$description = 'Daftar harga sewa mobil luar kota kelas atas terlengkap di Surabaya (Alphard Transformer, Hiace Premio Luxury, Fortuner, Innova Zenix Hybrid). Driver profesional, nyaman & aman untuk perjalanan antar kota Jawa-Bali.';
@endphp

<x-layouts::public :title="$title" :description="$description">
    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Mobil Kelas Atas Surabaya &bull; Luar Kota VIP
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Harga Sewa Mobil Surabaya <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Luar Kota Kelas Atas</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Alphard VIP &bull; Hiace Premio Luxury &bull; Fortuner &bull; Innova Zenix Hybrid
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan rental mobil mewah dan eksklusif di Surabaya. Semua tarif armada transparan dan menggunakan tarif resmi yang sama dengan keterangan untuk <strong>Surabaya dan sekitarnya</strong>, siap melayani perjalanan luar kota seluruh Jawa &amp; Bali.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya paket & harga sewa mobil luar kota kelas atas dari Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Konsultasi &amp; Pesan Sekarang
                        </a>
                        <a href="#daftar-harga"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Daftar Harga Luar Kota
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card on Hero right side --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🚘</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Luar Kota Ready</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Mengapa Pilih Armada {{ config('site.brand') }}?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Standar pelayanan eksekutif dengan armada kelas atas terbaru dan driver profesional berpengalaman antar kota.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Profesional</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">Jawa - Bali</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Cakupan Rute</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sepanjang Hari</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Layanan Nonstop</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">VIP</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kabin Mewah &amp; Bersih</div>
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
                    <span class="text-3xl">🛡️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Keamanan &amp; Kenyamanan</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Unit rutin servis &amp; bersih</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Rute Luar Kota</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Paham tol, wisata &amp; jalan antar provinsi</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💎</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Kelas Atas</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Captain Seat &amp; Full AC Dingin</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⚡</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Pemesanan Cepat</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Proses praktis via WhatsApp</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- DAFTAR HARGA SECTION --}}
    <x-armada-list 
        subtitle="Tarif Resmi &amp; Transparan"
        title="Harga Sewa Mobil Luar Kota Kelas Atas"
        description="Daftar tarif resmi rental mobil. Semua harga berlaku untuk Surabaya dan sekitarnya."
        wa-text="(Surabaya &amp; sekitarnya / luar kota)"
    />

    {{-- DESTINASI LUAR KOTA POPULER --}}
    <section class="py-16 bg-[var(--color-bg-2)] border-y border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[700px] mx-auto mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">
                    Destinasi Luar Kota Favorit Dari Surabaya
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm">
                    Kami melayani perjalanan antar kota di Jawa Timur, Jawa Tengah, Jawa Barat, hingga Bali.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🏔️</div>
                    <h4 class="text-white font-bold text-base mb-2">Malang &amp; Kota Batu</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Perjalanan dinas, liburan keluarga VIP, dan kunjungan kerja ke kawasan dingin Malang Raya &amp; Kota Wisata Batu.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🌋</div>
                    <h4 class="text-white font-bold text-base mb-2">Bromo &amp; Banyuwangi</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Tour sunrise Bromo, Kawah Ijen, dan destinasi eksotis di ujung timur Pulau Jawa dengan kenyamanan maksimal.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🏛️</div>
                    <h4 class="text-white font-bold text-base mb-2">Solo, Jogja &amp; Semarang</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Rute tol Trans-Jawa menuju Jawa Tengah &amp; DIY untuk keperluan dinas kantor, pernikahan, atau trip budaya.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🏖️</div>
                    <h4 class="text-white font-bold text-base mb-2">Overland Tour Bali</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Perjalanan antar pulau Surabaya &ndash; Bali dengan armada Hiace Premio Luxury atau Alphard include penyeberangan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-20">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-14">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-3">
                    ✦ Informasi Penting
                </div>
                <h2 class="text-3xl font-bold text-white mb-3">
                    Pertanyaan Umum (FAQ) Sewa Luar Kota
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm">
                    Jawaban atas pertanyaan seputar syarat, tarif, dan fasilitas sewa mobil luar kota kelas atas.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach($faqs as $faq)
                    <details class="group bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-5 [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex items-center justify-between cursor-pointer text-white font-semibold text-base">
                            <span>{{ $faq['q'] }}</span>
                            <span class="text-[var(--color-accent)] group-open:rotate-180 transition-transform">▼</span>
                        </summary>
                        <p class="mt-4 text-[var(--color-text-muted)] text-sm leading-relaxed border-t border-[var(--color-border)] pt-4">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BOTTOM CTA SECTION --}}
    <section class="py-20 border-t border-[var(--color-border)] bg-[var(--gradient-card)]">
        <div class="max-w-[1200px] mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Rencanakan Perjalanan Luar Kota Anda Bersama {{ config('site.brand') }}
            </h2>
            <p class="text-[var(--color-text-light)] text-base max-w-[600px] mx-auto mb-8 leading-relaxed">
                Dapatkan penawaran harga sewa mobil mewah luar kota kelas atas terbaik dari Surabaya. Layanan sepanjang hari dengan driver ramah dan profesional.
            </p>

            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi rute & booking Sewa Mobil Luar Kota Kelas Atas') }}"
               class="inline-flex items-center gap-3 px-10 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] transition-all hover:scale-105"
               target="_blank" rel="noopener noreferrer">
                💬 Hubungi Kami via WhatsApp Now
            </a>
        </div>
    </section>
</x-layouts::public>
