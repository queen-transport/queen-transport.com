<?php

use function Laravel\Folio\name;

name('tarif-sewa-mobil-surabaya-mewah-murah');
?>

@php
$faqs = [
    [
        'q' => 'Berapa tarif sewa mobil mewah di Surabaya yang termurah?',
        'a' => 'Tarif sewa mobil mewah di Surabaya dimulai dari armada premium entry-level seperti Toyota Innova Zenix Hybrid atau Mitsubishi Xpander Ultimate. Untuk armada VIP seperti Alphard Transformer atau Hiace Premio VIP, tarifnya menyesuaikan tipe unit. Semua harga sudah termasuk driver profesional — hubungi kami untuk mendapatkan penawaran terbaik hari ini.',
    ],
    [
        'q' => 'Apakah tarif sewa mobil mewah sudah termasuk BBM dan tol?',
        'a' => 'Tarif dasar (Surabaya & sekitarnya) sudah termasuk driver profesional. Untuk BBM, tol, dan parkir biasanya ditanggung penumpang atau bisa digabung dalam paket All-In. Untuk perjalanan luar kota, kami menyediakan paket harga transparan yang mencakup semua komponen biaya.',
    ],
    [
        'q' => 'Apakah ada biaya tambahan di luar tarif yang tertera?',
        'a' => 'Tidak ada biaya tersembunyi. Tarif yang kami informasikan sudah final untuk wilayah Surabaya dan sekitarnya (termasuk driver). Komponen tambahan hanya berlaku untuk perjalanan luar kota: BBM, tol, parkir, dan uang makan/penginapan driver jika menginap — semuanya dikomunikasikan transparan di awal.',
    ],
    [
        'q' => 'Bagaimana cara mendapatkan tarif sewa mobil mewah paling murah di Surabaya?',
        'a' => 'Beberapa tips untuk mendapatkan tarif terbaik: (1) Pesan lebih awal minimal 1–2 hari sebelum pemakaian, (2) Tanyakan langsung via WhatsApp untuk promo yang sedang berjalan, (3) Untuk kebutuhan multi-hari atau rutin, tanyakan tarif kontrak/berlangganan yang lebih hemat.',
    ],
    [
        'q' => 'Apakah tarif sewa mobil mewah berbeda untuk dalam dan luar kota Surabaya?',
        'a' => 'Ya, tarif dalam kota Surabaya (dan sekitarnya: Sidoarjo, Gresik, Mojokerto) berlaku tarif harian standar. Untuk perjalanan luar kota (Malang, Bromo, Banyuwangi, dll.) dikenakan tarif luar kota yang memperhitungkan jarak, BBM, dan durasi perjalanan. Hubungi kami untuk simulasi biaya perjalanan Anda.',
    ],
    [
        'q' => 'Apakah tarif sewa sudah termasuk jasa driver profesional?',
        'a' => 'Ya, 100% include driver profesional. Tidak ada opsi "lepas kunci" pada layanan kami — setiap armada mewah dilengkapi driver terlatih, berpenampilan rapi, dan berpengalaman melayani tamu VIP, eksekutif, maupun wisata keluarga.',
    ],
    [
        'q' => 'Adakah minimum jam sewa atau durasi minimal untuk tarif harian?',
        'a' => 'Tarif harian kami berlaku untuk pemakaian up to 12 jam operasional dalam sehari. Untuk kebutuhan lebih singkat (half-day, 4–6 jam), silakan tanyakan langsung via WhatsApp karena kami menyediakan paket fleksibel sesuai kebutuhan Anda.',
    ],
];

$armadaService   = app(\App\Contracts\ArmadaServiceInterface::class);
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$hiacePrices     = $armadaService->getHiacePrices();
$alphardPrices   = $armadaService->getAlphardPrices();
$pelanggans      = $armadaService->getPelanggans();

$title       = 'Tarif Sewa Mobil Mewah Surabaya Murah — Harga Transparan Include Driver | ' . config('site.brand');
$description = 'Cek tarif sewa mobil mewah Surabaya termurah 2025 ✓ Alphard, Fortuner, Hiace Premio VIP, Innova Zenix ✓ Harga transparan tanpa biaya tersembunyi ✓ Include driver profesional. Cek harga sekarang!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[70vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Harga Transparan — No Hidden Fees
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Tarif Sewa Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya Murah</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Alphard &bull; Fortuner &bull; Hiace Premio VIP &bull; Innova Zenix &bull; Xpander
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Bingung soal tarif sewa mobil mewah di Surabaya? Kami tampilkan harga secara terbuka dan jujur — tanpa biaya tersembunyi, sudah termasuk driver profesional. Bandingkan tipe armada dan pilih yang paling sesuai kebutuhan &amp; anggaran Anda.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya tarif sewa mobil mewah di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Cek Harga via WhatsApp
                        </a>
                        <a href="#daftar-tarif"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📊 Lihat Daftar Tarif
                        </a>
                    </div>
                </div>

                {{-- Price highlight card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">💰</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Harga Transparan</span>
                        </div>

                        <h3 class="text-white text-lg font-bold mb-1">Apa Saja yang Sudah Termasuk?</h3>
                        <p class="text-[var(--color-text-muted)] text-xs mb-5 leading-relaxed">Semua tarif yang kami berikan sudah mencakup komponen berikut untuk area Surabaya &amp; sekitarnya:</p>

                        <div class="flex flex-col gap-3">
                            @foreach ([
                                ['✓', 'Driver Profesional Berpengalaman', true],
                                ['✓', 'Full AC &amp; Kabin Bersih', true],
                                ['✓', 'Gratis Snack &amp; Air Mineral (Hari Pertama)', true],
                                ['✓', 'Operasional hingga 12 jam/hari', true],
                                ['~', 'BBM, Tol &amp; Parkir (ditanggung penumpang)', false],
                                ['~', 'Penginapan Driver (jika menginap)', false],
                            ] as [$mark, $item, $included])
                                <div class="flex items-start gap-3 text-sm">
                                    <span class="font-bold mt-0.5 {{ $included ? 'text-[var(--color-accent)]' : 'text-[var(--color-text-muted)]' }}">{{ $mark }}</span>
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
                    <span class="text-3xl">💰</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Harga Transparan</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Tidak ada biaya tersembunyi</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Include Driver</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Profesional standar VIP</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📋</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Tarif Resmi</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Dari database armada aktif</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🤝</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Harga Bisa Nego</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Multi-hari &amp; kontrak lebih hemat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TARIF ALPHARD SECTION --}}
    @if (!empty($alphardPrices))
    <section class="py-[90px]" id="daftar-tarif">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tarif Armada VIP</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Sewa <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Toyota Alphard Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Armada MPV paling prestisius untuk tamu VIP, wedding car, dan perjalanan eksekutif. Harga sudah include driver profesional.
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
                            <div class="mb-4">
                                <div class="text-3xl mb-3">👑</div>
                                <h3 class="text-white text-xl font-bold">{{ $price['name'] }}</h3>
                                <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $price['seat'] }}</span>
                            </div>
                            <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">{{ $price['desc'] }}</p>
                            <div class="mb-6 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-text-muted)] text-xs mb-1">Tarif mulai dari</div>
                                <div class="text-white font-bold text-2xl flex items-baseline gap-1">
                                    <span class="text-sm font-normal text-[var(--color-accent)]">Rp</span>
                                    <span>{{ $price['price_label'] }}</span>
                                    <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                                </div>
                                <div class="text-[var(--color-text-muted)] text-xs mt-1">Surabaya &amp; sekitarnya • Include driver</div>
                            </div>
                            <ul class="flex flex-col gap-2.5 mb-8 text-sm">
                                @foreach ($price['features'] as $feat)
                                    <li class="flex items-center gap-2.5 text-[var(--color-text-light)]">
                                        <span class="text-[var(--color-accent)]">✓</span>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya tarif & ketersediaan ' . $price['name'] . ' di Surabaya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Cek Harga {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- TARIF HIACE SECTION --}}
    @if (!empty($hiacePrices))
    <section class="py-[90px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tarif Armada Rombongan Premium</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Sewa <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Hiace Premio Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Van premium generasi terbaru untuk rombongan — tersedia Standard 14 seat &amp; VIP 9 Captain Seat. Harga sudah include driver profesional.
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
                            <div class="mb-4">
                                <div class="text-3xl mb-3">🚐</div>
                                <h3 class="text-white text-xl font-bold">{{ $price['name'] }}</h3>
                                <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $price['seat'] }}</span>
                            </div>
                            <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">{{ $price['desc'] }}</p>
                            <div class="mb-6 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-text-muted)] text-xs mb-1">Tarif mulai dari</div>
                                <div class="text-white font-bold text-2xl flex items-baseline gap-1">
                                    <span class="text-sm font-normal text-[var(--color-accent)]">Rp</span>
                                    <span>{{ $price['price_label'] }}</span>
                                    <span class="text-xs font-normal text-[var(--color-text-muted)]">/ hari</span>
                                </div>
                                <div class="text-[var(--color-text-muted)] text-xs mt-1">Surabaya &amp; sekitarnya • Include driver</div>
                            </div>
                            <ul class="flex flex-col gap-2.5 mb-8 text-sm">
                                @foreach ($price['features'] as $feat)
                                    <li class="flex items-center gap-2.5 text-[var(--color-text-light)]">
                                        <span class="text-[var(--color-accent)]">✓</span>
                                        <span>{{ $feat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya tarif & ketersediaan ' . $price['name'] . ' di Surabaya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Cek Harga {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- TARIF LENGKAP SEMUA ARMADA --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Daftar Harga Lengkap</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Semua <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Armada Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Perbandingan tarif seluruh armada mewah kami — pilih yang paling sesuai kapasitas, budget, dan perjalanan Anda.
                </p>
            </div>

            {{-- Tarif tabel ringkas --}}
            <div class="mb-10 overflow-x-auto rounded-[var(--radius-xl)] border border-[var(--color-border)]">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[rgba(124,58,237,0.15)] border-b border-[var(--color-border)]">
                            <th class="text-left py-4 px-6 text-white font-bold">Armada</th>
                            <th class="text-center py-4 px-4 text-[var(--color-accent)] font-bold">Kapasitas</th>
                            <th class="text-center py-4 px-4 text-[var(--color-accent)] font-bold">Tarif / Hari</th>
                            <th class="text-center py-4 px-4 text-white font-bold">Wilayah</th>
                            <th class="text-center py-4 px-4 text-white font-bold">Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelasAtasPrices as $i => $price)
                            <tr class="border-b border-[var(--color-border)] {{ $i % 2 === 0 ? 'bg-[var(--gradient-card)]' : 'bg-[rgba(124,58,237,0.04)]' }} hover:bg-[rgba(124,58,237,0.08)] transition-colors">
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
                                    <div class="text-white font-bold text-base">
                                        Rp {{ $price['price_label'] }}
                                    </div>
                                    <div class="text-[var(--color-text-muted)] text-xs">include driver</div>
                                </td>
                                <td class="py-4 px-4 text-center text-[var(--color-text-muted)] text-xs">
                                    Surabaya &amp; Sekitarnya
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya tarif ' . $price['name'] . ' di Surabaya.') }}"
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
                    Tarif berlaku untuk area Surabaya &amp; sekitarnya (Sidoarjo, Gresik, Mojokerto) hingga 12 jam/hari.
                    Untuk luar kota, multi-hari, atau kebutuhan khusus — hubungi tim kami untuk simulasi &amp; penawaran terbaik.
                </p>
            </div>
        </div>
    </section>
    @endif

    {{-- RINCIAN KOMPONEN BIAYA --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="rincian-biaya">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Biaya</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Rincian Komponen <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Tarif Sewa Mobil Mewah</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Pahami apa saja yang masuk dan tidak masuk dalam tarif kami — agar tidak ada kejutan di akhir perjalanan.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 max-md:grid-cols-1">
                {{-- Sudah termasuk --}}
                <div class="bg-[var(--gradient-card)] border border-[rgba(34,211,238,0.25)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                        <span class="text-2xl">✅</span>
                        <h3 class="text-white font-bold text-lg">Sudah Termasuk dalam Tarif</h3>
                    </div>
                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['👨‍✈️', 'Driver Profesional Berpengalaman', 'Ramah, rapi, hafal rute Surabaya &amp; destinasi wisata Jawa Timur.'],
                            ['❄️', 'Full AC — Dingin Seluruh Kabin', 'Double blower aktif untuk kenyamanan semua penumpang.'],
                            ['🧹', 'Kabin Bersih &amp; Tersanitasi', 'Dibersihkan dan disemprot sanitizer sebelum keberangkatan.'],
                            ['🍎', 'Snack, Buah &amp; Air Mineral', 'Gratis di hari pertama pemakaian sebagai apresiasi pelanggan.'],
                            ['⏱️', 'Operasional 12 Jam / Hari', 'Tarif harian berlaku untuk penggunaan hingga 12 jam efektif.'],
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

                {{-- Belum termasuk --}}
                <div class="bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.25)] rounded-[var(--radius-xl)] p-8">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[var(--color-border)]">
                        <span class="text-2xl">📋</span>
                        <h3 class="text-white font-bold text-lg">Komponen Biaya Tambahan</h3>
                    </div>
                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['⛽', 'Bahan Bakar (BBM)', 'Ditanggung penumpang atau bisa digabung dalam paket All-In.'],
                            ['🛣️', 'Tol &amp; Retribusi Jalan', 'Ditanggung penumpang atau dimasukkan dalam estimasi biaya luar kota.'],
                            ['🅿️', 'Parkir', 'Biaya parkir selama perjalanan ditanggung penumpang.'],
                            ['🌙', 'Penginapan Driver (Menginap)', 'Untuk trip multi-hari yang memerlukan driver menginap, biaya akomodasi disepakati bersama.'],
                            ['🍽️', 'Uang Makan Driver', 'Untuk perjalanan full-day luar kota, biaya makan driver disepakati di awal.'],
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
                            💡 <span class="text-white font-semibold">Tips:</span> Untuk perjalanan luar kota, minta tim kami untuk menyiapkan <strong class="text-[var(--color-accent)]">simulasi biaya all-in</strong> — satu angka untuk seluruh perjalanan tanpa perhitungan manual.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PAKET TARIF LUAR KOTA --}}
    <section class="py-[90px]" id="tarif-luar-kota">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Estimasi Tarif Perjalanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Estimasi Tarif Sewa Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Luar Kota dari Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Perjalanan ke luar Surabaya? Berikut estimasi tarif per destinasi populer (belum termasuk BBM &amp; tol). Hubungi kami untuk simulasi biaya All-In.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                @foreach ([
                    ['🌋', 'Surabaya → Malang / Batu', '~2–2,5 jam', 'Wisata Jatim Park, BNS, Selecta, kuliner Malang', '1–2 hari'],
                    ['🏔️', 'Surabaya → Bromo', '~3–4 jam via Probolinggo', 'Sunrise tour, jeep, lautan pasir Tengger', '1–2 hari'],
                    ['🌊', 'Surabaya → Banyuwangi / Ijen', '~4,5–5 jam', 'Kawah Ijen Blue Fire, Pantai Pulau Merah', '2–3 hari'],
                    ['🏝️', 'Surabaya → Bali (Overland)', '~7–8 jam via Ketapang', 'Wisata keluarga lintas pulau tanpa ganti kendaraan', '3–5 hari'],
                    ['🕌', 'Surabaya → Ziarah Wali Jatim', '~2–6 jam (tergantung rute)', 'Sunan Ampel, Sunan Giri, Sunan Drajat, Sunan Bonang', '1–2 hari'],
                    ['🏙️', 'Surabaya → Yogyakarta / Solo', '~5–6 jam via Tol Trans-Jawa', 'Wisata budaya, Borobudur, Prambanan, Malioboro', '2–4 hari'],
                ] as [$icon, $route, $duration, $desc, $suggested])
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 hover:border-[var(--color-accent)] hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl mb-3">{{ $icon }}</div>
                        <h3 class="text-white font-bold text-sm mb-1">{{ $route }}</h3>
                        <p class="text-[var(--color-accent)] text-xs font-semibold mb-2">🕐 {{ $duration }}</p>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-3">{{ $desc }}</p>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-[var(--color-text-muted)]">Durasi:</span>
                            <span class="px-2 py-0.5 rounded-full bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xs font-semibold">{{ $suggested }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin minta simulasi tarif sewa mobil mewah luar kota dari Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_20px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    💬 Minta Simulasi Biaya Perjalanan
                </a>
            </div>
        </div>
    </section>

    {{-- ARMADA CATALOG --}}
    <x-armada-list
        subtitle="Armada Siap Disewa"
        title="Katalog Mobil Mewah Surabaya"
        description="Lihat detail setiap unit armada mewah kami — spesifikasi lengkap, foto, dan harga. Semua tersedia dengan driver profesional."
        wa-text="tarif sewa mobil mewah di Surabaya"
    />

    {{-- TIPS HEMAT --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="tips-hemat">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Tips &amp; Panduan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Tips Mendapatkan Tarif Sewa Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Paling Hemat</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Beberapa strategi cerdas agar pengeluaran sewa mobil mewah di Surabaya lebih efisien tanpa mengorbankan kenyamanan:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['📅', 'Pesan Lebih Awal', 'Armada populer seperti Alphard sering habis dipesan jauh-jauh hari. Pesan minimal 1–2 hari sebelumnya untuk mendapat unit terbaik dengan harga normal.'],
                            ['📦', 'Paket Multi-Hari Lebih Hemat', 'Untuk perjalanan 2 hari atau lebih (Bromo, Bali, dll.), tarif per hari biasanya lebih rendah dibanding sewa harian lepas. Tanyakan paket perjalanan kami.'],
                            ['🤝', 'Sistem Berlangganan Korporasi', 'Perusahaan yang membutuhkan armada rutin (antar-jemput eksekutif, shuttle mingguan) bisa mendapatkan tarif kontrak yang jauh lebih efisien.'],
                            ['💬', 'Tanya Promo via WhatsApp', 'Terkadang kami memiliki slot armada yang belum terisi dan dapat ditawarkan dengan harga lebih menarik. Tanya langsung ke CS kami.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                                <div class="text-2xl flex-shrink-0 w-11 h-11 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1 text-sm">{{ $title }}</h4>
                                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8">
                        <span class="text-5xl block mb-4">💡</span>
                        <h3 class="text-white text-xl font-bold mb-4">Cara Pilih Armada yang Tepat</h3>

                        <div class="flex flex-col gap-5 text-sm">
                            <div class="p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-xs uppercase mb-2">2–4 orang</div>
                                <p class="text-[var(--color-text-light)] text-xs leading-relaxed">Toyota Innova Zenix Hybrid atau Xpander Ultimate — MPV nyaman dan efisien untuk keluarga kecil atau perjalanan bisnis.</p>
                            </div>
                            <div class="p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-xs uppercase mb-2">4–7 orang</div>
                                <p class="text-[var(--color-text-light)] text-xs leading-relaxed">Toyota Fortuner VRZ / GR Sport atau Alphard — SUV gagah untuk medan beragam, atau Alphard untuk kenyamanan maksimal.</p>
                            </div>
                            <div class="p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-xs uppercase mb-2">8–9 orang VIP</div>
                                <p class="text-[var(--color-text-light)] text-xs leading-relaxed">Hiace Premio VIP 9 Captain Seat — rombongan kecil yang ingin kenyamanan captain seat tanpa berdesakan.</p>
                            </div>
                            <div class="p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.08)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-xs uppercase mb-2">10–14 orang</div>
                                <p class="text-[var(--color-text-light)] text-xs leading-relaxed">Hiace Premio Standard 14 Seat — pilihan paling cost-effective untuk rombongan besar dengan armada premium terbaru.</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-[var(--color-border)]">
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi pilihan armada & tarif terbaik untuk kebutuhan saya di Surabaya.') }}"
                               class="block text-center py-3.5 rounded-[var(--radius-xl)] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:opacity-95 transition-opacity"
                               target="_blank" rel="noopener noreferrer">
                                💬 Konsultasi Gratis via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Ulasan Pelanggan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Kata Mereka tentang <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Tarif &amp; Layanan Kami</span>
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
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pertanyaan Umum</span>
                <h2 class="text-white text-2xl font-bold">FAQ Tarif Sewa Mobil Mewah Surabaya</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">Jawaban atas pertanyaan seputar tarif &amp; harga sewa mobil mewah di Surabaya.</p>
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
                ✦ Dapatkan Penawaran Tarif Terbaik Hari Ini
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Cek Tarif &amp; Booking Mobil Mewah Surabaya Sekarang
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[620px] mx-auto leading-relaxed">
                Hubungi tim {{ config('site.brand') }} — konsultasi gratis, tarif transparan, armada mewah siap. Respons cepat sepanjang hari.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya tarif & booking sewa mobil mewah di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
