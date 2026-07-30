<x-layouts::public :title="config('site.brand') . ' — ' . config('site.tagline')">
    {{-- HERO --}}
    <section class="relative min-h-[90vh] flex items-center pt-10 pb-16 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 w-full">
            <div class="grid grid-cols-2 gap-12 items-center max-md:grid-cols-1">
                <div class="flex flex-col gap-5 z-10">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider self-start">✦ Premium Transport Service</div>

                    <h1 class="text-[clamp(2rem,4.5vw,3.4rem)] font-bold leading-[1.15] tracking-[0.03em]">
                        Sewa Mobil Mewah
                        <span class="block" style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Berkelas &amp; Terpercaya</span>
                    </h1>

                    <p class="text-[var(--color-accent)] text-[0.75rem] tracking-[0.2em] uppercase">✦ Armada Premium &bull; Driver Profesional &bull; Sepanjang Hari</p>

                    <p class="text-[var(--color-text-light)] leading-relaxed max-w-[500px]">
                        {{ config('site.brand') }} hadir sebagai solusi terbaik untuk kebutuhan transportasi mewah Anda.
                        Armada premium, driver berpengalaman, dan layanan <strong class="text-white">sepanjang hari</strong>
                        siap mengantar Anda dengan nyaman dan aman.
                    </p>

                    <div class="flex gap-4 flex-wrap">
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin pesan mobil') }}"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white"
                           target="_blank" rel="noopener noreferrer">💬 Pesan Sekarang</a>
                        <a href="#armada-kami"
                           class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)]">🚗 Lihat Armada</a>
                    </div>
                </div>

                <div class="relative z-10 flex justify-center">
                    <div class="video-with-sound-toggle relative rounded-[var(--radius-xl)] overflow-hidden border-2 border-[rgba(124,58,237,0.3)] w-full max-w-[380px] aspect-[4/5]">
                        <video class="w-full h-full object-cover block" src="{{ $setting->hero_video ? Storage::disk('public')->url($setting->hero_video) : asset('videos/Surabaya-Rental-Mobil-Mewah.mp4') }}" autoplay loop muted playsinline></video>
                        <button type="button" class="sound-toggle absolute bottom-3 right-3 w-10 h-10 rounded-full bg-[rgba(0,0,0,0.55)] border border-[rgba(255,255,255,0.25)] text-white flex items-center justify-center text-lg backdrop-blur-sm" aria-label="Nyalakan suara video" aria-pressed="false">🔇</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section class="relative py-[100px] bg-[var(--color-bg-2)]" id="tentang-kami">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div class="relative">
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8">
                        <span class="text-5xl block mb-4">👑</span>
                        <h3 class="text-white font-bold mb-3">Pengalaman &amp; Kepercayaan</h3>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                            Kami berkomitmen memberikan layanan sewa mobil terbaik dengan armada terlengkap,
                            mulai dari MPV keluarga hingga kendaraan mewah kelas atas.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="px-3 py-1.5 rounded-full bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xs">✅ Bergaransi</span>
                            <span class="px-3 py-1.5 rounded-full bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xs">🛡️ Asuransi</span>
                            <span class="px-3 py-1.5 rounded-full bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xs">👨‍✈️ Driver Pro</span>
                            <span class="px-3 py-1.5 rounded-full bg-[rgba(124,58,237,0.1)] border border-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xs">🔧 Terawat</span>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Tentang Kami</span>
                    <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold mb-6">
                        Solusi Transportasi <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Premium</span> Terpercaya
                    </h2>
                    <p class="mb-6">
                        {{ config('site.brand') }} adalah perusahaan rental mobil mewah yang berpengalaman
                        dalam melayani kebutuhan transportasi personal, korporat, wisata, hingga pernikahan.
                    </p>

                    <div class="flex flex-col gap-5 mt-6">
                        @foreach ([
                            ['🚗', 'Armada Lengkap & Terawat', 'Dari MPV keluarga hingga minibus mewah, semua dalam kondisi prima dan terawat rutin.'],
                            ['👨‍✈️', 'Driver Profesional & Berpengalaman', 'Driver kami ramah, tepat waktu, dan akrab dengan rute terbaik ke berbagai destinasi.'],
                            ['🕐', 'Layanan Sepanjang Hari', 'Siap melayani kapanpun Anda butuhkan, termasuk malam hari dan hari libur nasional.'],
                            ['💰', 'Harga Transparan & Bersaing', 'Tidak ada biaya tersembunyi. Harga kompetitif dengan kualitas layanan premium.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4">
                                <div class="text-2xl flex-shrink-0 w-12 h-12 rounded-[var(--radius-md)] bg-[rgba(124,58,237,0.12)] border border-[rgba(124,58,237,0.2)] flex items-center justify-center">{{ $icon }}</div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1 text-sm">{{ $title }}</h4>
                                    <p class="text-[var(--color-text-muted)] text-sm">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PERAWATAN RUTIN --}}
    <section class="relative py-[100px]" id="perawatan-rutin">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-2 gap-16 items-center max-md:grid-cols-1">
                <div class="relative">
                    <div class="video-with-sound-toggle relative rounded-[var(--radius-xl)] overflow-hidden border-2 border-[rgba(34,211,238,0.2)] w-full max-w-[440px] aspect-[4/5]">
                        <video class="w-full h-full object-cover block" src="{{ $setting->perawatan_video ? Storage::disk('public')->url($setting->perawatan_video) : asset('videos/Perawatan-Rutin.mp4') }}" autoplay loop muted playsinline></video>
                        <button type="button" class="sound-toggle absolute bottom-3 right-3 w-10 h-10 rounded-full bg-[rgba(0,0,0,0.55)] border border-[rgba(255,255,255,0.25)] text-white flex items-center justify-center text-lg backdrop-blur-sm" aria-label="Nyalakan suara video" aria-pressed="false">🔇</button>
                    </div>
                </div>

                <div>
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Standar Kami</span>
                    <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold mb-6">
                        Perawatan Rutin <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Armada Premium</span>
                    </h2>
                    <p class="text-[var(--color-text-muted)] leading-[1.8] mb-7">
                        Setiap armada {{ config('site.brand') }} menjalani perawatan rutin dan berkala agar selalu
                        dalam kondisi prima saat membawa Anda bepergian.
                    </p>

                    <div class="flex flex-col gap-5 mt-6">
                        @foreach ([
                            ['🔧', 'Servis Berkala & Tune-Up', 'Mesin dicek dan diservis secara rutin sesuai jadwal agar performa selalu optimal.'],
                            ['🛞', 'Pengecekan Ban & Rem', 'Ban, rem, dan sistem suspensi diperiksa sebelum setiap keberangkatan.'],
                            ['🧴', 'Kebersihan Interior', 'Kabin dibersihkan dan disanitasi secara menyeluruh setelah setiap perjalanan.'],
                            ['🛡️', 'Asuransi & Kelengkapan Dokumen', 'Semua armada terdaftar resmi, berasuransi, dan dokumen selalu diperbarui.'],
                        ] as [$icon, $title, $desc])
                            <div class="flex items-start gap-4">
                                <div class="text-2xl flex-shrink-0 w-12 h-12 rounded-[var(--radius-md)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.15)] flex items-center justify-center">{{ $icon }}</div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1 text-sm">{{ $title }}</h4>
                                    <p class="text-[var(--color-text-muted)] text-sm">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ARMADA --}}
    <section class="py-[100px]" id="armada-kami">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Armada Kami</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Pilihan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Kendaraan Mewah</span></h2>
                <p class="text-[var(--color-text-muted)] max-w-[600px] mx-auto mt-3">
                    Kami menyediakan berbagai pilihan armada premium untuk memenuhi setiap kebutuhan perjalanan Anda.
                </p>
            </div>

            <div class="grid grid-cols-4 gap-6 max-md:grid-cols-2 mt-12 max-sm:grid-cols-1">
                @foreach ($armadas as $armada)
                    <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden transition-all hover:-translate-y-1">
                        <div class="relative h-48 overflow-hidden bg-[var(--color-surface)] flex items-center justify-center text-5xl">
                            @if ($armada->featured_image)
                                <img src="{{ Storage::disk('public')->url($armada->featured_image) }}" alt="{{ $armada->title }}" class="w-full h-full object-cover">
                            @else
                                <span>{{ $armada->car_icon ?: '🚗' }}</span>
                            @endif
                            @if ($armada->car_badge)
                                <span class="absolute top-3 left-3 px-3 py-1 rounded-full bg-[rgba(124,58,237,0.8)] text-white text-xs font-semibold">{{ $armada->car_badge }}</span>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="text-white font-bold text-[0.95rem] mb-1">{{ $armada->title }}</div>
                            <div class="text-[var(--color-text-muted)] text-xs mb-3">{{ $armada->car_type }}</div>
                            @if (!empty($armada->features))
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach ($armada->features as $feature)
                                        <span class="px-2 py-1 rounded-[var(--radius-sm)] bg-[rgba(34,211,238,0.08)] border border-[rgba(34,211,238,0.12)] text-[var(--color-accent)] text-[0.7rem]">{{ $feature }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="border-t border-[var(--color-border)] pt-3 flex gap-3 flex-wrap">
                                <a href="{{ route('armada.show', $armada) }}" class="text-[var(--color-accent)] text-xs font-medium no-underline">Lihat Detail →</a>
                                <a href="{{ $armada->cta_url ?: \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga '.$armada->title) }}"
                                   class="text-[#25d366] text-xs font-medium no-underline" target="_blank" rel="noopener noreferrer">
                                    {{ $armada->cta_text ?: 'Tanya Harga' }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PRICE LIST --}}
    <section class="py-[100px] bg-[var(--color-bg-2)]" id="harga-sewa">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Daftar Harga</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Kisaran <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Harga Sewa</span> Per Hari</h2>
                <p class="text-[var(--color-text-muted)] max-w-[600px] mx-auto mt-3">
                    Estimasi tarif sewa untuk pemakaian wilayah Kota Surabaya dan sekitarnya. Hubungi kami untuk info detail terbaru.
                </p>
            </div>

            <div class="mt-12 bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse min-w-[560px]">
                        <thead>
                            <tr class="border-b border-[var(--color-border)]">
                                <th class="text-left p-4 text-[var(--color-text-muted)] text-xs uppercase tracking-wider">Armada</th>
                                <th class="text-left p-4 text-[var(--color-text-muted)] text-xs uppercase tracking-wider">Kapasitas</th>
                                <th class="text-right p-4 text-[var(--color-text-muted)] text-xs uppercase tracking-wider">Harga / Hari</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($priceList as $car)
                                <tr class="border-b border-[var(--color-border)] last:border-b-0 hover:bg-[rgba(124,58,237,0.06)]">
                                    <td class="p-4 text-white font-semibold text-sm">{{ $car['name'] }}</td>
                                    <td class="p-4 text-[var(--color-text-muted)] text-sm">{{ $car['seat'] }}</td>
                                    <td class="p-4 text-[var(--color-accent)] font-bold text-sm text-right whitespace-nowrap">Rp {{ number_format($car['price'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-[var(--color-text-muted)] text-xs mb-4">*Harga sudah termasuk BBM &amp; tol, sudah termasuk driver. Estimasi untuk pemakaian dalam kota Surabaya.</p>
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya harga sewa armada') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white"
                   target="_blank" rel="noopener noreferrer">Tanya Harga via WhatsApp</a>
            </div>
        </div>
    </section>

    {{-- WAJIB DRIVER --}}
    <section class="py-[100px]" id="wajib-driver">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Kebijakan Sewa</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Semua Rental <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Wajib dengan Driver</span> dari Kami</h2>
                <p class="text-[var(--color-text-muted)] max-w-[650px] mx-auto mt-3">
                    {{ config('site.brand') }} tidak melayani sewa lepas kunci (self-drive). Setiap unit armada yang
                    disewa wajib didampingi driver profesional dari kami.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 mt-12 max-md:grid-cols-1">
                @foreach ([
                    ['🛡️', 'Keamanan Terjamin', 'Perjalanan lebih aman karena kendaraan dikemudikan oleh driver resmi yang bertanggung jawab penuh atas keselamatan Anda.'],
                    ['🧑‍✈️', 'Driver Berpengalaman', 'Driver kami akrab dengan medan, ramah, dan sudah terlatih melayani perjalanan luar kota maupun dalam kota.'],
                    ['😌', 'Bebas Ribet', 'Anda cukup duduk nyaman dan menikmati perjalanan, tanpa perlu memikirkan rute, macet, atau kelelahan menyetir.'],
                ] as [$icon, $title, $desc])
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 text-center">
                        <span class="text-5xl mb-4 block">{{ $icon }}</span>
                        <h4 class="text-white font-bold mb-3">{{ $title }}</h4>
                        <p class="text-[var(--color-text-muted)] text-sm">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BONUS --}}
    <section class="relative py-[100px] bg-[var(--color-bg-2)]" id="bonus">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Spesial untuk Anda</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Bonus <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Hari Pertama</span> Sewa</h2>
                <p class="text-[var(--color-text-muted)] max-w-[600px] mx-auto mt-3">
                    Setiap penyewaan hari pertama, kami hadirkan jamuan spesial sebagai bentuk apresiasi kepercayaan Anda.
                </p>
            </div>

            <div class="grid grid-cols-3 gap-6 mt-12 max-md:grid-cols-1">
                @foreach ([
                    ['🍎', 'Buah-Buahan Segar', 'Buah pilihan segar tersedia di dalam kendaraan sebagai camilan menyegarkan selama perjalanan Anda.'],
                    ['🍪', 'Jamuan Camilan', 'Aneka camilan lezat siap menemani setiap momen perjalanan agar tetap nyaman dan menyenangkan.'],
                    ['💧', 'Air Mineral', 'Air mineral dingin tersedia gratis untuk menjaga Anda tetap terhidrasi sepanjang perjalanan.'],
                ] as [$icon, $title, $desc])
                    <div class="relative bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 text-center">
                        <span class="text-5xl mb-4 block">{{ $icon }}</span>
                        <h4 class="text-white font-bold mb-3">{{ $title }}</h4>
                        <p class="text-[var(--color-text-muted)] text-sm">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS / PELANGGAN --}}
    @if ($pelanggans->isNotEmpty())
        <section class="py-[100px]" id="pelanggan-kami">
            <div class="max-w-[1200px] mx-auto px-6">
                <div class="text-center">
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Kepercayaan Pelanggan</span>
                    <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Mereka yang Telah <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Mempercayai Kami</span></h2>
                    <p class="text-[var(--color-text-muted)] max-w-[600px] mx-auto mt-3">
                        Ratusan pelanggan dari berbagai kalangan telah merasakan layanan prima {{ config('site.brand') }}.
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-6 mt-12 max-lg:grid-cols-2 max-md:grid-cols-1">
                    @foreach ($pelanggans as $p)
                        <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-6 flex flex-col gap-4 relative overflow-hidden">
                            @if ($p->kutipan)
                                <p class="relative z-10 text-[var(--color-text-light)] text-sm leading-relaxed italic">"{{ $p->kutipan }}"</p>
                            @endif
                            <div class="flex items-center gap-3 mt-2">
                                <div class="w-14 h-14 rounded-full overflow-hidden flex-shrink-0 border-2 border-[var(--color-border)] bg-[var(--color-surface)] flex items-center justify-center">
                                    @if ($p->photo)
                                        <img src="{{ Storage::disk('public')->url($p->photo) }}" alt="{{ $p->name }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-[var(--color-accent)] text-lg font-bold">{{ mb_substr($p->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-white font-semibold text-sm">{{ $p->name }}</div>
                                    @if ($p->jabatan || $p->instansi)
                                        <div class="text-[var(--color-text-muted)] text-xs">
                                            {{ $p->jabatan }}{{ $p->jabatan && $p->instansi ? ' · ' : '' }}
                                            <span class="text-[var(--color-accent)]">{{ $p->instansi }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-sm flex-shrink-0">{{ str_repeat('⭐', $p->bintang) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA --}}
    <section class="relative py-[100px]" id="hubungi-kami">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="relative p-12 text-center overflow-hidden rounded-[var(--radius-xl)] border border-[rgba(124,58,237,0.25)] max-md:p-8" style="background:linear-gradient(135deg,rgba(124,58,237,0.12),rgba(34,211,238,0.06))">
                <span class="text-5xl block mb-4">👑</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold mb-4">Siap Pesan Armada <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Premium Anda?</span></h2>
                <p class="text-[var(--color-text-muted)] max-w-[500px] mx-auto">
                    Hubungi kami sekarang dan dapatkan penawaran terbaik untuk kebutuhan transportasi mewah Anda.
                </p>
                <div class="flex gap-4 justify-center flex-wrap mt-8">
                    <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi mobil') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-gradient-to-br from-[#25d366] to-[#128c7e] text-white"
                       target="_blank" rel="noopener noreferrer">💬 Chat WhatsApp Sekarang</a>
                    <a href="{{ config('site.instagram_url') }}"
                       class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)]"
                       target="_blank" rel="noopener noreferrer">📸 Follow Instagram</a>
                </div>
            </div>
        </div>
    </section>

    {{-- BLOG PREVIEW --}}
    <section class="py-[100px] bg-[var(--color-bg-2)]" id="blog">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Blog &amp; Info</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Artikel &amp; <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Tips Perjalanan</span></h2>
            </div>

            @if ($posts->isNotEmpty())
                <div class="grid grid-cols-3 gap-6 mt-12 max-lg:grid-cols-2 max-md:grid-cols-1">
                    @foreach ($posts as $post)
                        <article class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] overflow-hidden">
                            <div class="h-48 overflow-hidden relative bg-[var(--color-surface)] flex items-center justify-center text-4xl">
                                @if ($post->featured_image)
                                    <img src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                @else
                                    🚗
                                @endif
                            </div>
                            <div class="p-6">
                                @if ($post->category)
                                    <span class="inline-block mb-3 px-2.5 py-1 rounded-[var(--radius-sm)] bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] text-[var(--color-primary)] text-xs font-semibold">{{ $post->category->name }}</span>
                                @endif
                                <h3 class="text-white font-bold text-[0.95rem] mb-3">
                                    <a href="{{ $post->url }}" class="text-white no-underline hover:text-[var(--color-accent)]">{{ $post->title }}</a>
                                </h3>
                                <p class="text-[var(--color-text-muted)] text-sm mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                                <a href="{{ $post->url }}" class="text-[var(--color-accent)] text-sm font-medium no-underline">Baca Selengkapnya →</a>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="text-center mt-10">
                    <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-2 border-[var(--color-accent)] text-[var(--color-accent)]">📖 Lihat Semua Artikel</a>
                </div>
            @else
                <div class="text-center py-16 text-[var(--color-text-muted)]">
                    <p class="text-[3rem] mb-4">📝</p>
                    <p>Artikel akan segera hadir. Nantikan konten menarik dari kami!</p>
                </div>
            @endif
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-[100px]" id="faq">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Pertanyaan Umum</span>
                <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">FAQ <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Sewa Mobil</span></h2>
            </div>

            <div class="flex flex-col gap-3 mt-12 max-w-[760px] mx-auto" id="faqAccordion">
                @foreach ($faqs as $i => $faq)
                    <div class="faq-item bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-md)] overflow-hidden">
                        <button type="button" class="faq-toggle w-full flex items-center justify-between gap-4 p-6 text-left cursor-pointer">
                            <span class="text-white font-semibold text-sm flex-1">{{ $faq['q'] }}</span>
                            <span class="faq-icon w-7 h-7 rounded-full bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] flex items-center justify-center text-[var(--color-primary)] text-lg flex-shrink-0">+</span>
                        </button>
                        <div class="faq-answer hidden">
                            <div class="px-6 pb-6 text-[var(--color-text-muted)] text-sm leading-relaxed">{{ $faq['a'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <p class="text-[var(--color-text-muted)] mb-4">Masih ada pertanyaan lain?</p>
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin bertanya tentang layanan sewa mobil') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-[0.95rem] no-underline border-0 bg-[image:var(--gradient-btn)] text-white"
                   target="_blank" rel="noopener noreferrer">💬 Tanya via WhatsApp</a>
            </div>
        </div>
    </section>

    {{-- GALLERY --}}
    @if ($galleries->isNotEmpty())
        <section class="py-[100px] bg-[var(--color-bg-2)]" id="galeri">
            <div class="max-w-[1200px] mx-auto px-6">
                <div class="text-center">
                    <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-4 block">Galeri</span>
                    <h2 class="text-[clamp(1.4rem,2.5vw,2rem)] font-bold">Galeri <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Armada &amp; Layanan</span></h2>
                </div>

                <div class="grid gap-3 mt-12" style="grid-template-columns:2fr 1fr 1fr; grid-template-rows:240px 240px;">
                    @foreach ($galleries as $i => $item)
                        <div class="relative overflow-hidden rounded-[var(--radius-md)] bg-[var(--color-surface)] {{ $i === 0 ? 'row-span-2' : '' }}">
                            @if ($item->featured_image)
                                <img src="{{ Storage::disk('public')->url($item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-6xl">🚗</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts::public>
