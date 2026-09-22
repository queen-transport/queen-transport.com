<?php

use function Laravel\Folio\name;

name('simak-surabaya-ke-nganjuk-berapa-jam');
?>

@php
$faqs = [
    [
        'q' => 'Surabaya ke Nganjuk berapa jam lewat jalan tol?',
        'a' => 'Perjalanan dari Surabaya ke Nganjuk via Jalan Tol Trans Jawa (Tol Sumo – Tol Kertosono – Tol Nganjuk) membutuhkan waktu sekitar 1,5 hingga 2 jam dengan kondisi lalu lintas lancar, menempuh jarak sekitar 115 hingga 125 kilometer.',
    ],
    [
        'q' => 'Surabaya ke Nganjuk berapa jam jika lewat jalur biasa (non-tol)?',
        'a' => 'Jika melewati jalur arteri nasional non-tol (rute Surabaya – Krian – By Pass Mojokerto – Mojoagung – Jombang – Kertosono – Nganjuk), waktu tempuh berkisar antara 3 hingga 4 jam, tergantung kepadatan lalu lintas di titik rawan macet seperti Simpang Krian, Peterongan, dan Simpang Mengkreng.',
    ],
    [
        'q' => 'Berapa jarak tempuh dari Surabaya ke Nganjuk?',
        'a' => 'Jarak tempuh darat dari Surabaya ke pusat Kota Nganjuk berkisar antara 115 km sampai 125 km melalui akses jalan tol, dan sekitar 110 km sampai 120 km melalui jalur jalan raya arteri nasional.',
    ],
    [
        'q' => 'Berapa perkiraan tarif tol Surabaya ke Nganjuk untuk mobil pribadi (Golongan I)?',
        'a' => 'Berdasarkan ketetapan resmi BPJT Kementerian PUPR dan operator jalan tol per September 2026, total tarif tol Surabaya (GT Waru) ke Exit Tol Nganjuk (Begadung) untuk Golongan I adalah Rp 125.500 (Tol Sumo Rp 43.500 + Tol Moker Rp 55.000 + Tol Kertosono-Nganjuk Rp 27.000). Tarif ini adalah harga saat data diambil dan dapat berubah sewaktu-waktu sesuai penyesuaian regulasi pemerintah. Disarankan menyiapkan saldo e-Toll minimal Rp 150.000 (sekali jalan) atau Rp 300.000 (PP).',
    ],
    [
        'q' => 'Di mana pintu keluar tol (exit tol) terdekat menuju pusat Kota Nganjuk?',
        'a' => 'Pintu keluar tol terdekat adalah Gerbang Tol Nganjuk yang berlokasi di Desa Begadung, Kecamatan Nganjuk. Dari exit tol ini hanya butuh waktu sekitar 5 hingga 10 menit (sekitar 4–5 km) untuk mencapai Alun-Alun Nganjuk dan pusat perkantoran kota.',
    ],
    [
        'q' => 'Di mana titik rawan macet yang perlu diwaspadai di jalur non-tol Surabaya – Nganjuk?',
        'a' => 'Titik paling rawan perlambatan dan macet di jalur non-tol adalah Simpang Tiga Mengkreng (pertemuan arus Surabaya, Kediri, dan Madiun serta perlintasan rel kereta api ganda), perempatan Krian, Pasar Mojoagung, dan Flyover Peterongan Jombang.',
    ],
    [
        'q' => 'Apakah Queen Transport menyediakan sewa mobil Surabaya ke Nganjuk include driver?',
        'a' => 'Ya, Queen Transport menyediakan layanan rental mobil dan charter antar-kota rute Surabaya – Nganjuk (drop-off, harian, maupun paket pulang-pergi). Layanan sudah include driver profesional, armada bersih & nyaman, serta gratis snack dan air mineral di hari pertama.',
    ],
    [
        'q' => 'Bisakah penjemputan langsung di Bandara Juanda Surabaya atau Stasiun Gubeng?',
        'a' => 'Sangat bisa! Layanan door-to-door Queen Transport siap menjemput Anda langsung di Bandara Internasional Juanda (Terminal 1 & 2), Stasiun Surabaya Gubeng, Stasiun Pasar Turi, hotel, maupun alamat rumah di Surabaya dan Sidoarjo langsung diantar ke lokasi tujuan di Nganjuk.',
    ],
];

$title = 'Simak Surabaya ke Nganjuk Berapa Jam: Estimasi Waktu, Rute Tol & Tips — ' . config('site.brand');
$description = 'Simak Surabaya ke Nganjuk berapa jam via Tol Trans Jawa (1,5 - 2 jam) vs jalur non-tol (3 - 4 jam). Panduan rute Tol Sumo-Kertosono-Nganjuk, tarif e-Toll, peta perjalanan & sewa mobil VIP include driver.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Article",
          "@id": "{{ $canonical }}#article",
          "headline": "Simak Surabaya ke Nganjuk Berapa Jam: Estimasi Waktu Tempuh, Rute Tol & Tips Perjalanan",
          "description": "{{ $description }}",
          "url": "{{ $canonical }}",
          "publisher": {
            "@type": "Organization",
            "name": "{{ config('site.brand') }}",
            "url": "{{ route('home') }}"
          },
          "mainEntityOfPage": "{{ $canonical }}"
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
              "name": "Surabaya ke Nganjuk Berapa Jam",
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
                        ✦ Panduan Rute &amp; Transportasi Jawa Timur
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Simak Surabaya ke Nganjuk Berapa Jam: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Estimasi Waktu, Rute Tol &amp; Non-Tol</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Tol Trans Jawa (1,5 - 2 Jam) &bull; Jalur Arteri (3 - 4 Jam) &bull; Sewa Mobil VIP Door-to-Door
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[560px]">
                        Ingin tahu <strong>Surabaya ke Nganjuk berapa jam</strong>? Via Jalan Tol Trans Jawa (Tol Sumo – Kertosono – Nganjuk), perjalanan hanya memerlukan waktu sekitar <strong>1,5 hingga 2 jam</strong> (jarak ± 115 km). Sementara lewat jalur non-tol biasa rata-rata memakan waktu <strong>3 hingga 4 jam</strong>. Simak ulasan rute terlengkap, rincian tarif e-Toll, hingga opsi transportasi paling nyaman di bawah ini!
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & sewa mobil perjalanan Surabaya ke Nganjuk') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Mobil Surabaya - Nganjuk
                        </a>
                        <a href="#perbandingan-waktu"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            ⏱️ Rincian Waktu &amp; Tarif Tol
                        </a>
                    </div>
                </div>

                {{-- Hero Right Highlight Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">⏱️</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Fakta Cepat Rute</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Surabaya &rarr; Nganjuk</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Akses penghubung Kota Pahlawan menuju Kabupaten Nganjuk (Kota Angin) di lereng Gunung Wilis.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">1,5 – 2 Jam</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Waktu Tempuh via Tol</div>
                            </div>
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">3 – 4 Jam</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Waktu Jalur Non-Tol</div>
                            </div>
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">± 115 km</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Jarak Tempuh Tol</div>
                            </div>
                            <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">Rp 125.500</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Tarif Tol (Gol I)*</div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[var(--color-border)] text-xs text-[var(--color-text-muted)] flex items-center justify-between">
                            <span>Gerbang Keluar:</span>
                            <span class="text-white font-semibold">GT Nganjuk (Begadung)</span>
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
                        <h4 class="text-white font-bold text-sm">Rute Tercepat via Tol</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Tol Sumo &amp; Kertosono tanpa macet</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Berpengalaman</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Menguasai rute jalan tol &amp; non-tol</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📍</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Layanan Door-to-Door</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Jemput Juanda / Stasiun / Rumah</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🥤</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Free Snack &amp; Air Mineral</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Fasilitas gratis di hari pertama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 1: PERBANDINGAN WAKTU TEMPUH & OPSI TRANSPORTASI --}}
    <section class="py-[90px]" id="perbandingan-waktu">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[800px] mx-auto mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Perbandingan Moda Transportasi</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight">
                    Berapa Jam Surabaya ke Nganjuk? <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Tabel Perbandingan Rute</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Waktu tempuh dari Surabaya menuju Nganjuk sangat dipengaruhi oleh pilihan rute jalan (tol vs non-tol) serta moda transportasi yang Anda gunakan. Berikut perbandingan rincinya:
                </p>
            </div>

            {{-- Comparison Table --}}
            <div class="overflow-x-auto rounded-[var(--radius-xl)] border border-[var(--color-border)] shadow-xl mb-12">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.15)] border-b border-[var(--color-border)] text-white text-sm">
                            <th class="p-4 font-bold">Moda / Pilihan Rute</th>
                            <th class="p-4 font-bold">Estimasi Jarak</th>
                            <th class="p-4 font-bold">Waktu Tempuh</th>
                            <th class="p-4 font-bold">Karakteristik &amp; Kelebihan</th>
                            <th class="p-4 font-bold">Kekurangan / Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[var(--color-border)] text-sm text-[var(--color-text-light)]">
                        <tr class="hover:bg-[rgba(124,58,237,0.05)] bg-[rgba(34,211,238,0.03)]">
                            <td class="p-4 font-bold text-white flex items-center gap-2">
                                <span class="text-xl">🚗</span> Mobil Pribadi / Rental (Via Tol)
                            </td>
                            <td class="p-4 font-semibold text-[var(--color-accent)]">± 115 – 125 km</td>
                            <td class="p-4 font-bold text-emerald-400">1,5 – 2 Jam</td>
                            <td class="p-4">Paling cepat, lancar tanpa lampu merah, bebas macet, langsung tembus Gerbang Tol Nganjuk di pusat kota.</td>
                            <td class="p-4 text-[var(--color-text-muted)]">Perlu saldo e-Toll (± Rp 125.000).</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">
                                <span class="text-xl inline-block mr-1">🛵</span> Mobil / Motor (Non-Tol Arteri)
                            </td>
                            <td class="p-4">± 110 – 120 km</td>
                            <td class="p-4 text-amber-400 font-semibold">3 – 4 Jam</td>
                            <td class="p-4">Tanpa tarif tol, banyak pilihan rest area warung makan lokal di sepanjang Krian, Jombang &amp; Kertosono.</td>
                            <td class="p-4 text-[var(--color-text-muted)]">Sering macet di Mengkreng, Krian &amp; pasar tumpah; melelahkan bagi sopir.</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">
                                <span class="text-xl inline-block mr-1">🚆</span> Kereta Api (Stasiun Surabaya &rarr; Nganjuk)
                            </td>
                            <td class="p-4">Jalur Rel</td>
                            <td class="p-4 text-cyan-400 font-semibold">1,5 – 2,5 Jam</td>
                            <td class="p-4">Tepat waktu, bebas kemacetan jalan raya, pemandangan sawah terbuka.</td>
                            <td class="p-4 text-[var(--color-text-muted)]">Terikat jadwal jam tiket; tidak door-to-door (harus oper angkutan lagi dari stasiun).</td>
                        </tr>
                        <tr class="hover:bg-[rgba(124,58,237,0.05)]">
                            <td class="p-4 font-semibold text-white">
                                <span class="text-xl inline-block mr-1">🚌</span> Bus Antar Kota (Bungurasih &rarr; Nganjuk)
                            </td>
                            <td class="p-4">± 115 – 120 km</td>
                            <td class="p-4 text-amber-400 font-semibold">2,5 – 4 Jam</td>
                            <td class="p-4">Ongkos tiket murah, jadwal bus sering tersedia di Terminal Purabaya.</td>
                            <td class="p-4 text-[var(--color-text-muted)]">Harus naik dari terminal; waktu tunggu lama; bus ekonomi sering ngetem.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Summary Highlight Box --}}
            <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] flex items-start gap-4">
                <span class="text-3xl flex-shrink-0">💡</span>
                <div>
                    <h3 class="text-white font-bold text-base mb-1">Kesimpulan Waktu Tempuh:</h3>
                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed">
                        Jika Anda mengutamakan <strong>kecepatan, kenyamanan keluarga, dan efisiensi waktu</strong>, perjalanan via <strong>Jalan Tol Trans Jawa</strong> dengan mobil pribadi atau rental mobil plus driver adalah opsi paling direkomendasikan. Anda menghemat waktu hingga <strong>2 jam penuh</strong> dibandingkan jalur non-tol, tanpa risiko terjebak antrean kemacetan Simpang Mengkreng Kertosono.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: PANDUAN RUTE TOL SURABAYA KE NGANJUK & TARIF E-TOLL --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="rute-tol">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-start max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Rute Tol Trans Jawa</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Panduan Lengkap <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Rute Tol Surabaya – Nganjuk</span>
                    </h2>

                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        Jalur tol Surabaya menuju Nganjuk merupakan bagian terintegrasi dari ruas <strong>Jalan Tol Trans Jawa</strong>. Rute ini membentang menghubungkan wilayah Gerbangkertosusila hingga kawasan Mataraman Jawa Timur.
                    </p>

                    <div class="flex flex-col gap-4 my-6">
                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">1</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Masuk Gerbang Tol di Surabaya</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Dari Surabaya Selatan / Sidoarjo / Juanda masuk melalui <strong>GT Waru</strong>. Jika dari arah pusat/barat Surabaya, Anda bisa masuk lewat <strong>GT Gunungsari</strong> atau <strong>GT Romokalisari</strong>.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">2</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Tol Surabaya – Mojokerto (Tol Sumo - 36,27 km)</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Melintasi jembatan megah Kalimas dan kawasan Driyorejo, Krian, hingga interchange Mojokerto (Penompo). Waktu tempuh di ruas ini sekitar 25–30 menit.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">3</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Tol Mojokerto – Kertosono (Tol Moker - 40,5 km)</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Menyusuri wilayah Jombang Utara hingga interchange Bandar Kedungmulyo. Melintasi Rest Area KM 695 dengan fasilitas SPBU dan tempat makan lengkap. Waktu tempuh sekitar 25–30 menit.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                            <span class="w-8 h-8 rounded-full bg-[rgba(34,211,238,0.2)] text-[var(--color-accent)] font-bold flex items-center justify-center flex-shrink-0 text-sm">4</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Tol Kertosono – Nganjuk (Seksi Kertosono - Ngawi)</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-1 leading-relaxed">
                                    Melintasi jembatan Sungai Brantas menuju Nganjuk. Laju kendaraan konstan dengan kondisi jalan mulus. Waktu tempuh ruas ini hanya sekitar 20 menit.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.3)]">
                            <span class="w-8 h-8 rounded-full bg-[var(--color-accent)] text-[var(--color-bg)] font-bold flex items-center justify-center flex-shrink-0 text-sm">5</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Keluar di Gerbang Tol Nganjuk (Begadung)</h4>
                                <p class="text-[var(--color-text-light)] text-xs mt-1 leading-relaxed">
                                    Ambil lajur keluar menuju <strong>Exit GT Nganjuk</strong> di Begadung. Begitu keluar gerbang tol, Anda langsung terhubung ke Jalan Lingkar Luar (Ring Road) Nganjuk, hanya butuh <strong>5–10 menit</strong> ke Alun-Alun Nganjuk.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Tarif Tol Card, Disclaimer, Referensi & Rest Area Info --}}
                <div class="flex flex-col gap-6">
                    <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-xl">
                        <div class="flex items-center justify-between pb-4 mb-6 border-b border-[var(--color-border)]">
                            <h3 class="text-white text-xl font-bold flex items-center gap-2">
                                💳 Rincian Tarif Tol (Golongan I)
                            </h3>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold">Mobil Pribadi</span>
                        </div>

                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Tarif resmi tol sistem tertutup dari Gerbang Tol Waru (Surabaya) menuju Gerbang Tol Nganjuk (Begadung) untuk kendaraan Golongan I (sedan, jip, minibus, pick-up, dan mobil pribadi):
                        </p>

                        <div class="space-y-3 text-sm">
                            <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div>
                                    <div class="text-[var(--color-text-light)] font-medium">1. Tol Surabaya – Mojokerto (Tol Sumo)</div>
                                    <div class="text-[var(--color-text-muted)] text-[0.7rem]">Operator: PT Jasamarga Surabaya Mojokerto</div>
                                </div>
                                <span class="font-bold text-white">Rp 43.500</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div>
                                    <div class="text-[var(--color-text-light)] font-medium">2. Tol Mojokerto – Kertosono (Tol Moker)</div>
                                    <div class="text-[var(--color-text-muted)] text-[0.7rem]">Operator: PT Astra Tol Nusantara (MHI)</div>
                                </div>
                                <span class="font-bold text-white">Rp 55.000</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div>
                                    <div class="text-[var(--color-text-light)] font-medium">3. Tol Kertosono – Nganjuk (Begadung)</div>
                                    <div class="text-[var(--color-text-muted)] text-[0.7rem]">Operator: PT Jasamarga Ngawi Kertosono Kediri</div>
                                </div>
                                <span class="font-bold text-white">Rp 27.000</span>
                            </div>
                            <div class="flex items-center justify-between p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.1)] border border-[rgba(34,211,238,0.3)]">
                                <div>
                                    <span class="text-white font-bold text-base block">Total Akumulasi Tarif Tol:</span>
                                    <span class="text-[var(--color-text-muted)] text-xs">Surabaya (Waru) &rarr; Exit Tol Nganjuk</span>
                                </div>
                                <span class="text-[var(--color-accent)] font-bold text-xl">Rp 125.500</span>
                            </div>
                        </div>

                        {{-- DISCLAIMER KOTAK PERINGATAN HARGA DAPAT BERUBAH --}}
                        <div class="mt-6 p-4 rounded-[var(--radius-md)] bg-[rgba(245,158,11,0.08)] border border-[rgba(245,158,11,0.3)] text-xs text-[var(--color-text-light)] leading-relaxed">
                            <div class="flex items-center gap-2 text-amber-400 font-bold mb-1.5 text-xs">
                                <span>⚠️</span>
                                <span>CATATAN &amp; DISCLAIMER PERUBAHAN TARIF</span>
                            </div>
                            <p class="text-[var(--color-text-muted)]">
                                <em>Informasi tarif tol, jarak, dan estimasi waktu tempuh ini dirangkum berdasarkan data resmi yang berlaku saat artikel ini disusun (September 2026). Tarif tol dan estimasi biaya sewaktu-waktu dapat mengalami penyesuaian atau perubahan tanpa pemberitahuan terlebih dahulu, sesuai Keputusan Menteri PUPR dan kebijakan operator jalan tol terkait.</em>
                            </p>
                            <p class="text-[var(--color-text-muted)] mt-2">
                                💡 <strong>Rekomendasi Saldo:</strong> Siapkan saldo kartu e-Toll minimal <strong>Rp 150.000</strong> (sekali jalan) atau <strong>Rp 300.000</strong> (pulang-pergi/PP) untuk mengantisipasi selisih rute masuk dan keluar tol.
                            </p>
                        </div>
                    </div>

                    {{-- KOTAK REFERENSI SUMBER DATA RESMI DARI INTERNET --}}
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6">
                        <div class="flex items-center gap-2 mb-4 pb-3 border-b border-[var(--color-border)]">
                            <span class="text-xl">📚</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Referensi &amp; Sumber Rujukan Data</h4>
                                <p class="text-[var(--color-text-muted)] text-[0.7rem]">Data tarif, jarak, dan rute dihimpun dari publikasi resmi dan portal terpercaya:</p>
                            </div>
                        </div>

                        <ul class="space-y-3 text-xs text-[var(--color-text-muted)] leading-relaxed">
                            <li class="flex items-start gap-2.5">
                                <span class="text-[var(--color-accent)] font-bold flex-shrink-0">1.</span>
                                <div>
                                    <strong class="text-white">Badan Pengatur Jalan Tol (BPJT) Kementerian PUPR RI:</strong>
                                    Laman resmi kalkulator tarif tol dan ketetapan tarif jalan tol Trans Jawa.
                                    <br>
                                    <a href="https://bpjt.pu.go.id/cek-tarif-tol" target="_blank" rel="nofollow noopener noreferrer" class="text-[var(--color-accent)] hover:underline inline-flex items-center gap-1 mt-0.5">
                                        🔗 bpjt.pu.go.id/cek-tarif-tol
                                    </a>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-[var(--color-accent)] font-bold flex-shrink-0">2.</span>
                                <div>
                                    <strong class="text-white">PT Jasa Marga (Persero) Tbk &amp; Aplikasi Travoy:</strong>
                                    Publikasi tarif resmi ruas Tol Surabaya-Mojokerto dan Tol Ngawi-Kertosono serta peta jaringan tol operasional.
                                    <br>
                                    <a href="https://www.jasamarga.com" target="_blank" rel="nofollow noopener noreferrer" class="text-[var(--color-accent)] hover:underline inline-flex items-center gap-1 mt-0.5">
                                        🔗 jasamarga.com
                                    </a>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-[var(--color-accent)] font-bold flex-shrink-0">3.</span>
                                <div>
                                    <strong class="text-white">PT Astra Tol Nusantara (Astra Tol Jombang-Mojokerto):</strong>
                                    Informasi penyesuaian tarif berkala pada Seksi Tol Mojokerto–Kertosono (40,5 km).
                                    <br>
                                    <a href="https://www.astratol.co.id" target="_blank" rel="nofollow noopener noreferrer" class="text-[var(--color-accent)] hover:underline inline-flex items-center gap-1 mt-0.5">
                                        🔗 astratol.co.id
                                    </a>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-[var(--color-accent)] font-bold flex-shrink-0">4.</span>
                                <div>
                                    <strong class="text-white">Direktorat Jenderal Bina Marga Kementerian PUPR &amp; Google Maps Navigation:</strong>
                                    Data jarak tempuh geografis (±114 – 118 km via tol, ±110 – 116 km via Jalur Nasional Arteri Rute 15) dan pemetaan rute darat Surabaya – Nganjuk.
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-[var(--color-accent)] font-bold flex-shrink-0">5.</span>
                                <div>
                                    <strong class="text-white">Publikasi Media Nasional (Kompas.com, Detik.com Jatim &amp; Astra Otoshop):</strong>
                                    Laporan berkala mengenai <em>"Rincian Tarif Tol Trans Jawa Ruas Surabaya Menuju Kertosono dan Nganjuk untuk Kendaraan Golongan I"</em>.
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Rest Area Card --}}
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6">
                        <h4 class="text-white font-bold text-base mb-3 flex items-center gap-2">
                            ☕ Rest Area Rekomendasi di Sepanjang Rute
                        </h4>
                        <div class="space-y-3 text-xs text-[var(--color-text-muted)] leading-relaxed">
                            <div>
                                <strong class="text-[var(--color-accent)]">Rest Area KM 725 A/B (Tol Sumo):</strong> SPBU 24 jam, Masjid megah, food court, minimarket &amp; ATM Center.
                            </div>
                            <div>
                                <strong class="text-[var(--color-accent)]">Rest Area KM 695 A/B (Tol Moker):</strong> Lokasi favorit untuk toilet bersih, minimarket, gerai kopi, dan istirahat sejenak sebelum masuk Nganjuk.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: PANDUAN JALUR NON-TOL & TITIK RAWAN MACET --}}
    <section class="py-[90px]" id="jalur-non-tol">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Jalur Arteri Nasional</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Bagaimana Jika Lewat <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Jalur Biasa (Non-Tol)?</span>
                    </h2>
                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        Bagi Anda yang memilih tidak menggunakan jalan tol, rute yang ditempuh adalah Jalan Nasional Rute 15 (Jalur Tengah Jawa Timur). Rute ini melintasi beberapa kota kabupaten dengan jarak sekitar <strong>110 hingga 120 kilometer</strong> dan durasi <strong>3 hingga 4 jam</strong>.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Rute berurutan yang akan Anda lalui: <strong>Surabaya (Waru / Sepanjang) &rarr; Krian &rarr; By Pass Mojokerto &rarr; Mojoagung &rarr; Peterongan &rarr; Ring Road Jombang &rarr; Simpang Mengkreng (Kertosono) &rarr; Baron &rarr; Sukomoro &rarr; Nganjuk Kota</strong>.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Kelebihan jalur ini adalah bebas biaya tol dan banyaknya ragam kuliner khas di pinggir jalan seperti Rawon Nguling By Pass, Sate Kertosono, hingga aneka buah musiman. Namun, waktu tempuhnya jauh lebih lama dan membutuhkan stamina mengemudi ekstra.
                    </p>
                </div>

                {{-- Card Titik Rawan Macet --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                    <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                        🛑 Titik Rawan Macet Jalur Non-Tol
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                        Jika Anda terpaksa melewati jalur arteri, waspadai 4 titik simpul kemacetan berikut:
                    </p>

                    <div class="flex flex-col gap-3.5 text-sm">
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">1. Simpang Tiga Mengkreng (Braan Kertosono):</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Titik paling legendaris pertemuan arus kendaraan dari Surabaya, Kediri, dan Nganjuk/Madiun, dipadu dengan perlintasan rel ganda kereta api aktif.</p>
                        </div>
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">2. Pusat Pertokoan &amp; Simpang Krian:</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Lalu lintas padat angkot, truk industri, dan persimpangan arah Sidoarjo/Mojokerto.</p>
                        </div>
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">3. Pasar Mojoagung &amp; Peterongan Jombang:</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Aktivitas pasar tumpah pagi dan sore hari yang memperlambat laju kendaraan.</p>
                        </div>
                        <div class="p-3.5 rounded-[var(--radius-md)] bg-[rgba(239,68,68,0.08)] border border-[rgba(239,68,68,0.2)] text-[var(--color-text-light)]">
                            <strong class="text-red-400">4. Perlintasan Kereta Api Baron &amp; Sukomoro:</strong>
                            <p class="text-xs text-[var(--color-text-muted)] mt-1">Antrean kendaraan akibat frekuensi kereta lintas selatan dan utara yang padat melintas setiap 10-15 menit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: DESTINASI WISATA & KULINER NGANJUK --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="wisata-nganjuk">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[800px] mx-auto mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Eksplorasi Kota Angin</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight">
                    Destinasi Populer di Nganjuk yang <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Wajib Anda Kunjungi</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Begitu tiba di Nganjuk setelah perjalanan singkat via jalan tol, sempatkan menjelajahi objek wisata alam memukau di lereng Gunung Wilis dan kuliner legendarisnya:
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                {{-- Wisata 1 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🌊</span>
                    <h3 class="text-white font-bold text-lg mb-2">Air Terjun Sedudo</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Kec. Sawahan (Lereng Gunung Wilis)</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Ikon wisata Nganjuk di ketinggian 1.438 mdpl dengan ketinggian air terjun 105 meter. Berhawa sejuk asri dan terkenal dengan tradisi ritual siraman setiap bulan Suro. Waktu tempuh dari exit tol Nganjuk sekitar 50 menit.
                    </p>
                </div>

                {{-- Wisata 2 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🌲</span>
                    <h3 class="text-white font-bold text-lg mb-2">Air Terjun Roro Kuning</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Desa Bajulan, Kec. Loceret</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Air terjun berundak alami yang mengalir di sela bebatuan padas dan rimbunnya hutan pinus. Terdapat kolam renang alami dan monumen perjuangan Panglima Besar Jenderal Sudirman saat perang gerilya.
                    </p>
                </div>

                {{-- Wisata 3 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🏛️</span>
                    <h3 class="text-white font-bold text-lg mb-2">Candi Lor &amp; Anjuk Ladang</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Desa Candirejo, Kec. Loceret</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Situs candi bata merah abad ke-10 yang dibangun Mpu Sindok dari Kerajaan Medang Mataram Kuno. Tempat ditemukannya Prasasti Anjuk Ladang (937 M) yang menandai berdirinya nama Nganjuk.
                    </p>
                </div>

                {{-- Kuliner 1 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🍲</span>
                    <h3 class="text-white font-bold text-lg mb-2">Nasi Becek Nganjuk</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Kuliner Khas Nasi + Gulai Kambing</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Kuliner legendaris Nganjuk mirip kare/gulai kambing kental dengan kuah santan berempah, dipadukan irisan kubis segar, kecambah, dan taburan bawang goreng yang gurih menggugah selera.
                    </p>
                </div>

                {{-- Kuliner 2 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🍬</span>
                    <h3 class="text-white font-bold text-lg mb-2">Dumbleg Khas Gondang</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Oleh-Oleh Tradisional Manis Legendaris</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Kue tradisional kenyal beraroma gula kelapa dan ketan yang dibungkus pelepah pohon jambe (pinang). Makanan khas ini hanya diproduksi di daerah Gondang Nganjuk.
                    </p>
                </div>

                {{-- Kuliner 3 --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 hover:border-[var(--color-accent)] transition-all">
                    <span class="text-3xl mb-4 block">🌶️</span>
                    <h3 class="text-white font-bold text-lg mb-2">Nasi Pecel Bledek</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Pedas Menggelegar Khas Nganjuk</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Nasi pecel khas Kota Angin dengan sambal kacang racikan pedas ekstra cabai rawit merah, disajikan bersama krupuk upil (goreng pasir) dan aneka jeroan serta tempe kemul hangat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 5: SOLUSI SEWA MOBIL SURABAYA KE NGANJUK --}}
    <section class="py-[90px]" id="layanan-sewa">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Solusi Transportasi Eksekutif</span>
                    <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold leading-tight mb-6">
                        Mengapa Memilih Sewa Mobil <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya ke Nganjuk di Queen Transport?</span>
                    </h2>
                    <p class="text-[var(--color-text-light)] text-sm leading-relaxed mb-4">
                        Mengemudi sendiri jarak jauh di jalan tol atau jalur arteri seringkali melelahkan. Dengan layanan sewa mobil plus driver profesional dari <strong>{{ config('site.brand') }}</strong>, perjalanan Anda menjadi santai, bebas stres, dan tepat waktu.
                    </p>

                    <div class="space-y-4 my-6">
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Penjemputan Door-to-Door</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Jemput di lobi Bandara Juanda, stasiun, hotel, atau rumah tinggal di Surabaya &amp; Sidoarjo langsung antar ke alamat tujuan Nganjuk.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Driver Berpengalaman &amp; Ramah</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Driver kami sangat menguasai navigasi jalan tol, rest area, serta rute tanjakan pegunungan menuju Air Terjun Sedudo.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Armada Terawat &amp; Higienis</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Setiap unit selalu dicuci bersih, interior wangi, AC dingin merata, dan suspensi nyaman.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[var(--color-accent)] text-xl flex-shrink-0">✓</span>
                            <div>
                                <h4 class="text-white font-bold text-sm">Bonus Snack &amp; Air Mineral</h4>
                                <p class="text-[var(--color-text-muted)] text-xs mt-0.5">Gratis air mineral dan aneka snack segar di dalam mobil pada hari pertama sewa untuk menemani perjalanan Anda.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya butuh armada sewa mobil untuk perjalanan ke Nganjuk') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                       target="_blank" rel="noopener noreferrer">
                        💬 Hubungi Kami via WhatsApp
                    </a>
                </div>

                {{-- Distance matrix card --}}
                <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-xl">
                    <h3 class="text-white font-bold text-xl mb-4 flex items-center gap-2">
                        📍 Estimasi Jarak &amp; Waktu ke Area Nganjuk
                    </h3>
                    <p class="text-[var(--color-text-muted)] text-xs mb-6 leading-relaxed">
                        Estimasi waktu tempuh dari Surabaya (via Tol) menuju berbagai kecamatan &amp; destinasi di Kabupaten Nganjuk:
                    </p>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Pusat Kota / Alun-Alun Nganjuk</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Kecamatan Nganjuk</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 30 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">115 km</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Kertosono (Stasiun / Kota)</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Kecamatan Kertosono</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 15 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">95 km</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Tanjunganom / Warujayeng</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Kecamatan Tanjunganom</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">1 Jam 40 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">110 km</div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                            <div>
                                <div class="text-white font-semibold text-xs">Wisata Air Terjun Sedudo</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">Kecamatan Sawahan (Wilis)</div>
                            </div>
                            <div class="text-right">
                                <div class="text-[var(--color-accent)] font-bold text-xs">2 Jam 30 Menit</div>
                                <div class="text-[var(--color-text-muted)] text-[0.7rem]">145 km</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 6: FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]" id="faq">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pertanyaan Umum</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    FAQ Surabaya ke Nganjuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Berapa Jam</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3">
                    Jawaban ringkas atas pertanyaan yang paling sering ditanyakan seputar perjalanan dari Surabaya menuju Nganjuk.
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

    {{-- SECTION 7: ARMADA REKOMENDASI UNTUK PERJALANAN LUAR KOTA --}}
    <x-armada-list
        subtitle="Armada Luar Kota VIP"
        title="Pilihan Mobil Sewa Nyaman untuk Perjalanan <span style='background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;'>Surabaya ke Nganjuk</span>"
        description="Pilih armada favorit Anda untuk perjalanan keluarga, dinas kerja, maupun wisata ke Nganjuk. Semua unit dalam kondisi prima include driver profesional."
        wa-text="untuk perjalanan Surabaya ke Nganjuk"
        :limit="6"
    />

    {{-- SECTION 8: FINAL CTA BANNER --}}
    <section class="py-20 relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1000px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs uppercase tracking-widest font-semibold mb-6 inline-block">
                ✦ Perjalanan Cepat, Aman &amp; Nyaman
            </span>
            <h2 class="text-white text-[clamp(2rem,4vw,3rem)] font-bold mb-4 leading-tight">
                Rencanakan Perjalanan Anda ke <br class="hidden sm:block">
                <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Nganjuk Bersama Queen Transport!</span>
            </h2>
            <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto mb-8 text-base leading-relaxed">
                Nikmati waktu tempuh singkat 1,5 jam Surabaya – Nganjuk dengan armada bersih, AC dingin, dan sopir berpengalaman. Hubungi customer service kami sekarang untuk konsultasi jadwal dan tarif sewa terbaik.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi jadwal & sewa mobil Surabaya ke Nganjuk') }}"
                   class="inline-flex items-center gap-2 px-10 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>

</x-layouts::public>
