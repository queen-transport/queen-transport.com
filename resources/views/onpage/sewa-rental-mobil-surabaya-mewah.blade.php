<?php

use function Laravel\Folio\name;

name('sewa-rental-mobil-surabaya-mewah');
?>

@php
$faqs = [
    [
        'q' => 'Apa perbedaan sewa dan rental mobil mewah di Surabaya?',
        'a' => 'Secara praktis keduanya berarti sama — menyewa kendaraan untuk jangka waktu tertentu. Istilah "rental" lebih mengacu pada layanan jangka pendek harian/jam, sementara "sewa" lebih luas. Di Queen Transport, keduanya kami layani: baik sewa harian, paket half-day, maupun multi-hari dengan armada mewah lengkap beserta driver profesional.',
    ],
    [
        'q' => 'Berapa tarif rental mobil mewah di Surabaya per hari?',
        'a' => 'Tarif rental mobil mewah di Surabaya bervariasi sesuai tipe armada. Mulai dari Toyota Innova Zenix Hybrid, Fortuner VRZ/GR Sport, Hiace Premio VIP 9 Captain Seat, Toyota Alphard Gen 2/3/4 Hybrid, hingga Vellfire. Semua harga sudah termasuk driver profesional. Hubungi kami via WhatsApp untuk penawaran terkini.',
    ],
    [
        'q' => 'Armada mewah apa saja yang tersedia untuk disewa di Surabaya?',
        'a' => 'Koleksi armada mewah kami mencakup: Toyota Alphard Gen 2, Alphard Transformer (Gen 3), All New Alphard Hybrid (Gen 4), Toyota Hiace Premio VIP 9 Captain Seat, Toyota Fortuner VRZ & GR Sport, Toyota Innova Zenix Hybrid, dan Mitsubishi Xpander Ultimate.',
    ],
    [
        'q' => 'Apakah rental mobil mewah di Surabaya sudah include driver?',
        'a' => 'Ya, 100% include driver profesional. Driver kami telah melalui seleksi ketat, berpengalaman melayani tamu VIP, eksekutif, dan pejabat. Berpenampilan rapi, komunikatif, hafal rute Surabaya dan destinasi Jawa Timur.',
    ],
    [
        'q' => 'Bisakah rental mobil mewah untuk acara pernikahan (Wedding Car) di Surabaya?',
        'a' => 'Tentu! Toyota Alphard adalah pilihan terpopuler untuk Wedding Car di Surabaya. Tersedia dengan dekorasi bunga eksklusif, pita, dan driver formal berpenampilan rapi untuk momen pernikahan yang berkesan.',
    ],
    [
        'q' => 'Apakah bisa rental mobil mewah untuk perjalanan luar kota dari Surabaya?',
        'a' => 'Sangat bisa. Kami melayani perjalanan luar kota ke seluruh Jawa Timur (Malang, Bromo, Batu, Banyuwangi), Jawa Tengah (Solo, Yogyakarta, Semarang), hingga Overland Bali. Tersedia paket multi-hari dengan harga kompetitif.',
    ],
    [
        'q' => 'Apakah tersedia layanan rental mobil mewah untuk penjemputan VIP di Bandara Juanda?',
        'a' => 'Tersedia 24 jam. Kami melayani transfer VIP dari/ke Bandara Internasional Juanda (SUB) Surabaya lengkap dengan papan nama penjemputan (greeting board) bila diperlukan, bagasi handling, dan armada mewah siap di terminal.',
    ],
    [
        'q' => 'Bagaimana cara memesan rental mobil mewah di Surabaya?',
        'a' => 'Pesan sangat mudah via WhatsApp. Informasikan tanggal, lokasi penjemputan, tujuan, dan tipe kendaraan mewah yang diinginkan. Tim CS kami respons cepat, konfirmasi ketersediaan, dan siapkan dokumen pemesanan.',
    ],
];

$armadaService   = app(\App\Contracts\ArmadaServiceInterface::class);
$kelasAtasPrices = $armadaService->getKelasAtasPrices();
$alphardPrices   = $armadaService->getAlphardPrices();
$pelanggans      = $armadaService->getPelanggans();

$title       = 'Sewa Rental Mobil Mewah Surabaya — Alphard, Fortuner, Hiace Premio VIP + Driver | ' . config('site.brand');
$description = 'Sewa & rental mobil mewah Surabaya terbaik ✓ Toyota Alphard, Fortuner, Innova Zenix, Hiace Premio VIP ✓ Include driver profesional standar VIP ✓ Wedding car, dinas, wisata & bandara Juanda. Harga transparan!';
@endphp

<x-layouts::public :title="$title" :description="$description">

    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Mobil Mewah Surabaya — Standar VIP &amp; Eksekutif
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa &amp; Rental Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Alphard &bull; Vellfire &bull; Fortuner &bull; Hiace Premio VIP &bull; Innova Zenix
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Rasakan standar rental mobil mewah sesungguhnya di Surabaya. Armada premium terlengkap — dari Toyota Alphard Transformer hingga Hiace Premio VIP 9 Captain Seat — semua dalam kondisi prima, kabin eksklusif, dan dilayani driver profesional berpenampilan rapi.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & booking Rental Mobil Mewah di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Booking Mobil Mewah Sekarang
                        </a>
                        <a href="#katalog-mewah"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            💎 Lihat Koleksi Armada
                        </a>
                    </div>
                </div>

                {{-- Hero card --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">💎</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Armada Premium Terlengkap</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Standar Layanan Mewah {{ config('site.brand') }}</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Setiap detail dirancang untuk memberikan pengalaman perjalanan terbaik — selayaknya layanan first-class.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Driver Profesional</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Eksklusif</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kabin Luxury</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Terlengkap</div>
                                <div class="text-[var(--color-text-muted)] text-xs">6 Tipe Armada Mewah</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">24 Jam</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Layanan &amp; CS Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TRUST BADGES --}}
    <section class="py-8 border-y border-[var(--color-border)] bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👔</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Standar VIP</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Berseragam rapi, terlatih &amp; profesional</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💺</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Interior Luxury</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Captain seat, kabin senyap, full AC</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🛡️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Armada Prima &amp; Terawat</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Servis rutin bengkel resmi Toyota</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">⭐</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Terpercaya &amp; Berpengalaman</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Ratusan klien VIP &amp; korporasi puas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ARMADA CATALOG --}}
    <div id="katalog-mewah">
        <x-armada-list
            subtitle="Koleksi Armada Premium"
            title="Katalog Rental Mobil Mewah Surabaya"
            description="Pilihan armada mewah terlengkap di Surabaya — Toyota Alphard, Hiace Premio VIP, Fortuner, Innova Zenix Hybrid — semua include driver profesional standar VIP."
            wa-text="rental mobil mewah di Surabaya"
        />
    </div>

    {{-- FLEET SHOWCASE — PER KATEGORI --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="armada-kategori">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Kategori Armada</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pilih <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Armada Mewah</span> Sesuai Kebutuhan
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Setiap kategori armada dirancang untuk kebutuhan yang berbeda — dari VIP eksekutif, rombongan premium, hingga wedding car paling prestisius.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach ([
                    [
                        'emoji' => '👑',
                        'name'  => 'Toyota Alphard / Vellfire',
                        'tag'   => 'MPV Ultra Premium',
                        'badge' => 'Paling Diminati',
                        'desc'  => 'Raja MPV mewah Indonesia. Dengan kabin senyap kelas jet, captain seat selimut bulu angsa, dan aura prestisius — Alphard adalah pilihan #1 untuk tamu VIP, wedding car, dan kunjungan pejabat.',
                        'uses'  => ['Mobil Pengantin Mewah', 'Jemput Tamu VIP / Pejabat', 'Transfer Bandara First Class', 'Ulang Tahun &amp; Acara Gala'],
                    ],
                    [
                        'emoji' => '🏔️',
                        'name'  => 'Toyota Fortuner VRZ / GR Sport',
                        'tag'   => 'SUV Premium 4x4',
                        'badge' => 'SUV Favorit',
                        'desc'  => 'SUV tangguh berpenampilan gagah yang mampu menaklukkan medan apapun. Ground clearance tinggi, kabin lega 7 penumpang, dan tampilan sport yang memberi kesan dominan dan percaya diri.',
                        'uses'  => ['Wisata Alam &amp; Off-Road', 'Perjalanan Dinas Eksekutif', 'Konvoi Rombongan Keluarga', 'Bromo, Ijen, Semeru Tour'],
                    ],
                    [
                        'emoji' => '🚐',
                        'name'  => 'Hiace Premio VIP 9 Captain Seat',
                        'tag'   => 'Van Premium Rombongan',
                        'badge' => 'Terbaik Rombongan',
                        'desc'  => 'Minibus premium untuk rombongan kecil yang tidak ingin mengorbankan kenyamanan. 9 captain seat lega dengan kabin semi-bonnet yang jauh lebih senyap — pilihan tepat untuk perjalanan rombongan VIP.',
                        'uses'  => ['Direksi &amp; Manajemen Tour', 'Rombongan Tamu VVIP', 'Shuttle Wisata Premium', 'Konferensi &amp; Retreat'],
                    ],
                ] as $cat)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 hover:border-[var(--color-accent)] hover:-translate-y-1 transition-all duration-300">
                        @if (!empty($cat['badge']))
                            <span class="absolute -top-3.5 right-6 px-4 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold shadow-md">
                                {{ $cat['badge'] }}
                            </span>
                        @endif

                        <div class="text-4xl mb-4">{{ $cat['emoji'] }}</div>
                        <h3 class="text-white text-xl font-bold mb-1">{{ $cat['name'] }}</h3>
                        <span class="inline-block mb-4 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">{{ $cat['tag'] }}</span>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">{{ $cat['desc'] }}</p>

                        <div class="border-t border-[var(--color-border)] pt-5">
                            <p class="text-[var(--color-text-muted)] text-xs mb-3 uppercase tracking-wider font-semibold">Cocok untuk:</p>
                            <ul class="flex flex-col gap-2">
                                @foreach ($cat['uses'] as $use)
                                    <li class="flex items-center gap-2 text-[var(--color-text-light)] text-xs">
                                        <span class="text-[var(--color-accent)]">✓</span>
                                        <span>{!! $use !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin rental ' . $cat['name'] . ' di Surabaya. Mohon info ketersediaan & harga.') }}"
                           class="mt-6 block text-center py-3 rounded-[var(--radius-xl)] font-semibold text-xs no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Tanya Ketersediaan
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Other armadas --}}
            <div class="mt-10 grid grid-cols-3 gap-6 max-md:grid-cols-1">
                @foreach ([
                    ['⚡', 'Toyota Innova Zenix Hybrid', 'MPV Hybrid Modern', 'Teknologi hybrid terbaru, kabin lega 7 penumpang, mesin lebih efisien & senyap. Cocok untuk perjalanan dinas jarak sedang.'],
                    ['🌟', 'Toyota Innova Reborn V/Q', 'MPV Premium Klasik', 'Armada andalan perjalanan dinas, tamu instansi, dan wisata keluarga dengan kenyamanan teruji dan reliability tinggi.'],
                    ['💨', 'Mitsubishi Xpander Ultimate', 'MPV Modern Stylish', 'Desain modern dengan kabin lapang, suspensi halus, dan fitur lengkap. Alternatif premium yang efisien untuk 7 penumpang.'],
                ] as [$emoji, $name, $tag, $desc])
                    <div class="flex items-start gap-4 p-5 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[rgba(124,58,237,0.4)] transition-all">
                        <span class="text-3xl flex-shrink-0">{{ $emoji }}</span>
                        <div>
                            <h4 class="text-white font-bold text-sm mb-0.5">{{ $name }}</h4>
                            <span class="inline-block mb-2 px-2 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs">{{ $tag }}</span>
                            <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PRICING SECTION --}}
    @if (!empty($kelasAtasPrices))
    <section class="py-[90px]" id="harga">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Transparansi Harga</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif Rental <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mobil Mewah Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga kompetitif, transparan, tanpa biaya tersembunyi. Semua tarif sudah termasuk driver profesional untuk area Surabaya &amp; sekitarnya.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-1">
                @foreach (array_slice($kelasAtasPrices, 0, 3) as $price)
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 hover:border-[var(--color-accent)] hover:shadow-[0_10px_30px_rgba(124,58,237,0.25)]">
                        @if ($price['badge'])
                            <span class="absolute -top-3.5 right-6 px-4 py-1 rounded-full bg-[image:var(--gradient-btn)] text-white text-xs font-bold shadow-md">
                                {{ $price['badge'] }}
                            </span>
                        @endif

                        <div>
                            <div class="mb-4">
                                <h3 class="text-white text-xl font-bold">{{ $price['name'] }}</h3>
                                <span class="inline-block mt-1 px-3 py-0.5 rounded-full bg-[rgba(34,211,238,0.1)] text-[var(--color-accent)] text-xs font-semibold">
                                    {{ $price['seat'] }}
                                </span>
                            </div>

                            <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">{{ $price['desc'] }}</p>

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

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin rental ' . $price['name'] . ' di Surabaya. Mohon info ketersediaan & penawaran terbaik.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Rental {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>

            <p class="text-center text-[var(--color-text-muted)] text-xs mt-8">
                * Harga belum termasuk BBM, tol, &amp; parkir. Untuk perjalanan luar kota &amp; multi-hari tersedia paket khusus — hubungi tim kami untuk penawaran terbaik.
            </p>
        </div>
    </section>
    @endif

    {{-- USE CASES SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="peruntukan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Peruntukan Layanan</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Rental Mobil Mewah Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Setiap Momen Penting</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Dari acara sekali seumur hidup hingga kebutuhan operasional harian korporasi — kami hadir dengan armada dan layanan terbaik.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-6 max-md:grid-cols-1">
                @foreach ([
                    ['💍', 'Wedding Car &amp; Seserahan Mewah', 'Jadikan hari pernikahan Anda semakin berkesan dengan Toyota Alphard berlapis hiasan bunga eksklusif, pita pengantin, dan driver berpenampilan formal. Tersedia paket half-day maupun full-day.', 'Alphard Gen 2, 3, 4 Hybrid'],
                    ['👔', 'Kunjungan Dinas &amp; Tamu VIP Korporasi', 'Sambut direksi, pejabat, delegasi luar negeri, dan tamu kehormatan dengan standar penjemputan berkelas. Armada mewah dengan driver terlatih protokoler.', 'Alphard, Fortuner, Innova Zenix'],
                    ['✈️', 'Transfer VIP Bandara Juanda (SUB)', 'Penjemputan tepat waktu di Terminal 1 & 2 Juanda. Tersedia greeting board, bagasi handling, dan konfirmasi langsung via WhatsApp saat penumpang landing.', 'Semua Armada Tersedia'],
                    ['🏝️', 'Wisata Mewah Jawa Timur &amp; Bali', 'Perjalanan ke Bromo, Malang-Batu, Banyuwangi, hingga Bali Overland dengan armada mewah dan driver wisata berpengalaman. Paket 1–7 hari tersedia.', 'Alphard, Fortuner, Hiace Premio VIP'],
                    ['🎓', 'Wisuda, Ulang Tahun &amp; Gathering VIP', 'Kehadiran Anda di acara spesial semakin berkesan dengan mobil mewah pilihan. Tersedia paket per jam maupun seharian penuh untuk berbagai kebutuhan acara.', 'Alphard, Fortuner, Innova'],
                    ['🏢', 'Shuttle Eksekutif &amp; Corporate Mobility', 'Layanan antar-jemput harian karyawan eksekutif, manajerial, dan tamu korporasi dengan armada berstandar tinggi dan jadwal yang dapat disesuaikan.', 'Alphard, Hiace Premio VIP, Innova Zenix'],
                ] as [$icon, $title, $desc, $note])
                    <div class="flex items-start gap-5 p-6 rounded-[var(--radius-xl)] bg-[var(--gradient-card)] border border-[var(--color-border)] hover:border-[rgba(124,58,237,0.4)] transition-all duration-300">
                        <div class="text-3xl flex-shrink-0 w-14 h-14 rounded-[var(--radius-lg)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">
                            {!! $icon !!}
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-base mb-2">{!! $title !!}</h3>
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

    {{-- KEUNGGULAN SECTION --}}
    <section class="py-[90px]" id="keunggulan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Mengapa Memilih Kami</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Standar Rental Mobil Mewah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Kami tidak sekadar menyewakan kendaraan — kami menghadirkan pengalaman perjalanan premium yang menyeluruh dari proses pemesanan hingga Anda tiba di tujuan:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['🔑', 'Armada Selalu Siap &amp; Terawat', 'Setiap unit melalui pengecekan mesin, kebersihan, dan kelengkapan sebelum digunakan. Servis rutin di bengkel resmi Toyota tanpa pernah kami tunda.'],
                            ['👨‍✈️', 'Driver Terlatih Standar Protokoler', 'Driver kami telah melalui seleksi ketat: penampilan rapi, komunikatif dalam bahasa Indonesia &amp; Inggris dasar, mengerti protokol tamu VIP.'],
                            ['📦', 'Transparansi Harga Tanpa Kejutan', 'Tarif yang kami berikan sudah final untuk wilayah Surabaya &amp; sekitarnya. Tidak ada biaya tersembunyi — semua sudah kami jelaskan di awal.'],
                            ['🕐', 'Ketepatan Waktu adalah Prioritas', 'Kami memastikan driver sudah standby di lokasi Anda 10–15 menit sebelum jadwal. Terlambat bukan bagian dari layanan kami.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4 p-4 rounded-[var(--radius-lg)] bg-[var(--gradient-card)] border border-[var(--color-border)]">
                                <div class="text-2xl flex-shrink-0 w-11 h-11 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1 text-sm">{!! $title !!}</h4>
                                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="bg-[var(--gradient-card)] border border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8">
                        <h3 class="text-white text-lg font-bold mb-6 border-b border-[var(--color-border)] pb-4">Fasilitas Standar Semua Armada Mewah</h3>

                        <div class="grid grid-cols-1 gap-4 mb-8">
                            @foreach ([
                                ['👔', 'Driver Profesional Berpenampilan Rapi'],
                                ['❄️', 'Full AC — Dingin Merata ke Seluruh Kabin'],
                                ['💺', 'Captain Seat / Reclining Seat Premium'],
                                ['🧹', 'Kabin Steril, Wangi, Bebas Asap Rokok'],
                                ['🍎', 'Gratis Snack, Buah &amp; Air Mineral (Hari Pertama)'],
                                ['🔌', 'Port Charger USB &amp; Power Tersedia'],
                                ['🛡️', 'Asuransi Perjalanan Standar'],
                                ['📞', 'CS WhatsApp Aktif 24 Jam'],
                            ] as [$icon, $feat])
                                <div class="flex items-center gap-3 text-[var(--color-text-light)]">
                                    <span class="text-xl w-8 flex-shrink-0">{{ $icon }}</span>
                                    <span class="text-sm">{!! $feat !!}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm block mb-3">Butuh Paket Luar Kota atau Multi-Hari?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi paket rental mobil mewah luar kota / multi-hari dari Surabaya.') }}"
                               class="inline-block py-2.5 px-6 bg-[image:var(--gradient-btn)] text-white rounded-[var(--radius-xl)] font-semibold text-xs no-underline"
                               target="_blank" rel="noopener noreferrer">
                                💬 Minta Penawaran Khusus
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
                <h2 class="text-white text-2xl font-bold">Proses Rental Mobil Mewah di Surabaya yang Mudah</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm max-w-[500px] mx-auto">Tidak perlu aplikasi khusus atau proses yang rumit — cukup WhatsApp dan armada mewah Anda siap.</p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Chat via WhatsApp</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Hubungi tim kami dan sampaikan tanggal, lokasi jemput, tujuan, serta tipe mobil mewah yang Anda inginkan.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">💎</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Armada Mewah</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tim kami membantu mencarikan armada paling sesuai dengan kebutuhan, jumlah tamu, dan anggaran Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Bayar DP ke rekening resmi kami untuk mengunci ketersediaan armada. Pelunasan fleksibel sesuai kesepakatan.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Driver &amp; Armada Siap</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Armada mewah bersih &amp; driver berseragam rapi tiba di lokasi Anda 10–15 menit sebelum jadwal keberangkatan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    @if ($pelanggans->isNotEmpty())
    <section class="py-[90px] border-t border-[var(--color-border)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Ulasan Klien VIP</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Pengalaman <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Pelanggan Kami</span>
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
                            <p class="text-[var(--color-text-muted)] text-xs">{{ $pelanggan->title ?? 'Pelanggan VIP' }}</p>
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
                <h2 class="text-white text-2xl font-bold">FAQ Sewa &amp; Rental Mobil Mewah Surabaya</h2>
                <p class="text-[var(--color-text-muted)] mt-3 text-sm">Temukan jawaban atas pertanyaan seputar layanan rental mobil mewah kami di Surabaya.</p>
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
                ✦ Reservasi Rental Mobil Mewah Surabaya
            </span>
            <h2 class="text-white text-[clamp(2rem,3.5vw,3rem)] font-bold mb-6 leading-tight">
                Siap Rasakan Perjalanan Berkelas di Surabaya?
            </h2>
            <p class="text-[var(--color-text-muted)] text-base mb-8 max-w-[620px] mx-auto leading-relaxed">
                Hubungi tim {{ config('site.brand') }} sekarang. Konsultasi gratis, harga transparan, dan armada mewah siap melayani Anda kapanpun di Surabaya.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking rental mobil mewah di Surabaya.') }}"
                   class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_30px_rgba(124,58,237,0.5)] hover:scale-105 transition-all"
                   target="_blank" rel="noopener noreferrer">
                    💬 Hubungi CS via WhatsApp (24 Jam)
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
