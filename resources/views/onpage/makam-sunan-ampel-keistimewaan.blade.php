<?php

use function Laravel\Folio\name;

name('makam-sunan-ampel-keistimewaan');
?>

@php
use App\Services\SunanAmpelService;

$sunanAmpelService = app(SunanAmpelService::class);
extract($sunanAmpelService->getSunanAmpelPageData());

$title = 'Keistimewaan Makam Sunan Ampel Surabaya: Sejarah, Tata Letak & Panduan Ziarah Lengkap — ' . config('site.brand');
$description = 'Ulasan lengkap keistimewaan Makam Sunan Ampel Surabaya. Sejarah Raden Rahmat, tata letak makam utama & Nyai Ageng Manila, karomah 9 makam Mbah Sholeh, Mbah Bolong, 5 gapura, sumur berkah & sewa mobil ziarah.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@graph": [
        {
          "@type": "TouristAttraction",
          "@id": "{{ $canonical }}#attraction",
          "name": "Makam Sunan Ampel Surabaya",
          "description": "Kompleks pemakaman bersejarah Raden Rahmat (Sunan Ampel), tokoh utama pembina Wali Songo. Dilengkapi cagar budaya 5 gapura, makam Mbah Sholeh 9 nisan, makam Mbah Bolong, dan sumur berkah peninggalan abad ke-15.",
          "url": "{{ $canonical }}",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Ampel Masjid No. 53, Kel. Ampel, Kec. Semampir",
            "addressLocality": "Surabaya",
            "addressRegion": "Jawa Timur",
            "postalCode": "60151",
            "addressCountry": "ID"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": -7.2301,
            "longitude": 112.7428
          },
          "isAccessibleForFree": true,
          "publicAccess": true
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
              "name": "Keistimewaan Makam Sunan Ampel",
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
                        ✦ Panduan Religi &amp; Wisata Cagar Budaya Surabaya
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Makam Sunan Ampel Surabaya: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Keistimewaan, Sejarah &amp; Panduan Ziarah</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Raden Rahmat &bull; Nyai Ageng Manila &bull; 9 Makam Mbah Sholeh &bull; Mbah Bolong &bull; Sumur Berkah
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Ulasan paling lengkap mengenai Kompleks Makam Sunan Ampel. Menyingkap keistimewaan situs makam utama, sejarah Raden Rahmat, keunikan arsitektur 5 gapura, karomah 9 makam Mbah Sholeh &amp; Mbah Bolong, hingga fasilitas sewa kendaraan ziarah.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & sewa armada ziarah ke Makam Sunan Ampel Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Armada Ziarah
                        </a>
                        <a href="#detail-kompleks-makam"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            🕌 Detail Situs Makam
                        </a>
                    </div>
                </div>

                {{-- Hero Right Highlight Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🕌</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Ringkasan Situs Makam</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Situs Makam Sunan Ampel</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Peristirahatan agung pembina Wali Songo di sebelah barat Masjid Ampel Surabaya.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Raden Rahmat</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Makam Utama (1481 M)</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">9 Nisan</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Makam Mbah Sholeh</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">5 Gapura</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Arsitektur Kuno</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sumur Berkah</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Peninggalan Abad 15</div>
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
                        <h4 class="text-white font-bold text-sm">Driver Paham Parkir Ampel</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Hafal titik drop-off &amp; Terminal Pegirian</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚐</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Armada Nyaman &amp; AC Dingin</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Hiace Premio, Zenix &amp; Alphard</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📍</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Penjemputan Bebas</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Juanda, Stasiun Gubeng &amp; Pasar Turi</p>
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

    {{-- SECTION 1: SEJARAH DAN SEJARAH TOKOH SUNAN AMPEL --}}
    <section class="py-[90px]" id="sejarah-sunan-ampel">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Sosok Penyebar Islam Agung</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Siapakah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sunan Ampel (Raden Rahmat)?</span>
                    </h2>
                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        <strong>Sunan Ampel</strong> memiliki nama asli <strong>Raden Rahmat</strong>. Beliau lahir pada awal abad ke-15 (sekitar 1401 M) di Champa. Ayah beliau adalah <strong>Syekh Ibrahim Asmarakandi</strong> (seorang ulama asal Samarkand), dan ibunya adalah <strong>Dewi Chandrawulan</strong> (putri Kerajaan Champa).
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Kedatangan Raden Rahmat ke Pulau Jawa didorong oleh hubungan kekerabatan dengan Bibi beliau, <em>Dewi Dwarawati</em>, yang merupakan permaisuri Raja Majapahit Prabu Brawijaya V. Oleh Prabu Brawijaya V, Raden Rahmat dihadiahi wilayah rawa berhutan bambu di pesisir utara Surabaya yang bernama <strong>Ampeldenta</strong>.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Di Ampeldenta itulah Sunan Ampel mendirikan pesantren pertama di Jawa Timur dan mendidik para pemuda yang kelak menjadi Wali Songo dan raja-raja Islam, termasuk Sunan Giri, Sunan Bonang, Sunan Drajat, hingga Raden Patah (Sultan Demak I). Wafat pada tahun 1481 M, makam beliau menjadi titik peristirahatan paling agung yang diziarahi jutaan umat hingga saat ini.
                    </p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                        📜 Falsafah Dakwah Moh Limo
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                        Ajaran moral legendaris Sunan Ampel yang berhasil memperbaiki akhlak masyarakat Jawa tanpa kekerasan:
                    </p>

                    <div class="flex flex-col gap-3 text-sm">
                        <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-[var(--color-accent)]">1. Moh Main:</strong> Tidak mau berjudi.
                        </div>
                        <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-[var(--color-accent)]">2. Moh Ngombe:</strong> Tidak mau minum minuman keras / khamr.
                        </div>
                        <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-[var(--color-accent)]">3. Moh Maling:</strong> Tidak mau mencuri atau mengambil hak orang lain.
                        </div>
                        <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-[var(--color-accent)]">4. Moh Madat:</strong> Tidak mau mengonsumsi candu / narkoba.
                        </div>
                        <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-[var(--color-accent)]">5. Moh Madon:</strong> Tidak mau berzina / berbuat immorality.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: DETAIL SITUS & KEISTIMEWAAN MAKAM --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="detail-kompleks-makam">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Detail Bangunan &amp; Karomah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.6rem)] font-bold">
                    Anatomi &amp; Keistimewaan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Kompleks Makam Sunan Ampel</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[750px] mx-auto mt-3 text-sm leading-relaxed">
                    Setiap sudut kawasan makam Sunan Ampel menyimpan nilai sejarah, cagar budaya, dan keajaiban spiritual yang mengagumkan.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 max-lg:grid-cols-1">
                {{-- CARD 1: MAKAM UTAMA & DEWI CANDRAWATI --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-3xl">🕌</span>
                        <h3 class="text-white text-xl font-bold">Makam Utama Sunan Ampel &amp; Istri</h3>
                    </div>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Makam Raden Rahmat (Sunan Ampel) terletak persis di sebelah barat Masjid Agung Ampel dalam pelataran khusus. Nisannya terbuat dari batu ukir bersejarah dan dipagari oleh cangkup ukir kayu jati kuno bernilai estetika tinggi.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Tepat di sebelah makam Sunan Ampel, bersemayam istri beliau <strong>Dewi Candrawati (Nyai Ageng Manila)</strong>, putri Adipati Tuban Arya Teja. Suasana di sekitar makam utama selalu dinaungi oleh kekhusyukan melafalkan ayat suci Al-Qur'an dan doa tawasul.
                    </p>
                </div>

                {{-- CARD 2: FENOMENA 9 NISAN MBAH SHOLEH --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-3xl">✨</span>
                        <h3 class="text-white text-xl font-bold">Fenomena 9 Makam Mbah Sholeh</h3>
                    </div>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Salah satu keunikan paling populer di kompleks makam ini adalah keberadaan <strong>9 nisan makam Mbah Sholeh</strong> di pelataran sebelah utara makam utama. Mbah Sholeh adalah murid Sunan Ampel yang sangat rajin membersihkan Masjid Ampel.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Menurut kisah tutur masyarakat, setelah Mbah Sholeh wafat, Sunan Ampel merindukan kebersihan masjid dan bergumam jika Mbah Sholeh hidup kembali. Atas izin Allah SWT, Mbah Sholeh hidup kembali hingga 9 kali wafat dan dimakamkan di sampingnya, sehingga menghasilkan 9 jajaran nisan makam Mbah Sholeh.
                    </p>
                </div>

                {{-- CARD 3: MAKAM MBAH BOLONG --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-3xl">🧭</span>
                        <h3 class="text-white text-xl font-bold">Makam Mbah Sonhaji (Mbah Bolong)</h3>
                    </div>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Di kompleks makam ini juga terdapat makam <strong>Mbah Sonhaji</strong> yang bergelar <em>Mbah Bolong</em>. Beliau adalah sahabat sekaligus arsitek pembantu Sunan Ampel dalam menentukan keakuratan arah kiblat Masjid Ampel.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Saat dipertanyakan mengenai ketepatan kiblat masjid, Mbah Sonhaji melubangi dinding masjid dengan jemarinya, lalu mengajak masyarakat melihat tembusan lubang tersebut yang langsung menampilkan bangunan Ka'bah di Mekkah secara kasat mata.
                    </p>
                </div>

                {{-- CARD 4: SUMUR BERKAH PENINGGALAN ABAD 15 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-3xl">💧</span>
                        <h3 class="text-white text-xl font-bold">Sumur Berkah Peninggalan Ampel</h3>
                    </div>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Di area kompleks makam terdapat sumur bersejarah peninggalan Sunan Ampel dari abad ke-15. Air dari sumur ini dikenal sangat jernih, segar, dan dipercaya memiliki khasiat serta keberkahan mirip dengan air Zam-Zam di Tanah Suci.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Pengelola kompleks makam telah memasang fasilitas tempat minum dan penampungan air modern, sehingga para peziarah dapat dengan mudah meminumnya langsung atau memasukannya ke dalam botol sebagai oleh-oleh berkah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: 7 KEISTIMEWAAN MAKAMS --}}
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Daya Tarik Utama</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.6rem)] font-bold">
                    7 Keistimewaan Utama <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Makam Sunan Ampel</span>
                </h2>
            </div>

            <div class="flex flex-col gap-8">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            01
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Peristirahatan Guru &amp; Pembina Utama Para Wali Songo</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Berziarah ke Makam Sunan Ampel ibarat sowan ke tempat peristirahatan "Ayah Spiritual" penyebar Islam Jawa. Beliau mendidik Sunan Giri, Sunan Bonang, Sunan Drajat, Sunan Kalijaga, hingga Raden Patah. Tempat ini menjadi poros peradaban Islam tertua di pesisir Jawa.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            02
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Keunikan Arsitektur Cagar Budaya 5 Gapura</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Memasuki kawasan makam, peziarah melintasi 5 gapura bersejarah yang merepresentasikan 5 Rukun Islam: <em>Gapura Ngadep</em> (Syahadat), <em>Gapura Poso</em> (Puasa), <em>Gapura Kunci</em> (Zakat), <em>Gapura Munggah</em> (Haji), dan <em>Gapura Hening</em> (Kesucian Hati).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            03
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Karomah Fenomenal 9 Nisan Mbah Sholeh &amp; Mbah Bolong</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Keberadaan 9 nisan makam Mbah Sholeh dan makam Mbah Sonhaji di satu lokasi menjadi bukti karomah para kekasih Allah SWT yang menginspirasi peziarah tentang keikhlasan berkhidmat pada agama.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            04
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Sumur Kuno Abad 15 Berair Jernih Mirip Zam-Zam</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Sumur tua peninggalan Sunan Ampel yang tak pernah kering selama 5 abad lebih menjadi sarana penawar dahaga dan pemenuh hajat keberkahan bagi para pengunjung dari seluruh penjuru daerah.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            05
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Atmosphere Dzikir Sepanjang Hari Nonstop &amp; Malam Sanga</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Kompleks makam terbuka sepanjang hari nonstop dengan gema shalawat dan lantunan Al-Qur'an tiada henti. Puncak spiritualitas terjadi pada tradisi <em>Malam Sanga</em> (malam ke-29 Ramadhan) dan Haul Agung Sunan Ampel.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            06
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Wisata Religi &amp; Pesona Heritage Kampung Arab Ampel</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Lorong Pasar Ampel menyuguhkan nuansa otentik Timur Tengah di Kota Surabaya. Peziarah dapat berbelanja minyak wangi, busana muslim, kurma, serta mencicipi kuliner khas Nasi Kebuli &amp; Kambing Oven.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex gap-6 items-start max-sm:flex-col">
                        <div class="w-14 h-14 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] font-bold text-xl flex items-center justify-center shrink-0 border border-[rgba(124,58,237,0.4)]">
                            07
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-xl mb-2">Akses Strategis sebagai Gerbang Utama Ziarah Wali 5 Jatim</h3>
                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                                Terletak di Surabaya Utara dekat Stasiun Pasar Turi &amp; Gubeng, Makam Sunan Ampel merupakan rute pertama yang ideal sebelum melanjutkan perjalanan ziarah ke Gresik, Lamongan, dan Tuban.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: ADAB DAN TATA CARA ZIARAH --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Panduan Peziarah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Adab &amp; Tata Cara <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Berziarah ke Makam Sunan Ampel</span>
                </h2>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="text-4xl mb-4">🧼</div>
                    <h3 class="text-white font-bold text-lg mb-2">1. Bersuci &amp; Berpakaian Muslim</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Pastikan dalam keadaan suci dari hadats kecil dan besar (berwudhu). Pakailah busana muslim yang rapi, harum, dan sopan saat memasuki area kompleks masjid &amp; makam.
                    </p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="text-4xl mb-4">🤲</div>
                    <h3 class="text-white font-bold text-lg mb-2">2. Membaca Salam &amp; Tahlil</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Ucapkan salam kepada Sunan Ampel &amp; para wali Allah. Duduklah di area yang disediakan (pria &amp; wanita terpisah) untuk membaca Yasin, Tahlil, serta berdoa tawasul hanya kepada Allah SWT.
                    </p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <div class="text-4xl mb-4">💧</div>
                    <h3 class="text-white font-bold text-lg mb-2">3. Meminum Air Sumur Berkah</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Sebelum kembali, sempatkan mengambil dan meminum air dari keran sumur peninggalan Sunan Ampel sambil berdoa memohon kesehatan, keselamatan, dan keberkahan hidup.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 5: ESTIMASI RUTE & JARAK KE SUNAN AMPEL --}}
    <section class="py-16 border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Panduan Perjalanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tabel Jarak &amp; Estimasi Waktu Tempuh <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">ke Makam Sunan Ampel</span>
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse bg-[var(--color-surface)] rounded-[var(--radius-lg)] border border-[var(--color-border)]">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.15)] border-b border-[var(--color-border)] text-white text-sm">
                            <th class="p-4 font-bold">Titik Penjemputan / Keberangkatan</th>
                            <th class="p-4 font-bold">Estimasi Jarak</th>
                            <th class="p-4 font-bold">Waktu Tempuh Mobil</th>
                            <th class="p-4 font-bold">Rekomendasi Armada</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)] text-sm text-[var(--color-text-light)]">
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Bandara Internasional Juanda (SUB)</td>
                            <td class="p-4">± 25 km</td>
                            <td class="p-4">40 – 50 Menit (via Tol Dupak)</td>
                            <td class="p-4">Hiace Premio / Innova Zenix / Alphard</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Stasiun Surabaya Gubeng (SGU)</td>
                            <td class="p-4">± 7 km</td>
                            <td class="p-4">15 – 25 Menit</td>
                            <td class="p-4">Innova Reborn / Hiace Commuter</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Stasiun Surabaya Pasar Turi (SBI)</td>
                            <td class="p-4">± 4 km</td>
                            <td class="p-4">10 – 15 Menit</td>
                            <td class="p-4">Avanza / Innova / Hiace</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Pelabuhan Tanjung Perak Surabaya</td>
                            <td class="p-4">± 5 km</td>
                            <td class="p-4">10 – 15 Menit</td>
                            <td class="p-4">Hiace Commuter / Premio</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">Lanjut Ke: Sunan Maulana Malik Ibrahim (Gresik)</td>
                            <td class="p-4">± 25 km</td>
                            <td class="p-4">40 – 50 Menit</td>
                            <td class="p-4">Hiace Commuter / Premio / Bus</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- SECTION 6: FAQ SECTION (DIPINDAHKAN KE ATAS DIBANDINGKAN PENAWARAN RENTAL MOBIL) --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="faq">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pertanyaan Umum</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    FAQ Ziarah &amp; Keistimewaan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Makam Sunan Ampel</span>
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

    {{-- SECTION 7: ARMADA REKOMENDASI UNTUK ZIARAH --}}
    <section class="py-[90px] border-t border-[var(--color-border)]" id="pilihan-armada">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transportasi Ziarah</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pilihan Armada Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Ziarah Sunan Ampel</span>
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
                            Pilihan paling ekonomis dan ideal untuk majelis taklim, pengajian, atau rombongan keluarga hingga 14 orang.
                        </p>
                        <ul class="flex flex-col gap-2.5 text-sm text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2">✓ 14 Reclining Seats</li>
                            <li class="flex items-center gap-2">✓ AC Double Blower Per-Head</li>
                            <li class="flex items-center gap-2">✓ Driver Berpengalaman Rute Ampel</li>
                            <li class="flex items-center gap-2">✓ Bagasi Luas untuk Barang &amp; Oleh-oleh</li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-[var(--color-accent)] font-bold text-2xl mb-4">{{ $hiaceCommuterPrice }} <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Queen Transport, saya ingin sewa Toyota Hiace Commuter untuk Ziarah Sunan Ampel Surabaya') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full py-3 rounded-[var(--radius-md)] bg-[image:var(--gradient-btn)] text-white font-semibold text-center block no-underline shadow-md">
                            💬 Pesan Hiace Commuter
                        </a>
                    </div>
                </div>

                {{-- HIACE PREMIO --}}
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
                        <a href="{{ \App\Support\WhatsApp::link('Halo Queen Transport, saya ingin sewa Toyota Hiace Premio untuk Ziarah Sunan Ampel Surabaya') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full py-3 rounded-[var(--radius-md)] bg-[image:var(--gradient-btn)] text-white font-semibold text-center block no-underline shadow-md">
                            💬 Pesan Hiace Premio
                        </a>
                    </div>
                </div>

                {{-- INNOVA ZENIX --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all hover:border-[var(--color-accent)] hover:-translate-y-2">
                    <div>
                        <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-4 inline-block">Keluarga Kecil (6-7 Seat)</span>
                        <h3 class="text-white text-xl font-bold mb-2">Innova Reborn / Zenix</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Pilihan pas untuk ziarah keluarga inti 5 hingga 7 penumpang yang mengutamakan kelincahan dan kenyamanan mobil MPV.
                        </p>
                        <ul class="flex flex-col gap-2.5 text-sm text-[var(--color-text-light)] mb-8">
                            <li class="flex items-center gap-2">✓ 6 - 7 Seats Legar</li>
                            <li class="flex items-center gap-2">✓ Performa Tangguh &amp; Hybrid Senyap</li>
                            <li class="flex items-center gap-2">✓ Full AC Triple Zone</li>
                            <li class="flex items-center gap-2">✓ Driver Ramah &amp; Sopan</li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-[var(--color-accent)] font-bold text-2xl mb-4">{{ $innovaPrice }} <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span></div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Queen Transport, saya ingin sewa Innova Zenix / Reborn untuk Ziarah Sunan Ampel Surabaya') }}"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full py-3 rounded-[var(--radius-md)] bg-[image:var(--gradient-btn)] text-white font-semibold text-center block no-underline shadow-md">
                            💬 Pesan Innova Zenix
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 8: TESTIMONI PELANGGAN --}}
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

    {{-- SECTION 9: FINAL CTA BANNER --}}
    <section class="py-20 relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1000px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs uppercase tracking-widest font-semibold mb-6 inline-block">
                ✦ Rencanakan Perjalanan Religi Anda Sekarang
            </span>
            <h2 class="text-white text-[clamp(2rem,4vw,3rem)] font-bold mb-4 leading-tight">
                Siap Berziarah ke <br class="hidden sm:block">
                <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Makam Sunan Ampel Surabaya?</span>
            </h2>
            <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto mb-8 text-base leading-relaxed">
                Hubungi tim Queen Transport untuk mendapatkan penawaran harga sewa mobil ziarah terbaik, saran rute jalan, dan jadwal penjemputan yang sesuai rombongan Anda.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & sewa armada Ziarah Sunan Ampel Surabaya') }}"
                   class="inline-flex items-center gap-2 px-10 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
