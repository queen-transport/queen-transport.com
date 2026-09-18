<?php

use function Laravel\Folio\name;

name('air-mancur-kenjeran');
?>

@php
use App\Services\AirMancurKenjeranService;

$service = app(AirMancurKenjeranService::class);
extract($service->getAirMancurKenjeranPageData());

$title = 'Air Mancur Kenjeran Surabaya: Jadwal, Lokasi & Rental Mobil VIP — ' . config('site.brand');
$description = 'Panduan lengkap wisata Air Mancur Kenjeran (Air Mancur Menari Jembatan Suroboyo). Cek jadwal pertunjukan, lokasi, daya tarik & layanan rental mobil VIP Alphard, Hiace & Zenix include driver.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "TouristAttraction",
          "@@id": "{{ $canonical }}#attraction",
          "name": "Air Mancur Kenjeran (Air Mancur Menari Jembatan Suroboyo)",
          "description": "Atraksi wisata malam ikonik di Jembatan Suroboyo Kenjeran dengan pertunjukan air mancur menari berpadu tata cahaya lampu LED warna-warni dan alunan musik khas Surabaya.",
          "url": "{{ $canonical }}",
          "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Jembatan Suroboyo, Kenjeran, Kec. Bulak",
            "addressLocality": "Surabaya",
            "addressRegion": "Jawa Timur",
            "postalCode": "60124",
            "addressCountry": "ID"
          },
          "geo": {
            "@@type": "GeoCoordinates",
            "latitude": -7.2405,
            "longitude": 112.7981
          },
          "isAccessibleForFree": true,
          "publicAccess": true
        },
        {
          "@@type": "FAQPage",
          "@@id": "{{ $canonical }}#faq",
          "mainEntity": [
            @foreach ($faqs as $index => $faq)
            {
              "@@type": "Question",
              "name": "{{ $faq['q'] }}",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "{{ $faq['a'] }}"
              }
            }
            @if (!$loop->last),@endif
            @endforeach
          ]
        },
        {
          "@@type": "BreadcrumbList",
          "@@id": "{{ $canonical }}#breadcrumb",
          "itemListElement": [
            {
              "@@type": "ListItem",
              "position": 1,
              "name": "Beranda",
              "item": "{{ route('home') }}"
            },
            {
              "@@type": "ListItem",
              "position": 2,
              "name": "Air Mancur Kenjeran",
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
                        ✦ Wisata Malam Ikonik Surabaya &bull; Kenjeran East Coast VIP
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Air Mancur Kenjeran Surabaya: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Pesona Air Mancur Menari &amp; Perjalanan VIP</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Pertunjukan Lampu Menari &bull; Jembatan Suroboyo &bull; Layanan Mobil Mewah
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Nikmati keindahan spektakuler Air Mancur Menari Jembatan Suroboyo di kawasan Kenjeran dengan perjalanan yang aman, nyaman, dan mewah bersama <strong>{{ config('site.brand') }}</strong>. Bebas repot parkir dengan layanan driver profesional door-to-door.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi paket sewa mobil wisata ke Air Mancur Kenjeran Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Mobil Ke Kenjeran
                        </a>
                        <a href="#jadwal-lokasi"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📌 Jadwal &amp; Info Lokasi
                        </a>
                    </div>
                </div>

                {{-- Hero Right Side Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">⛲</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Info Terkini</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Ringkasan Wisata Air Mancur Kenjeran</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Atraksi lampu menari berlatar Selat Madura &amp; pesona pesisir timur Surabaya.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Jembatan Suroboyo</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Lokasi Utama</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sabtu &amp; Minggu</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Jadwal Pertunjukan</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Tiket Masuk</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Include Driver</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Transport VIP</div>
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
                    <span class="text-3xl">⛲</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Pertunjukan Menari</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Lampu LED &amp; alunan musik</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🌉</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Jembatan Ikonik</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Desain megah melingkar 800 meter</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚘</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Armada Steril &amp; Mewah</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Alphard, Hiace &amp; Zenix ready</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Antar-Jemput Door to Door</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Driver ramah &amp; hafal lokasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 1: PESONA AIR MANCUR KENJERAN --}}
    <section class="py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[760px] mx-auto mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Keindahan Pesisir Timur Surabaya</span>
                <h2 class="text-white text-3xl font-bold mt-2">Daya Tarik Utama Air Mancur Menari Kenjeran</h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Air Mancur Kenjeran yang terletak di sepanjang arsitektur megah Jembatan Suroboyo menjadi salah satu destinasi wisata malam paling populer bagi wisatawan lokal maupun mancanegara.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-md:grid-cols-1">
                <div class="p-8 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] hover:border-[rgba(34,211,238,0.4)] transition-all">
                    <div class="text-4xl mb-4">🎶</div>
                    <h3 class="text-white text-xl font-bold mb-3">Air Mancur Menari Musikalisasi</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Atraksi puluhan nozzle air yang menyemburkan tarian dinamis berganti arah dan tinggi, bergerak selaras dengan alunan lagu daerah Surabaya seperti <em>"Rek Ayo Rek"</em> dan musik instrumental modern.
                    </p>
                </div>

                <div class="p-8 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] hover:border-[rgba(34,211,238,0.4)] transition-all">
                    <div class="text-4xl mb-4">💡</div>
                    <h3 class="text-white text-xl font-bold mb-3">Tata Lampu LED Warna-Warni</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Sorotan lampu LED khusus menghasilkan gradasi warna merah, hijau, biru, hingga keemasan yang berkilau indah tercermin di permukaan perairan pesisir pantai malam hari.
                    </p>
                </div>

                <div class="p-8 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] hover:border-[rgba(34,211,238,0.4)] transition-all">
                    <div class="text-4xl mb-4">📸</div>
                    <h3 class="text-white text-xl font-bold mb-3">Spot Foto &amp; View Selat Madura</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Dari anjungan pedestrian Jembatan Suroboyo, pengunjung dapat bersua foto dengan latar belakang pertunjukan air mancur serta gemerlap kelap-kelip lampu Jembatan Suramadu dari kejauhan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: JADWAL & LOKASI DETAIL --}}
    <section id="jadwal-lokasi" class="py-20 bg-[var(--color-bg-2)] border-y border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Panduan Kunjungan</span>
                    <h2 class="text-white text-3xl font-bold mt-2 mb-6">Jadwal Pertunjukan &amp; Akses Lokasi</h2>

                    <div class="space-y-4 text-sm">
                        <div class="p-4 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)] flex gap-4 items-start">
                            <span class="text-2xl">📍</span>
                            <div>
                                <h4 class="text-white font-bold">Lokasi Utama</h4>
                                <p class="text-[var(--color-text-muted)] mt-1">Jembatan Suroboyo, Kenjeran, Kecamatan Bulak, Kota Surabaya, Jawa Timur 60124.</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)] flex gap-4 items-start">
                            <span class="text-2xl">⏰</span>
                            <div>
                                <h4 class="text-white font-bold">Jadwal Pertunjukan</h4>
                                <p class="text-[var(--color-text-muted)] mt-1">Sabtu &amp; Minggu Malam (Weekend) | Pukul 18.30 – 21.00 WIB (Berlangsung dalam beberapa sesi durasi 30-45 menit).</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)] flex gap-4 items-start">
                            <span class="text-2xl">🎟️</span>
                            <div>
                                <h4 class="text-white font-bold">Tiket Masuk Area</h4>
                                <p class="text-[var(--color-text-muted)] mt-1">Gratis (Bebas biaya masuk kawasan pedestrian jembatan).</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)] flex gap-4 items-start">
                            <span class="text-2xl">🚗</span>
                            <div>
                                <h4 class="text-white font-bold">Akses &amp; Layanan Transportasi</h4>
                                <p class="text-[var(--color-text-muted)] mt-1">Hindari kerumunan &amp; kesulitan parkir akhir pekan dengan menyewa mobil VIP include driver dari Queen Transport.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Map / Location Card --}}
                <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                    <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                        <span>🗺️</span> Rute &amp; Tips Terbaik Melihat Pertunjukan
                    </h3>
                    <ul class="space-y-3 text-sm text-[var(--color-text-light)] leading-relaxed">
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">✓</span>
                            <span><strong>Tiba Lebih Awal:</strong> Disarankan tiba di lokasi sekitar pukul 17.45 - 18.15 WIB agar mendapatkan posisi melihat terbaik di atas jembatan.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">✓</span>
                            <span><strong>Spot Terbaik:</strong> Anjungan tengah Jembatan Suroboyo menghadap ke laut memberikan sudut visual penuh pertunjukan air mancur.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">✓</span>
                            <span><strong>Gabungkan Kuliner Seafood:</strong> Setelah menyaksikan pertunjukan, Anda bisa menikmati makan malam seafood di Sentra Ikan Bulak atau Kenjeran.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">✓</span>
                            <span><strong>Layanan Penjemputan VIP:</strong> Driver {{ config('site.brand') }} siap menunggu di area dekat lokasi, memastikan kepulangan Anda berjalan lancar tanpa menunggu jam sibuk.</span>
                        </li>
                    </ul>

                    <div class="mt-8 pt-6 border-t border-[var(--color-border)]">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi rute wisata Kenjeran & sewa mobil') }}"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded-[var(--radius-md)] font-bold text-sm bg-[image:var(--gradient-btn)] text-white no-underline hover:opacity-95"
                           target="_blank" rel="noopener noreferrer">
                            💬 Reservasi Mobil Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: WISATA SEKITAR KENJERAN --}}
    <section class="py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[760px] mx-auto mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Surabaya East Coast Tour</span>
                <h2 class="text-white text-3xl font-bold mt-2">Destinasi Populer Sekitar Air Mancur Kenjeran</h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Sempurnakan perjalanan wisata malam Anda dengan mengunjungi berbagai destinasi menarik yang berdekatan di wilayah Kenjeran.
                </p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">⛩️</div>
                    <h4 class="text-white font-bold text-base mb-2">Klenteng Sanggar Agung</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Terkenal dengan patung Maha Guan Yin setinggi 20 meter dan gerbang naga di tepi laut Kenjeran Park.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🦈</div>
                    <h4 class="text-white font-bold text-base mb-2">Taman Suroboyo</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Taman publik cantik yang memiliki Ikon Patung Suro &amp; Boyo terbesar di Surabaya berlatar belakang lautan.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🏖️</div>
                    <h4 class="text-white font-bold text-base mb-2">Pantai Ria Kenjeran</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Kawasan wisata pesisir pantai keluarga yang dilengkapi aneka spot foto, wahana permainan, dan belanja souvenir.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <div class="text-3xl mb-3">🦐</div>
                    <h4 class="text-white font-bold text-base mb-2">Sentra Ikan Bulak (SIB)</h4>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Pusat kuliner olahan hasil laut segar dan tempat membeli kerupuk ikan khas Kenjeran Surabaya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: ARMADA RENTAL MOBIL QUEEN TRANSPORT --}}
    <section class="py-20 bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[760px] mx-auto mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Layanan Sewa Mobil Terpercaya</span>
                <h2 class="text-white text-3xl font-bold mt-2">Pilihan Armada Mewah Untuk Wisata Kenjeran</h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Setiap unit armada kami selalu terjaga kebersihannya, berperforma prima, dan didampingi driver profesional yang siap melayani seluruh kebutuhan perjalanan Anda.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-md:grid-cols-1">
                @foreach ($allArmadas->take(6) as $armada)
                    <div class="rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] overflow-hidden flex flex-col justify-between hover:border-[rgba(124,58,237,0.5)] transition-all">
                        <div class="p-6">
                            @if ($armada->image_url)
                                <img src="{{ $armada->image_url }}" alt="{{ $armada->title }}" class="w-full h-48 object-cover rounded-[var(--radius-md)] mb-4">
                            @else
                                <div class="w-full h-48 bg-[var(--color-bg)] rounded-[var(--radius-md)] mb-4 flex items-center justify-center text-4xl">🚘</div>
                            @endif
                            <h3 class="text-white font-bold text-xl mb-1">{{ $armada->title }}</h3>
                            <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">{{ $armada->car_type ?? 'Luxury Car' }} &bull; Include Driver</p>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                                {{ Str::limit($armada->description, 100) }}
                            </p>
                            @if ($armada->formatted_price)
                                <div class="text-lg font-bold text-white mb-2">
                                    {{ $armada->formatted_price }} <span class="text-xs text-[var(--color-text-muted)] font-normal">/ hari</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 pt-0">
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya ketersediaan sewa '.$armada->title.' untuk wisata Kenjeran') }}"
                               class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-[var(--radius-md)] font-semibold text-sm bg-[image:var(--gradient-btn)] text-white no-underline hover:opacity-95"
                               target="_blank" rel="noopener noreferrer">
                                💬 Sewa {{ $armada->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 5: FAQ ACCORDION --}}
    <section id="faq" class="py-20 border-t border-[var(--color-border)]">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Tanya Jawab</span>
                <h2 class="text-white text-3xl font-bold mt-2">Pertanyaan Seputar Air Mancur Kenjeran</h2>
            </div>

            <div class="space-y-4">
                @foreach ($faqs as $index => $faq)
                    <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                        <h3 class="text-white font-bold text-lg mb-2 flex items-start gap-3">
                            <span class="text-[var(--color-accent)] font-bold">Q:</span>
                            <span>{{ $faq['q'] }}</span>
                        </h3>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed pl-7">
                            {{ $faq['a'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 6: CTA BANNER --}}
    <section class="py-16 bg-[var(--gradient-hero)] border-t border-[var(--color-border)]">
        <div class="max-w-[900px] mx-auto px-6 text-center">
            <h2 class="text-white text-3xl font-bold mb-4">Siap Nikmati Pesona Air Mancur Kenjeran?</h2>
            <p class="text-[var(--color-text-light)] text-base mb-8 leading-relaxed max-w-[680px] mx-auto">
                Hubungi customer service <strong>{{ config('site.brand') }}</strong> sekarang untuk pemesanan armada sewa mobil mewah di Surabaya. Layanan cepat 24 jam nonstop!
            </p>
            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi mobil rental untuk ke Air Mancur Kenjeran Surabaya') }}"
               class="inline-flex items-center gap-3 px-10 py-4 rounded-[32px] font-bold text-lg bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] no-underline transition-all hover:scale-105"
               target="_blank" rel="noopener noreferrer">
                💬 Hubungi Kami via WhatsApp Sekarang
            </a>
        </div>
    </section>

</x-layouts::public>
