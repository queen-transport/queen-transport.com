<?php

use function Laravel\Folio\name;

name('sewa-mobil-double-cabin-surabaya-perjalanan-mewah');
?>

@php
$doubleCabinTypes = [
    [
        'emoji'       => '🏔️',
        'name'        => 'Toyota Hilux Double Cabin',
        'tag'         => 'Pick-up Premium 4WD',
        'badge'       => 'Paling Diminati',
        'seat'        => '4–5 Penumpang',
        'desc'        => 'Raja pick-up double cabin di Indonesia. Mesin diesel 2.4L bertenaga besar, suspensi tangguh, ground clearance tinggi — siap menaklukkan segala medan dari jalanan kota hingga trek off-road Jawa Timur.',
        'features'    => [
            'Mesin Diesel 2.4L / 2.8L Turbo Bertenaga',
            '4WD — Mampu Segala Medan',
            'Ground Clearance Tinggi',
            'Kabin AC Dingin & Nyaman',
            'Bak Belakang Luas untuk Logistik',
            'Driver Profesional Berpengalaman',
        ],
        'best_for'    => ['Wisata alam & off-road', 'Survei lapangan & pertambangan', 'Ekspedisi & adventure tour', 'Angkutan logistik + penumpang'],
    ],
    [
        'emoji'       => '🦁',
        'name'        => 'Mitsubishi Triton Double Cabin',
        'tag'         => 'Pick-up Tangguh & Stylish',
        'badge'       => '',
        'seat'        => '4–5 Penumpang',
        'desc'        => 'Mitsubishi Triton hadir dengan desain agresif dan teknologi Super Select 4WD terdepan di kelasnya. Perpaduan sempurna antara tampilan sporty, kenyamanan kabin, dan kemampuan off-road yang luar biasa.',
        'features'    => [
            'Super Select 4WD II — 2H/4H/4HLc/4LLc',
            'Desain Eksterior Agresif & Modern',
            'Kabin Lega dengan Material Premium',
            'Suspensi Multi-Link Rear Lebih Halus',
            'Bak Belakang Fleksibel',
            'Driver Profesional Terlatih',
        ],
        'best_for'    => ['Perjalanan bisnis & korporasi', 'Trekking gunung & alam', 'Site visit tambang & perkebunan', 'Hunting foto & videografi alam'],
    ],
    [
        'emoji'       => '🐃',
        'name'        => 'Ford Ranger Double Cabin',
        'tag'         => 'Pick-up Teknologi Canggih',
        'badge'       => '',
        'seat'        => '4–5 Penumpang',
        'desc'        => 'Ford Ranger adalah simbol pick-up modern dengan teknologi berkelas. Fitur lengkap, kabin berstandar SUV, dan kemampuan 4WD mumpuni menjadikannya pilihan premium untuk perjalanan mewah sekaligus petualangan.',
        'features'    => [
            'Teknologi Canggih & Fitur Modern',
            'Kabin Berstandar SUV — Nyaman & Lega',
            'Sistem 4WD Elektronik Presisi',
            'Towing Capacity Besar',
            'Safety Feature Lengkap',
            'Driver Profesional Berpengalaman',
        ],
        'best_for'    => ['Perjalanan VIP ke area terpencil', 'Corporate outdoor event', 'Ekspedisi wisata alam premium', 'Transportasi peralatan profesional'],
    ],
];

$destinasiAdventure = [
    ['🌋', 'Gunung Bromo & Tengger', '~3–4 jam dari Surabaya', 'Medan berbatu & pasir — Double Cabin wajib untuk akses Savana & viewpoint terbaik'],
    ['🏔️', 'Kawah Ijen, Banyuwangi', '~5 jam dari Surabaya', 'Jalur menanjak ke kawah — Double Cabin 4WD paling aman untuk malam hari'],
    ['🌊', 'Pantai Pulau Merah & G-Land', '~5 jam dari Surabaya', 'Akses pantai & jalur hutan — memerlukan ground clearance tinggi'],
    ['🌿', 'Taman Nasional Baluran', '~5 jam dari Surabaya', '"Afrika-nya Jawa" — jalur savana terbuka terbaik dijelajahi dengan double cabin'],
    ['⛰️', 'Gunung Semeru Base Camp', '~4 jam ke Malang', 'Trek menuju Ranu Pane — keandalan off-road Double Cabin tak tertandingi'],
    ['🏞️', 'Air Terjun & Area Pegunungan Malang', '~2–2,5 jam dari Surabaya', 'Coban Rondo, Coban Pelangi, Wendit — akses jalur tanah terjal & berbatu'],
];

$armadaService = app(\App\Contracts\ArmadaServiceInterface::class);
$pelanggans    = $armadaService->getPelanggans();

$title       = 'Sewa Mobil Double Cabin Surabaya untuk Perjalanan Mewah & Petualangan — ' . config('site.brand');
$description = 'Sewa mobil double cabin Surabaya ✓ Toyota Hilux, Mitsubishi Triton, Ford Ranger ✓ 4WD off-road & perjalanan mewah ✓ Include driver profesional ✓ Bromo, Ijen, Baluran & seluruh Jatim. Pesan sekarang!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[80vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Double Cabin Surabaya — Mewah &amp; Tangguh
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Mobil Double Cabin <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Toyota Hilux &bull; Mitsubishi Triton &bull; Ford Ranger &bull; 4WD Off-Road
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Perpaduan sempurna antara kemewahan dan ketangguhan — mobil double cabin 4WD dengan driver profesional berpengalaman. Cocok untuk perjalanan wisata alam, ekspedisi off-road, survei lapangan, kunjungan korporasi ke area terpencil, hingga petualangan ke Bromo, Ijen, dan seluruh penjuru Jawa Timur.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya & pesan Sewa Mobil Double Cabin di Surabaya untuk perjalanan mewah') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Double Cabin Sekarang
                        </a>
                        <a href="#tipe-double-cabin"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            🏔️ Lihat Tipe Armada
                        </a>
                    </div>
                </div>

                {{-- Hero stats card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🏔️</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Tangguh &amp; Mewah</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Keunggulan Double Cabin</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Satu-satunya kendaraan yang bisa membawa Anda dalam kemewahan sekaligus menaklukkan medan paling menantang di Jawa Timur.
                        </p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">4WD</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Segala Medan</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">4–5 Seat</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kabin Nyaman</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Include Driver</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Luas</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Bak Belakang</div>
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
                    <span class="text-3xl">🔩</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">4WD Off-Road Ready</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Tangguh di segala medan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💺</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Mewah & Nyaman</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">AC dingin, audio premium</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Off-Road Expert</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Hafal medan Jawa Timur</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">📦</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Bak Belakang Luas</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Muat logistik & perlengkapan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- APA ITU DOUBLE CABIN --}}
    <section class="py-[90px]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Tentang Armada</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Mengapa Memilih <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mobil Double Cabin</span> untuk Perjalanan Mewah?
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-5 text-sm leading-relaxed">
                        Mobil double cabin adalah <strong class="text-white">pick-up berkabin ganda</strong> yang menghadirkan dua fungsi sekaligus dalam satu kendaraan — kenyamanan penumpang selayaknya SUV premium, sekaligus kemampuan angkut dan off-road kelas berat.
                    </p>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Untuk perjalanan ke destinasi wisata alam Jawa Timur yang menantang — dari Bromo, Ijen, hingga pantai tersembunyi Banyuwangi — double cabin 4WD adalah pilihan yang tidak bisa digantikan kendaraan lain.
                    </p>

                    <div class="flex flex-col gap-4">
                        @foreach ([
                            ['🏔️', 'Kemampuan Off-Road Superior', 'Dengan sistem 4WD, ground clearance tinggi, dan ban berukuran besar, double cabin mampu melewati medan berlumpur, berbatu, menanjak curam, dan jalur tak beraspal.'],
                            ['💺', 'Kabin Nyaman Setara SUV', 'Berbeda dari pick-up biasa, kabin double cabin modern dirancang dengan standar kenyamanan tinggi — jok empuk, AC dingin, audio sistem, dan ruang kaki yang lega.'],
                            ['📦', 'Bak Belakang Serbaguna', 'Bak terbuka di belakang menjadi nilai lebih untuk membawa perlengkapan camping, kamera profesional, alat survei lapangan, atau bagasi bervolume besar.'],
                            ['⛽', 'Mesin Diesel Bertenaga & Efisien', 'Mesin diesel turbo double cabin memberikan torsi besar yang dibutuhkan untuk medan berat, sekaligus efisiensi BBM yang baik untuk perjalanan jarak jauh.'],
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

                {{-- Double Cabin vs SUV comparison --}}
                <div class="relative">
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                        <h3 class="text-white text-lg font-bold mb-6 text-center">Double Cabin vs SUV Biasa</h3>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-[var(--color-border)]">
                                        <th class="text-left py-3 pr-4 text-[var(--color-text-muted)] font-medium text-xs">Aspek</th>
                                        <th class="text-center py-3 px-3 text-[var(--color-accent)] font-bold text-xs">Double Cabin</th>
                                        <th class="text-center py-3 pl-3 text-[var(--color-text-muted)] font-medium text-xs">SUV Biasa</th>
                                    </tr>
                                </thead>
                                <tbody class="text-[var(--color-text-light)]">
                                    @foreach ([
                                        ['Off-Road 4WD', '✓ Superior', 'Terbatas'],
                                        ['Ground Clearance', '✓ Sangat Tinggi', 'Sedang'],
                                        ['Kapasitas Angkut', '✓ Bak Luas', 'Bagasi Saja'],
                                        ['Medan Berlumpur', '✓ Tangguh', 'Berisiko'],
                                        ['Mesin Diesel Torsi', '✓ Besar', 'Bervariasi'],
                                        ['Kenyamanan Kabin', '✓ Modern', '✓ Modern'],
                                        ['Kesan Visual', '✓ Gagah & Dominan', 'Standar'],
                                    ] as [$aspect, $dc, $suv])
                                        <tr class="border-b border-[var(--color-border)] last:border-0">
                                            <td class="py-3 pr-4 text-[var(--color-text-muted)] text-xs">{{ $aspect }}</td>
                                            <td class="py-3 px-3 text-center">
                                                <span class="inline-block px-2 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $dc }}</span>
                                            </td>
                                            <td class="py-3 pl-3 text-center text-xs text-[var(--color-text-muted)]">{{ $suv }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6 p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm block mb-2">Ingin konsultasi armada yang tepat?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi pilihan armada Double Cabin yang tepat untuk perjalanan saya.') }}"
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

    {{-- TIPE DOUBLE CABIN --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="tipe-double-cabin">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pilihan Armada</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tipe <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Double Cabin</span> yang Tersedia di Surabaya
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Semua unit dalam kondisi prima, terawat, dan siap menghadapi medan tersulit sekalipun — lengkap dengan driver berpengalaman di jalur off-road Jawa Timur.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ($doubleCabinTypes as $dc)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:border-[var(--color-accent)] hover:shadow-[0_10px_30px_rgba(124,58,237,0.25)]">
                        @if ($dc['badge'])
                            <span class="absolute -top-3.5 right-6 px-4 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold shadow-md">
                                {{ $dc['badge'] }}
                            </span>
                        @endif

                        <div>
                            <div class="text-4xl mb-4">{{ $dc['emoji'] }}</div>
                            <h3 class="text-white text-xl font-bold mb-1">{{ $dc['name'] }}</h3>
                            <div class="flex gap-2 mb-4 flex-wrap">
                                <span class="inline-block px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $dc['tag'] }}</span>
                                <span class="inline-block px-3 py-0.5 rounded-full bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] text-[var(--color-text-light)] text-xs">{{ $dc['seat'] }}</span>
                            </div>

                            <p class="text-[var(--color-text-muted)] text-sm mb-5 leading-relaxed">{{ $dc['desc'] }}</p>

                            <div class="mb-5">
                                <p class="text-[var(--color-text-muted)] text-xs uppercase tracking-wider font-semibold mb-3">Fitur Unggulan:</p>
                                <ul class="flex flex-col gap-2">
                                    @foreach ($dc['features'] as $feat)
                                        <li class="flex items-center gap-2.5 text-[var(--color-text-light)] text-xs">
                                            <span class="text-[var(--color-accent)] font-bold">✓</span>
                                            <span>{{ $feat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mb-6 p-4 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.06)] border border-[rgba(124,58,237,0.2)]">
                                <p class="text-[var(--color-text-muted)] text-xs uppercase tracking-wider font-semibold mb-2">Terbaik untuk:</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($dc['best_for'] as $use)
                                        <span class="px-2 py-1 rounded bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-xs">{{ $use }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya ketersediaan & harga Sewa '.$dc['name'].' di Surabaya.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Tanya Harga {{ $dc['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 p-6 rounded-[var(--radius-xl)] bg-[rgba(124,58,237,0.06)] border border-[rgba(124,58,237,0.2)] text-center">
                <p class="text-white font-semibold text-base mb-2">Tidak menemukan tipe yang dicari?</p>
                <p class="text-[var(--color-text-muted)] text-sm mb-4">Ketersediaan armada double cabin tergantung stok dan jadwal. Hubungi kami langsung untuk konfirmasi unit yang tersedia serta tipe lain yang mungkin ada.</p>
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya ketersediaan armada Double Cabin di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-7 py-3 rounded-[32px] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white"
                   target="_blank" rel="noopener noreferrer">
                    💬 Tanya Ketersediaan via WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- DESTINASI ADVENTURE --}}
    <section class="py-[90px]" id="destinasi">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Destinasi Favorit</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Destinasi Petualangan dari Surabaya <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Terbaik dengan Double Cabin</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Armada double cabin 4WD kami telah menjelajahi semua medan ini. Driver kami hafal setiap tikungan, jalur alternatif, dan waktu terbaik untuk berkunjung.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 max-lg:grid-cols-2 max-sm:grid-cols-1">
                @foreach ($destinasiAdventure as [$icon, $dest, $duration, $desc])
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 hover:border-[var(--color-accent)] hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl mb-3">{{ $icon }}</div>
                        <h3 class="text-white font-bold text-base mb-1">{{ $dest }}</h3>
                        <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">🕐 {{ $duration }}</p>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin sewa mobil Double Cabin dari Surabaya untuk destinasi wisata alam.') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_20px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                   target="_blank" rel="noopener noreferrer">
                    🗺️ Rencanakan Perjalanan via WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- USE CASES --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="peruntukan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Peruntukan Layanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Untuk Apa Saja <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Double Cabin</span> di Surabaya?
                </h2>
            </div>

            <div class="grid grid-cols-2 gap-6 max-md:grid-cols-1">
                @foreach ([
                    ['🧗', 'Ekspedisi & Wisata Alam Ekstrem', 'Bromo sunrise jeep, trekking Ijen, Semeru base camp, Baluran safari — medan berat yang hanya bisa ditaklukkan oleh armada 4WD bertenaga tinggi.', 'Toyota Hilux / Triton 4WD'],
                    ['🏗️', 'Survei Lapangan & Site Visit Korporasi', 'Kunjungan ke area tambang, perkebunan, proyek konstruksi, atau lokasi terpencil yang tidak bisa dijangkau kendaraan biasa.', 'Semua Tipe Double Cabin'],
                    ['📸', 'Photography & Videografi Alam Profesional', 'Membawa peralatan kamera, drone, tripod, dan perlengkapan studio — bak belakang double cabin adalah solusi terbaik.', 'Ford Ranger / Triton'],
                    ['🎿', 'Adventure Tour & Outdoor Team Building', 'Sewa armada double cabin untuk kegiatan outbound korporasi, team building outdoor, atau adventure tour eksklusif.', 'Toyota Hilux / Triton'],
                    ['🚜', 'Transportasi Logistik + Penumpang', 'Kombinasi unik double cabin: 4–5 penumpang di kabin + muatan di bak belakang untuk operasional lapangan yang efisien.', 'Semua Tipe Double Cabin'],
                    ['🌿', 'Eco-Tourism & Agro-Wisata', 'Kunjungan ke kebun teh, kebun kopi, agro-wisata, atau area konservasi alam di seluruh Jawa Timur.', 'Toyota Hilux / Triton'],
                ] as [$icon, $title, $desc, $note])
                    <div class="flex items-start gap-5 p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[rgba(124,58,237,0.4)] transition-all duration-300">
                        <div class="text-3xl flex-shrink-0 w-14 h-14 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                        <div>
                            <h3 class="text-white font-bold text-base mb-2">{{ $title }}</h3>
                            <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-3">{{ $desc }}</p>
                            <span class="inline-block px-3 py-1 rounded-full bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-[var(--color-accent)] text-xs">
                                🚗 {{ $note }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- KEUNGGULAN & STANDAR LAYANAN --}}
    <section class="py-[90px]" id="keunggulan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-start max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Standar Layanan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Kenapa Sewa Double Cabin di <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>?
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Bukan sekadar menyewakan kendaraan — kami menghadirkan pengalaman perjalanan adventure yang aman, nyaman, dan berkesan:
                    </p>

                    <div class="flex flex-col gap-4 text-sm">
                        @foreach ([
                            ['01.', 'Driver Berpengalaman Off-Road Jatim', 'Driver kami bukan hanya hafal jalan — mereka berpengalaman melewati medan ekstrem Bromo, Ijen, Semeru, dan seluruh jalur alam Jawa Timur dengan aman.'],
                            ['02.', 'Armada Siap Medan Berat', 'Setiap unit double cabin melalui pengecekan 4WD, ban, rem, mesin diesel, dan ground clearance sebelum keberangkatan — tidak ada kompromi soal keamanan.'],
                            ['03.', 'Perlengkapan Emergency Tersedia', 'Unit dilengkapi dongkrak, ban serep, tali derek, dan kotak P3K sebagai standar perlengkapan perjalanan off-road yang bertanggung jawab.'],
                            ['04.', 'Fleksibel untuk Semua Kebutuhan', 'Dari perjalanan harian wisata hingga ekspedisi multi-hari — kami menyediakan paket yang bisa disesuaikan sepenuhnya dengan kebutuhan Anda.'],
                        ] as [$num, $title, $desc])
                            <div class="flex items-start gap-3 pb-4 border-b border-[var(--color-border)] last:border-0 last:pb-0">
                                <span class="text-[var(--color-accent)] font-bold text-lg flex-shrink-0">{{ $num }}</span>
                                <div>
                                    <strong class="text-white block mb-0.5 text-sm">{{ $title }}</strong>
                                    <span class="text-xs text-[var(--color-text-muted)] leading-relaxed">{{ $desc }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    {{-- Fasilitas card --}}
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7">
                        <h3 class="text-white font-bold text-base mb-5">Fasilitas Standar Armada Double Cabin</h3>
                        <div class="grid grid-cols-1 gap-3">
                            @foreach ([
                                ['🔩', 'Sistem 4WD — Siap Segala Medan'],
                                ['❄️', 'AC Kabin Penuh — Dingin & Nyaman'],
                                ['💺', 'Jok Empuk Kabin Ganda (4–5 Penumpang)'],
                                ['📦', 'Bak Belakang Luas — Muat Logistik & Koper'],
                                ['⛽', 'Mesin Diesel Bertenaga Besar & Efisien'],
                                ['🛡️', 'Perlengkapan Emergency Off-Road'],
                                ['👨‍✈️', 'Driver Off-Road Expert Berpengalaman'],
                                ['🍎', 'Gratis Air Mineral & Snack (Hari Pertama)'],
                            ] as [$icon, $feat])
                                <div class="flex items-center gap-3 text-[var(--color-text-light)] text-sm">
                                    <span class="text-lg">{{ $icon }}</span>
                                    <span>{!! $feat !!}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- CTA consultation card --}}
                    <div class="bg-[var(--gradient-card)] border border-[rgba(34,211,238,0.25)] rounded-[var(--radius-xl)] p-7 text-center">
                        <span class="text-4xl block mb-3">🏔️</span>
                        <h3 class="text-white font-bold text-base mb-2">Siap Rencanakan Ekspedisi Anda?</h3>
                        <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-5">Tim kami siap membantu merencanakan rute, memilih unit terbaik, dan memastikan perjalanan adventure Anda aman &amp; berkesan.</p>
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi rencana perjalanan dengan sewa Double Cabin dari Surabaya.') }}"
                           class="block py-3.5 rounded-[var(--radius-xl)] font-bold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Konsultasi Gratis via WhatsApp
                        </a>
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
                <h2 class="text-white text-2xl font-bold">4 Langkah Mudah Sewa Double Cabin dari Surabaya</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Chat WhatsApp</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Sampaikan tujuan perjalanan, tanggal, jumlah penumpang, dan muatan yang dibawa untuk rekomendasi unit terbaik.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">🏔️</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Tipe Double Cabin</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tentukan unit: Hilux, Triton, atau Ranger — tim kami bantu pilih sesuai medan, kapasitas, dan kebutuhan Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Bayar DP untuk mengamankan jadwal dan memastikan armada siap di hari keberangkatan Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Siap Berangkat!</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Driver off-road expert &amp; double cabin siap menjemput di lokasi Anda — petualangan mewah dimulai!</p>
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
                    Cerita Mereka Bersama <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
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
                <h2 class="text-white text-2xl font-bold">FAQ Sewa Mobil Double Cabin Surabaya</h2>
            </div>

            <div class="flex flex-col gap-4">
                @foreach ([
                    [
                        'q' => 'Apa itu mobil double cabin dan apa bedanya dengan pick-up biasa?',
                        'a' => 'Mobil double cabin adalah pick-up berkabin ganda dengan 4 pintu penuh dan 2 baris kursi seperti sedan/SUV, sehingga mampu membawa 4–5 penumpang secara nyaman. Berbeda dari pick-up kabin tunggal yang hanya punya 1 baris kursi. Double cabin juga umumnya dilengkapi 4WD dan mesin diesel bertenaga tinggi.',
                    ],
                    [
                        'q' => 'Apakah sewa double cabin di Surabaya sudah include driver?',
                        'a' => 'Ya, 100% include driver profesional berpengalaman. Driver kami tidak hanya hafal rute Surabaya, tetapi juga berpengalaman mengoperasikan kendaraan 4WD di medan off-road Jawa Timur seperti Bromo, Ijen, dan jalur pegunungan lainnya.',
                    ],
                    [
                        'q' => 'Apakah double cabin bisa digunakan untuk medan off-road berat seperti Bromo?',
                        'a' => 'Tentu. Itulah kelebihan utama double cabin dibanding kendaraan biasa — sistem 4WD dengan pengunci diferensial, ground clearance tinggi, mesin diesel bertorsi besar, dan ban khusus menjadikan armada ini pilihan terbaik untuk medan berbatu, berpasir, berlumpur, dan menanjak tajam.',
                    ],
                    [
                        'q' => 'Berapa kapasitas penumpang dan bagasi mobil double cabin?',
                        'a' => 'Kabin double cabin menampung 4–5 penumpang dengan nyaman (termasuk driver). Untuk bagasi, selain ruang kabin, bak belakang yang luas dapat memuat koper besar, perlengkapan camping, peralatan fotografi, atau logistik lapangan sesuai kebutuhan.',
                    ],
                    [
                        'q' => 'Destinasi mana saja yang direkomendasikan menggunakan double cabin dari Surabaya?',
                        'a' => 'Destinasi paling populer: Gunung Bromo (lewat jalur Tosari/Coban), Kawah Ijen Banyuwangi, Taman Nasional Baluran, Pantai Pulau Merah, jalur agro-wisata Malang-Batu, dan berbagai area konservasi alam di Jawa Timur yang memerlukan kendaraan bertenaga tinggi.',
                    ],
                    [
                        'q' => 'Apakah tersedia paket sewa double cabin multi-hari untuk ekspedisi panjang?',
                        'a' => 'Tersedia. Kami menyediakan paket 1 hari, 2 hari, hingga seminggu atau lebih untuk ekspedisi panjang. Harga per hari paket multi-hari biasanya lebih kompetitif. Hubungi kami via WhatsApp untuk simulasi biaya dan rute perjalanan Anda.',
                    ],
                    [
                        'q' => 'Bagaimana cara pesan sewa mobil double cabin di Surabaya?',
                        'a' => 'Cukup hubungi kami via WhatsApp — sampaikan tanggal keberangkatan, tujuan perjalanan, jumlah penumpang, dan muatan yang dibawa. Tim kami akan merekomendasikan unit terbaik, konfirmasi ketersediaan, dan detail harga secara transparan.',
                    ],
                ] as $faq)
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
                ✦ Petualangan Mewah Dimulai dari Sini
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Siap Sewa Mobil Double Cabin di Surabaya?
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[620px] mx-auto leading-relaxed">
                Dari jalanan kota Surabaya hingga medan off-road paling menantang di Jawa Timur — armada double cabin &amp; driver expert kami siap menemani setiap perjalanan Anda.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking Sewa Mobil Double Cabin di Surabaya untuk perjalanan mewah / adventure.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (Sepanjang Hari)
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
