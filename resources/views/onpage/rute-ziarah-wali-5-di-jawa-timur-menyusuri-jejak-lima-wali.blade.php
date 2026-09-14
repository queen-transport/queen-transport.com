<?php

use function Laravel\Folio\name;

name('rute-ziarah-wali-5-di-jawa-timur-menyusuri-jejak-lima-wali');
?>

@php
use App\Services\ZiarahService;

$ziarahService = app(ZiarahService::class);
extract($ziarahService->getZiarahPageData());

$title = 'Rute Ziarah Wali 5 di Jawa Timur: Menyusuri Jejak Lima Wali — ' . config('site.brand');
$description = 'Panduan lengkap rute ziarah Wali 5 di Jawa Timur (Sunan Ampel, Sunan Giri, Sunan Maulana Malik Ibrahim, Sunan Drajat, Sunan Bonang). Lengkap dengan estimasi waktu, peta urutan rute & sewa Hiace/Innova include driver.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@graph": [
        {
          "@type": "TouristTrip",
          "@id": "{{ $canonical }}#trip",
          "name": "Rute Ziarah Wali 5 di Jawa Timur: Menyusuri Jejak Lima Wali",
          "description": "Perjalanan wisata religi dan ziarah spiritual menyusuri makam lima Wali Songo di Jawa Timur: Sunan Ampel, Sunan Maulana Malik Ibrahim, Sunan Giri, Sunan Drajat, dan Sunan Bonang.",
          "touristType": ["Spiritual Tourist", "Religious Tourist", "Family Group"],
          "itinerary": [
            {
              "@type": "City",
              "name": "Sunan Ampel",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Jl. Ampel Masjid No. 53",
                "addressLocality": "Surabaya",
                "addressRegion": "Jawa Timur",
                "addressCountry": "ID"
              }
            },
            {
              "@type": "City",
              "name": "Sunan Maulana Malik Ibrahim",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Desa Gapura Sukolilo",
                "addressLocality": "Gresik",
                "addressRegion": "Jawa Timur",
                "addressCountry": "ID"
              }
            },
            {
              "@type": "City",
              "name": "Sunan Giri",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Desa Giri, Kebomas",
                "addressLocality": "Gresik",
                "addressRegion": "Jawa Timur",
                "addressCountry": "ID"
              }
            },
            {
              "@type": "City",
              "name": "Sunan Drajat",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Desa Drajat, Paciran",
                "addressLocality": "Lamongan",
                "addressRegion": "Jawa Timur",
                "addressCountry": "ID"
              }
            },
            {
              "@type": "City",
              "name": "Sunan Bonang",
              "address": {
                "@type": "PostalAddress",
                "streetAddress": "Kutorejo, Kebonsari",
                "addressLocality": "Tuban",
                "addressRegion": "Jawa Timur",
                "addressCountry": "ID"
              }
            }
          ]
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
            }
            @if (!$loop->last),@endif
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
              "name": "Rute Ziarah Wali 5 Jawa Timur",
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
                        ✦ Panduan Wisata Religi Jawa Timur
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Rute Ziarah Wali 5 di Jawa Timur: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Menyusuri Jejak Lima Wali</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Sunan Ampel &bull; Sunan Malik Ibrahim &bull; Sunan Giri &bull; Sunan Drajat &bull; Sunan Bonang
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Panduan perjalanan spiritual terlengkap menyusuri makam lima Wali Songo di Jawa Timur. Mulai dari Surabaya, Gresik, Lamongan, hingga Tuban dengan armada sewa Hiace, Innova &amp; Bus terbaik include driver berpengalaman.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi rute & sewa armada untuk Ziarah Wali 5 di Jawa Timur') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Armada Ziarah
                        </a>
                        <a href="#urutan-rute"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            🗺️ Urutan Rute Ziarah
                        </a>
                    </div>
                </div>

                {{-- Hero Right Highlight Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🕌</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Paket Ziarah Religi</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Ringkasan Perjalanan Ziarah</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Rute yang dirancang efisien dan nyaman untuk rombongan majelis taklim, keluarga, maupun organisasi.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">5 Makam</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Wali Songo Jatim</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">1 - 2 Hari</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Durasi Fleksibel</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">Hiace / Bus</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Armada Rombongan</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100% Paham</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Ziarah</div>
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
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Paham Parkir Ziarah</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Hafal lokasi drop-off &amp; titik parkir</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚐</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Luas &amp; Reclining</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Perjalanan istirahat makin nyaman</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📍</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Penjemputan Bebas</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Juanda, Stasiun &amp; Hotel Surabaya</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💧</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Free Snack &amp; Air Mineral</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Fasilitas gratis di hari pertama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 1: DETAILED ITINERARY / JEJAK 5 WALI --}}
    <section class="py-[90px]" id="urutan-rute">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Jejak Spiritual Wali Songo</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.6rem)] font-bold">
                    Urutan Rute <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Ziarah Wali 5 Jawa Timur</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[700px] mx-auto mt-3 text-sm leading-relaxed">
                    Perjalanan ziarah religi menyusuri lima makam Wali Songo yang berada di kawasan pesisir utara Jawa Timur, disusun berurutan mulai dari Surabaya menuju Gresik, Lamongan, hingga Tuban.
                </p>
            </div>

            <div class="flex flex-col gap-10">
                {{-- WALI 1: SUNAN AMPEL --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 relative overflow-hidden transition-all hover:border-[var(--color-accent)]">
                    <div class="grid grid-cols-[80px_1fr] gap-6 max-sm:grid-cols-1">
                        <div class="flex items-center justify-center w-20 h-20 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.2)] border border-[rgba(124,58,237,0.4)] text-[var(--color-accent)] text-2xl font-bold font-[family-name:var(--font-accent)]">
                            01
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex items-center gap-3 flex-wrap mb-2">
                                <h3 class="text-2xl text-white font-bold">Sunan Ampel (Raden Rahmat)</h3>
                                <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-semibold">📍 Surabaya</span>
                            </div>
                            <p class="text-[var(--color-text-light)] text-sm mb-4 leading-relaxed">
                                <strong>Lokasi:</strong> Jl. Ampel Masjid No. 53, Kel. Ampel, Kec. Semampir, Kota Surabaya.
                            </p>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                                Sunan Ampel merupakan salah satu tokoh kunci dalam penyebaran agama Islam di Tanah Jawa pada abad ke-15. Beliau mendirikan Pesantren Ampeldenta yang melahirkan mubaligh kenamaan Nusantara. Kompleks makam Sunan Ampel terletak persis di sebalah barat Masjid Ampel yang megah. Selain ziarah khusyuk, peziarah juga dapat menikmati suasana pasar Ampel yang khas dengan pernak-pernik dan busana muslim.
                            </p>
                            <div class="flex items-center gap-6 text-xs text-[var(--color-accent)] font-semibold flex-wrap">
                                <span>✦ Masjid Bersejarah Berusia Ratusan Tahun</span>
                                <span>✦ Parkiran Bus/Van Ampel Pegirian</span>
                                <span>✦ Buka Sepanjang Hari</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- WALI 2: SUNAN MAULANA MALIK IBRAHIM --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 relative overflow-hidden transition-all hover:border-[var(--color-accent)]">
                    <div class="grid grid-cols-[80px_1fr] gap-6 max-sm:grid-cols-1">
                        <div class="flex items-center justify-center w-20 h-20 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.2)] border border-[rgba(124,58,237,0.4)] text-[var(--color-accent)] text-2xl font-bold font-[family-name:var(--font-accent)]">
                            02
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex items-center gap-3 flex-wrap mb-2">
                                <h3 class="text-2xl text-white font-bold">Sunan Maulana Malik Ibrahim (Sunan Gresik)</h3>
                                <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-semibold">📍 Gresik</span>
                            </div>
                            <p class="text-[var(--color-text-light)] text-sm mb-4 leading-relaxed">
                                <strong>Lokasi:</strong> Desa Gapura Sukolilo, Kec. Gresik, Kab. Gresik (jarak ±25 km dari Sunan Ampel Surabaya).
                            </p>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                                Dikenal sebagai Syekh Maghribi atau Sunan Gresik, beliau dipandang sebagai Wali tertua yang mempelopori gerakan dakwah Wali Songo di pulau Jawa. Nisan batu makam beliau terukir indah dengan inskripsi kaligrafi bernilai seni tinggi gaya Gujarat. Kompleks makam berada di pusat kota Gresik yang tenang dan asri.
                            </p>
                            <div class="flex items-center gap-6 text-xs text-[var(--color-accent)] font-semibold flex-wrap">
                                <span>✦ Batu Nisan Prasasti Kuno Gujarat</span>
                                <span>✦ Kawasan Gapura Sukolilo</span>
                                <span>✦ Waktu Tempuh ±45 Menit dari Surabaya</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- WALI 3: SUNAN GIRI --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 relative overflow-hidden transition-all hover:border-[var(--color-accent)]">
                    <div class="grid grid-cols-[80px_1fr] gap-6 max-sm:grid-cols-1">
                        <div class="flex items-center justify-center w-20 h-20 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.2)] border border-[rgba(124,58,237,0.4)] text-[var(--color-accent)] text-2xl font-bold font-[family-name:var(--font-accent)]">
                            03
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex items-center gap-3 flex-wrap mb-2">
                                <h3 class="text-2xl text-white font-bold">Sunan Giri (Raden Paku / Prabu Satmata)</h3>
                                <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-semibold">📍 Kebomas, Gresik</span>
                            </div>
                            <p class="text-[var(--color-text-light)] text-sm mb-4 leading-relaxed">
                                <strong>Lokasi:</strong> Desa Giri, Kec. Kebomas, Kab. Gresik (jarak ±4 km dari Makam Sunan Maulana Malik Ibrahim).
                            </p>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                                Sunan Giri mendirikan kerajaan pesantren Kedaton Giri yang karya dakwahnya menjangkau hingga wilayah Maluku dan Nusa Tenggara. Makam beliau berada di puncak perbukitan Giri dengan arsitektur cungkup bertingkat kayu jati ukir nan megah. Peziarah dapat menaiki anak tangga atau memanfaatkan moda transportasi ojek lokal di area perbukitan.
                            </p>
                            <div class="flex items-center gap-6 text-xs text-[var(--color-accent)] font-semibold flex-wrap">
                                <span>✦ Cungkup Kayu Jati Ukir Kuno</span>
                                <span>✦ Suasana Puncak Bukit Asri</span>
                                <span>✦ Tersedia Ojek &amp; Dokar Ziarah</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- WALI 4: SUNAN DRAJAT --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 relative overflow-hidden transition-all hover:border-[var(--color-accent)]">
                    <div class="grid grid-cols-[80px_1fr] gap-6 max-sm:grid-cols-1">
                        <div class="flex items-center justify-center w-20 h-20 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.2)] border border-[rgba(124,58,237,0.4)] text-[var(--color-accent)] text-2xl font-bold font-[family-name:var(--font-accent)]">
                            04
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex items-center gap-3 flex-wrap mb-2">
                                <h3 class="text-2xl text-white font-bold">Sunan Drajat (Raden Qasim)</h3>
                                <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-semibold">📍 Paciran, Lamongan</span>
                            </div>
                            <p class="text-[var(--color-text-light)] text-sm mb-4 leading-relaxed">
                                <strong>Lokasi:</strong> Desa Drajat, Kec. Paciran, Kab. Lamongan (jarak ±60 km dari Gresik via Jalur Pantura).
                            </p>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                                Putra dari Sunan Ampel dan adik dari Sunan Bonang ini sangat termasyhur dengan ajaran kepedulian sosialnya, seperti <em>"Menehono tekeken marang wong kang wuto, menehono pangan marang wong kang wungli..."</em>. Di kompleks makam ini terdapat Museum Sunan Drajat yang mengoleksi benda pusaka peninggalan bersejarah termasuk Gamelan Singo Mengkok.
                            </p>
                            <div class="flex items-center gap-6 text-xs text-[var(--color-accent)] font-semibold flex-wrap">
                                <span>✦ Museum Sunan Drajat &amp; Gamelan Singo Mengkok</span>
                                <span>✦ Parkiran Bus &amp; Van Sangat Luas</span>
                                <span>✦ Berada di Jalur Wisata Pantura</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- WALI 5: SUNAN BONANG --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 relative overflow-hidden transition-all hover:border-[var(--color-accent)]">
                    <div class="grid grid-cols-[80px_1fr] gap-6 max-sm:grid-cols-1">
                        <div class="flex items-center justify-center w-20 h-20 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.2)] border border-[rgba(124,58,237,0.4)] text-[var(--color-accent)] text-2xl font-bold font-[family-name:var(--font-accent)]">
                            05
                        </div>
                        <div class="flex flex-col justify-center">
                            <div class="flex items-center gap-3 flex-wrap mb-2">
                                <h3 class="text-2xl text-white font-bold">Sunan Bonang (Raden Makhdum Ibrahim)</h3>
                                <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-semibold">📍 Kutorejo, Tuban</span>
                            </div>
                            <p class="text-[var(--color-text-light)] text-sm mb-4 leading-relaxed">
                                <strong>Lokasi:</strong> Kel. Kutorejo, Kec. Tuban, Kab. Tuban (jarak ±40 km dari Sunan Drajat Lamongan).
                            </p>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                                Sunan Bonang merupakan pencipta alat musik gamelan Bonang dan penyusun tembang Sastra Suluk Wijil yang syarat akan makna tauhid spiritual. Makam beliau berdampingan langsung dengan Masjid Agung Tuban yang megah bergaya arsitektur 1001 malam. Peziarah dapat berziarah sekaligus menikmati keindahan alun-alun kota dan pantai Tuban.
                            </p>
                            <div class="flex items-center gap-6 text-xs text-[var(--color-accent)] font-semibold flex-wrap">
                                <span>✦ Sebelah Barat Masjid Agung Tuban</span>
                                <span>✦ Bebas Becak Ziarah dari Parkiran Boom</span>
                                <span>✦ Wisata Religi &amp; Kuliner khas Tuban</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: ESTIMASI JARAK & TIMETABLE --}}
    <section class="py-16 bg-[var(--color-bg-2)] border-y border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Estimasi Perjalanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tabel Jarak &amp; Waktu Tempuh <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Ziarah Wali 5 Jatim</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Gambaran durasi perjalanan darat antar lokasi makam Wali 5 di Jawa Timur menggunakan kendaraan mobil / bus.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse bg-[var(--color-surface)] rounded-[var(--radius-lg)] border border-[var(--color-border)]">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.15)] border-b border-[var(--color-border)] text-white text-sm">
                            <th class="p-4 font-bold">Segmen Rute Perjalanan</th>
                            <th class="p-4 font-bold">Estimasi Jarak</th>
                            <th class="p-4 font-bold">Waktu Perjalanan</th>
                            <th class="p-4 font-bold">Waktu Ziarah Disarankan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)] text-sm text-[var(--color-text-light)]">
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Start Surabaya (Juanda/Stasiun) &rarr; Sunan Ampel</td>
                            <td class="p-4">± 20 – 25 km</td>
                            <td class="p-4">35 – 50 Menit</td>
                            <td class="p-4">60 – 90 Menit</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Sunan Ampel &rarr; Sunan Maulana Malik Ibrahim (Gresik)</td>
                            <td class="p-4">± 25 km</td>
                            <td class="p-4">40 – 50 Menit</td>
                            <td class="p-4">45 – 60 Menit</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Sunan Maulana Malik Ibrahim &rarr; Sunan Giri (Gresik)</td>
                            <td class="p-4">± 4 km</td>
                            <td class="p-4">15 – 20 Menit</td>
                            <td class="p-4">60 – 90 Menit</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Sunan Giri &rarr; Sunan Drajat (Paciran, Lamongan)</td>
                            <td class="p-4">± 58 km</td>
                            <td class="p-4">1 Jam 30 Menit</td>
                            <td class="p-4">60 – 90 Menit</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Sunan Drajat &rarr; Sunan Bonang (Tuban)</td>
                            <td class="p-4">± 40 km</td>
                            <td class="p-4">1 Jam</td>
                            <td class="p-4">60 – 90 Menit</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Sunan Bonang (Tuban) &rarr; Kembali ke Surabaya</td>
                            <td class="p-4">± 105 km</td>
                            <td class="p-4">2.5 – 3 Jam</td>
                            <td class="p-4">Selesai / Drop Point</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-2 gap-6 mt-8 max-md:grid-cols-1">
                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <h4 class="text-white font-bold text-base mb-2">⚡ Opsi 1: Ziarah Express (1 Hari Selesai)</h4>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Berangkat pukul 06.00 WIB dari Surabaya, menyusuri 5 makam secara marathon hingga malam hari pukul 21.00 WIB tiba kembali di Surabaya. Cocok untuk rombongan yang memiliki keterbatasan waktu.
                    </p>
                </div>
                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                    <h4 class="text-white font-bold text-base mb-2">🌙 Opsi 2: Ziarah Santai &amp; Khusyuk (2 Hari 1 Malam)</h4>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Hari pertama ziarah Ampel, Maulana Malik Ibrahim &amp; Sunan Giri, kemudian menginap di Tuban / Paciran. Hari kedua dilanjutkan ke Sunan Drajat &amp; Sunan Bonang serta wisata oleh-oleh sebelum kembali ke Surabaya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: TIPS ZIARAH KHUSYUK --}}
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Panduan Peziarah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tips Ziarah Wali 5 <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Agar Khusyuk &amp; Nyaman</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Beberapa rekomendasi penting untuk kelancaran ziarah rombongan Anda selama di perjalanan.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="text-4xl mb-4">👔</div>
                    <h3 class="text-white font-bold text-lg mb-2">Pakaian Sopan &amp; Alat Shalat</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Gunakan pakaian muslim yang rapi, bersih, dan menutup aurat. Bawalah sajadah pribadi, mukena/sarung tambahan, serta alas kaki yang mudah dilepas saat memasuki area makam dan masjid.
                    </p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="text-4xl mb-4">🕒</div>
                    <h3 class="text-white font-bold text-lg mb-2">Pilih Jam Kunjungan yang Tepat</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Jika menyukai suasana sepi dan khusyuk, disarankan berziarah pada pagi hari atau setelah waktu Isya. Hindari jam puncak libur nasional jika ingin berdo'a tanpa terburu-buru.
                    </p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="text-4xl mb-4">🚐</div>
                    <h3 class="text-white font-bold text-lg mb-2">Gunakan Armada Van / Bus Luas</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Perjalanan antarkota membutuhkan kendaraan dengan legroom lega, suspensi empuk, dan AC dingin agar stamina rombongan tetap terjaga sepanjang hari ziarah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: FAQ SECTION (DIPINDAHKAN KE ATAS SEBELUM PENAWARAN RENTAL MOBIL) --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="faq">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pertanyaan Umum</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    FAQ Ziarah Wali 5 <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Jawa Timur</span>
                </h2>
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

    {{-- SECTION 5: ARMADA REKOMENDASI UNTUK ZIARAH --}}
    <section class="py-[90px] border-t border-[var(--color-border)]" id="pilihan-armada">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transportasi Ziarah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pilihan Armada Terbaik <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rute Ziarah Wali 5</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Queen Transport menyediakan armada sewa mobil &amp; van terbaik siap include driver profesional untuk mendampingi ziarah Anda.
                </p>
            </div>

            @php
                $findArmadaPrice = function($keywords) use ($allArmadas) {
                    $armada = $allArmadas->first(function($item) use ($keywords) {
                        foreach ((array)$keywords as $keyword) {
                            if (\Illuminate\Support\Str::contains(strtolower($item->title), strtolower($keyword))) {
                                return true;
                            }
                        }
                        return false;
                    });
                    return $armada && $armada->price ? 'Rp ' . number_format($armada->price, 0, ',', '.') : null;
                };

                $hiaceCommuterPrice = $findArmadaPrice('commuter') ?? 'Rp 1.700.000';
                $hiacePremioPrice = $findArmadaPrice(['premio standard', 'premio']) ?? 'Rp 1.850.000';
                $innovaPrice = $findArmadaPrice(['reborn', 'innova', 'zenix']) ?? 'Rp 1.450.000';
            @endphp
            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                {{-- HIACE COMMUTER --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all hover:border-[var(--color-accent)] hover:-translate-y-2">
                    <div>
                        <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-4 inline-block">Favorit Rombongan (14 Seat)</span>
                        <h3 class="text-white text-xl font-bold mb-2">Toyota Hiace Commuter</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Pilihan paling ekonomis dan ideal untuk majelis taklim, rombongan keluarga besar, atau pengajian hingga 14 orang.
                        </p>
                        <ul class="flex flex-col gap-2.5 text-sm text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2">✓ 14 Reclining Seats</li>
                            <li class="flex items-center gap-2">✓ AC Double Blower Per-Head</li>
                            <li class="flex items-center gap-2">✓ Driver Berpengalaman Rute Ziarah</li>
                            <li class="flex items-center gap-2">✓ Bagasi Luas untuk Barang &amp; Oleh-oleh</li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-[var(--color-accent)] font-bold text-2xl mb-4">{{ $hiaceCommuterPrice }} <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Queen Transport, saya ingin sewa Toyota Hiace Commuter untuk Ziarah Wali 5 Jatim') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full py-3 rounded-[var(--radius-md)] bg-[image:var(--gradient-btn)] text-white font-semibold text-center block no-underline shadow-md">
                            💬 Pesan Hiace Commuter
                        </a>
                    </div>
                </div>

                {{-- HIACE PREMIO STANDARD --}}
                <div class="bg-[var(--gradient-card)] border-2 border-[var(--color-primary)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all hover:-translate-y-2 shadow-[0_0_30px_rgba(124,58,237,0.3)]">
                    <div>
                        <span class="px-3 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold tracking-wider uppercase mb-4 inline-block">Ekstra Senyap &amp; Empuk</span>
                        <h3 class="text-white text-xl font-bold mb-2">Toyota Hiace Premio</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Kabin lebih kedap suara dengan moncong depan semi-bonnet, suspensi sangat nyaman untuk perjalanan luar kota.
                        </p>
                        <ul class="flex flex-col gap-2.5 text-sm text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2">✓ 14 Premium Reclining Seats</li>
                            <li class="flex items-center gap-2">✓ Kabin Sangat Senyap &amp; Dingin</li>
                            <li class="flex items-center gap-2">✓ Audio &amp; USB Charger di Tiap Baris</li>
                            <li class="flex items-center gap-2">✓ Driver Berpengalaman Ziarah</li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-[var(--color-accent)] font-bold text-2xl mb-4">{{ $hiacePremioPrice }} <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Queen Transport, saya ingin sewa Toyota Hiace Premio untuk Ziarah Wali 5 Jatim') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full py-3 rounded-[var(--radius-md)] bg-[image:var(--gradient-btn)] text-white font-semibold text-center block no-underline shadow-md">
                            💬 Pesan Hiace Premio
                        </a>
                    </div>
                </div>

                {{-- INNOVA ZENIX / REBORN --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all hover:border-[var(--color-accent)] hover:-translate-y-2">
                    <div>
                        <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-4 inline-block">Keluarga Kecil (6-7 Seat)</span>
                        <h3 class="text-white text-xl font-bold mb-2">Innova Reborn / Zenix</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Pilihan pas untuk ziarah keluarga inti 5 hingga 7 penumpang yang mengutamakan kelincahan dan kenyamanan mobil MPV.
                        </p>
                        <ul class="flex flex-col gap-2.5 text-sm text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2">✓ 6 - 7 Seats Legar</li>
                            <li class="flex items-center gap-2">✓ Performa Tangguh &amp; Bensin/Hybrid Senyap</li>
                            <li class="flex items-center gap-2">✓ Full AC Triple Zone</li>
                            <li class="flex items-center gap-2">✓ Driver Ramah &amp; Sopan</li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-[var(--color-accent)] font-bold text-2xl mb-4">{{ $innovaPrice }} <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Queen Transport, saya ingin sewa Innova Zenix / Reborn untuk Ziarah Wali 5 Jatim') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full py-3 rounded-[var(--radius-md)] bg-[image:var(--gradient-btn)] text-white font-semibold text-center block no-underline shadow-md">
                            💬 Pesan Innova Zenix
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 6: TESTIMONI PELANGGAN --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pengalaman Peziarah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Kata Mereka Tentang <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Layanan Queen Transport</span>
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
                            <p class="text-[var(--color-text-muted)] text-xs">{{ $pelanggan->title ?? 'Peziarah Rombongan' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- SECTION 7: FINAL CTA BANNER --}}
    <section class="py-20 relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1000px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs uppercase tracking-widest font-semibold mb-6 inline-block">
                ✦ Rencanakan Perjalanan Religi Anda Sekarang
            </span>
            <h2 class="text-white text-[clamp(2rem,4vw,3rem)] font-bold mb-4 leading-tight">
                Siap Berziarah Menyusuri <br class="hidden sm:block">
                <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Jejak Lima Wali di Jawa Timur?</span>
            </h2>
            <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto mb-8 text-base leading-relaxed">
                Hubungi tim Queen Transport untuk mendapatkan penawaran harga sewa mobil ziarah terbaik, saran rute jalan, dan jadwal penjemputan yang sesuai rombongan Anda.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & sewa armada Ziarah Wali 5 Jawa Timur') }}"
                   class="inline-flex items-center gap-2 px-10 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
