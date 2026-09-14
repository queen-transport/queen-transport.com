<?php

use function Laravel\Folio\name;

name('sewa-hiace-surabaya');
?>

@php
use App\Services\ArmadaService;

$armadaService = app(ArmadaService::class);
extract($armadaService->getHiacePageData());

$title = 'Sewa Hiace Surabaya Murah & Premio Luxury + Driver — ' . config('site.brand');
$description = 'Sewa Hiace Surabaya termurah & terbaik (Commuter, Premio Standard, Premio Luxury 9-14 seat) include driver profesional. Layanan sepanjang hari untuk wisata, dinas, event & airport Juanda.';
@endphp

<x-layouts::public :title="$title" :description="$description">
    {{-- HERO SECTION --}}
    <section class="relative min-h-[75vh] flex items-center pt-12 pb-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">
                        ✦ Rental Hiace Surabaya #1 Premium
                    </div>

                    <h1 class="text-[clamp(2.2rem,4.5vw,3.6rem)] font-bold leading-[1.15] tracking-[0.03em] text-white">
                        Sewa Hiace <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Surabaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.8rem] tracking-[0.2em] uppercase font-semibold">
                        ✦ Hiace Commuter &bull; Premio Standard &bull; Premio Luxury VIP
                    </p>

                    <p class="text-[var(--color-text-light)] text-base leading-relaxed max-w-[540px]">
                        Solusi terbaik persewaan van &amp; minibus di Surabaya. Nikmati perjalanan rombongan yang nyaman, aman, dan berkelas bersama driver profesional kami ke seluruh wilayah Jawa Timur hingga Bali.
                    </p>

                    <div class="flex gap-4 flex-wrap mt-2">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi & pesan Sewa Hiace di Surabaya') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.4)] transition-all hover:scale-105"
                           target="_blank" rel="noopener noreferrer">
                            💬 Pesan Hiace Sekarang
                        </a>
                        <a href="#tipe-hiace"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)] hover:bg-[rgba(34,211,238,0.1)] transition-all">
                            📋 Lihat Tipe & Harga
                        </a>
                    </div>
                </div>

                {{-- Feature highlight card on Hero right side --}}
                <div class="relative flex justify-center">
                    <div class="w-full max-w-[460px] bg-[var(--gradient-card)] border-2 border-[rgba(124,58,237,0.3)] rounded-[var(--radius-xl)] p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)]">
                        <div class="flex items-center justify-between border-b border-[var(--color-border)] pb-4 mb-6">
                            <span class="text-3xl">🚐</span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] text-xs font-bold tracking-wider uppercase">Unit Siap Jalan</span>
                        </div>

                        <h3 class="text-white text-xl font-bold mb-2">Kenapa Pilih Hiace {{ config('site.brand') }}?</h3>
                        <p class="text-[var(--color-text-muted)] text-sm mb-6 leading-relaxed">
                            Pilihan paling favorit untuk perjalanan wisata keluarga, rombongan dinas instansi, hingga tamu VIP.
                        </p>

                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">9 &ndash; 14</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Kapasitas Kursi</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">100%</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Include Driver</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-base mb-0.5">Sepanjang Hari</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Respon Cepat</div>
                            </div>
                            <div class="p-3 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)]">
                                <div class="text-[var(--color-accent)] font-bold text-lg mb-0.5">GRATIS</div>
                                <div class="text-[var(--color-text-muted)] text-xs">Snack & Air Mineral</div>
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
                    <span class="text-3xl">❄️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Full AC Double Blower</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Dingin merata ke setiap baris</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">💺</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Reclining Seats</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Kursi empuk bisa direbahkan</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">👨‍✈️</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Driver Berpengalaman</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Ramah &amp; ramah rute wisata</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-3xl">🧹</span>
                    <div>
                        <h4 class="text-white font-bold text-sm">Kabin Bersih &amp; Wangi</h4>
                        <p class="text-[var(--color-text-muted)] text-xs">Disanitasi sebelum berangkat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRICING & TYPES SECTION --}}
    <section class="py-[90px]" id="tipe-hiace">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center mb-14">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Pilihan Unit &amp; Harga</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold">
                    Tarif <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Hiace Surabaya</span>
                </h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3 text-sm">
                    Harga terjangkau dengan kondisi armada terbaik. Semua paket sewa sudah termasuk jasa driver profesional.
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

                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya berminat sewa unit ' . $price['name'] . ' di Surabaya. Mohon info ketersediaan dan detail penawaran.') }}"
                           class="w-full text-center py-3.5 rounded-[var(--radius-xl)] font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-md hover:opacity-95 transition-opacity"
                           target="_blank" rel="noopener noreferrer">
                            💬 Sewa {{ $price['name'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- HIACE FLEET FROM DATABASE IF AVAILABLE --}}
    @if ($hiaceArmadas->isNotEmpty())
        <section class="py-[80px] bg-[var(--color-bg-2)]">
            <div class="max-w-[1200px] mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Katalog Armada</span>
                    <h2 class="text-white text-2xl font-bold">Detail Unit Toyota Hiace Ready</h2>
                </div>

                <div class="grid grid-cols-3 gap-6 max-md:grid-cols-1">
                    @foreach ($hiaceArmadas as $armada)
                        <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden transition-all hover:-translate-y-1 hover:border-[rgba(124,58,237,0.4)]">
                            <div class="relative h-52 overflow-hidden bg-[var(--color-surface)] flex items-center justify-center text-5xl">
                                @if ($armada->featured_image)
                                    <img src="{{ Storage::disk('public')->url($armada->featured_image) }}" alt="{{ $armada->title }}" class="w-full h-full object-cover">
                                @else
                                    <span>🚐</span>
                                @endif
                                @if ($armada->car_badge)
                                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-[rgba(124,58,237,0.8)] text-white text-xs font-semibold">{{ $armada->car_badge }}</span>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="text-white font-bold text-lg mb-1">{{ $armada->title }}</div>
                                <div class="text-[var(--color-accent)] text-xs font-semibold mb-3">{{ $armada->car_type }}</div>
                                <p class="text-[var(--color-text-muted)] text-sm line-clamp-2 mb-4">
                                    {{ $armada->description }}
                                </p>
                                <div class="border-t border-[var(--color-border)] pt-4 flex items-center justify-between">
                                    <a href="{{ route('armada.show', $armada) }}" class="text-[var(--color-accent)] text-sm font-medium no-underline hover:underline">
                                        Lihat Spesifikasi →
                                    </a>
                                    <a href="{{ \App\Support\WhatsApp::link('Halo, saya ingin pesan armada ' . $armada->title) }}"
                                       class="px-4 py-2 bg-[rgba(34,211,238,0.15)] text-[var(--color-accent)] border border-[rgba(34,211,238,0.3)] rounded-full text-xs font-semibold no-underline"
                                       target="_blank" rel="noopener noreferrer">
                                        Booking
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- WHY US & SERVICES SECTION --}}
    <section class="py-[90px]" id="layanan">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Peruntukan Layanan</span>
                    <h2 class="text-[clamp(1.6rem,2.5vw,2.2rem)] font-bold mb-6 text-white leading-snug">
                        Solusi Sewa Hiace Surabaya untuk <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Segala Kebutuhan</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] mb-8 text-sm leading-relaxed">
                        Kendaraan Toyota Hiace merupakan pilihan van serbaguna yang sangat diminati di Surabaya. Kami melayani berbagai macam perjalanan rombongan dengan kenyamanan ekstra:
                    </p>

                    <div class="flex flex-col gap-5">
                        @foreach ([
                            ['🏖️', 'Wisata & Tour Jawa Timur', 'Perjalanan wisata rombongan keluarga atau tur ke Bromo, Batu-Malang, Kawah Ijen, Banyuwangi, hingga Bali.'],
                            ['🏢', 'Kunjungan Dinas & Corporate Event', 'Akomodasi perjalanan dinas tamu kantor, seminar, meeting luar kota, dan rombongan eksekutif.'],
                            ['✈️', 'Antar Jemput Bandara Juanda (SUB)', 'Layanan penjemputan atau pengantaran langsung ke Bandara Internasional Juanda secara tepat waktu.'],
                            ['💍', 'Acara Pernikahan & Rombongan Keluarga', 'Transportasi nyaman untuk rombongan keluarga pengantin atau acara wisuda di Surabaya.'],
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
                        <h3 class="text-white text-xl font-bold mb-4">Keunggulan Rental Hiace di {{ config('site.brand') }}</h3>
                        
                        <div class="flex flex-col gap-4 text-sm text-[var(--color-text-light)]">
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">01.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Armada Terbaru &amp; Terawat</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Setiap unit selalu dalam kondisi mesin prima dan rutin diservis di bengkel resmi.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">02.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Driver Professional &amp; Ramah</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Driver berpenampilan rapi, berpengalaman rute antar-kota, dan berorientasi pada keselamatan penumpang.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 pb-3 border-b border-[var(--color-border)]">
                                <span class="text-[var(--color-accent)] font-bold text-lg">03.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Jaminan Kebersihan Kabin</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Interior disemprot cairan sanitasi, bebas bau rokok, dan AC wangi segar.</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-[var(--color-accent)] font-bold text-lg">04.</span>
                                <div>
                                    <strong class="text-white block mb-0.5">Fasilitas Gratis di Hari Pertama</strong>
                                    <span class="text-xs text-[var(--color-text-muted)]">Kami menyediakan buah-buahan segar, air mineral botol, dan snack gratis sebagai apresiasi.</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-4 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.2)] text-center">
                            <span class="text-[var(--color-accent)] font-semibold text-sm">Butuh Penawaran Khusus Luar Kota / Multi-Day?</span>
                            <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi sewa Hiace untuk luar kota / beberapa hari.') }}"
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
                <h2 class="text-white text-2xl font-bold">4 Langkah Mudah Sewa Hiace di Surabaya</h2>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">01</span>
                    <div class="text-2xl mb-4">💬</div>
                    <h3 class="text-white font-bold text-base mb-2">Hubungi Tim WA</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Klik tombol WhatsApp dan sampaikan tanggal serta rute perjalanan Anda.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">02</span>
                    <div class="text-2xl mb-4">🚘</div>
                    <h3 class="text-white font-bold text-base mb-2">Pilih Tipe Hiace</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Tentukan tipe armada: Commuter (14 seat), Premio Standard (14 seat), atau Premio Luxury (9 seat VIP).</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">03</span>
                    <div class="text-2xl mb-4">💳</div>
                    <h3 class="text-white font-bold text-base mb-2">Konfirmasi &amp; DP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Lakukan pembayaran DP secukupnya untuk mengunci jadwal ketersediaan kendaraan.</p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 relative">
                    <span class="text-4xl font-bold text-[rgba(124,58,237,0.3)] absolute top-4 right-4">04</span>
                    <div class="text-2xl mb-4">🚀</div>
                    <h3 class="text-white font-bold text-base mb-2">Penjemputan Tepat Waktu</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed">Driver &amp; armada Hiace bersih siap menjemput Anda di lokasi sesuai kesepakatan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION --}}
    <section class="py-[90px] bg-[var(--color-bg-2)]" id="faq">
        <div class="max-w-[900px] mx-auto px-6">
            <div class="text-center mb-12">
                <span class="font-[family-name:var(--font-accent)] text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Tanya Jawab</span>
                <h2 class="text-white text-2xl font-bold">FAQ Sewa Hiace Surabaya</h2>
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
                <span class="text-4xl block mb-3">🚐👑</span>
                <h2 class="text-white text-[clamp(1.8rem,3vw,2.5rem)] font-bold mb-4">
                    Rencanakan Perjalanan Rombongan Anda Sekarang!
                </h2>
                <p class="text-[var(--color-text-light)] max-w-[650px] mx-auto text-base mb-8">
                    Dapatkan penawaran harga sewa Toyota Hiace termurah &amp; armada terawat di Surabaya. Customer service kami siap membantu sepanjang hari.
                </p>

                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin booking Sewa Hiace di Surabaya.') }}"
                       class="inline-flex items-center gap-2 px-9 py-4 rounded-[32px] font-bold text-base no-underline border-0 bg-[image:var(--gradient-btn)] text-white shadow-[0_4px_25px_rgba(124,58,237,0.5)] transition-transform hover:scale-105"
                       target="_blank" rel="noopener noreferrer">
                        💬 Hubungi via WhatsApp (Sepanjang Hari)
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts::public>
