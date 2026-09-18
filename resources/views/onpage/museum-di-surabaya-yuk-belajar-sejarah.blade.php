<?php

use function Laravel\Folio\name;

name('museum-di-surabaya-yuk-belajar-sejarah');
?>

@php
$museums = [
    [
        'name' => 'Museum Tugu Pahlawan & Sepuluh Nopember',
        'location' => 'Jl. Pahlawan, Alun-alun Contong, Kec. Bubutan, Surabaya',
        'highlight' => 'Monumen ikonik Kota Pahlawan dengan museum bawah tanah memamerkan artefak Pertempuran 10 Nopember 1945, rekaman suara orasi Bung Tomo, diorama perjuangan, dan benda peninggalan para pejuang.',
        'hours' => 'Selasa - Minggu: 08.00 - 15.00 WIB (Senin Tutup)',
        'ticket' => 'Rp 5.000 / orang (Gratis untuk pelajar bertunjukkan kartu siswa)',
        'category' => 'Sejarah Kemerdekaan & Perjuangan',
    ],
    [
        'name' => 'Museum Bank Indonesia (De Javasche Bank)',
        'location' => 'Jl. Garuda No. 1, Krembangan, Surabaya',
        'highlight' => 'Gedung bersejarah berarsitektur Neo-Renaissance peninggalan kolonial Belanda. Memamerkan sejarah perbankan Nusantara, brankas penyimpanan emas kuno, mesin cetak uang, serta koleksi mata uang kuno.',
        'hours' => 'Selasa - Minggu: 08.00 - 16.00 WIB (Senin Tutup)',
        'ticket' => 'Gratis / Tanpa Dipungut Biaya',
        'category' => 'Arsitektur Kolonial & Perbankan',
    ],
    [
        'name' => 'Museum House of Sampoerna',
        'location' => 'Taman Sampoerna No. 6, Krembangan, Surabaya',
        'highlight' => 'Bangunan megah berarsitektur Belanda abad ke-19 yang menjadi cikal bakal industri kretek Indonesia. Menyajikan proses linting rokok manual, koleksi sejarah pendiri, hingga galeri seni modern dan armada bus Heritage Track.',
        'hours' => 'Setiap Hari: 09.00 - 18.00 WIB',
        'ticket' => 'Gratis / Tanpa Dipungut Biaya',
        'category' => 'Industri & Warisan Budaya',
    ],
    [
        'name' => 'Museum Kapal Selam (Monkasel - KRI Pasopati 410)',
        'location' => 'Jl. Pemuda No. 39, Genteng, Surabaya (Samping Kalimas)',
        'highlight' => 'Kapal selam sungguhan tipe Whiskey Class buatan Uni Soviet yang pernah memperkuat TNI Angkatan Laut dalam Operasi Trikora dan Pembebasan Irian Barat. Pengunjung bisa masuk melintasi ruang torpedo, periskop, dan mesin.',
        'hours' => 'Setiap Hari: 08.00 - 20.00 WIB',
        'ticket' => 'Rp 15.000 / orang',
        'category' => 'Militer & Kebaharian',
    ],
    [
        'name' => 'Museum Surabaya (Gedung Siola)',
        'location' => 'Jl. Tunjungan No. 1, Genteng, Surabaya',
        'highlight' => 'Berada di lantai dasar Gedung Siola bersejarah di kawasan Jalan Tunjungan. Menyajikan perjalanan perkembangan Kota Surabaya dari era kerajaan, kolonial, hingga modern, lengkap dengan becak tua, pakaian dinas wali kota lama, dan arsip bersejarah.',
        'hours' => 'Selasa - Minggu: 09.00 - 16.00 WIB',
        'ticket' => 'Gratis (Reservasi Tiket Online via Tiket Wisata Surabaya)',
        'category' => 'Sejarah Kota & Budaya Lokal',
    ],
    [
        'name' => 'Museum Pendidikan Surabaya',
        'location' => 'Jl. Genteng Kali No. 10, Genteng, Surabaya',
        'highlight' => 'Bertempat di eks Taman Siswa Surabaya, mengabadikan perjalanan evolusi pendidikan di Indonesia mulai dari era pra-aksara, masa kerajaan, masa kolonial, hingga era pasca-kemerdekaan.',
        'hours' => 'Selasa - Minggu: 08.00 - 15.00 WIB',
        'ticket' => 'Gratis (Pendaftaran Online)',
        'category' => 'Edukasi & Pembelajaran',
    ],
    [
        'name' => 'Museum Dr. Soetomo (Gedung Nasional Indonesia)',
        'location' => 'Jl. Bubutan No. 85-87, Bubutan, Surabaya',
        'highlight' => 'Museum yang merekam jejak perjuangan Dr. Soetomo pendiri organisasi Budi Utomo. Berisi barang peninggalan pribadi, surat kabar sejarah pers Indonesia, alat medis tempo dulu, dan kompleks makam Dr. Soetomo.',
        'hours' => 'Selasa - Minggu: 08.00 - 15.00 WIB',
        'ticket' => 'Gratis / Rp 5.000',
        'category' => 'Tokoh Pahlawan Pergerakan',
    ],
    [
        'name' => 'Museum Kesehatan Dr. Adhyatma, MPH',
        'location' => 'Jl. Indrapura No. 17, Krembangan, Surabaya',
        'highlight' => 'Museum unik yang menyimpan artefak perkembangan ilmu kedokteran dan dunia kesehatan Indonesia, mencakup instrumen medis kuno, obat-obatan tradisional, riset kesehatan, hingga koleksi penanganan kesehatan khusus.',
        'hours' => 'Senin - Jumat: 08.00 - 15.00 WIB',
        'ticket' => 'Rp 5.000 / orang',
        'category' => 'Sains & Kedokteran',
    ],
];

$faqs = [
    [
        'q' => 'Museum apa saja di Surabaya yang paling wajib dikunjungi untuk belajar sejarah?',
        'a' => 'Beberapa museum paling ikonik di Surabaya antara lain Museum Tugu Pahlawan & Sepuluh Nopember (sejarah pertempuran 1945), De Javasche Bank (sejarah perbankan & arsitektur kolonial), House of Sampoerna, Museum Kapal Selam Monkasel (kapal perang militer), dan Museum Surabaya Gedung Siola di Jalan Tunjungan.',
    ],
    [
        'q' => 'Apakah museum-museum di Surabaya cocok untuk wisata edukasi anak sekolah dan keluarga?',
        'a' => 'Sangat cocok! Museum di Surabaya menyajikan diorama interaktif, benda sejarah asli, simulasi teknologi, dan pemandu berpengalaman yang membuat belajar sejarah menjadi seru, edukatif, dan menginspirasi anak-anak maupun pelajar.',
    ],
    [
        'q' => 'Berapa rata-rata harga tiket masuk museum di Surabaya?',
        'a' => 'Sebagian besar museum yang dikelola Pemerintah Kota Surabaya dan Bank Indonesia berstatus GRATIS atau berbiaya sangat terjangkau mulai dari Rp 3.000 - Rp 15.000 per orang. Beberapa museum memerlukan pemesanan/reservasi tiket online terlebih dahulu.',
    ],
    [
        'q' => 'Bagaimana cara terbaik menjelajahi banyak museum di Surabaya dalam satu hari?',
        'a' => 'Untuk mengunjungi 4 hingga 6 museum secara efisien tanpa lelah berdesakan di transportasi umum atau kesulitan mencari tempat parkir di area bersejarah (seperti Krembangan dan Tunjungan), menyewa mobil pribadi plus driver profesional dari Queen Transport adalah opsi terbaik.',
    ],
    [
        'q' => 'Pilihan armada sewa mobil apa yang direkomendasikan untuk city tour museum Surabaya?',
        'a' => 'Untuk wisata keluarga kecil (3-5 orang), Toyota Innova Zenix / Reborn atau Avanza sangat nyaman. Untuk rombongan sekolah, studi tur instansi, atau rombongan keluarga besar (10-18 orang), Toyota Hiace Premio / Commuter atau Coaster / Medium Bus siap mengantar dengan fasilitas kabin dingin dan nyaman.',
    ],
    [
        'q' => 'Apakah layanan Queen Transport sudah termasuk driver dan BBM untuk rute wisata museum?',
        'a' => 'Ya, layanan kami fleksibel dengan paket All-In (mobil + pengemudi + BBM). Driver kami sangat paham seluk-beluk lalu lintas kota Surabaya, lokasi parkir museum, serta rekomendasi tempat kuliner khas terdekat seperti Rujak Cingur, Rawon Setan, dan Bebek Sinjay.',
    ],
    [
        'q' => 'Bagaimana cara melakukan reservasi sewa mobil wisata museum di Queen Transport?',
        'a' => 'Cukup klik tombol reservasi WhatsApp di situs ini, pilih armada yang diinginkan, dan sampaikan tanggal serta daftar museum yang ingin Anda kunjungi. Tim customer service kami beroperasi 24/7 dan siap membantu memandu itinerary wisata Anda.',
    ],
];

$title = 'Museum di Surabaya: Yuk Belajar Sejarah & Rental Mobil Wisata — ' . config('site.brand');
$description = 'Panduan wisata sejarah & edukasi museum terbaik di Surabaya. Jelajahi Tugu Pahlawan, De Javasche Bank, Monkasel, House of Sampoerna & Gedung Siola dengan sewa mobil Surabaya VIP include driver.';
$canonical = url()->current();
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "ItemList",
          "@@id": "{{ $canonical }}#museum-list",
          "name": "Daftar Museum Bersejarah Terbaik di Surabaya",
          "description": "Rekomendasi museum edukasi dan sejarah paling populer di Surabaya untuk kunjungan keluarga, sekolah, dan turis.",
          "itemListElement": [
            @foreach ($museums as $index => $museum)
            {
              "@@type": "ListItem",
              "position": {{ $index + 1 }},
              "item": {
                "@@type": "Museum",
                "name": "{{ $museum['name'] }}",
                "address": "{{ $museum['location'] }}",
                "description": "{{ $museum['highlight'] }}"
              }
            }@if (!$loop->last),@endif
            @endforeach
          ]
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
            }@if (!$loop->last),@endif
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
              "name": "Museum di Surabaya - Belajar Sejarah",
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
                        🏛️ Wisata Edukasi &amp; Sejarah Kota Pahlawan
                    </div>

                    <h1 class="text-[clamp(2.1rem,4.2vw,3.5rem)] font-bold leading-[1.18] tracking-[0.02em] text-white">
                        Museum di Surabaya: <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Yuk Belajar Sejarah &amp; Perjuangan</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Tugu Pahlawan &bull; De Javasche Bank &bull; Monkasel &bull; House of Sampoerna &bull; Transportasi VIP
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Jelajahi jejak perjuangan bangsa, arsitektur kolonial yang memukau, dan warisan budaya Nusantara di museum-museum terbaik Kota Surabaya. Nikmati perjalanan wisata edukasi keluarga, sekolah, maupun dinas yang nyaman bersama <strong>{{ config('site.brand') }}</strong>.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi paket rental mobil untuk tur wisata museum di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Reservasi Mobil Wisata Museum
                        </a>
                        <a href="#daftar-museum"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📌 Lihat Rekomendasi Museum
                        </a>
                    </div>
                </div>

                {{-- Hero Highlight Card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">📜</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Surabaya Heritage</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Ringkasan Wisata Museum Surabaya</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Panduan lengkap destinasi edukasi bersejarah terbaik di Kota Pahlawan.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">8+ Museum Utama</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Destinasi Edukasi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Gratis - Rp15rb</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Tiket Terjangkau</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Ramah Anak</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Fasilitas Lengkap</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Driver + BBM</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Private City Tour</div>
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
                    <span class="text-3xl">🏛️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Koleksi Artefak Berharga</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Saksi bisu kemerdekaan RI</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🏢</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Arsitektur Kolonial Menawan</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Spot foto estetik klasik</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚘</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Sewa Mobilinclude Driver</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Bebas ribet macet &amp; parkir</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍👩‍👧‍👦</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Wisata Edukasi Keluarga</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Seru &amp; menginspirasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 1: KET ket / MENGAPA BELAJAR SEJARAH DI SURABAYA --}}
    <section class="py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs tracking-wider uppercase mb-4">
                        ✦ Mengapa Surabaya Disebut Kota Pahlawan?
                    </div>
                    <h2 class="text-white text-3xl font-bold leading-tight mb-6">
                        Menelusuri Jejak Kejayaan &amp; Perjuangan Pertempuran 10 Nopember
                    </h2>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-4">
                        Surabaya bukan sekadar kota metropolitan terbesar kedua di Indonesia. Kota ini memegang peranan pivotal dalam mempertahankan kemerdekaan Republik Indonesia melalui pertempuran dahsyat 10 Nopember 1945.
                    </p>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">
                        Mengunjungi museum-museum di Surabaya memberikan pengalaman belajar sejarah secara langsung dan mendalam. Anak-anak dan generasi muda dapat menyaksikan diorama pertempuran, rekaman asli suara Bung Tomo yang membakar semangat pahlawan, hingga artefak perbankan dan industri yang membentuk identitas bangsa.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-xs font-semibold text-white">
                        <div class="flex items-center gap-2 p-3 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                            <span class="text-[var(--color-accent)]">✓</span> Diorama &amp; Suara Bung Tomo
                        </div>
                        <div class="flex items-center gap-2 p-3 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                            <span class="text-[var(--color-accent)]">✓</span> Kapal Selam Perang Asli
                        </div>
                        <div class="flex items-center gap-2 p-3 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                            <span class="text-[var(--color-accent)]">✓</span> Gedung Bersejarah Kolonial
                        </div>
                        <div class="flex items-center gap-2 p-3 rounded-[var(--radius-md)] bg-[var(--color-surface)] border border-[var(--color-border)]">
                            <span class="text-[var(--color-accent)]">✓</span> Edukasi Anak &amp; Pelajar
                        </div>
                    </div>
                </div>

                {{-- Right Card / Callout --}}
                <div class="bg-[var(--color-surface)] border border-[var(--color-border)] p-8 rounded-[var(--radius-xl)] shadow-xl">
                    <span class="text-4xl mb-4 block">🎓</span>
                    <h3 class="text-white text-xl font-bold mb-3">Keuntungan Tour Museum Bersama {{ config('site.brand') }}</h3>
                    <ul class="space-y-3 text-sm text-[var(--color-text-muted)]">
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">1.</span>
                            <span><strong>Efisiensi Waktu:</strong> Kunjungi 4-5 museum utama dalam sehari tanpa pusing rute dan macet.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">2.</span>
                            <span><strong>Driver Penunjuk Rute:</strong> Pengemudi berpengalaman paham lokasi drop-off dan tempat parkir terbaik di area sibuk seperti Bubutan, Krembangan, dan Tunjungan.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">3.</span>
                            <span><strong>Armada Bersih &amp; Dingin:</strong> Rehat sejenak di kabin mobil yang steril dan dingin di antara kunjungan museum.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[var(--color-accent)] font-bold">4.</span>
                            <span><strong>Kombinasi Kuliner Khas:</strong> Minta driver mengantar ke destinasi kuliner legendaris Surabaya seperti Rawon Setan, Rujak Cingur, atau Bebek Sinjay.</span>
                        </li>
                    </ul>

                    <div class="mt-8 pt-6 border-t border-[var(--color-border)]">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat memesan sewa mobil untuk rute tour museum edukasi di Surabaya') }}"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-[var(--radius-md)] font-bold text-sm bg-[image:var(--gradient-btn)] text-white no-underline hover:opacity-95"
                           target="_blank" rel="noopener noreferrer">
                            💬 Konsultasi Rute Tour Museum
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2: DAFTAR MUSEUM DI SURABAYA --}}
    <section id="daftar-museum" class="py-20 bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[760px] mx-auto mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Destinasi Bersejarah Wajib Kunjung</span>
                <h2 class="text-white text-3xl font-bold mt-2">Daftar Museum Bersejarah Terbaik di Surabaya</h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Berikut adalah deretan museum paling ikonik di Surabaya yang menawarkan pengalaman belajar sejarah yang seru, edukatif, dan penuh inspirasi.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 max-md:grid-cols-1">
                @foreach ($museums as $museum)
                    <div class="rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] p-7 flex flex-col justify-between hover:border-[rgba(34,211,238,0.4)] transition-all">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">
                                    {{ $museum['category'] }}
                                </span>
                                <span class="text-[var(--color-text-muted)] text-xs font-mono">Surabaya Heritage</span>
                            </div>

                            <h3 class="text-white font-bold text-xl mb-2">{{ $museum['name'] }}</h3>

                            <p class="text-[var(--color-accent)] text-xs mb-3 font-medium flex items-center gap-1.5">
                                📍 {{ $museum['location'] }}
                            </p>

                            <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">
                                {{ $museum['highlight'] }}
                            </p>
                        </div>

                        <div class="border-t border-[var(--color-border)] pt-4 space-y-2 text-xs">
                            <div class="flex justify-between text-[var(--color-text-light)]">
                                <span class="font-semibold text-[var(--color-accent)]">🕒 Jam Operasional:</span>
                                <span>{{ $museum['hours'] }}</span>
                            </div>
                            <div class="flex justify-between text-[var(--color-text-light)]">
                                <span class="font-semibold text-[var(--color-accent)]">🎟️ Tiket Masuk:</span>
                                <span>{{ $museum['ticket'] }}</span>
                            </div>

                            <div class="pt-3">
                                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi sewa mobil untuk berkunjung ke '.$museum['name'].' Surabaya') }}"
                                   class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-[var(--radius-md)] font-semibold text-xs border border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] no-underline transition-all"
                                   target="_blank" rel="noopener noreferrer">
                                    💬 Sewa Mobil Ke {{ Str::words($museum['name'], 3, '') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION 3: REKOMENDASI ITINERARY TOUR MUSEUM --}}
    <section class="py-20">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[760px] mx-auto mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Rencana Perjalanan Efisien</span>
                <h2 class="text-white text-3xl font-bold mt-2">Rekomendasi Itinerary City Tour Museum 1 Hari</h2>
                <p class="text-[var(--color-text-muted)] text-sm mt-3 leading-relaxed">
                    Manfaatkan waktu perjalanan Anda di Surabaya dengan rute rekomendasi efisien yang telah disusun oleh tim driver profesional kami.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-md:grid-cols-1">
                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] relative">
                    <div class="w-10 h-10 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] font-bold flex items-center justify-center text-base mb-4">
                        01
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Sesi Pagi (08.30 - 12.00)</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Tugu Pahlawan &amp; De Javasche Bank</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Diawali penjemputan dari hotel/stasiun/bandara. Menjelajahi museum bawah tanah Tugu Pahlawan, disusul mengagumi keindahan arsitektur kolonial dan brankas kuno Bank Indonesia di De Javasche Bank.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] relative">
                    <div class="w-10 h-10 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] font-bold flex items-center justify-center text-base mb-4">
                        02
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Sesi Siang (12.00 - 15.30)</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Makan Siang &amp; Museum Siola / Monkasel</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Nikmati makan siang kuliner khas Rawon Setan / Rujak Cingur. Lanjutkan ke Museum Surabaya di Gedung Siola Jalan Tunjungan, lalu mengeksplorasi dalam kapal selam perang asli Monkasel di tepi Kalimas.
                    </p>
                </div>

                <div class="p-6 rounded-[var(--radius-lg)] bg-[var(--color-surface)] border border-[var(--color-border)] relative">
                    <div class="w-10 h-10 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] font-bold flex items-center justify-center text-base mb-4">
                        03
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Sesi Sore (15.30 - 18.00)</h3>
                    <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">House of Sampoerna &amp; Tunjungan Walk</p>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                        Kunjungan ke House of Sampoerna di kawasan Krembangan. Ditutup dengan santai malam dan berfoto di Jalan Tunjungan yang syahdu sebelum diantar kembali ke lokasi penjemputan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 4: ARMADA RENTAL MOBIL QUEEN TRANSPORT --}}
    <x-armada-list 
        subtitle="Layanan Sewa Mobil Terpercaya"
        title="Pilihan Armada Nyaman Untuk Tour Museum Surabaya"
        description="Pilih kendaraan terbaik sesuai dengan kapasitas rombongan Anda. Tersedia dari MPV keluarga hingga Bus Pariwisata include driver profesional."
        wa-text="untuk tour museum di Surabaya"
        :limit="6"
    />

    {{-- SECTION 5: FAQ ACCORDION --}}
    <section id="faq" class="py-20 border-t border-[var(--color-border)]">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-[var(--color-accent)] text-xs tracking-[0.2em] uppercase font-semibold">Tanya Jawab</span>
                <h2 class="text-white text-3xl font-bold mt-2">Pertanyaan Seputar Museum di Surabaya</h2>
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
            <h2 class="text-white text-3xl font-bold mb-4">Siap Belajar Sejarah di Museum Surabaya?</h2>
            <p class="text-[var(--color-text-light)] text-base mb-8 leading-relaxed max-w-[680px] mx-auto">
                Rencanakan wisata edukasi bersejarah Anda sekarang! Tim <strong>{{ config('site.brand') }}</strong> siap menyediakan armada sewa mobil terbaik lengkap dengan driver ramah dan profesional.
            </p>
            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi mobil rental untuk ke museum-museum bersejarah di Surabaya') }}"
               class="inline-flex items-center gap-3 px-10 py-4 rounded-[32px] font-bold text-lg bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] no-underline transition-all hover:scale-105"
               target="_blank" rel="noopener noreferrer">
                💬 Hubungi Kami via WhatsApp Sekarang
            </a>
        </div>
    </section>

</x-layouts::public>
