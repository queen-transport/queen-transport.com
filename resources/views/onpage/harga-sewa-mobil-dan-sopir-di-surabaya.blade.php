<?php

use function Laravel\Folio\name;

name('harga-sewa-mobil-dan-sopir-di-surabaya');
?>

@php
$faqs = [
    [
        'q' => 'Berapa harga sewa mobil dan sopir di Surabaya per hari?',
        'a' => 'Harga sewa mobil dan sopir di Surabaya di Queen Transport mulai dari Rp 1.100.000/hari untuk kelas MPV keluarga (Mitsubishi Xpander Ultimate), Rp 1.450.000/hari untuk Toyota Innova Reborn, hingga varian premium seperti Toyota Fortuner, Hiace Premio, dan Toyota Alphard. Semua tarif sudah 100% mencakup jasa sopir profesional.',
    ],
    [
        'q' => 'Apakah harga sewa mobil di Surabaya bisa lepas kunci (tanpa sopir)?',
        'a' => 'Layanan Queen Transport berfokus pada sewa mobil include sopir profesional. Kami memastikan perjalanan Anda lebih aman, nyaman, dan bebas lelah dengan sopir berpengalaman yang menguasai rute jalan di Surabaya, Sidoarjo, Gresik, hingga luar kota Jawa Timur.',
    ],
    [
        'q' => 'Apa saja yang sudah termasuk dalam harga sewa mobil dan sopir?',
        'a' => 'Tarif harian standar sudah mencakup: unit mobil prima & bersih, sopir profesional berpenampilan rapi, pendingin kabin (Full AC) dingin optimal, serta gratis air mineral dan snack di hari pertama. Komponen operasional seperti BBM, tol, dan parkir dapat disesuaikan rute atau memilih paket All-In.',
    ],
    [
        'q' => 'Berapa jam pemakaian sewa mobil harian di Surabaya?',
        'a' => 'Durasi sewa harian standar berlaku hingga 12 jam kerja per hari untuk area Surabaya dan sekitarnya. Jika memerlukan pemakaian hingga full-day (hingga malam hari) atau perjalanan luar kota, Anda dapat mengonsultasikannya langsung via WhatsApp.',
    ],
    [
        'q' => 'Apakah melayani penjemputan Bandara Juanda dan stasiun di Surabaya?',
        'a' => 'Tentu. Sopir kami siap melakukan penjemputan dan pengantaran (transfer in/out) di Bandara Internasional Juanda (Terminal 1 & 2), Stasiun Surabaya Gubeng, Stasiun Pasar Turi, hotel, maupun alamat kantor dan tempat tinggal Anda.',
    ],
    [
        'q' => 'Apakah harga sewa mobil dan sopir berbeda untuk perjalanan luar kota?',
        'a' => 'Untuk perjalanan luar kota (seperti Malang, Batu, Bromo, Banyuwangi, Kediri, Madiun, Solo, hingga Bali), berlaku tarif luar kota yang disesuaikan dengan jarak tempuh dan durasi hari pemakaian. Kami siap memberikan rincian estimasi biaya secara transparan sebelum keberangkatan.',
    ],
    [
        'q' => 'Bagaimana cara pemesanan sewa mobil dan sopir di Queen Transport?',
        'a' => 'Pemesanan sangat praktis tanpa ribet. Cukup klik tombol WhatsApp, sampaikan tanggal penggunaan, titik jemput di Surabaya, tujuan, dan pilihan armada. Tim admin kami akan mengonfirmasi ketersediaan unit dan mengirimkan detail pemesanan resmi.',
    ],
];

$armadaService   = app(\App\Contracts\ArmadaServiceInterface::class);
$allArmadas      = $armadaService->getPublished();
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$pelanggans      = $armadaService->getPelanggans();

$title       = 'Harga Sewa Mobil dan Sopir di Surabaya Murah & Transparan — ' . config('site.brand');
$description = 'Daftar harga sewa mobil dan sopir di Surabaya terbaru ✓ Mulai Rp 1,1 jt/hari ✓ Xpander, Innova Reborn, Zenix, Fortuner, Hiace & Alphard ✓ 100% include sopir berpengalaman ✓ Pesan via WA!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Mobil + Driver Surabaya #1 Terpercaya
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Harga Sewa Mobil dan Sopir <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">di Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Xpander &bull; Innova Reborn &bull; Zenix &bull; Fortuner &bull; Hiace &bull; Alphard
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Layanan rental mobil terlengkap di Surabaya sudah termasuk sopir profesional, ramah, dan berpengalaman. Harga transparan tanpa biaya tersembunyi untuk kebutuhan perjalanan dinas kantor, wisata keluarga, acara pernikahan, hingga transfer Bandara Juanda.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi harga sewa mobil dan sopir di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Cek Harga via WhatsApp
                        </a>
                        <a href="#tabel-harga"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Daftar Tarif
                        </a>
                    </div>
                </div>

                {{-- Hero feature card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🚘</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Paket Mobil + Driver</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Kenapa Sewa Bersama Sopir?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Bebas lelah mengemudi di tengah kemacetan Surabaya. Anda cukup duduk santai dan tiba tepat waktu di tujuan.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Include Sopir</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Mulai Rp 1,1 Jt</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Tarif Harian</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Hingga 14 Seat</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kapasitas Armada</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Snack &amp; Mineral</div>
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
                        <h4 class="text-white font-bold text-sm">Sopir Berpengalaman</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Sopan, rapi &amp; hafal rute jalan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💰</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Tarif Resmi &amp; Jelas</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Tanpa markup &amp; biaya siluman</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🧼</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Bersih &amp; Wangi</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Unit disanitasi sebelum jemput</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⏰</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Penjemputan Tepat Waktu</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Standby sebelum jadwal berangkat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TABEL TARIF LENGKAP REAL DARI DATABASE --}}
    <section class="py-[90px]" id="tabel-harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Harga Resmi</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Daftar Harga <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Mobil dan Sopir Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga sewa harian mobil beserta sopir profesional untuk wilayah Surabaya dan sekitarnya. Diambil langsung dari data armada resmi Queen Transport.
                </p>
            </div>

            <div class="overflow-x-auto rounded-[var(--radius-xl)] border border-[var(--color-border)] mb-8 shadow-xl">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.18)] border-b border-[var(--color-border)] text-left">
                            <th class="py-4 px-6 text-white font-bold">Armada Mobil</th>
                            <th class="py-4 px-4 text-center text-[var(--color-accent)] font-bold">Kapasitas Kursi</th>
                            <th class="py-4 px-4 text-center text-white font-bold">Layanan Driver</th>
                            <th class="py-4 px-4 text-center text-[var(--color-accent)] font-bold">Tarif Sewa / Hari</th>
                            <th class="py-4 px-6 text-center text-white font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelasAtasPrices as $index => $item)
                            <tr class="border-b border-[var(--color-border)] last:border-0 {{ $index % 2 === 0 ? 'bg-[var(--gradient-card)]' : 'bg-[rgba(124,58,237,0.04)]' }} hover:bg-[rgba(124,58,237,0.12)] transition-colors">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-white text-base">{{ $item['name'] }}</div>
                                    @if (!empty($item['badge']))
                                        <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full bg-[rgba(34,211,238,0.12)] border border-[rgba(34,211,238,0.25)] text-[var(--color-accent)] text-[0.72rem] font-medium">
                                            {{ $item['badge'] }}
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="inline-block px-3 py-1 rounded-full bg-[rgba(124,58,237,0.15)] text-white text-xs font-semibold">
                                        {{ $item['seat'] }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="inline-flex items-center gap-1 text-[var(--color-accent)] font-semibold text-xs">
                                        <span>✓</span> Termasuk Sopir
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="text-white font-bold text-lg">
                                        Rp {{ $item['price_label'] }}
                                    </div>
                                    <div class="text-[var(--color-text-muted)] text-[0.75rem]">/ hari (Surabaya &amp; Sekitar)</div>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking unit ' . $item['name'] . ' beserta sopir di Surabaya. Mohon info ketersediaannya.') }}"
                                       class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold no-underline hover:scale-105 transition-all shadow-md"
                                       target="_blank" rel="noopener noreferrer">
                                        💬 Pesan Unit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-5 rounded-[var(--radius-lg)] bg-[rgba(34,211,238,0.06)] border border-[rgba(34,211,238,0.2)] text-center">
                <p class="text-[var(--color-text-muted)] text-xs leading-relaxed max-w-[850px] mx-auto">
                    <span class="text-[var(--color-accent)] font-semibold">Catatan Tarif:</span>
                    Harga di atas berlaku untuk sewa mobil + sopir di wilayah Surabaya, Sidoarjo, dan Gresik dengan durasi hingga 12 jam/hari.
                    Belum termasuk BBM, tol, dan parkir (bisa diakumulasikan dalam paket All-In). Untuk perjalanan luar kota multi-hari, hubungi admin untuk penawaran spesial.
                </p>
            </div>
        </div>
    </section>

    {{-- KATALOG ARMADA LENGKAP --}}
    <x-armada-list
        subtitle="Katalog Armada Siap Jalan"
        title="Pilihan Mobil dan Sopir Terbaik di Surabaya"
        description="Semua armada dalam kondisi terawat, diservis rutin di bengkel resmi, dan didampingi sopir profesional berstandar kenyamanan tinggi."
        wa-text="sewa mobil dan sopir di Surabaya"
    />

    {{-- RINCIAN INCLUDED VS EXCLUDED --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="rincian">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Layanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Apa yang Anda Dapatkan dalam <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Harga Sewa Kami?</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Kami memprioritaskan kejujuran tarif tanpa ada biaya tersembunyi yang membuat Anda bingung di akhir perjalanan.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 max-md:grid-cols-1">
                {{-- Termasuk --}}
                <div class="bg-[var(--gradient-card)] border border-[rgba(34,211,238,0.25)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                        <span class="text-2xl">✅</span>
                        <h3 class="text-white font-bold text-lg">Sudah Termasuk (Free of Charge)</h3>
                    </div>

                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['👨‍✈️', 'Jasa Sopir Profesional', 'Sopir berpengalaman, berpenampilan rapi, ramah, dan menguasai navigasi jalan Surabaya.'],
                            ['🚘', 'Unit Mobil Prima & Ber-AC', 'Kondisi mesin terawat rutin, interior bersih steril, wangi, dan Full AC dingin merata.'],
                            ['🍎', 'Snack & Air Mineral Gratis', 'Disediakan air mineral botol dan snack ringan di hari pertama pemakaian.'],
                            ['⏱️', 'Durasi Pemakaian Fleksibel', 'Layanan harian operasional hingga 12 jam di area Surabaya dan sekitarnya.'],
                            ['🧳', 'Bantuan Bagasi & Drop-off', 'Sopir siap membantu menaikkan dan menurunkan barang bawaan Anda.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4">
                                <span class="text-xl flex-shrink-0 w-10 h-10 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.1)] flex items-center justify-center">{{ $icon }}</span>
                                <div>
                                    <div class="text-white font-semibold text-sm">{{ $title }}</div>
                                    <div class="text-[var(--color-text-muted)] text-xs mt-0.5 leading-relaxed">{{ $desc }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Komponen Operasional Tambahan --}}
                <div class="bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.25)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                        <span class="text-2xl">📋</span>
                        <h3 class="text-white font-bold text-lg">Komponen Operasional Tambahan</h3>
                    </div>

                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['⛽', 'Bahan Bakar Minyak (BBM)', 'Disesuaikan dengan jarak rute perjalanan atau dapat digabung dalam paket All-In.'],
                            ['🛣️', 'Tarif Tol & Jembatan Suramadu', 'Biaya tol ditanggung penyewa sesuai struk resmi tol yang dilalui.'],
                            ['🅿️', 'Biaya Parkir & Tiket Masuk', 'Biaya parkir di mall, gedung pertemuan, atau tiket masuk obyek wisata ditanggung penyewa.'],
                            ['🌙', 'Akomodasi Sopir (Khusus Menginap Luar Kota)', 'Bila perjalanan luar kota memerlukan sopir menginap, biaya penginapan sopir disepakati di awal.'],
                            ['🍽️', 'Uang Makan Sopir (Trip Luar Kota Jauh)', 'Untuk perjalanan luar kota berdurasi panjang, biaya konsumsi sopir dikomunikasikan secara terbuka.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4">
                                <span class="text-xl flex-shrink-0 w-10 h-10 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] flex items-center justify-center">{{ $icon }}</span>
                                <div>
                                    <div class="text-white font-semibold text-sm">{{ $title }}</div>
                                    <div class="text-[var(--color-text-muted)] text-xs mt-0.5 leading-relaxed">{{ $desc }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                            💡 <span class="text-white font-semibold">Mau Lebih Praktis?</span> Minta <strong class="text-[var(--color-accent)]">Paket All-In (Mobil + Sopir + BBM + Tol)</strong> kepada tim admin kami agar Anda tidak perlu repot menghitung biaya di jalan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KEBUTUHAN PERJALANAN / USE CASES --}}
    <section class="py-[90px]" id="layanan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Solusi Mobilitas Anda</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Sewa Mobil dan Sopir Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Segala Keperluan</span>
                </h2>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                @foreach ([
                    ['🏢', 'Kunjungan Dinas & Corporate Meeting', 'Mobil nyaman dan sopir profesional untuk agenda bisnis, rapat instansi, dan kunjungan kerja di kawasan Surabaya & sekitarnya.'],
                    ['✈️', 'Antar Jemput Bandara Juanda (SUB)', 'Penjemputan tepat waktu di Bandara Juanda Surabaya tanpa khawatir menunggu taksi atau telat mengejar jadwal pesawat.'],
                    ['🏖️', 'Wisata Keluarga Jawa Timur', 'Liburan nyaman ke Bromo, Malang, Batu, Kawah Ijen, hingga Bali bersama keluarga tanpa lelah menyetir jarak jauh.'],
                    ['💍', 'Acara Pernikahan & Rombongan Pengantin', 'Armada mewah berkelas untuk mobil pengantin maupun akomodasi rombongan keluarga besar mempelai.'],
                    ['🎓', 'Acara Wisuda & Kampus di Surabaya', 'Transportasi rombongan orang tua untuk wisuda di ITS, UNAIR, UNESA, UPN, maupun universitas lainnya di Surabaya.'],
                    ['🕌', 'Wisata Religi & Ziarah Wali Songo', 'Perjalanan ibadah ziarah ke Sunan Ampel, Sunan Giri, Sunan Drajat, dan rute wali songo lainnya dengan rombongan.'],
                ] as [$icon, $title, $desc])
                    <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[rgba(124,58,237,0.4)] hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl mb-4">{{ $icon }}</div>
                        <h3 class="text-white font-bold text-sm mb-2">{{ $title }}</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CARA PEMESANAN --}}
    <section class="py-[80px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Panduan Reservasi</span>
                <h2 class="text-white text-2xl font-bold">4 Langkah Mudah Sewa Mobil dan Sopir di Surabaya</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Hubungi Admin WA</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Klik tombol WhatsApp dan sampaikan tanggal sewa, titik penjemputan, serta rencana rute perjalanan Anda.</p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">🚘</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Tipe Mobil</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Pilih jenis kendaraan sesuai kapasitas dan preferensi Anda. Sopir profesional otomatis sudah termasuk.</p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Lakukan pembayaran uang muka (DP) resmi untuk mengunci jadwal armada dan ketersediaan sopir.</p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Sopir Siap Menjemput</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Sopir dan unit mobil bersih siap menjemput Anda tepat waktu di lokasi yang telah disepakati.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONI PELANGGAN --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Ulasan Pelanggan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pengalaman Mereka Bersama <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
                </h2>
            </div>
            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($pelanggans->take(3) as $pelanggan)
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between">
                    <div class="text-[var(--color-accent)] text-xl mb-4">★★★★★</div>
                    <p class="text-[var(--color-text-light)] text-sm italic mb-6 leading-relaxed">
                        &ldquo;{{ $pelanggan->content }}&rdquo;
                    </p>
                    <div class="flex items-center gap-3 border-t border-[var(--color-border)] pt-4">
                        <div class="w-10 h-10 rounded-full bg-[rgba(124,58,237,0.3)] border border-[var(--color-primary)] flex items-center justify-center font-bold text-white text-sm">
                            {{ substr($pelanggan->name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">{{ $pelanggan->name }}</h4>
                            <p class="text-[var(--color-text-muted)] text-xs">{{ $pelanggan->title ?? 'Pelanggan Setia' }}</p>
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
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab Populer</span>
                <h2 class="text-white text-2xl font-bold">FAQ Sewa Mobil dan Sopir di Surabaya</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">Pertanyaan yang sering diajukan mengenai sewa mobil dengan sopir di Queen Transport.</p>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <details class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 transition-all hover:border-[rgba(124,58,237,0.4)]">
                        <summary class="flex items-center justify-between cursor-pointer font-bold text-white text-base max-sm:text-sm">
                            <span>{{ $faq['q'] }}</span>
                            <span class="ml-4 text-[var(--color-accent)] transition-transform duration-200 group-open:rotate-180 flex-shrink-0">▼</span>
                        </summary>
                        <p class="mt-4 text-[var(--color-text-muted)] text-sm leading-relaxed border-t border-[var(--color-border)] pt-4">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BOTTOM CTA --}}
    <section class="py-[80px] relative overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[900px] mx-auto px-6 text-center relative z-10">
            <span class="px-4 py-1.5 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase mb-6 inline-block">
                ✦ Reservasi Sewa Mobil + Sopir di Surabaya
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Dapatkan Penawaran Harga Sewa Mobil &amp; Sopir Terbaik Hari Ini!
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[620px] mx-auto leading-relaxed">
                Nikmati kenyamanan perjalanan di Surabaya bersama sopir profesional kami. Konsultasikan jadwal dan dapatkan unit mobil pilihan Anda dengan harga terbaik.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi sewa mobil dan sopir di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (24 Jam)
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
