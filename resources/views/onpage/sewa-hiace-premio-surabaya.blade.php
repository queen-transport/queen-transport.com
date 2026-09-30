<?php

use function Laravel\Folio\name;

name('sewa-hiace-premio-surabaya');
?>

@php
$faqs = [
    [
        'q' => 'Apa itu Toyota Hiace Premio dan apa bedanya dengan Hiace Commuter?',
        'a' => 'Toyota Hiace Premio adalah generasi terbaru Hiace berdesain semi-bonnet (ada moncong mesin di depan). Keunggulannya: kabin jauh lebih senyap, suspensi lebih halus, jarak antar kursi lebih lega, dan tampilan eksterior lebih modern dibanding Hiace Commuter model lama.',
    ],
    [
        'q' => 'Berapa kapasitas penumpang Hiace Premio Standard dan Premio VIP/Luxury?',
        'a' => 'Hiace Premio Standard tersedia dalam konfigurasi 14 kursi penumpang + 1 driver. Sedangkan Hiace Premio VIP / Luxury hadir dengan 9 Captain Seat super nyaman yang cocok untuk tamu penting, direksi, atau rombongan wisata premium.',
    ],
    [
        'q' => 'Apakah sewa Hiace Premio Surabaya sudah termasuk driver?',
        'a' => 'Ya, 100% include driver profesional. Driver kami berpengalaman, berpenampilan rapi, ramah, dan sangat menguasai rute kota Surabaya maupun seluruh destinasi wisata & dinas di Jawa Timur.',
    ],
    [
        'q' => 'Apakah melayani antar-jemput Bandara Juanda Surabaya dengan Hiace Premio?',
        'a' => 'Tentu. Kami melayani transfer dari/ke Bandara Internasional Juanda (SUB), Stasiun Pasar Turi, Stasiun Gubeng, dan berbagai hotel di Surabaya. Pilih Hiace Premio Standard (14 seat) atau VIP (9 seat) sesuai kebutuhan rombongan Anda.',
    ],
    [
        'q' => 'Destinasi mana saja yang bisa dicapai dengan Sewa Hiace Premio dari Surabaya?',
        'a' => 'Dari Surabaya, kami melayani perjalanan ke seluruh Jawa Timur (Malang, Batu, Bromo, Banyuwangi, Ijen, Kediri, Jember), Bali Overland, Yogyakarta, Solo, Semarang, dan berbagai destinasi luar kota lainnya.',
    ],
    [
        'q' => 'Fasilitas apa yang ada di dalam Hiace Premio saat sewa?',
        'a' => 'Setiap unit Hiace Premio kami dilengkapi: Full AC Double Blower (dingin merata), Reclining Seat empuk, bagasi luas, charger HP, serta gratis snack, buah segar & air mineral di hari pertama pemakaian.',
    ],
    [
        'q' => 'Bagaimana cara pesan Sewa Hiace Premio Surabaya?',
        'a' => 'Sangat mudah — klik tombol WhatsApp di halaman ini, sampaikan tanggal, rute perjalanan, dan jumlah penumpang. Tim kami akan mengonfirmasi ketersediaan unit & memberikan detail harga serta prosedur DP untuk penguncian jadwal.',
    ],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$hiacePrices = $armadaService->getHiacePrices();

$title = 'Sewa Hiace Premio Surabaya — Standard & VIP 9 Seat + Driver Profesional | ' . config('site.brand');
$description = 'Sewa Hiace Premio Surabaya terbaik ✓ Standard 14 Seat & VIP 9 Captain Seat ✓ Include driver profesional ✓ Layanan wisata, dinas, wedding & bandara Juanda. Pesan sekarang!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Hiace Premio Surabaya — Generasi Terbaru
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Hiace Premio <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Premio Standard 14 Seat &bull; Premio VIP 9 Captain Seat
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Nikmati pengalaman perjalanan rombongan yang lebih nyaman dan senyap bersama Toyota Hiace Premio — armada generasi terbaru dengan desain semi-bonnet, kabin lega, dan suspensi halus. Tersedia dengan driver profesional berpengalaman siap melayani wisata, dinas, wedding, hingga transfer bandara Juanda.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya & pesan Sewa Hiace Premio di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Hiace Premio Sekarang
                        </a>
                        <a href="#tipe-premio"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Tipe &amp; Harga
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card on Hero right side --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🚐</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Generasi Terbaru</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Kenapa Pilih Hiace Premio?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Lebih senyap, lebih lega, lebih nyaman — inilah evolusi van premium untuk rombongan Anda.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">9 &amp; 14</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Varian Seat</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Include Driver</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Semi-Bonnet</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Desain Terbaru</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Snack &amp; Air Mineral</div>
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
                    <span class="text-3xl">🔇</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Super Senyap</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Mesin semi-bonnet meredam kebisingan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💺</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kursi Lebih Lega</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Jarak baris lebih panjang dari Commuter</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">❄️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Full AC Double Blower</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Dingin merata ke seluruh baris kursi</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Profesional</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Rapi, ramah &amp; hafal rute wisata Jatim</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- WHAT IS HIACE PREMIO SECTION --}}
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Tentang Armada</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Apa Itu <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Toyota Hiace Premio</span>?
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-5 text-sm leading-relaxed">
                        Toyota Hiace Premio adalah evolusi terbaru dari lini kendaraan minibus Toyota. Berbeda dari Hiace Commuter konvensional, Premio hadir dengan desain <strong class="text-white">semi-bonnet</strong> yang menempatkan sebagian mesin di bawah hidung kendaraan — bukan di bawah kabin.
                    </p>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Hasilnya adalah kabin yang jauh lebih <strong class="text-white">senyap dari getaran &amp; suara mesin</strong>, suspensi yang lebih halus untuk jalanan panjang, ruang kaki lebih lega, serta tampilan eksterior yang lebih modern dan prestisius.
                    </p>

                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['🔇', 'Kabin Lebih Senyap', 'Mesin semi-bonnet mereduksi kebisingan & getaran mesin secara signifikan ke dalam kabin.'],
                            ['🛣️', 'Suspensi Lebih Nyaman', 'Cocok untuk perjalanan jarak jauh (Surabaya–Malang, Bromo, Bali) tanpa terasa melelahkan.'],
                            ['📐', 'Jarak Antar Kursi Lebih Lega', 'Penumpang lebih bebas bergerak dan nyaman meski perjalanan berjam-jam.'],
                            ['✨', 'Tampilan Lebih Modern', 'Eksterior elegan & prestisius, cocok untuk tamu VIP, pejabat, maupun wisata keluarga.'],
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

                <div class="relative">
                    {{-- Perbandingan Premio vs Commuter --}}
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                        <h3 class="text-white text-lg font-bold mb-6 text-center">Hiace Premio vs Hiace Commuter</h3>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-[var(--color-border)]">
                                        <th class="text-left py-3 pr-4 text-[var(--color-text-muted)] font-medium text-xs">Aspek</th>
                                        <th class="text-center py-3 px-3 text-[var(--color-accent)] font-bold text-xs">Premio</th>
                                        <th class="text-center py-3 pl-3 text-[var(--color-text-muted)] font-medium text-xs">Commuter</th>
                                    </tr>
                                </thead>
                                <tbody class="text-[var(--color-text-light)]">
                                    @foreach ([
                                        ['Desain', 'Semi-Bonnet', 'Flat Nose'],
                                        ['Kebisingan Kabin', 'Sangat Senyap', 'Lebih Keras'],
                                        ['Suspensi', 'Lebih Halus', 'Standar'],
                                        ['Jarak Kursi', 'Lebih Lega', 'Standar'],
                                        ['Mesin', 'Terbaru (2GD)', 'Lama (1KD)'],
                                        ['Varian Seat', '9 VIP / 14 Std', '14 Seat'],
                                        ['Kelas', 'Premium', 'Standar'],
                                    ] as [$aspect, $premio, $commuter])
                                        <tr class="border-b border-[var(--color-border)] last:border-0">
                                            <td class="py-3 pr-4 text-[var(--color-text-muted)] text-xs">{{ $aspect }}</td>
                                            <td class="py-3 px-3 text-center">
                                                <span class="inline-block px-2 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $premio }}</span>
                                            </td>
                                            <td class="py-3 pl-3 text-center text-xs text-[var(--color-text-muted)]">{{ $commuter }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6 p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm block mb-2">Ingin konsultasi tipe yang tepat?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi pilihan Hiace Premio yang tepat untuk perjalanan saya.') }}"
                               class="inline-block py-2.5 px-5 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-xs no-underline"
                               target="_blank" rel="noopener noreferrer">
                                💬 Konsultasi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRICING & TYPES SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="tipe-premio">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pilihan Unit &amp; Harga</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Hiace Premio Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Semua unit Hiace Premio kami dalam kondisi prima &amp; terawat. Harga kompetitif sudah termasuk driver profesional berpengalaman.
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

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa unit ' . $price['name'] . ' (Hiace Premio) di Surabaya. Mohon info ketersediaan & penawaran.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Sewa {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-armada-list
        keyword="hiace"
        subtitle="Katalog Armada Ready"
        title="Detail Unit Toyota Hiace Premio Surabaya"
        description="Pilihan Toyota Hiace Premio Standard 14 Seat &amp; Premio VIP 9 Captain Seat — tersedia dengan driver profesional, siap melayani wisata, dinas, &amp; wedding."
        wa-text="di Surabaya"
    />

    {{-- USE CASES / LAYANAN SECTION --}}
    <section class="py-[90px]" id="layanan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Peruntukan Layanan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Sewa Hiace Premio Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Berbagai Kebutuhan</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Toyota Hiace Premio adalah pilihan sempurna untuk berbagai kebutuhan transportasi rombongan di Surabaya — dari wisata keluarga, perjalanan dinas, hingga acara spesial:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['🏖️', 'Wisata & Tour Jawa Timur', 'Perjalanan rombongan nyaman ke Bromo, Malang-Batu, Kawah Ijen, Banyuwangi, hingga Bali Overland.'],
                            ['🏢', 'Dinas Kantor & Corporate Event', 'Akomodasi tamu VIP, perjalanan dinas direksi, seminar luar kota, dan rombongan eksekutif perusahaan.'],
                            ['✈️', 'Transfer Bandara Juanda (SUB)', 'Penjemputan & pengantaran tepat waktu ke/dari Bandara Internasional Juanda Surabaya.'],
                            ['💍', 'Wedding Car & Rombongan Keluarga', 'Transportasi rombongan keluarga pengantin, wisuda, atau acara keluarga besar di Surabaya.'],
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

                <div class="relative">
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                        <span class="text-5xl block mb-4">🏆</span>
                        <h3 class="text-white text-xl font-bold mb-4">Keunggulan Rental Hiace Premio di {{ config('site.brand') }}</h3>

                        <div class="flex flex-col gap-4 text-sm text-[var(--color-text-light)]">
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">01.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Armada Premio Terbaru &amp; Terawat</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Unit Hiace Premio kami selalu dalam kondisi mesin prima dan rutin diservis di bengkel resmi Toyota.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">02.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Driver Profesional &amp; Berpenampilan Rapi</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Driver berpengalaman rute antar-kota, hafal destinasi wisata Jawa Timur, ramah, dan mengutamakan keselamatan.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">03.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Kabin Bersih, Wangi &amp; Sanitasi</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Interior disanitasi sebelum keberangkatan, bebas bau rokok, AC bersih dan wangi segar.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-[var(--color-accent)] font-bold text-lg">04.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Fasilitas Gratis Hari Pertama</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Buah segar, air mineral botol, dan snack gratis sebagai apresiasi kepada pelanggan di hari pertama pemakaian.</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm">Perlu Paket Multi-Hari atau Luar Kota?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi sewa Hiace Premio untuk perjalanan luar kota / multi-hari.') }}"
                               class="mt-3 block py-2.5 px-4 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-xs no-underline"
                               target="_blank" rel="noopener noreferrer">
                                Hubungi Tim WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW TO BOOK --}}
    <section class="py-[80px] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Cara Pemesanan</span>
                <h2 class="text-white text-2xl font-bold">4 Langkah Mudah Sewa Hiace Premio di Surabaya</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Hubungi Tim WA</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Klik tombol WhatsApp &amp; sampaikan tanggal keberangkatan, rute, serta jumlah penumpang.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">🚐</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Varian Premio</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tentukan varian: Premio Standard (14 seat) untuk rombongan besar, atau Premio VIP (9 Captain Seat) untuk kenyamanan eksklusif.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Lakukan pembayaran DP untuk mengunci jadwal ketersediaan armada Hiace Premio Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Penjemputan Tepat Waktu</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Driver &amp; Hiace Premio bersih siap menjemput Anda di lokasi yang telah disepakati.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="faq">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-2xl font-bold">FAQ Sewa Hiace Premio Surabaya</h2>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ($faqs as $faq)
                    <details class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-5 transition-all">
                        <summary class="font-semibold text-white cursor-pointer list-none flex justify-between items-center text-base">
                            <span>{{ $faq['q'] }}</span>
                            <span class="text-[var(--color-accent)] transition-transform duration-200 group-open:rotate-180">▼</span>
                        </summary>
                        <p class="mt-4 text-[var(--color-text-muted)] text-sm leading-relaxed border-t border-[var(--color-border)] pt-4">
                            {{ $faq['a'] }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BOTTOM CTA BANNER --}}
    <section class="py-[80px] relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.4)] rounded-[var(--radius-xl)] p-12 text-center relative z-10 shadow-[0_15px_50px_rgba(0,0,0,0.6)]">
                <span class="text-4xl block mb-3">🚐✨</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold mb-4">
                    Siap Pesan Sewa Hiace Premio Surabaya?
                </h2>
                <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto text-base mb-8">
                    Dapatkan penawaran terbaik sewa Toyota Hiace Premio Surabaya — armada terbaru, driver profesional, harga transparan. Tim kami siap membantu Anda sepanjang hari.
                </p>

                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking Sewa Hiace Premio di Surabaya.') }}"
                       class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.5)] transition-transform hover:scale-105"
                       target="_blank" rel="noopener noreferrer">
                        💬 Hubungi via WhatsApp (Sepanjang Hari)
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts::public>
