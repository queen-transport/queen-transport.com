<?php

use function Laravel\Folio\name;

name('rental-mobil-mewah-jawa-timur');
?>

@php
$faqs = [
    [
        'q' => 'Mengapa memilih rental mobil mewah Jawa Timur di Queen Transport?',
        'a' => 'Queen Transport adalah penyedia rental mobil mewah terpercaya di Jawa Timur dengan jajaran unit terbaru, bersih, dan wangi. Setiap perjalanan dipandu oleh driver profesional berseragam rapi, menguasai rute jalan tol Trans Jawa serta medan wisata pegunungan, dengan jaminan layanan ramah dan beretika protokoler VIP.',
    ],
    [
        'q' => 'Apa saja pilihan mobil mewah yang disewakan untuk wilayah Jawa Timur?',
        'a' => 'Kami menyediakan beragam armada kelas atas seperti Toyota All New Alphard HEV (Gen 4), Toyota Alphard Transformer (Gen 3), Toyota Hiace Premio Luxury VIP (9 Captain Seats), Toyota Fortuner New Legend & GR Sport, serta Toyota Innova Zenix Hybrid Modelista.',
    ],
    [
        'q' => 'Apakah rental mobil mewah Jawa Timur sudah termasuk pengemudi (driver)?',
        'a' => 'Ya, seluruh paket rental mobil mewah di Queen Transport sudah 100% include pengemudi (driver) profesional. Kami tidak melayani lepas kunci untuk kategori mobil mewah demi menjamin keamanan, kenyamanan maksimal, serta bebas repot bagi Anda.',
    ],
    [
        'q' => 'Wilayah mana saja di Jawa Timur yang dijangkau oleh Queen Transport?',
        'a' => 'Kami melayani penjemputan dan perjalanan ke seluruh penjuru Jawa Timur meliputi Surabaya, Sidoarjo, Gresik, Malang Raya, Kota Wisata Batu, Pasuruan, Probolinggo (Gunung Bromo), Kediri, Blitar, Tulungagung, Madiun, Nganjuk, Ngawi, Jember, Banyuwangi (Kawah Ijen), Situbondo, hingga Pulau Madura (Bangkalan, Sampang, Pamekasan, Sumenep).',
    ],
    [
        'q' => 'Apakah melayani penjemputan VIP di Bandara Juanda Surabaya dan Bandara Abdulrachman Saleh Malang?',
        'a' => 'Tentu saja. Kami menyediakan layanan airport transfer VIP (pick-up & drop-off) di Bandara Internasional Juanda Surabaya (Terminal 1 & Terminal 2), Bandara Abdulrachman Saleh Malang, Stasiun Surabaya Gubeng/Pasar Turi, maupun hotel berbintang di Jawa Timur dengan layanan penjemputan tepat waktu menggunakan papan nama VIP.',
    ],
    [
        'q' => 'Bisakah menyewa mobil mewah untuk keperluan Wedding Car (Mobil Pengantin) di Jawa Timur?',
        'a' => 'Sangat bisa! Kami menyediakan paket Wedding Car mewah (terutama Toyota Alphard Transformer & Gen 4 Hybrid) lengkap dengan dekorasi bunga segar eksklusif, pita pengantin, serta driver berpakaian formal rapi untuk menyempurnakan momen hari pernikahan Anda di seluruh kota di Jawa Timur.',
    ],
    [
        'q' => 'Apakah tersedia paket All-In (Mobil + Driver + BBM + Tol)?',
        'a' => 'Ya, selain sewa standar mobil + driver, kami juga melayani paket All-In yang sudah mencakup bahan bakar (BBM), biaya tol Trans Jawa, parkir, dan konsumsi driver sehingga Anda tinggal duduk santai menikmati perjalanan dinas atau liburan tanpa memikirkan biaya operasional tambahan di jalan.',
    ],
    [
        'q' => 'Bagaimana prosedur reservasi rental mobil mewah di Jawa Timur?',
        'a' => 'Reservasi sangat mudah dan cepat. Cukup hubungi customer service kami via WhatsApp, informasikan tipe armada pilihan, tanggal pemakaian, rute atau destinasi di Jawa Timur, serta titik penjemputan. Tim kami akan segera mengonfirmasi ketersediaan unit dan mengirimkan invoice resmi pemesanan.',
    ],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$pelanggans = $armadaService->getPelanggans();

$title = 'Rental Mobil Mewah Jawa Timur — Sewa Mobil VIP & Pengantin + Driver — ' . config('site.brand');
$description = 'Rental mobil mewah Jawa Timur terlengkap: Toyota Alphard, Hiace Premio Luxury VIP, Fortuner & Innova Zenix include driver profesional. Melayani Surabaya, Malang, Batu, Bromo & se-Jatim untuk dinas VIP, event, wedding car, dan airport transfer.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@graph": [
        {
          "@type": "AutoRental",
          "@id": "{{ $canonical }}#autorental",
          "name": "Rental Mobil Mewah Jawa Timur — {{ config('site.brand') }}",
          "description": "{{ $description }}",
          "url": "{{ $canonical }}",
          "telephone": "+{{ config('site.whatsapp_number') }}",
          "priceRange": "Rp 1.450.000 - Rp 3.800.000",
          "image": "{{ asset('og-image.png') }}",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ config('site.address') }}",
            "addressLocality": "Sidoarjo",
            "addressRegion": "Jawa Timur",
            "addressCountry": "ID"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": "-7.3756",
            "longitude": "112.7266"
          },
          "areaServed": [
            { "@type": "AdministrativeArea", "name": "Jawa Timur" },
            { "@type": "City", "name": "Surabaya" },
            { "@type": "City", "name": "Sidoarjo" },
            { "@type": "City", "name": "Gresik" },
            { "@type": "City", "name": "Malang" },
            { "@type": "City", "name": "Kota Batu" },
            { "@type": "City", "name": "Pasuruan" },
            { "@type": "City", "name": "Probolinggo" },
            { "@type": "City", "name": "Kediri" },
            { "@type": "City", "name": "Madiun" },
            { "@type": "City", "name": "Jember" },
            { "@type": "City", "name": "Banyuwangi" }
          ]
        },
        {
          "@type": "Service",
          "@id": "{{ $canonical }}#service",
          "name": "Rental Mobil Mewah Jawa Timur",
          "serviceType": "Luxury Car Rental with Professional Chauffeur",
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
          "areaServed": {
            "@type": "AdministrativeArea",
            "name": "Jawa Timur"
          },
          "offers": {
            "@type": "AggregateOffer",
            "priceCurrency": "IDR",
            "lowPrice": "1450000",
            "highPrice": "3800000",
            "offerCount": "11",
            "availability": "https://schema.org/InStock",
            "url": "{{ $canonical }}"
          }
        },
        {
          "@type": "FAQPage",
          "@id": "{{ $canonical }}#faq",
          "mainEntity": [
            @foreach ($faqs as $faq)
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
              "name": "Rental Mobil Mewah Jawa Timur",
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
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Mobil Mewah Jawa Timur #1 Standar VIP &amp; Eksekutif
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Rental Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Jawa Timur</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Toyota Alphard &bull; Hiace Premio Luxury &bull; Fortuner &bull; Innova Zenix
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan rental mobil mewah terbaik dan paling terpercaya di seluruh wilayah Jawa Timur. Nikmati kenyamanan perjalanan VIP dengan armada terbaru, kabin bersih steril, serta sopir profesional berpengalaman untuk kunjungan dinas, tamu kehormatan, mobil pernikahan, hingga wisata eksklusif.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & pesan Rental Mobil Mewah di Jawa Timur') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Mobil Mewah Jatim
                        </a>
                        <a href="#katalog-mewah-jatim"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Cek Armada &amp; Tarif
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">💎</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Executive VIP Class</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Mengapa {{ config('site.brand') }} di Jatim?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Penyedia transportasi eksekutif terdepan dengan reputasi bintang lima di Jawa Timur yang mengutamakan prestise, kenyamanan, dan keselamatan prima.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Berpengalaman</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">TERBARU</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Unit Prima &amp; Wangi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sepanjang Hari</div>
                                <div class="text-[var(--color-text-muted)] text-xs">CS Responsif 24/7</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">FREE</div>
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
                        <p class="text-[var(--color-text-muted)] text-xs">Kabin lapang &amp; empuk</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Rapi &amp; Beretika</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Standar protokoler VIP</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🛣️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Rute Tol Se-Jawa Timur</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Hafal jalur Trans Jawa</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⭐</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Layanan Bintang Lima</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Pilihan instansi &amp; korporasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- REUSABLE ARMADA LIST COMPONENT --}}
    <div id="katalog-mewah-jatim">
        <x-armada-list 
            subtitle="Katalog Unit Mewah Jawa Timur"
            title="Pilihan Rental Mobil Mewah di Jawa Timur"
            description="Lini kendaraan eksekutif terlengkap untuk menunjang mobilitas berkelas Anda di seluruh kota Jawa Timur, mencakup Toyota Alphard, Hiace Premio Luxury, Fortuner, dan Innova Zenix VIP."
            wa-text="rental mobil mewah di Jawa Timur"
        />
    </div>

    {{-- PRICING SUMMARY SECTION --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="daftar-harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Paket &amp; Estimasi Tarif</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Rental <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mobil Mewah Jawa Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga transparan dan kompetitif sudah termasuk pengemudi profesional yang ramah dan handal untuk rute dalam maupun luar kota se-Jawa Timur.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach (array_slice($kelasAtasPrices, 0, 3) as $price)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:border-[var(--color-accent)] hover:shadow-[0_10px_30px_rgba(124,58,237,0.25)]">
                        @if (!empty($price['badge']))
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

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa mobil mewah unit ' . $price['name'] . ' di Jawa Timur. Mohon info ketersediaan & paketnya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Sewa {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <p class="text-[var(--color-text-muted)] text-xs max-w-[700px] mx-auto">
                    * Catatan: Tarif tertera adalah harga sewa per hari (unit + driver). Tersedia pula paket All-In (BBM, Tol Trans Jawa, Parkir, dan Uang Makan Driver) untuk kemudahan operasional perjalanan Anda di seluruh Jawa Timur.
                </p>
            </div>
        </div>
    </section>
    @endif

    {{-- SERVICES SECTION (USE CASES) --}}
    <section class="py-[90px]" id="layanan-mewah-jatim">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Peruntukan Layanan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Solusi Rental Mobil Mewah Jawa Timur untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Kebutuhan Eksklusif</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Kami menjadi partner utama mobilitas VIP bagi para eksekutif, instansi pemerintahan, event organizer nasional, hingga keluarga terhormat di Jawa Timur:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['🏛️', 'Kunjungan Dinas & Tamu VIP Kenegaraan', 'Transportasi representatif bagi pejabat kementerian, direksi BUMN/swasta, dan tamu kehormatan dengan sopir beretika protokoler rapi.'],
                            ['💒', 'Luxury Wedding Car (Mobil Pengantin Mewah)', 'Momen sakral pernikahan berkesan dengan Toyota Alphard berhias dekorasi bunga segar eksklusif dan driver berpenampilan formal jas/batik.'],
                            ['✈️', 'Airport Transfer VIP Juanda & Abdulrachman Saleh', 'Layanan antar jemput tepat waktu di Bandara Juanda Surabaya (T1 & T2) serta Bandara Abdulrachman Saleh Malang dengan layanan bagasi VIP.'],
                            ['🌄', 'Private Tour Bromo, Batu & Wisata Jatim', 'Perjalanan liburan keluarga premium menuju Bromo sunrise tour, resor pegunungan Kota Batu, dan Kawah Ijen dengan kenyamanan suspensi terbaik.'],
                            ['🏭', 'Roadshow Kawasan Industri Se-Jawa Timur', 'Kunjungan bisnis teratur ke kawasan industri JIIPE Manyar Gresik, PIER Pasuruan, NIP Ngoro Mojokerto, hingga pergudangan Sidoarjo dan Surabaya.'],
                        ] as [$icon, $titleService, $desc])
                            <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                                <div class="text-2xl flex-shrink-0 w-11 h-11 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1 text-sm">{{ $titleService }}</h4>
                                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Feature box right side --}}
                <div class="flex flex-col gap-6 p-8 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] shadow-2xl">
                    <h3 class="text-white text-xl font-bold border-b border-[var(--color-border)] pb-4">
                        Standar Keunggulan {{ config('site.brand') }}
                    </h3>

                    <div class="grid grid-cols-1 gap-4 text-sm">
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Driver Berpengalaman Rute Tol &amp; Jalur Wisata Jawa Timur</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Kabin Steril, Higienis, Dingin &amp; Bebas Asap Rokok</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Unit Tahun Muda dengan Perawatan Rutin Dealer Resmi</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Jaminan Tepat Waktu (Driver Standby 30 Menit Sebelum Jadwal)</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Dukungan Invoice Resmi &amp; Pembayaran Corporate / Perusahaan</span>
                        </div>
                        <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                            <span class="w-7 h-7 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] flex items-center justify-center font-bold text-xs">✓</span>
                            <span>Customer Care Fast Response Siaga Sepanjang Hari</span>
                        </div>
                    </div>

                    <div class="mt-4 pt-6 border-t border-[var(--color-border)]">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking rental mobil mewah di Jawa Timur.') }}"
                           class="block text-center py-4 rounded-[var(--radius-xl)] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Hubungi Tim Reservasi VIP Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- COVERAGE AREA SECTION (CAKUPAN JAWA TIMUR) --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="wilayah-layanan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Jangkauan Wilayah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Cakupan Layanan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rental Mobil Mewah se-Jawa Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Queen Transport siap melayani penjemputan dari pusat kota Surabaya/Sidoarjo menuju seluruh penjuru kota dan kabupaten di provinsi Jawa Timur.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[var(--color-accent)] transition-all">
                    <div class="text-2xl mb-3">🏙️</div>
                    <h3 class="text-white font-bold text-lg mb-2">Gerbangkertosusila</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Surabaya, Sidoarjo, Gresik, &amp; Mojokerto. Meliputi pusat perkantoran, perhotelan bintang lima, pabrik JIIPE, dan Bandara Internasional Juanda.
                    </p>
                    <div class="text-[var(--color-accent)] text-xs font-semibold">✦ Pusat Mobilitas Utama</div>
                </div>

                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[var(--color-accent)] transition-all">
                    <div class="text-2xl mb-3">🏔️</div>
                    <h3 class="text-white font-bold text-lg mb-2">Malang Raya &amp; Kota Batu</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Akses cepat via Tol Pandaan–Malang. Sangat diminati untuk seminar eksekutif, liburan keluarga mewah, dan wisata resor pegunungan Batu.
                    </p>
                    <div class="text-[var(--color-accent)] text-xs font-semibold">✦ Wisata &amp; Resort Mewah</div>
                </div>

                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[var(--color-accent)] transition-all">
                    <div class="text-2xl mb-3">🌋</div>
                    <h3 class="text-white font-bold text-lg mb-2">Pasuruan, Probolinggo &amp; Bromo</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Menjangkau kawasan industri PIER Pasuruan dan destinasi wisata dunia Taman Nasional Bromo Tengger Semeru dengan kenyamanan maksimal.
                    </p>
                    <div class="text-[var(--color-accent)] text-xs font-semibold">✦ Private Tour Bromo VIP</div>
                </div>

                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[var(--color-accent)] transition-all">
                    <div class="text-2xl mb-3">🚆</div>
                    <h3 class="text-white font-bold text-lg mb-2">Mataraman &amp; Tol Barat Jatim</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Madiun, Ngawi, Magetan, Nganjuk, Kediri, Blitar, &amp; Tulungagung. Akses mulus Tol Trans Jawa untuk kunjungan dinas dan bisnis rokok/pabrik.
                    </p>
                    <div class="text-[var(--color-accent)] text-xs font-semibold">✦ Akses Cepat Tol Trans Jawa</div>
                </div>

                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[var(--color-accent)] transition-all">
                    <div class="text-2xl mb-3">🌊</div>
                    <h3 class="text-white font-bold text-lg mb-2">Tapal Kuda &amp; Banyuwangi</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Jember, Lumajang, Situbondo, Bondowoso, hingga Banyuwangi (Kawah Ijen &amp; Pelabuhan Ketapang penyeberangan menuju Pulau Bali).
                    </p>
                    <div class="text-[var(--color-accent)] text-xs font-semibold">✦ Jalur Wisata &amp; Overland</div>
                </div>

                <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[var(--color-accent)] transition-all">
                    <div class="text-2xl mb-3">🌉</div>
                    <h3 class="text-white font-bold text-lg mb-2">Pulau Madura Raya</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Bangkalan, Sampang, Pamekasan, &amp; Sumenep via Jembatan Nasional Suramadu untuk kebutuhan kunjungan dinas, ziarah, dan silaturahmi keluarga.
                    </p>
                    <div class="text-[var(--color-accent)] text-xs font-semibold">✦ Lintasi Jembatan Suramadu</div>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW TO BOOK / CARA PEMESANAN --}}
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Panduan Reservasi</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    3 Langkah Mudah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Pesan Rental Mobil Mewah</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Proses pemesanan cepat tanpa birokrasi rumit, cukup komunikasi langsung melalui WhatsApp.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-md:grid-cols-1">
                <div class="p-8 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] relative">
                    <div class="w-12 h-12 rounded-full bg-[image:var(--gradient-btn)] text-white font-bold text-lg flex items-center justify-center mb-6 shadow-md">
                        1
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Konsultasi Jadwal &amp; Armada</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Hubungi tim kami via WhatsApp. Tentukan tipe armada mewah yang Anda perlukan (Alphard, Hiace Luxury, Fortuner, atau Zenix), tanggal penggunaan, serta rute tujuan di Jawa Timur.
                    </p>
                </div>

                <div class="p-8 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] relative">
                    <div class="w-12 h-12 rounded-full bg-[image:var(--gradient-btn)] text-white font-bold text-lg flex items-center justify-center mb-6 shadow-md">
                        2
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Konfirmasi Penawaran &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Tim admin akan memberikan invoice konfirmasi dan rincian pemesanan resmi. Amankan jadwal sewa dengan membayarkan Down Payment (DP) secara mudah via transfer perbankan.
                    </p>
                </div>

                <div class="p-8 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] relative">
                    <div class="w-12 h-12 rounded-full bg-[image:var(--gradient-btn)] text-white font-bold text-lg flex items-center justify-center mb-6 shadow-md">
                        3
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Driver Standby Tepat Waktu</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Pada hari keberangkatan, driver profesional berseragam rapi dan mobil mewah yang telah bersih steril akan siap menjemput Anda tepat waktu di lokasi yang telah disepakati.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIAL SECTION --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pengalaman Klien</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Testimoni Pelanggan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rental Mobil Mewah Jawa Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">
                    Kepercayaan jajaran direksi, tamu kementerian, dan keluarga terhormat yang telah membuktikan kualitas layanan Queen Transport.
                </p>
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
                            <p class="text-[var(--color-text-muted)] text-xs">{{ $pelanggan->title ?? 'Pelanggan VIP Jawa Timur' }}</p>
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
                    FAQ <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rental Mobil Mewah Jawa Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">
                    Pertanyaan yang sering diajukan seputar penyewaan armada mobil mewah di Jawa Timur.
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
                ✦ Tempat Rental Mobil Mewah Terbaik di Jawa Timur
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Pesan Rental Mobil Mewah Jawa Timur Sekarang
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[650px] mx-auto leading-relaxed">
                Nikmati kemewahan berkendara tanpa kompromi untuk acara dinas, pernikahan, maupun liburan eksklusif Anda di Jawa Timur bersama {{ config('site.brand') }}.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & reservasi Rental Mobil Mewah di Jawa Timur.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi WhatsApp Reservasi Cepat
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
