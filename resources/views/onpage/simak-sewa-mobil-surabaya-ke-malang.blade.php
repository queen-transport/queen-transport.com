<?php

use function Laravel\Folio\name;

name('simak-sewa-mobil-surabaya-ke-malang');
?>

@php
$faqs = [
    [
        'q' => 'Berapa harga sewa mobil Surabaya ke Malang di Queen Transport?',
        'a' => 'Tarif sewa mobil Surabaya ke Malang sangat terjangkau mulai dari Rp 1.450.000/hari untuk Toyota Innova Reborn, Rp 1.850.000/hari untuk Innova Zenix Hybrid, Rp 1.700.000/hari untuk Hiace Commuter (14 seat), hingga Rp 2.800.000/hari untuk Toyota Alphard Transformer VIP. Kami juga menyediakan paket drop-off one way (sekali jalan) dengan tarif khusus all-in.',
    ],
    [
        'q' => 'Apakah layanan sewa mobil Surabaya ke Malang sudah termasuk driver?',
        'a' => 'Ya, seluruh layanan rental mobil di Queen Transport sudah 100% include driver profesional yang ramah, berpenampilan rapi, dan berpengalaman menguasai rute jalan tol serta tanjakan wisata pegunungan Kota Batu dan Malang.',
    ],
    [
        'q' => 'Berapa jam perjalanan dari Surabaya ke Malang lewat jalan tol?',
        'a' => 'Perjalanan dari Surabaya ke Malang via Jalan Tol Trans Jawa (Tol Sumo/Waru – Tol Gempol-Pandaan – Tol Pandaan-Malang) membutuhkan waktu sekitar 1,5 hingga 2 jam dengan kondisi lalu lintas normal, menempuh jarak sekitar 85 hingga 95 kilometer.',
    ],
    [
        'q' => 'Berapa tarif tol Surabaya ke Malang untuk mobil pribadi (Golongan I)?',
        'a' => 'Total akumulasi tarif tol dari Surabaya (GT Waru / Kejapanan) hingga Exit Tol Singosari / Madyopuro Malang untuk kendaraan Golongan I berkisar antara Rp 59.000 hingga Rp 65.500. Disarankan menyiapkan saldo kartu e-Toll minimal Rp 100.000 (sekali jalan) atau Rp 200.000 (pulang-pergi/PP).',
    ],
    [
        'q' => 'Di mana pintu keluar tol (exit tol) terdekat untuk menuju Kota Wisata Batu?',
        'a' => 'Pintu keluar tol paling strategis menuju Kota Batu adalah Exit Tol Singosari (Karanglo). Dari gerbang tol ini, Anda dapat langsung melintasi jalan tembus Karanglo – Karangploso menuju Kota Batu dengan waktu tempuh sekitar 30–45 menit.',
    ],
    [
        'q' => 'Bisakah jemput langsung di Bandara Juanda Surabaya atau Stasiun Gubeng?',
        'a' => 'Tentu saja! Layanan door-to-door kami siap menjemput Anda langsung di Bandara Internasional Juanda (Terminal 1 & 2), Stasiun Surabaya Gubeng, Stasiun Pasar Turi, hotel, perkantoran, maupun alamat rumah di Surabaya/Sidoarjo langsung diantar ke lokasi tujuan di Malang atau Batu.',
    ],
    [
        'q' => 'Apakah melayani paket carter drop off dan sewa harian untuk wisata?',
        'a' => 'Ya, kami melayani berbagai skema: paket drop-off sekali jalan (transfer in/out), sewa harian (12 jam / fullday), paket carter pulang-pergi (PP), hingga paket wisata keliling destinasi Malang, Kota Batu, dan sunrise Gunung Bromo.',
    ],
    [
        'q' => 'Bagaimana cara pemesanan dan syarat sewa mobil ke Malang?',
        'a' => 'Pemesanan sangat mudah dan cepat tanpa birokrasi berbelit. Cukup hubungi admin kami via WhatsApp, informasikan tanggal sewa, titik jemput, destinasi di Malang, dan tipe unit pilihan Anda. Tim kami akan segera mengonfirmasi ketersediaan armada.',
    ],
];

$title = 'Simak Sewa Mobil Surabaya ke Malang Murah + Driver & Drop Off — ' . config('site.brand');
$description = 'Simak sewa mobil Surabaya ke Malang & Batu terlengkap. Layanan carter drop-off, harian, wisata & dinas kantor include driver ramah profesional. Pilihan armada Innova Zenix, Hiace Luxury, Alphard & Fortuner via Tol Pandaan-Malang.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Service",
          "@id": "{{ $canonical }}#service",
          "name": "Sewa Mobil Surabaya ke Malang & Batu",
          "serviceType": "Car Rental with Driver & Carter Drop Off",
          "description": "{{ $description }}",
          "url": "{{ $canonical }}",
          "provider": {
            "@type": "LocalBusiness",
            "name": "{{ config('site.brand') }}",
            "url": "{{ route('home') }}",
            "telephone": "+{{ config('site.whatsapp_number') }}",
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "{{ config('site.address') }}",
              "addressRegion": "Jawa Timur",
              "addressCountry": "ID"
            }
          },
          "areaServed": [
            { "@type": "City", "name": "Surabaya" },
            { "@type": "City", "name": "Sidoarjo" },
            { "@type": "City", "name": "Malang" },
            { "@type": "City", "name": "Kota Batu" }
          ],
          "offers": {
            "@type": "Offer",
            "priceCurrency": "IDR",
            "price": "1450000",
            "availability": "https://schema.org/InStock",
            "url": "{{ $canonical }}"
          }
        },
        {
          "@type": "FAQPage",
          "@id": "{{ $canonical }}#faq",
          "mainEntity": [
            @foreach ($faqs as $index => $faq)
            {
              "@type": "Question",
              "name": "{{ $faq['q'] }}",
              "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ $faq['a'] }}"
              }
            }@if (!$loop->last),@endif
            @endforeach
          ]
        },
        {
          "@type": "BreadcrumbList",
          "@id": "{{ $canonical }}#breadcrumb",
          "itemListElement": [
            {
              "@type": "ListItem",
              "position": 1,
              "name": "Beranda",
              "item": "{{ route('home') }}"
            },
            {
              "@type": "ListItem",
              "position": 2,
              "name": "Sewa Mobil Surabaya ke Malang",
              "item": "{{ $canonical }}"
            }
          ]
        }
      ]
    }
    </script>

    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start font-medium">
                        ✦ Rental &amp; Carter Mobil Surabaya ke Malang #1 VIP + Driver
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Simak Sewa Mobil Surabaya ke Malang: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Drop Off, Carter PP &amp; Wisata Batu</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Innova Zenix &bull; Hiace Luxury &bull; Alphard VIP &bull; Fortuner &bull; Driver Profesional
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[560px]">
                        Butuh transportasi nyaman dan bebas repot dari Surabaya menuju Malang atau Kota Batu? <strong>{{ config('site.brand') }}</strong> menghadirkan layanan sewa mobil Surabaya ke Malang <strong>include driver profesional</strong>, armada bersih steril, serta penjemputan <em>door-to-door</em> dari Bandara Juanda, Stasiun, hotel, hingga rumah Anda. Nikmati waktu tempuh cepat hanya <strong>1,5 – 2 jam</strong> via Tol Pandaan – Malang!
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & sewa mobil perjalanan Surabaya ke Malang') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Mobil Surabaya - Malang
                        </a>
                        <a href="#paket-harga"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Cek Paket &amp; Estimasi Harga
                        </a>
                    </div>
                </div>

                {{-- Hero Right Highlight Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🏔️</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Fakta Cepat Rute</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Surabaya &rarr; Malang &amp; Batu</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Rute favorit perjalanan dinas kantor, liburan keluarga, dan kunjungan wisata udara sejuk Malang Raya.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">1,5 – 2 Jam</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Waktu Tempuh via Tol</div>
                            </div>
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">± 85 – 95 km</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Jarak Tempuh Tol</div>
                            </div>
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100% Driver</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Sopir Sopan &amp; Handal</div>
                            </div>
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">Rp 59.000*</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Tarif Tol (Singosari)</div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[var(--color-border)] text-xs text-[var(--color-text-muted)] flex items-center justify-between">
                            <span>Gerbang Keluar Rekomendasi:</span>
                            <span class="text-white font-semibold">GT Singosari / Madyopuro</span>
                        </div>
                        <div class="mt-2 text-[0.68rem] text-[var(--color-text-muted)] italic text-right">
                            *Tarif resmi saat data diambil (Sep 2026) &amp; dapat berubah sewaktu-waktu.
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
                    <span class="text-3xl">🛣️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Rute Cepat Full Tol</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Tol Pandaan - Malang tanpa macet</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Ahli Jalur Batu</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Fasih tanjakan &amp; rute wisata pegunungan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📍</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Layanan Door-to-Door</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Jemput Juanda / Stasiun / Hotel</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🥤</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Free Snack &amp; Air Mineral</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Fasilitas segar di hari pertama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 1: PILIHAN PAKET LAYANAN TRANSAKSIONAL --}}
    <section class="py-[90px]" id="paket-layanan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[800px] mx-auto mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Skema Layanan Fleksibel</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight">
                    Pilihan Paket Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya ke Malang &amp; Batu</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Kami menyesuaikan kebutuhan mobilitas Anda, mulai dari penjemputan bandara sekali jalan hingga paket wisata lengkap multi-hari bersama keluarga atau rombongan kantor.
                </p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                {{-- Paket 1 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg hover:-translate-y-1">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-[rgba(34,211,238,0.15)] flex items-center justify-center text-2xl mb-4">
                            ✈️
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-[0.7rem] font-bold uppercase tracking-wider block w-fit mb-2">One Way Trip</span>
                        <h3 class="text-white text-xl font-bold mb-2">Drop Off Surabaya – Malang</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                            Layanan antar langsung satu arah dari Bandara Juanda, Stasiun Surabaya, atau hotel menuju hotel/kediaman di Malang atau Kota Batu.
                        </p>
                        <ul class="space-y-2 text-xs text-[var(--color-text-light)] mb-6">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Jemput di terminal kedatangan Juanda</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Langsung via Tol Pandaan - Malang</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Tanpa oper barang &amp; bebas lelah</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin pesan layanan Drop Off Surabaya ke Malang') }}"
                       class="w-full py-2.5 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-xs text-center no-underline hover:opacity-90 transition-opacity block"
                       target="_blank" rel="noopener noreferrer">
                        Pesan Drop Off
                    </a>
                </div>

                {{-- Paket 2 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg hover:-translate-y-1">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-[rgba(124,58,237,0.2)] flex items-center justify-center text-2xl mb-4">
                            💼
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-[rgba(124,58,237,0.15)] text-[var(--color-accent)] text-[0.7rem] font-bold uppercase tracking-wider block w-fit mb-2">Perjalanan Dinas</span>
                        <h3 class="text-white text-xl font-bold mb-2">Sewa Harian + Driver</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                            Sewa mobil harian (12 Jam / Fullday) untuk agenda dinas kerja, rapat instansi, kunjungan proyek pabrik, atau agenda bisnis di Malang Raya.
                        </p>
                        <ul class="space-y-2 text-xs text-[var(--color-text-light)] mb-6">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Driver profesional &amp; berbusana rapi</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Fleksibel multi-destinasi meeting</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Standar unit eksekutif &amp; nyaman</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi Sewa Mobil Harian Surabaya ke Malang') }}"
                       class="w-full py-2.5 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-xs text-center no-underline hover:opacity-90 transition-opacity block"
                       target="_blank" rel="noopener noreferrer">
                        Pesan Sewa Harian
                    </a>
                </div>

                {{-- Paket 3 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg hover:-translate-y-1">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-[rgba(34,211,238,0.15)] flex items-center justify-center text-2xl mb-4">
                            🎡
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-[0.7rem] font-bold uppercase tracking-wider block w-fit mb-2">Wisata Keluarga</span>
                        <h3 class="text-white text-xl font-bold mb-2">Paket Wisata Batu - Malang</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                            Jelajahi keindahan destinasi wisata hits Batu &amp; Malang: Jatim Park 1-2-3, Museum Angkut, Coban Rondo, Petik Apel hingga kuliner malam.
                        </p>
                        <ul class="space-y-2 text-xs text-[var(--color-text-light)] mb-6">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Driver hafal rute wisata &amp; kuliner</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Rute tanjakan pegunungan aman</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Cocok rombongan Innova / Hiace</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin paket sewa mobil wisata Batu Malang dari Surabaya') }}"
                       class="w-full py-2.5 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-xs text-center no-underline hover:opacity-90 transition-opacity block"
                       target="_blank" rel="noopener noreferrer">
                        Pesan Paket Wisata
                    </a>
                </div>

                {{-- Paket 4 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg hover:-translate-y-1">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-[rgba(124,58,237,0.2)] flex items-center justify-center text-2xl mb-4">
                            👑
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-[rgba(124,58,237,0.15)] text-[var(--color-accent)] text-[0.7rem] font-bold uppercase tracking-wider block w-fit mb-2">VVIP Executive</span>
                        <h3 class="text-white text-xl font-bold mb-2">VIP Carter Alphard &amp; Hiace</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                            Kemewahan armada flagship Toyota Alphard Transformer &amp; Hiace Premio Luxury untuk tamu kehormatan, direksi, pejabat, dan acara penting.
                        </p>
                        <ul class="space-y-2 text-xs text-[var(--color-text-light)] mb-6">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Captain seat jok kulit &amp; legrest</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Kabin senyap, sunroof &amp; privasi</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Pelayanan standar keprotokoleran</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya butuh sewa Alphard / Hiace Luxury Surabaya ke Malang') }}"
                       class="w-full py-2.5 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-xs text-center no-underline hover:opacity-90 transition-opacity block"
                       target="_blank" rel="noopener noreferrer">
                        Pesan VIP Carter
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: TABEL ESTIMASI HARGA SEWA MOBIL SURABAYA KE MALANG --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="paket-harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[800px] mx-auto mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Harga Sewa</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight">
                    Daftar Harga Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya ke Malang &amp; Batu</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Semua unit yang kami sediakan dalam kondisi prima, wangi, ber-AC dingin, dan <strong>sudah termasuk jasa driver berpengalaman</strong>. Tersedia juga opsi paket All-In (include BBM &amp; Tol).
                </p>
            </div>

            {{-- Price Table --}}
            <div class="overflow-x-auto rounded-[var(--radius-xl)] border border-[var(--color-border)] shadow-xl mb-10">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.15)] border-b border-[var(--color-border)] text-white text-sm">
                            <th class="p-4 font-bold">Jenis Armada Mobil</th>
                            <th class="p-4 font-bold">Kapasitas</th>
                            <th class="p-4 font-bold">Karakteristik &amp; Keunggulan</th>
                            <th class="p-4 font-bold">Estimasi Tarif / Hari</th>
                            <th class="p-4 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)] text-sm text-[var(--color-text-light)]">
                        {{-- Row Innova Reborn --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)] bg-[rgba(34,211,238,0.02)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">🚗</span> Toyota Innova Reborn
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">7 Penumpang</td>
                            <td class="p-4">MPV paling tangguh dan favorit keluarga untuk tanjakan Malang-Batu. Kabin lega, suspensi empuk, dan AC double blower dingin merata.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 1.450.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Innova Reborn rute Surabaya ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row Innova Zenix Hybrid --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">🚘</span> Toyota Innova Zenix Hybrid
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">7 Penumpang</td>
                            <td class="p-4">Generasi terbaru TNGA dengan mesin Hybrid senyap, kabin modern lapang, efisiensi bahan bakar tinggi, dan kenyamanan suspensi kelas atas.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 1.850.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Innova Zenix Hybrid ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row Zenix Type Q Hybrid --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">✨</span> Zenix Type Q Hybrid (Captain Seat)
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">7 Penumpang (VIP)</td>
                            <td class="p-4">Varian tertinggi Zenix dilengkapi Ottoman Captain Seat, Panoramic Sunroof, Dual Rear Entertainment, dan fitur keselamatan TSS mutakhir.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 2.250.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Zenix Type Q Hybrid Captain Seat ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row Toyota Fortuner --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">🚙</span> Toyota Fortuner VRZ / GR Sport
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">7 Penumpang</td>
                            <td class="p-4">SUV mewah berpostur gagah dengan ground clearance tinggi, sangat stabil menaklukkan medan perbukitan Batu, Pujon, maupun rute lereng Bromo.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 2.300.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Toyota Fortuner Surabaya ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row Hiace Commuter --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">🚐</span> Toyota Hiace Commuter
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">14 – 15 Penumpang</td>
                            <td class="p-4">Pilihan terbaik untuk rombongan keluarga besar atau study tour dinas. Kabin tinggi, kursi reclining per penumpang, dan hemat biaya perjalanan.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 1.700.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Hiace Commuter untuk rombongan ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row Hiace Premio Luxury --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">🌟</span> Toyota Hiace Premio Luxury VIP
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">9 Seat VIP Captain</td>
                            <td class="p-4">Kombinasi ruang mikrobus luas dengan kenyamanan jet darat VIP. Kursi Captain Seat kulit lebar berfitur legrest, TV monitor, dan ambience lighting.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 2.850.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Hiace Premio Luxury VIP ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row Alphard Transformer --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">👑</span> Toyota Alphard Transformer (Gen 3)
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">6 VIP Seat</td>
                            <td class="p-4">Ikon MPV mewah paling prestisius. Captain Seat empuk, Dual Sunroof, sistem peredaman kabin super hening, dan driver berstandar VIP.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 2.800.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa Alphard Transformer Surabaya ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>

                        {{-- Row All New Alphard HEV --}}
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">💎</span> All New Alphard HEV (Gen 4 Hybrid)
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">6 VVIP Seat</td>
                            <td class="p-4">Puncak kemewahan VVIP terkini Toyota. Executive Lounge Seats pemanas/pendingin, suspensi adaptif paling halus, dan teknologi Hybrid modern.</td>
                            <td class="p-4 font-bold text-emerald-400">Rp 3.800.000 <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></td>
                            <td class="p-4 text-center">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa All New Alphard Gen 4 Hybrid ke Malang') }}"
                                   class="px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 inline-block"
                                   target="_blank" rel="noopener noreferrer">
                                    Pesan Sekarang
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Price Notes & Inclusions --}}
            <div class="grid grid-cols-2 gap-6 max-md:grid-cols-1">
                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)]">
                    <h3 class="text-white font-bold text-base mb-3 flex items-center gap-2">
                        <span class="text-emerald-400">✓</span> Fasilitas Sewa Termasuk (Include):
                    </h3>
                    <ul class="space-y-2 text-xs text-[var(--color-text-light)]">
                        <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">●</span> Unit kendaraan wangi, bersih, steril &amp; full AC dingin merata</li>
                        <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">●</span> Driver profesional berpengalaman, ramah &amp; menguasai rute Malang-Batu</li>
                        <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">●</span> <strong>Gratis snack segar dan air mineral</strong> di dalam mobil pada hari pertama</li>
                        <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">●</span> Bebas biaya cuci dan perawatan armada</li>
                    </ul>
                </div>

                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)]">
                    <h3 class="text-white font-bold text-base mb-3 flex items-center gap-2">
                        <span class="text-[var(--color-accent)]">💡</span> Mau Paket All-In (BBM, Tol &amp; Parkir)?
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-3">
                        Bagi Anda yang tidak ingin repot mengisi BBM, menyiapkan kartu e-Toll, ataupun mengurus karcis parkir, kami menyediakan <strong>Paket All-In Eksekutif</strong> dengan selisih tarif yang sangat terjangkau.
                    </p>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi penawaran Paket All-In Sewa Mobil Surabaya ke Malang') }}"
                       class="text-[var(--color-accent)] font-semibold text-xs hover:underline inline-flex items-center gap-1"
                       target="_blank" rel="noopener noreferrer">
                        Konsultasikan Penawaran Paket All-In via WhatsApp &rarr;
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: PANDUAN RUTE TOL SURABAYA KE MALANG & ESTIMASI TARIF E-TOLL --}}
    <section class="py-[90px]" id="rute-tol">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-start max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Navigasi Jalan Bebas Hambatan</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Panduan Rute <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Tol Pandaan – Malang (Mapan)</span>
                    </h2>

                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        Jalan Tol Pandaan – Malang (panjang 38,48 km) yang tersambung dengan ruas Tol Surabaya – Gempol dan Gempol – Pandaan telah memangkas drastis waktu tempuh Surabaya ke Malang dari yang semula 3–4 jam menjadi hanya <strong>1,5 hingga 2 jam saja</strong>.
                    </p>

                    <div class="flex flex-col gap-4 my-6">
                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">1</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Masuk Gerbang Tol di Surabaya / Sidoarjo</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Dari Surabaya Selatan atau Bandara Juanda, kendaraan langsung masuk melalui <strong>GT Waru</strong> atau <strong>GT Kejapanan</strong> menyusuri ruas Tol Surabaya – Gempol.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">2</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Ruas Tol Gempol – Pandaan</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Melanjutkan perjalanan menuju Interchange Gempol ke arah Pandaan. Jalur ini mulus dan menyuguhkan panorama Gunung Penanggungan di sisi kanan.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">3</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Tol Pandaan – Malang (Tol Mapan)</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Membentang melewati Purwodadi, Lawang, dan Singosari dengan suguhan pemandangan menakjubkan Gunung Arjuno-Welirang. Melintasi Rest Area KM 66 Pandaan yang megah.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.3)]">
                            <span class="w-8 h-8 rounded-full bg-[var(--color-accent)] text-[var(--color-bg)] font-bold flex items-center justify-center flex-shrink-0 text-sm">4</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Pilihan Gerbang Keluar (Exit Tol) Malang</h4>
                                <p class="text-[var(--color-text-light)] text-xs mt-1 leading-relaxed">
                                    • <strong>GT Singosari (Karanglo):</strong> Paling direkomendasikan menuju Kota Batu &amp; pusat perkantoran Kota Malang.<br>
                                    • <strong>GT Pakis:</strong> Akses tercepat ke Bandara Abdulrachman Saleh Malang &amp; jalur Bromo via Tumpang.<br>
                                    • <strong>GT Madyopuro (Malang Kota):</strong> Akses ke wilayah Sawojajar, Kota Malang Selatan &amp; Kepanjen.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Rincian Tarif Tol Card, Disclaimer & Referensi --}}
                <div class="flex flex-col gap-6">
                    <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-xl">
                        <div class="flex items-center justify-between pb-4 mb-6 border-b border-[var(--color-border)]">
                            <h3 class="text-white text-xl font-bold flex items-center gap-2">
                                💳 Rincian Tarif Tol Surabaya – Malang
                            </h3>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold">Golongan I</span>
                        </div>

                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Tarif tol sistem tertutup dari Surabaya (Waru/Kejapanan) menuju Exit Tol Singosari &amp; Madyopuro untuk kendaraan Golongan I (Sedan, MPV, SUV, Minibus):
                        </p>

                        <div class="space-y-3 text-sm">
                            <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div>
                                    <div class="text-[var(--color-text-light)] font-medium">1. Tol Surabaya – Gempol (Waru - Kejapanan)</div>
                                    <div class="text-[var(--color-text-muted)] text-[0.7rem]">Operator: PT Jasa Marga (Persero) Tbk</div>
                                </div>
                                <span class="font-bold text-white">Rp 10.500</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div>
                                    <div class="text-[var(--color-text-light)] font-medium">2. Tol Gempol – Pandaan (Gempol IC - Pandaan)</div>
                                    <div class="text-[var(--color-text-muted)] text-[0.7rem]">Operator: PT Jasamarga Pandaan Tol</div>
                                </div>
                                <span class="font-bold text-white">Rp 13.000</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div>
                                    <div class="text-[var(--color-text-light)] font-medium">3. Tol Pandaan – Malang (Exit Singosari)</div>
                                    <div class="text-[var(--color-text-muted)] text-[0.7rem]">Operator: PT Jasamarga Pandaan Malang</div>
                                </div>
                                <span class="font-bold text-white">Rp 35.500</span>
                            </div>
                            <div class="flex items-center justify-between p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.1)] border border-[rgba(34,211,238,0.3)]">
                                <div>
                                    <span class="text-white font-bold text-base block">Total Akumulasi Tarif Tol:</span>
                                    <span class="text-[var(--color-text-muted)] text-xs">Surabaya (Waru) &rarr; Exit Tol Singosari</span>
                                </div>
                                <span class="text-[var(--color-accent)] font-bold text-xl">Rp 59.000</span>
                            </div>
                        </div>

                        {{-- DISCLAIMER PERUBAHAN TARIF --}}
                        <div class="mt-6 p-4 rounded-[var(--radius-md)] bg-[rgba(245,158,11,0.08)] border border-[rgba(245,158,11,0.3)] text-xs text-[var(--color-text-light)] leading-relaxed">
                            <div class="flex items-center gap-2 text-amber-400 font-bold mb-1.5 text-xs">
                                <span>⚠️</span>
                                <span>CATATAN &amp; DISCLAIMER PERUBAHAN TARIF</span>
                            </div>
                            <p class="text-[var(--color-text-muted)]">
                                <em>Informasi tarif tol, jarak, dan rute dihimpun berdasarkan ketetapan resmi BPJT Kementerian PUPR saat artikel ini disusun (September 2026). Tarif dapat disesuaikan berkala oleh operator tol. Jika keluar di GT Madyopuro (Ujung Malang Kota), total tarif adalah Rp 65.500.</em>
                            </p>
                            <p class="text-[var(--color-text-muted)] mt-2">
                                💡 <strong>Saran Saldo e-Toll:</strong> Siapkan saldo kartu e-Toll minimal <strong>Rp 100.000</strong> (sekali jalan) atau <strong>Rp 200.000</strong> (PP).
                            </p>
                        </div>
                    </div>

                    {{-- Rest Area & Rujukan Data --}}
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6">
                        <h4 class="text-white font-bold text-base mb-3 flex items-center gap-2">
                            ☕ Rest Area Favorit Sepanjang Perjalanan
                        </h4>
                        <p class="text-xs text-[var(--color-text-muted)] leading-relaxed mb-3">
                            <strong class="text-[var(--color-accent)]">Rest Area KM 66 A/B Tol Pandaan-Malang:</strong> Rest area ikonik berlatar belakang pegunungan asri dengan fasilitas SPBU 24 jam, Masjid megah, gerai kopi modern, food court kuliner lokal, dan toilet bersih berstandar tinggi.
                        </p>
                        <div class="pt-3 border-t border-[var(--color-border)] text-[0.7rem] text-[var(--color-text-muted)]">
                            📚 <strong>Sumber Rujukan Data:</strong> Badan Pengatur Jalan Tol (BPJT) Kementerian PUPR (<a href="https://bpjt.pu.go.id" target="_blank" rel="nofollow noopener noreferrer" class="text-[var(--color-accent)] hover:underline">bpjt.pu.go.id</a>), PT Jasa Marga (Persero) Tbk, dan Navigasi Google Maps.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: PERBANDINGAN JALUR TOL VS JALUR ARTERI NON-TOL --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="perbandingan-jalur">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Efisiensi Waktu &amp; Tenaga</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Lewat Tol vs Non-Tol: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mengapa Sewa Mobil via Tol Lebih Unggul?</span>
                    </h2>
                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        Sebelum jalan tol beroperasi, perjalanan darat dari Surabaya ke Malang melalui jalur arteri nasional (Surabaya &rarr; Waru &rarr; Sidoarjo &rarr; Porong &rarr; Gempol &rarr; Sukorejo &rarr; Purwosari &rarr; Lawang &rarr; Singosari &rarr; Malang) kerap memakan waktu <strong>3 hingga 4 jam</strong> karena padatnya kendaraan berat dan pasar tumpah.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Dengan memanfaatkan layanan sewa mobil plus driver dari <strong>{{ config('site.brand') }}</strong> via Tol Trans Jawa, Anda menghemat waktu <strong>hingga 2 jam penuh</strong>. Anda bisa tiba di hotel, lokasi meeting, atau tempat wisata di Malang dalam kondisi segar tanpa rasa lelah mengemudi.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Sopir kami telah terlatih mengambil rute tercepat dan memahami rekayasa lalu lintas saat akhir pekan di kawasan Singosari menuju Batu.
                    </p>
                </div>

                {{-- Titik Kemacetan Arteri Card --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                        🛑 Titik Rawan Macet Jalur Arteri Non-Tol
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                        Titik simpul kemacetan yang sering memperlambat perjalanan di jalur arteri Surabaya – Malang:
                    </p>

                    <div class="flex flex-col gap-3.5 text-sm">
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">1. Kawasan Industri Buduran &amp; Porong Sidoarjo:</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Lalu lintas padat truk industri kontainer serta persimpangan rel kereta api di sepanjang jalur arteri Sidoarjo.</p>
                        </div>
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">2. Pasar Lawang (Kabupaten Malang):</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Aktivitas pasar tradisional, angkutan umum yang berhenti di bahu jalan, serta pejalan kaki yang menyeberang jalan nasional.</p>
                        </div>
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">3. Simpang Karanglo &amp; Pasar Singosari:</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Titik pertemuan arus wisatawan yang menuju Kota Batu dan kendaraan lokal Malang Raya yang sangat padat saat akhir pekan.</p>
                        </div>
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">4. Pertigaan Purwosari:</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Persimpangan lampu merah pertemuan arus dari arah Pasuruan/Probolinggo dengan jalur utama Surabaya-Malang.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 5: DESTINASI WISATA & KULINER FAVORIT MALANG & BATU --}}
    <section class="py-[90px]" id="wisata-malang">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[800px] mx-auto mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Eksplorasi Malang Raya</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight">
                    Destinasi Populer di Malang &amp; Batu yang <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Wajib Anda Kunjungi</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Begitu tiba di Malang dengan armada sewa Queen Transport, nikmati berbagai objek wisata bertaraf internasional dan ragam kuliner legendaris:
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                {{-- Wisata 1 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🦒</span>
                    <h3 class="text-white font-bold text-lg mb-2">Jatim Park 1, 2, &amp; 3</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Kota Wisata Batu</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Destinasi rekreasi keluarga nomor satu di Jawa Timur. Nikmati Batu Secret Zoo, Museum Satwa, Eco Green Park, hingga Dino Park di Jatim Park 3 dengan wahana modern ramah anak.
                    </p>
                </div>

                {{-- Wisata 2 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🏎️</span>
                    <h3 class="text-white font-bold text-lg mb-2">Museum Angkut &amp; Pasar Apung</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Kecamatan Batu</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Museum transportasi interaktif terbesar di Asia Tenggara yang menampilkan koleksi ratusan mobil antik legendaris dari berbagai belahan dunia lengkap dengan suasana perkotaan tematik.
                    </p>
                </div>

                {{-- Wisata 3 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🌋</span>
                    <h3 class="text-white font-bold text-lg mb-2">Wisata Sunrise Bromo (Via Malang)</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Tumpang / Gubugklakah</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Jalur favorit wisatawan menuju lautan pasir dan kawah Bromo. Queen Transport melayani drop-off hingga transit point Jeep di Tumpang dengan unit Innova atau Hiace yang nyaman.
                    </p>
                </div>

                {{-- Kuliner 1 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🍲</span>
                    <h3 class="text-white font-bold text-lg mb-2">Bakso President Malang</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Kuliner Legendaris Pinggir Rel Kereta</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Menikmati semangkuk bakso kuah gurih segar, bakso bakar pedas, bakwan renyah, dan siomay basah tepat di samping perlintasan rel kereta api aktif di tengah Kota Malang.
                    </p>
                </div>

                {{-- Kuliner 2 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🍧</span>
                    <h3 class="text-white font-bold text-lg mb-2">Toko Oen &amp; Rawon Nguling</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Kawasan Heritage Alun-Alun Malang</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Nostalgia es krim tempo doeloe resep Belanda sejak 1930 di Toko Oen, dilanjutkan santap rawon daging empuk kuah kluwek pekat khas Rawon Nguling di Jl. Zainul Arifin Malang.
                    </p>
                </div>

                {{-- Kuliner 3 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🍵</span>
                    <h3 class="text-white font-bold text-lg mb-2">Pos Ketan Legenda 1967 Batu</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Alun-Alun Kota Wisata Batu</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Kuliner malam legendaris di jantung Alun-Alun Kota Batu. Ketan pulen hangat disajikan aneka topping manis dan gurih, mulai dari keju, meses, durian susu, hingga bubuk kedelai.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 6: KEUNGGULAN SEWA MOBIL DI QUEEN TRANSPORT --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="keunggulan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Standar Pelayanan Prima</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Mengapa Memilih Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya ke Malang di Queen Transport?</span>
                    </h2>
                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        Sebagai penyedia jasa transportasi eksekutif di Jawa Timur, kepuasan, privasi, dan keamanan Anda adalah prioritas utama kami. Berikut keunggulan layanan kami:
                    </p>

                    <div class="space-y-4 my-6">
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Penjemputan Door-to-Door Tepat Waktu</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Driver kami standby sebelum jadwal penerbangan Anda tiba di Bandara Juanda atau jadwal kereta di Stasiun Surabaya.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Driver Ramah &amp; Paham Karakter Medan</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Sopir menguasai etika hospitality, ramah terhadap keluarga dan anak-anak, serta berpengalaman menghadapi rute tanjakan curam di Batu dan Pujon.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Unit Mobil Bersih, Wangi &amp; Rutin Diservis</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Setiap kendaraan melewati inspeksi rutin mesin, ban, rem, dan AC sebelum melayani perjalanan luar kota.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Gratis Snack &amp; Air Mineral Hari Pertama</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Sebagai bentuk sambutan hangat kami, tersedia air mineral botol dan camilan gratis di dalam kabin mobil.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi ketersediaan armada Surabaya ke Malang') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                       target="_blank" rel="noopener noreferrer">
                        💬 Hubungi Admin via WhatsApp
                    </a>
                </div>

                {{-- Area Matrix Card --}}
                <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-xl">
                    <h3 class="text-white font-bold text-xl mb-4 flex items-center gap-2">
                        📍 Estimasi Waktu &amp; Jarak ke Titik Malang Raya
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-xs mb-6 leading-relaxed">
                        Estimasi waktu tempuh dari Surabaya (via Tol Pandaan - Malang) menuju kawasan populer:
                    </p>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Pusat Kota Malang / Stasiun Kotabaru</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Klojen, Alun-Alun &amp; Kampus UB</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 30 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">± 90 km</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Singosari &amp; Kawasan Ekonomi Khusus</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Underpass Karanglo &amp; Exit Tol</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 15 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">± 75 km</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Kota Wisata Batu (Jatim Park / Museum Angkut)</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Via Jalur Tembus Karangploso</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 45 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">± 105 km</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Transit Jeep Bromo (Tumpang)</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Exit Tol Pakis &rarr; Jalur Tumpang</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 45 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">± 100 km</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 7: TATA CARA PEMESANAN MOBIL (HOW TO BOOK) --}}
    <section class="py-[90px]" id="cara-pesan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[800px] mx-auto mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Proses Cepat &amp; Praktis</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight">
                    3 Langkah Mudah Pemesanan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Mobil ke Malang</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Kami mempermudah proses reservasi agar Anda dapat langsung merencanakan perjalanan tanpa kendala:
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-md:grid-cols-1">
                {{-- Step 1 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 text-center relative hover:border-[var(--color-accent)] transition-all">
                    <div class="w-14 h-14 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] text-xl font-bold flex items-center justify-center mx-auto mb-5">
                        1
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Konsultasi via WhatsApp</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Hubungi admin kami dan sebutkan tanggal perjalanan, jumlah penumpang, lokasi jemput, dan destinasi tujuan Anda di Malang/Batu.
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 text-center relative hover:border-[var(--color-accent)] transition-all">
                    <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xl font-bold flex items-center justify-center mx-auto mb-5">
                        2
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Pilih Armada &amp; Konfirmasi</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Tentukan tipe unit yang Anda kehendaki (Innova, Hiace, Fortuner, atau Alphard). Admin akan mengirimkan invoice konfirmasi reservasi unit Anda.
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 text-center relative hover:border-[var(--color-accent)] transition-all">
                    <div class="w-14 h-14 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] text-xl font-bold flex items-center justify-center mx-auto mb-5">
                        3
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Penjemputan Tepat Waktu</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Driver kami tiba di titik penjemputan sesuai jadwal, siap membantu koper Anda dan mengantarkan perjalanan hingga ke tujuan dengan aman.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 8: FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="faq">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pertanyaan Umum</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    FAQ Sewa Mobil Surabaya ke Malang <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">&amp; Kota Batu</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3">
                    Jawaban ringkas dan jelas seputar layanan rental, tarif tol, paket wisata, dan penjemputan bandara.
                </p>
            </div>

            <div class="max-w-[900px] mx-auto flex flex-col gap-4">
                @foreach ($faqs as $faq)
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6">
                    <h3 class="text-white font-bold text-base mb-2 flex items-center gap-3">
                        <span class="text-[var(--color-accent)]">❓</span> {{ $faq['q'] }}
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed pl-8">
                        {{ $faq['a'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 9: ARMADA REKOMENDASI UNTUK PERJALANAN LUAR KOTA --}}
    <x-armada-list
        subtitle="Pilihan Armada Eksekutif"
        title="Pilihan Mobil Sewa Terbaik <span style='background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;'>Surabaya ke Malang &amp; Batu</span>"
        description="Temukan kendaraan paling pas untuk kebutuhan rombongan, liburan keluarga, maupun kunjungan dinas ke Malang Raya. Semua unit include driver profesional."
        wa-text="untuk perjalanan Surabaya ke Malang"
        :limit="6"
    />

    {{-- SECTION 10: FINAL CTA BANNER --}}
    <section class="py-20 relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1000px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs uppercase tracking-widest font-semibold mb-6 inline-block">
                ✦ Perjalanan Cepat, Aman &amp; Nyaman
            </span>
            <h2 class="text-white text-[clamp(2rem,4vw,3rem)] font-bold mb-4 leading-tight">
                Siap Berangkat ke Malang &amp; Batu? <br class="hidden sm:block">
                <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Pesan Sewa Mobil di Queen Transport Sekarang!</span>
            </h2>
            <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto mb-8 text-base leading-relaxed">
                Nikmati waktu tempuh singkat 1,5 jam Surabaya – Malang dengan armada terawat, sopir ramah berpengalaman, dan fasilitas snack segar gratis. Hubungi customer service kami via WhatsApp kapan saja.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking sewa mobil Surabaya ke Malang sekarang') }}"
                   class="inline-flex items-center gap-2 px-10 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Online 24 Jam)
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
