<?php

use function Laravel\Folio\name;

name('harga-sewa-mobil-dan-sopir-di-surabaya-secara-mewah');
?>

@php
$faqs = [
    [
        'q' => 'Berapa harga sewa mobil beserta sopir di Surabaya untuk kelas mewah?',
        'a' => 'Harga sewa mobil mewah dengan sopir di Surabaya bervariasi tergantung tipe armada yang dipilih. Semua harga sudah termasuk jasa sopir profesional standar VIP untuk area Surabaya dan sekitarnya. Hubungi kami via WhatsApp untuk mendapatkan penawaran harga terkini.',
    ],
    [
        'q' => 'Apakah harga sewa sudah termasuk sopir atau dikenakan biaya tambahan?',
        'a' => 'Semua harga sewa mobil yang kami tawarkan sudah 100% termasuk sopir profesional. Tidak ada biaya tambahan untuk jasa sopir — tarif yang Anda terima adalah harga paket lengkap: kendaraan mewah + sopir berpengalaman + fasilitas standar VIP.',
    ],
    [
        'q' => 'Apa saja yang termasuk dalam harga sewa mobil dan sopir di Surabaya?',
        'a' => 'Dalam harga yang kami tawarkan sudah mencakup: (1) Kendaraan mewah dalam kondisi prima dan bersih, (2) Sopir profesional berpenampilan rapi dan berpengalaman, (3) Full AC dingin seluruh kabin, (4) Gratis snack, buah segar & air mineral di hari pertama pemakaian. Komponen tambahan (BBM, tol, parkir) disampaikan transparan di awal.',
    ],
    [
        'q' => 'Apakah harga berbeda untuk dalam kota Surabaya dan luar kota?',
        'a' => 'Ya. Tarif dasar berlaku untuk Surabaya dan sekitarnya (Sidoarjo, Gresik, Mojokerto) dalam radius operasional harian. Untuk perjalanan luar kota (Malang, Bromo, Banyuwangi, dll.), ada penyesuaian tarif yang mencakup komponen BBM, tol, dan penginapan sopir jika menginap — semua dikomunikasikan transparan sebelum keberangkatan.',
    ],
    [
        'q' => 'Bagaimana kualitas sopir yang disediakan untuk rental mobil mewah di Surabaya?',
        'a' => 'Sopir kami dipilih melalui seleksi ketat: berpenampilan rapi dan bersih, komunikatif, hafal rute Surabaya & destinasi Jawa Timur, berpengalaman melayani tamu VIP dan eksekutif, serta mengutamakan keselamatan dan ketepatan waktu. Beberapa sopir kami juga mampu berkomunikasi dalam bahasa Inggris dasar.',
    ],
    [
        'q' => 'Apakah sopir yang disediakan berpengalaman untuk perjalanan luar kota?',
        'a' => 'Tentu. Seluruh sopir kami berpengalaman untuk perjalanan antar kota Jawa Timur maupun luar provinsi. Mereka hafal rute tol, jalur alternatif, kondisi lalu lintas, dan titik rest area terbaik untuk perjalanan jarak jauh seperti Surabaya–Malang, Surabaya–Bali Overland, maupun Surabaya–Yogyakarta.',
    ],
    [
        'q' => 'Bagaimana cara memesan sewa mobil mewah beserta sopir di Surabaya?',
        'a' => 'Pemesanan sangat mudah via WhatsApp. Sampaikan tanggal pemakaian, lokasi penjemputan di Surabaya, tujuan perjalanan, dan tipe kendaraan yang diinginkan. Tim kami merespons cepat, mengkonfirmasi ketersediaan, dan menyiapkan detail harga serta prosedur DP.',
    ],
    [
        'q' => 'Apakah tersedia sewa mobil mewah dengan sopir untuk acara pernikahan di Surabaya?',
        'a' => 'Tersedia. Kami menyediakan paket khusus Wedding Car dengan armada mewah (terutama Toyota Alphard) lengkap dengan sopir berpenampilan formal. Tersedia juga pilihan dekorasi bunga eksklusif untuk momen pernikahan yang tak terlupakan.',
    ],
];

$armadaService   = app(\App\Contracts\ArmadaServiceInterface::class);
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$alphardPrices   = $armadaService->getAlphardPrices();
$hiacePrices     = $armadaService->getHiacePrices();
$pelanggans      = $armadaService->getPelanggans();

$title       = 'Harga Sewa Mobil dan Sopir di Surabaya Secara Mewah — Transparan & Terpercaya | ' . config('site.brand');
$description = 'Cek harga sewa mobil & sopir mewah di Surabaya ✓ Alphard, Fortuner, Innova Zenix, Hiace Premio ✓ Include sopir profesional VIP ✓ Harga transparan, no hidden fee ✓ Hubungi sekarang!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Harga Transparan — Sopir Profesional Standar VIP
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Harga Sewa Mobil &amp; Sopir <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mewah Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Alphard &bull; Fortuner &bull; Innova Zenix &bull; Hiace Premio &bull; 100% Include Sopir
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Ingin tahu harga sewa mobil mewah lengkap dengan sopir di Surabaya? Kami tampilkan semua tarif secara terbuka — tanpa biaya tersembunyi, tanpa biaya sopir tambahan. Pilih armada sesuai kebutuhan dan anggaran Anda, sopir profesional sudah termasuk.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga sewa mobil mewah beserta sopir di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Tanya Harga via WhatsApp
                        </a>
                        <a href="#daftar-harga"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📊 Lihat Daftar Harga
                        </a>
                    </div>
                </div>

                {{-- Included/excluded card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">💰</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Semua Sudah Include</span>
                        </div>

                        <h3 class="text-white text-lg font-bold mb-1">Harga = Mobil + Sopir + Fasilitas</h3>
                        <p class="text-[var(--color-text-muted)] text-xs mb-5 leading-relaxed">
                            Tidak ada biaya sopir terpisah. Satu harga, semua sudah termasuk untuk area Surabaya &amp; sekitarnya:
                        </p>

                        <div class="flex flex-col gap-3">
                            @foreach ([
                                ['✓', 'Kendaraan Mewah Siap Pakai', true],
                                ['✓', 'Sopir Profesional Standar VIP', true],
                                ['✓', 'Full AC Dingin Seluruh Kabin', true],
                                ['✓', 'Gratis Snack &amp; Air Mineral (Hari Pertama)', true],
                                ['✓', 'Operasional hingga 12 Jam / Hari', true],
                                ['~', 'BBM, Tol &amp; Parkir (ditanggung penumpang)', false],
                            ] as [$mark, $item, $included])
                                <div class="flex items-center gap-3 text-sm">
                                    <span class="font-bold flex-shrink-0 {{ $included ? 'text-[var(--color-accent)]' : 'text-[var(--color-text-muted)]' }}">{{ $mark }}</span>
                                    <span class="{{ $included ? 'text-[var(--color-text-light)]' : 'text-[var(--color-text-muted)]' }}">{!! $item !!}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TRUST BANNER --}}
    <section class="py-8 border-y border-[var(--color-border)] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👔</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Sopir Standar VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Rapi, ramah, berpengalaman</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💰</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Harga Transparan</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Sopir sudah include — no hidden fee</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🚗</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Armada Lengkap</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Berbagai pilihan kelas mewah</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📞</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Respons Cepat</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">CS aktif sepanjang hari</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HARGA ALPHARD + SOPIR --}}
    @if (!empty($alphardPrices))
    <section class="py-[90px]" id="daftar-harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Harga Tertinggi — VIP Eksklusif</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Harga Sewa <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Toyota Alphard + Sopir</span> Surabaya
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Armada paling prestisius dengan sopir berstandar protokoler. Pilihan #1 untuk tamu VIP, wedding car, dan perjalanan eksekutif di Surabaya.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($alphardPrices as $price)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:border-[var(--color-accent)] hover:shadow-[0_10px_30px_rgba(124,58,237,0.25)]">
                        @if ($price['badge'])
                            <span class="absolute -top-3.5 right-6 px-4 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold shadow-md">
                                {{ $price['badge'] }}
                            </span>
                        @endif
                        <div>
                            <div class="text-3xl mb-4">👑</div>
                            <h3 class="text-white text-xl font-bold mb-1">{{ $price['name'] }}</h3>
                            <span class="inline-block mb-4 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $price['seat'] }}</span>
                            <p class="text-[var(--color-text-muted)] text-sm mb-5 leading-relaxed">{{ $price['desc'] }}</p>

                            <div class="mb-5 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-text-muted)] text-xs mb-1">Harga mulai dari</div>
                                <div class="text-white font-bold text-2xl flex items-baseline gap-1">
                                    <span class="text-sm font-normal text-[var(--color-accent)]">Rp</span>
                                    <span>{{ $price['price_label'] }}</span>
                                    <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                                </div>
                                <div class="flex items-center gap-1.5 mt-2">
                                    <span class="text-[var(--color-accent)] text-xs font-bold">✓</span>
                                    <span class="text-[var(--color-accent)] text-xs font-semibold">Sudah include sopir profesional</span>
                                </div>
                            </div>

                            <ul class="flex flex-col gap-2.5 mb-8">
                                @foreach ($price['features'] as $feat)
                                    <li class="flex items-center gap-2.5 text-[var(--color-text-light)] text-sm">
                                        <span class="text-[var(--color-accent)]">✓</span>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga & ketersediaan '.$price['name'].' beserta sopir di Surabaya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Tanya Harga {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- HARGA HIACE + SOPIR --}}
    @if (!empty($hiacePrices))
    <section class="py-[90px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Harga Rombongan Premium</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Harga Sewa <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Hiace Premio + Sopir</span> Surabaya
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Solusi rombongan premium 9–14 orang dengan sopir profesional berpengalaman. Harga terbaik untuk wisata, dinas, dan acara korporasi.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($hiacePrices as $price)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:border-[var(--color-accent)] hover:shadow-[0_10px_30px_rgba(124,58,237,0.25)]">
                        @if ($price['badge'])
                            <span class="absolute -top-3.5 right-6 px-4 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold shadow-md">
                                {{ $price['badge'] }}
                            </span>
                        @endif
                        <div>
                            <div class="text-3xl mb-4">🚐</div>
                            <h3 class="text-white text-xl font-bold mb-1">{{ $price['name'] }}</h3>
                            <span class="inline-block mb-4 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $price['seat'] }}</span>
                            <p class="text-[var(--color-text-muted)] text-sm mb-5 leading-relaxed">{{ $price['desc'] }}</p>

                            <div class="mb-5 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-text-muted)] text-xs mb-1">Harga mulai dari</div>
                                <div class="text-white font-bold text-2xl flex items-baseline gap-1">
                                    <span class="text-sm font-normal text-[var(--color-accent)]">Rp</span>
                                    <span>{{ $price['price_label'] }}</span>
                                    <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                                </div>
                                <div class="flex items-center gap-1.5 mt-2">
                                    <span class="text-[var(--color-accent)] text-xs font-bold">✓</span>
                                    <span class="text-[var(--color-accent)] text-xs font-semibold">Sudah include sopir profesional</span>
                                </div>
                            </div>

                            <ul class="flex flex-col gap-2.5 mb-8">
                                @foreach ($price['features'] as $feat)
                                    <li class="flex items-center gap-2.5 text-[var(--color-text-light)] text-sm">
                                        <span class="text-[var(--color-accent)]">✓</span>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga & ketersediaan '.$price['name'].' beserta sopir di Surabaya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Tanya Harga {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- TABEL HARGA SEMUA ARMADA + SOPIR --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px]" id="tabel-harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Perbandingan Harga Lengkap</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tabel Harga Sewa Mobil + Sopir <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Semua Armada Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Bandingkan semua pilihan armada mewah dalam satu tabel — harga sudah include sopir profesional, tanpa biaya tersembunyi.
                </p>
            </div>

            <div class="overflow-x-auto rounded-[var(--radius-xl)] border border-[var(--color-border)] mb-6">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.15)] border-b border-[var(--color-border)]">
                            <th class="text-left py-4 px-6 text-white font-bold">Armada</th>
                            <th class="text-center py-4 px-4 text-[var(--color-accent)] font-bold">Kapasitas</th>
                            <th class="text-center py-4 px-4 text-[var(--color-accent)] font-bold">Harga / Hari</th>
                            <th class="text-center py-4 px-4 text-white font-bold">Sopir</th>
                            <th class="text-center py-4 px-4 text-white font-bold">Wilayah</th>
                            <th class="text-center py-4 px-4 text-white font-bold">Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelasAtasPrices as $i => $price)
                            <tr class="border-b border-[var(--color-border)] last:border-0 {{ $i % 2 === 0 ? 'bg-[var(--gradient-card)]' : 'bg-[rgba(124,58,237,0.04)]' }} hover:bg-[rgba(124,58,237,0.08)] transition-colors">
                                <td class="py-4 px-6">
                                    <div class="font-semibold text-white text-sm">{{ $price['name'] }}</div>
                                    @if ($price['badge'])
                                        <span class="inline-block mt-1 px-2 py-0.5 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold">{{ $price['badge'] }}</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="px-2 py-1 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $price['seat'] }}</span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <div class="text-white font-bold">Rp {{ $price['price_label'] }}</div>
                                    <div class="text-[var(--color-text-muted)] text-xs">per hari</div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="text-[var(--color-accent)] font-bold text-xs">✓ Include</span>
                                </td>
                                <td class="py-4 px-4 text-center text-[var(--color-text-muted)] text-xs">
                                    Surabaya &amp; Sekitarnya
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga '.$price['name'].' beserta sopir di Surabaya.') }}"
                                       class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-semibold no-underline hover:opacity-90 transition-opacity"
                                       target="_blank" rel="noopener noreferrer">
                                        💬 Tanya
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-5 rounded-[var(--radius-lg)] bg-[rgba(34,211,238,0.06)] border border-[rgba(34,211,238,0.2)]">
                <p class="text-[var(--color-text-muted)] text-xs leading-relaxed text-center">
                    <span class="text-[var(--color-accent)] font-semibold">Catatan:</span>
                    Harga berlaku untuk Surabaya &amp; sekitarnya (max 12 jam/hari), sudah include sopir profesional.
                    Untuk luar kota, multi-hari, atau kebutuhan khusus — hubungi kami untuk simulasi biaya all-in yang transparan.
                </p>
            </div>
        </div>
    </section>
    @endif

    {{-- ARMADA CATALOG --}}
    <x-armada-list
        subtitle="Katalog Armada Lengkap"
        title="Detail Armada Sewa Mobil &amp; Sopir Mewah Surabaya"
        description="Lihat spesifikasi lengkap setiap armada mewah kami — semua tersedia dengan sopir profesional standar VIP, siap melayani perjalanan Anda di Surabaya."
        wa-text="sewa mobil & sopir mewah di Surabaya"
    />

    {{-- PROFIL SOPIR / STANDAR LAYANAN SOPIR --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="profil-sopir">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Standar Sopir Kami</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Sopir Profesional <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Standar VIP {{ config('site.brand') }}</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga sewa sudah include sopir — bukan sopir biasa, tapi sopir yang memenuhi standar layanan premium kami.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 max-md:grid-cols-1 mb-14">
                @foreach ([
                    ['👔', 'Penampilan Rapi & Profesional', 'Sopir kami selalu hadir dengan pakaian bersih, rapi, dan berpenampilan profesional — sesuai standar layanan VIP yang kami jaga konsistensinya.'],
                    ['🗺️', 'Hafal Rute Surabaya & Jawa Timur', 'Menguasai rute dalam kota Surabaya, jalan tol, jalur alternatif, serta berbagai destinasi wisata dan kota di Jawa Timur.'],
                    ['🤝', 'Ramah, Santun & Komunikatif', 'Sopir kami terlatih untuk bersikap ramah, menghormati penumpang, dan mampu berkomunikasi dengan baik — termasuk dengan tamu eksekutif maupun asing.'],
                    ['⏰', 'Tepat Waktu — Standby 10–15 Menit Lebih Awal', 'Kami memastikan sopir sudah tiba di lokasi penjemputan sebelum jadwal. Keterlambatan bukan bagian dari standar layanan kami.'],
                    ['🛡️', 'Mengutamakan Keselamatan', 'Sopir menerapkan prinsip defensive driving, mematuhi rambu lalu lintas, dan tidak mengemudi ugal-ugalan — keselamatan penumpang adalah prioritas utama.'],
                    ['🌙', 'Siap Perjalanan Malam & Jarak Jauh', 'Berpengalaman untuk perjalanan malam, transit bandara dini hari, maupun perjalanan luar kota jarak jauh dengan waktu tempuh panjang.'],
                ] as [$icon, $title, $desc])
                    <div class="flex items-start gap-4 p-5 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[rgba(124,58,237,0.35)] transition-all">
                        <div class="text-2xl flex-shrink-0 w-12 h-12 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                        <div>
                            <h3 class="text-white font-semibold text-sm mb-1">{{ $title }}</h3>
                            <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- CTA konsultasi sopir --}}
            <div class="max-w-[700px] mx-auto p-8 bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] text-center">
                <span class="text-4xl block mb-3">👨‍✈️</span>
                <h3 class="text-white text-xl font-bold mb-3">Butuh Sopir untuk Tamu VIP atau Delegasi Khusus?</h3>
                <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">
                    Untuk kebutuhan penjemputan pejabat, tamu kehormatan, atau delegasi korporasi — kami menyiapkan sopir dengan standar protokoler yang lebih ketat. Sampaikan kebutuhan Anda.
                </p>
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi kebutuhan sopir profesional untuk tamu VIP / delegasi khusus di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 rounded-[32px] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Konsultasi Kebutuhan Sopir VIP
                </a>
            </div>
        </div>
    </section>

    {{-- RINCIAN KOMPONEN HARGA --}}
    <section class="py-[90px]" id="rincian-harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Biaya</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Rincian <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Komponen Harga Sewa</span> Mobil + Sopir
                </h2>
            </div>

            <div class="grid grid-cols-2 gap-8 max-md:grid-cols-1">
                {{-- Sudah termasuk --}}
                <div class="bg-[var(--gradient-card)] border border-[rgba(34,211,238,0.25)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                        <span class="text-2xl">✅</span>
                        <h3 class="text-white font-bold text-lg">Sudah Termasuk dalam Harga</h3>
                    </div>
                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['👨‍✈️', 'Jasa Sopir Profesional', 'Sopir berpengalaman, berpenampilan rapi, menguasai rute Surabaya &amp; Jawa Timur.'],
                            ['🚗', 'Kendaraan Mewah Siap Pakai', 'Armada bersih, terawat, dalam kondisi mesin prima sebelum keberangkatan.'],
                            ['❄️', 'Full AC Kabin', 'Sistem pendingin aktif dan berfungsi optimal untuk kenyamanan seluruh penumpang.'],
                            ['🍎', 'Snack, Buah &amp; Air Mineral', 'Gratis di hari pertama pemakaian sebagai bentuk apresiasi kepada pelanggan.'],
                            ['⏱️', 'Operasional 12 Jam / Hari', 'Berlaku untuk penggunaan dalam satu hari kalender (dalam kota Surabaya).'],
                        ] as [$icon, $item, $note])
                            <div class="flex items-start gap-4">
                                <span class="text-xl flex-shrink-0 w-9 h-9 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.1)] flex items-center justify-center">{{ $icon }}</span>
                                <div>
                                    <div class="text-white font-semibold text-sm">{!! $item !!}</div>
                                    <div class="text-[var(--color-text-muted)] text-xs mt-0.5">{!! $note !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Tidak termasuk --}}
                <div class="bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.25)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                        <span class="text-2xl">📋</span>
                        <h3 class="text-white font-bold text-lg">Komponen Biaya Tambahan</h3>
                    </div>
                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['⛽', 'Bahan Bakar (BBM)', 'Ditanggung penumpang atau dapat dimasukkan dalam paket All-In atas permintaan.'],
                            ['🛣️', 'Tol &amp; Retribusi Jalan', 'Ditanggung penumpang; untuk luar kota dimasukkan dalam estimasi biaya perjalanan.'],
                            ['🅿️', 'Parkir', 'Biaya parkir di setiap titik selama perjalanan ditanggung penumpang.'],
                            ['🌙', 'Penginapan Sopir (Jika Menginap)', 'Untuk trip multi-hari yang memerlukan sopir menginap — biaya akomodasi disepakati bersama.'],
                            ['🍽️', 'Uang Makan Sopir (Luar Kota)', 'Untuk perjalanan full-day luar kota; biaya makan sopir dikomunikasikan transparan di awal.'],
                        ] as [$icon, $item, $note])
                            <div class="flex items-start gap-4">
                                <span class="text-xl flex-shrink-0 w-9 h-9 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] flex items-center justify-center">{{ $icon }}</span>
                                <div>
                                    <div class="text-white font-semibold text-sm">{!! $item !!}</div>
                                    <div class="text-[var(--color-text-muted)] text-xs mt-0.5">{{ $note }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">
                            💡 <span class="text-white font-semibold">Tips:</span> Untuk perjalanan luar kota, minta tim kami menyiapkan
                            <strong class="text-[var(--color-accent)]">simulasi biaya all-in</strong> — satu angka untuk seluruh perjalanan, lebih mudah dianggarkan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PERUNTUKAN LAYANAN --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="peruntukan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Peruntukan Layanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Sewa Mobil + Sopir Mewah Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Berbagai Keperluan</span>
                </h2>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                @foreach ([
                    ['💍', 'Wedding Car Mewah', 'Mobil pengantin prestisius dengan sopir berpenampilan formal. Tersedia dekorasi bunga eksklusif untuk hari istimewa Anda.'],
                    ['👔', 'Jemput Tamu VIP & Pejabat', 'Penjemputan tamu kehormatan, direksi, pejabat, dan delegasi luar negeri dengan armada premium dan sopir berstandar protokoler.'],
                    ['✈️', 'Transfer Bandara Juanda (SUB)', 'Penjemputan &amp; pengantaran tepat waktu ke/dari Bandara Internasional Juanda — tersedia 24 jam.'],
                    ['🏝️', 'Wisata &amp; Tour Jawa Timur', 'Perjalanan ke Bromo, Malang-Batu, Banyuwangi, hingga Bali Overland bersama sopir yang hafal rute dan destinasi.'],
                    ['🏢', 'Dinas Kantor &amp; Corporate Event', 'Akomodasi rombongan dinas, seminar luar kota, gathering, dan meeting eksekutif antar kota.'],
                    ['🎓', 'Wisuda, Graduation &amp; Acara Keluarga', 'Transportasi nyaman untuk momen spesial keluarga — wisuda, ulang tahun, reuni, dan acara keluarga besar.'],
                ] as [$icon, $title, $desc])
                    <div class="p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[rgba(124,58,237,0.4)] hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl mb-4">{{ $icon }}</div>
                        <h3 class="text-white font-bold text-sm mb-2">{{ $title }}</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{!! $desc !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- HOW TO BOOK --}}
    <section class="py-[80px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Cara Pemesanan</span>
                <h2 class="text-white text-2xl font-bold">Cara Pesan Sewa Mobil Mewah + Sopir di Surabaya</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm max-w-[480px] mx-auto">Cukup lewat WhatsApp — tidak perlu aplikasi, tidak perlu deposit ribet.</p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Chat WhatsApp</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Sampaikan tanggal, lokasi jemput, tujuan, dan tipe mobil mewah yang diinginkan beserta jumlah penumpang.</p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">💎</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Armada</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tim kami bantu merekomendasikan armada &amp; sopir yang paling sesuai — sopir sudah otomatis termasuk dalam paket.</p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Bayar DP untuk mengunci jadwal dan ketersediaan armada + sopir pilihan Anda.</p>
                </div>
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Sopir &amp; Armada Siap</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Sopir berseragam rapi hadir di lokasi Anda 10–15 menit sebelum jadwal. Perjalanan mewah dimulai!</p>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] bg-[var(--color-bg-2)] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Ulasan Pelanggan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pengalaman Pelanggan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
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

    {{-- FAQ --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="faq">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-2xl font-bold">FAQ Harga Sewa Mobil &amp; Sopir Mewah di Surabaya</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">Jawaban atas pertanyaan paling sering seputar harga sewa mobil mewah beserta sopir di Surabaya.</p>
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
                ✦ Harga Transparan — Sopir Profesional — Armada Mewah
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Siap Pesan Mobil Mewah Beserta Sopir di Surabaya?
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[620px] mx-auto leading-relaxed">
                Hubungi tim {{ config('site.brand') }} sekarang — harga transparan, sopir sudah include, armada mewah siap. Respons cepat sepanjang hari.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga & booking sewa mobil mewah beserta sopir di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
