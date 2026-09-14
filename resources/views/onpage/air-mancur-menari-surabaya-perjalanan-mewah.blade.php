<?php

use function Laravel\Folio\name;

name('air-mancur-menari-surabaya-perjalanan-mewah');
?>

@php
use App\Services\AirMancurMenariService;

$airMancurService = app(AirMancurMenariService::class);
extract($airMancurService->getAirMancurPageData());

$title = 'Air Mancur Menari Surabaya: Pesona Wisata Malam & Perjalanan Mewah VIP — ' . config('site.brand');
$description = 'Nikmati keindahan pertunjukan Air Mancur Menari Jembatan Suroboyo Kenjeran dengan layanan rental mobil mewah VIP Surabaya. Sewa Alphard Transformer, Hiace Premio Luxury & Zenix include driver profesional.';
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
          "name": "Air Mancur Menari Jembatan Suroboyo",
          "description": "Pertunjukan air mancur menari spektakuler di Jembatan Suroboyo Kenjeran dengan perpaduan permainan tata lampu LED warna-warni, alunan musik khas Surabaya, serta pesona panorama pesat pesisir pantai malam hari.",
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
              "name": "Air Mancur Menari Surabaya & Perjalanan Mewah",
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
                        ✦ Pesona Wisata Malam Ikonik Surabaya &bull; Luxury Travel VIP
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Air Mancur Menari Surabaya: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Nikmati Perjalanan Mewah &amp; Eksklusif</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Jembatan Suroboyo Kenjeran &bull; Toyota Alphard VIP &bull; Hiace Premio Luxury &bull; Private Chauffeur
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Eksplorasi keindahan spektakuler Air Mancur Menari di Jembatan Suroboyo dengan standar kenyamanan eksekutif tertinggi. Didampingi driver profesional, bebas ribet cari parkir, dan rasakan pengalaman kemewahan penuh gaya bersama {{ config('site.brand') }}.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat memesan paket perjalanan mewah VIP untuk melihat Air Mancur Menari Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Reservasi Perjalanan Mewah
                        </a>
                        <a href="#pesona-air-mancur"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            🎭 Jelajahi Daya Tarik
                        </a>
                    </div>
                </div>

                {{-- Hero Highlight Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">✨</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">VIP Night Tour</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Mengapa Pilih Night Tour {{ config('site.brand') }}?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Nikmati gemerlap malam Kota Surabaya tanpa stres kemacetan dan kepedatan parkir di lokasi wisata.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">Door-to-Door</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Penjemputan Khusus</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100% VIP</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Berpengalaman</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Kabin Senyap</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Steril, Wangi &amp; Dingin</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Snack &amp; Mineral Premium</div>
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
                        <h4 class="text-white font-bold text-sm">Visual Tarian Air &amp; Lampu</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Pertunjukan spektakuler malam</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚘</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Armada Kelas Atas</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Alphard, Hiace Premio &amp; Zenix</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Berstandar VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Sopan, rapi &amp; paham rute</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🥂</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Paket Night Cruise Custom</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Kombinasi tempat dinner &amp; wisata</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 1: PESONA AIR MANCUR MENARI SURABAYA --}}
    <section id="pesona-air-mancur" class="py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-4">
                        ✦ Mahakarya Pesisir Surabaya
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                        Keindahan Magis <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Air Mancur Menari Jembatan Suroboyo</span>
                    </h2>
                    <div class="flex flex-col gap-4 text-[var(--color-text-light)] text-sm leading-relaxed">
                        <p>
                            Surabaya tidak hanya dikenal sebagai kota bisnis dan sejarah, tetapi juga menyajikan wisata malam berkelas internasional. Salah satu pesona paling ikonik yang menjadi kebanggaan warga Kota Pahlawan adalah <strong>Air Mancur Menari (Dancing Fountain) Jembatan Suroboyo</strong> di kawasan Kenjeran.
                        </p>
                        <p>
                            Didesain khusus sebagai bagian dari revitalisasi pesisir Kenjeran, air mancur ini menyuguhkan atraksi tarian air setinggi belasan meter yang bergerak harmonis mengikuti irama musik khas Surabaya (seperti lagu <em>Suroboyo ing Wengi</em> dan tembang-tembang daerah) yang dipadukan dengan permainan sorot lampu LED berwarna-warni yang memukau.
                        </p>
                        <p>
                            Menyaksikan secara langsung gemerlap sorot cahaya di atas permukaan laut Kenjeran pada malam hari memberikan nuansa romantis, megah, dan tak terlupakan bagi keluarga, pasangan, maupun tamu penting VIP yang Anda jamu di Surabaya.
                        </p>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 shadow-xl">
                    <h3 class="text-white text-xl font-bold mb-6 flex items-center gap-3 border-b border-[var(--color-border)] pb-4">
                        <span class="text-2xl">📋</span> Informasi Ringkas Pertunjukan
                    </h3>
                    <ul class="flex flex-col gap-4 text-sm text-[var(--color-text-light)]">
                        <li class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] font-bold text-base mt-0.5">📍</span>
                            <div>
                                <strong class="text-white block">Lokasi Utama:</strong>
                                Jembatan Suroboyo, Kecamatan Bulak, Kenjeran, Kota Surabaya, Jawa Timur.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] font-bold text-base mt-0.5">🕒</span>
                            <div>
                                <strong class="text-white block">Waktu Pertunjukan:</strong>
                                Akhir pekan (Sabtu malam) mulai pukul 18.30 &ndash; 21.00 WIB (dibagi dalam beberapa sesi atraksi).
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] font-bold text-base mt-0.5">🎶</span>
                            <div>
                                <strong class="text-white block">Daya Tarik Utama:</strong>
                                Kombinasi tarian air mancur high-pressure, lighting LED 3D efek, musik aransemen khas Surabaya, dan embusan angin laut yang menyegarkan.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] font-bold text-base mt-0.5">💡</span>
                            <div>
                                <strong class="text-white block">Tips Kunjungan Mewah:</strong>
                                Tiba 30 menit sebelum acara dengan kendaraan private VIP agar terhindar dari antrean jalanan dan langsung ditempatkan di titik drop-off paling strategis oleh driver Anda.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: MENGAPA PERJALANAN MEWAH SANGAT PENTING --}}
    <section class="py-20 bg-[var(--color-bg-2)] border-y border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[750px] mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-3">
                    ✦ Kenyamanan Tanpa Kompromi
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Mengapa Memilih Perjalanan Mewah Bersama {{ config('site.brand') }}?
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                    Menikmati objek wisata populer seperti Air Mancur Menari Surabaya bisa menjadi tantangan tersendiri jika harus berhadapan dengan kemacetan dan keterbatasan lahan parkir. Inilah keunggulan layanan private luxury chauffeur kami:
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 hover:border-[var(--color-accent)] transition-all">
                    <div class="w-14 h-14 rounded-2xl bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] flex items-center justify-center text-2xl mb-6">
                        🚗💨
                    </div>
                    <h3 class="text-white text-xl font-bold mb-3">Bebas Stres Parkir &amp; Kemacetan</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Anda dan rombongan cukup turun tepat di titik pemandangan terbaik (drop-off VIP). Driver profesional kami akan mengurus tempat parkir dan siap menjemput sewaktu-waktu saat Anda selesai menikmati pertunjukan.
                    </p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 hover:border-[var(--color-accent)] transition-all">
                    <div class="w-14 h-14 rounded-2xl bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] flex items-center justify-center text-2xl mb-6">
                        👑🛋️
                    </div>
                    <h3 class="text-white text-xl font-bold mb-3">Kemewahan Kabin Kelas VIP</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Rasakan kesejukan AC ganda, jok kulit empuk berfasilitas <em>Captain Seat &amp; Legrest</em> (pada Alphard &amp; Hiace Luxury), kekedapan suara tingkat tinggi, serta fasilitas audio premium untuk melengkapi suasana malam.
                    </p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 hover:border-[var(--color-accent)] transition-all">
                    <div class="w-14 h-14 rounded-2xl bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] flex items-center justify-center text-2xl mb-6">
                        🍷📍
                    </div>
                    <h3 class="text-white text-xl font-bold mb-3">Fleksibilitas Night Tour Surabaya</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Tidak hanya berhenti di Jembatan Suroboyo, Anda dapat melanjutkan perjalanan malam ke restoran fine dining, cafe rooftop Surabaya Barat, atau wisata sejarah malam seperti Kawasan Wisata Ampel dan Tunjangan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: PILIHAN ARMADA MEWAH --}}
    <section class="py-20" id="armada-mewah">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[700px] mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-3">
                    ✦ Pilihan Kendaraan Utama
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Armada Rental Mobil Mewah Pilihan
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                    Setiap unit dipelihara secara presisi, rutin disterilisasi, dan dikemudikan oleh driver berseragam resmi yang santun.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                {{-- Alphard Transformer --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold uppercase tracking-wider">Executive Class</span>
                            <span class="text-xl">🚘</span>
                        </div>
                        <h3 class="text-white text-xl font-bold mb-2">Toyota Alphard Transformer / Hybrid</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-6">
                            Simbol kemewahan tertinggi. Sangat cocok untuk tamu eksekutif, pasangan, atau keluarga kecil yang menginginkan kenyamanan eksklusif tak tertandingi.
                        </p>
                        <ul class="flex flex-col gap-3 text-xs text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Executive Captain Seat &amp; Ottoman Legrest</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Dual Power Sunroof &amp; Ambient Lighting</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Kabin Ultra Senyap &amp; Audio High-End</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Kapasitas 6 &ndash; 7 Penumpang</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi Sewa Alphard untuk tour Air Mancur Menari Surabaya') }}"
                       class="w-full py-3 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-sm text-center no-underline hover:opacity-90 transition-opacity">
                        Pesan Toyota Alphard
                    </a>
                </div>

                {{-- Hiace Premio Luxury --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold uppercase tracking-wider">VIP Group Class</span>
                            <span class="text-xl">🚐</span>
                        </div>
                        <h3 class="text-white text-xl font-bold mb-2">Toyota Hiace Premio Luxury</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-6">
                            Solusi kemewahan untuk rombongan keluarga besar atau delegasi bisnis. Dilengkapi dengan interior mewah modifikasi karoseri eksklusif.
                        </p>
                        <ul class="flex flex-col gap-3 text-xs text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> 8 &ndash; 10 Luxury Pilot Seats</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Smart TV Android &amp; Karaoke System</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Space Atap Tinggi &amp; Kaca Panoramic</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> AC Ducting Dingin Merata Sampai Belakang</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin pesan Hiace Premio Luxury untuk rombongan ke Air Mancur Menari Surabaya') }}"
                       class="w-full py-3 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-sm text-center no-underline hover:opacity-90 transition-opacity">
                        Pesan Hiace Premio Luxury
                    </a>
                </div>

                {{-- Innova Zenix Hybrid --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between hover:border-[var(--color-accent)] transition-all shadow-lg">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold uppercase tracking-wider">Modern Comfort</span>
                            <span class="text-xl">🚘</span>
                        </div>
                        <h3 class="text-white text-xl font-bold mb-2">Toyota Innova Zenix Hybrid</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-6">
                            Kombinasi efisiensi mesin hybrid canggih, suspensi lembut TNGA, serta interior modern yang sangat nyaman untuk perjalanan santai malam hari.
                        </p>
                        <ul class="flex flex-col gap-3 text-xs text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Panoramic Retractable Roof</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Mesin Hybrid Halus &amp; Ramah Lingkungan</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Kapasitas 6 &ndash; 7 Penumpang</li>
                            <li class="flex items-center gap-2"><span class="text-[var(--color-accent)]">✓</span> Kabin Nyaman Berteknologi Modern</li>
                        </ul>
                    </div>
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat rental Innova Zenix Hybrid untuk tour malam di Surabaya') }}"
                       class="w-full py-3 px-4 rounded-[var(--radius-lg)] bg-[image:var(--gradient-btn)] text-white font-semibold text-sm text-center no-underline hover:opacity-90 transition-opacity">
                        Pesan Innova Zenix Hybrid
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: ITINERARY REKOMENDASI NIGHT TOUR SURABAYA --}}
    <section class="py-20 bg-[var(--color-bg-2)] border-y border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[700px] mx-auto mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-3">
                    ✦ Rencana Perjalanan Ideal
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Rangkaian Rute Surabaya Night Tour VIP
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                    Berikut adalah rekomendasi jadwal perjalanan eksklusif untuk memaksimalkan momen indah malam akhir pekan Anda di Surabaya:
                </p>
            </div>

            <div class="relative border-l-2 border-[rgba(124,58,237,0.4)] ml-4 md:ml-12 pl-6 md:pl-10 space-y-10">
                <div class="relative">
                    <div class="absolute -left-[31px] md:-left-[47px] top-1 w-6 h-6 rounded-full bg-[var(--color-accent)] border-4 border-[var(--color-bg-2)]"></div>
                    <div class="text-[var(--color-accent)] font-bold text-sm uppercase tracking-wider mb-1">16:30 &ndash; 17:30 WIB</div>
                    <h3 class="text-white text-lg font-bold mb-2">Penjemputan Eksklusif (Door-to-Door Pick Up)</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Driver VIP kami menjemput Anda tepat waktu di lobby hotel bintang lima, Bandara Juanda, atau kediaman pribadi Anda dengan armada bersih dan wangi.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -left-[31px] md:-left-[47px] top-1 w-6 h-6 rounded-full bg-[var(--color-accent)] border-4 border-[var(--color-bg-2)]"></div>
                    <div class="text-[var(--color-accent)] font-bold text-sm uppercase tracking-wider mb-1">17:30 &ndash; 19:00 WIB</div>
                    <h3 class="text-white text-lg font-bold mb-2">Fine Dining / Dinner Kuliner Khas Surabaya</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Menikmati santap malam elegan di restoran seafood favorit kawasan Kenjeran/Surabaya Timur atau resto fine dining pilihan Anda sebelum menyaksikan atraksi utama.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -left-[31px] md:-left-[47px] top-1 w-6 h-6 rounded-full bg-[var(--color-accent)] border-4 border-[var(--color-bg-2)]"></div>
                    <div class="text-[var(--color-accent)] font-bold text-sm uppercase tracking-wider mb-1">19:15 &ndash; 20:30 WIB</div>
                    <h3 class="text-white text-lg font-bold mb-2">Menyaksikan Pertunjukan Air Mancur Menari Jembatan Suroboyo</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Tiba di lokasi Jembatan Suroboyo. Driver Anda mengantar ke akses terdekat. Anda dapat mengabadikan momen foto &amp; video berlatar tarian air warna-warni dan hembusan laut Kenjeran yang mempesona.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -left-[31px] md:-left-[47px] top-1 w-6 h-6 rounded-full bg-[var(--color-accent)] border-4 border-[var(--color-bg-2)]"></div>
                    <div class="text-[var(--color-accent)] font-bold text-sm uppercase tracking-wider mb-1">20:30 &ndash; 21:45 WIB</div>
                    <h3 class="text-white text-lg font-bold mb-2">City Cruise Malam (Iconic Landmarks of Surabaya)</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Perjalanan berlanjut menyusuri sudut gemerlap malam Surabaya: Gedung Grahadi, Taman Apsari, Monumen Bambu Runcing, hingga suasana romantis kawasan Jalan Tunjungan.
                    </p>
                </div>

                <div class="relative">
                    <div class="absolute -left-[31px] md:-left-[47px] top-1 w-6 h-6 rounded-full bg-[var(--color-accent)] border-4 border-[var(--color-bg-2)]"></div>
                    <div class="text-[var(--color-accent)] font-bold text-sm uppercase tracking-wider mb-1">22:00 WIB</div>
                    <h3 class="text-white text-lg font-bold mb-2">Drop Off Kembali ke Hotel / Kediaman</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Driver mengantarkan Anda kembali ke lokasi tujuan akhir dengan aman, nyaman, dan penuh kesan manis.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 5: FAQ SECTION --}}
    <section class="py-20" id="faq">
        <div class="max-w-[1000px] mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-3">
                    ✦ FAQ &bull; Pertanyaan Umum
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Pertanyaan Seputar Wisata &amp; Rental Mobil VIP
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm">
                    Temukan jawaban cepat untuk merencanakan perjalanan malam Anda ke Air Mancur Menari Surabaya.
                </p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 shadow-md">
                        <h3 class="text-white font-bold text-base mb-2 flex items-center gap-3">
                            <span class="text-[var(--color-accent)] font-semibold">Q:</span>
                            {{ $faq['q'] }}
                        </h3>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed pl-7">
                            {{ $faq['a'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BOTTOM CTA SECTION --}}
    <section class="py-20 bg-[var(--color-bg-2)] border-t border-[var(--color-border)] relative overflow-hidden">
        <div class="max-w-[1000px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-4 inline-block">
                ✦ Wujudkan Momen Spesial Malam Ini
            </span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                Siap Menikmati Keindahan Air Mancur Menari Surabaya dengan Gaya Mewah?
            </h2>
            <p class="text-[var(--color-text-light)] text-base max-w-[650px] mx-auto mb-8 leading-relaxed">
                Hubungi tim customer service {{ config('site.brand') }} sekarang via WhatsApp. Kami siap memberikan saran rute, armada VIP terbaik, serta pelayanan pengemudi terbaik di Surabaya.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya mau tanya paket rental mobil mewah untuk menonton Air Mancur Menari Surabaya') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Chat WhatsApp Langsung (24/7)
                </a>
                <a href="{{ route('armada.index') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                    🚘 Lihat Semua Armada
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
