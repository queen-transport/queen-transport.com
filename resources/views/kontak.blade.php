<x-layouts::public
    :title="'Kontak Kami — ' . config('site.brand')"
    description="Hubungi {{ config('site.brand') }} untuk layanan rental dan sewa mobil mewah di Surabaya, Sidoarjo, dan Jawa Timur. Layanan customer service sepanjang hari melayani reservasi dan konsultasi Anda."
>
    {{-- HERO / HEADER --}}
    <section class="relative py-20 overflow-hidden" style="background:var(--gradient-hero);">
        <div class="max-w-[1200px] mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-[rgba(34,211,238,0.3)] bg-[rgba(34,211,238,0.08)] text-[var(--color-accent)] text-[0.8rem] tracking-wider mb-5">
                ✦ LAYANAN SEPANJANG HARI
            </div>

            <h1 class="text-[clamp(2rem,4vw,3.2rem)] font-bold text-white leading-[1.2] mb-4">
                Hubungi <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ config('site.brand') }}</span>
            </h1>

            <p class="text-[var(--color-text-light)] text-base max-w-[650px] mx-auto leading-relaxed">
                Kami siap memberikan solusi transportasi mewah, nyaman, dan berkelas untuk perjalanan bisnis, liburan keluarga, dinas kantor, maupun acara VIP Anda di Surabaya dan sekitarnya.
            </p>
        </div>
    </section>

    {{-- CONTACT CARDS GRID --}}
    <section class="py-16 bg-[var(--color-bg)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card 1: CS WhatsApp 24 Jam --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 hover:border-[var(--color-accent)] hover:shadow-[0_8px_30px_rgba(34,211,238,0.15)]">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-12 h-12 rounded-full bg-[rgba(37,211,102,0.15)] border border-[rgba(37,211,102,0.3)] flex items-center justify-center text-2xl text-[#25d366]">
                                💬
                            </span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(37,211,102,0.15)] text-[#25d366] text-xs font-semibold">Sepanjang Hari</span>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-1">Customer Service</h3>
                        <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Reservasi &amp; Tanya Harga</p>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">
                            Respon cepat untuk cek jadwal armada, rute, biaya sewa harian, dan konsultasi kebutuhan Anda.
                        </p>
                    </div>
                    <div class="space-y-3">
                        <div class="text-white font-mono text-sm font-semibold tracking-wide">
                            +{{ \App\Support\WhatsApp::primaryNumber() }}
                        </div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi dan tanya sewa armada') }}"
                           class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full font-semibold text-sm no-underline bg-gradient-to-r from-[#25d366] to-[#128c7e] text-white shadow-lg transition-opacity hover:opacity-95"
                           target="_blank" rel="noopener noreferrer">
                            <span>💬 Chat WhatsApp CS</span>
                        </a>
                    </div>
                </div>

                {{-- Card 2: Direktur / Pak Fauzan --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-7 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 hover:border-[var(--color-primary)] hover:shadow-[0_8px_30px_rgba(124,58,237,0.2)]">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="w-12 h-12 rounded-full bg-[rgba(124,58,237,0.15)] border border-[rgba(124,58,237,0.3)] flex items-center justify-center text-2xl text-[var(--color-primary-glow)]">
                                👔
                            </span>
                            <span class="px-3 py-1 rounded-full bg-[rgba(124,58,237,0.2)] text-[var(--color-accent)] text-xs font-semibold">Direktur Utama</span>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-1">Pak Fauzan</h3>
                        <p class="text-[var(--color-accent)] text-xs font-semibold mb-3">Manajemen &amp; Kerjasama VIP</p>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">
                            Khusus kebutuhan sewa armada korporat, kontrak bulanan, kedinasan kenegaraan, atau kemitraan.
                        </p>
                    </div>
                    <div class="space-y-3">
                        <div class="text-white font-mono text-sm font-semibold tracking-wide">
                            +6282231037255
                        </div>
                        <a href="{{ \App\Support\WhatsApp::link('Halo Pak Fauzan, saya ingin berkonsultasi mengenai layanan '.config('site.brand'), '6282231037255') }}"
                           class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-full font-semibold text-sm no-underline bg-[image:var(--gradient-btn)] text-white shadow-lg transition-opacity hover:opacity-95"
                           target="_blank" rel="noopener noreferrer">
                            <span>👔 Hubungi Pak Fauzan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK INQUIRY / TEMPLATE WHATSAPP --}}
    <section class="py-16 bg-[var(--color-bg-2)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="text-center max-w-[700px] mx-auto mb-12">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Reservasi Cepat</span>
                <h2 class="text-[clamp(1.5rem,3vw,2.2rem)] font-bold text-white mb-4">
                    Pilih Kebutuhan Perjalanan <span style="background:var(--gradient-cta);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Anda</span>
                </h2>
                <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                    Klik salah satu opsi di bawah ini untuk langsung terhubung ke WhatsApp kami dengan format pesan yang sudah disiapkan otomatis.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Option 1: Hiace --}}
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi dan reservasi sewa Toyota Hiace (Commuter/Premio). Mohon informasi ketersediaan tanggal dan harga.') }}"
                   target="_blank" rel="noopener noreferrer"
                   class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 no-underline transition-all duration-200 hover:-translate-y-1 hover:border-[var(--color-primary)]">
                    <div class="text-3xl mb-3">🚐</div>
                    <h3 class="text-white font-bold text-base mb-2 group-hover:text-[var(--color-accent)] transition-colors">Sewa Toyota Hiace</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Pilihan tepat untuk rombongan keluarga besar, tour rombongan ziarah, kantor, dan tamu kehormatan.
                    </p>
                    <span class="text-[var(--color-accent)] text-xs font-semibold inline-flex items-center gap-1">
                        Kirim Pesan WhatsApp &rarr;
                    </span>
                </a>

                {{-- Option 2: Alphard --}}
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin reservasi Toyota Alphard VIP. Mohon info unit dan penawaran harganya.') }}"
                   target="_blank" rel="noopener noreferrer"
                   class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 no-underline transition-all duration-200 hover:-translate-y-1 hover:border-[var(--color-primary)]">
                    <div class="text-3xl mb-3">👑</div>
                    <h3 class="text-white font-bold text-base mb-2 group-hover:text-[var(--color-accent)] transition-colors">Sewa Toyota Alphard VIP</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Kenyamanan kelas satu dengan captain seat mewah untuk tamu VVIP, direksi, pengantin, dan acara kenegaraan.
                    </p>
                    <span class="text-[var(--color-accent)] text-xs font-semibold inline-flex items-center gap-1">
                        Kirim Pesan WhatsApp &rarr;
                    </span>
                </a>

                {{-- Option 3: Xpander Ultimate --}}
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya tertarik dengan sewa Mitsubishi Xpander Ultimate. Mohon informasi tarif dan ketersediaannya.') }}"
                   target="_blank" rel="noopener noreferrer"
                   class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 no-underline transition-all duration-200 hover:-translate-y-1 hover:border-[var(--color-primary)]">
                    <div class="text-3xl mb-3">🚗</div>
                    <h3 class="text-white font-bold text-base mb-2 group-hover:text-[var(--color-accent)] transition-colors">Sewa Xpander Ultimate</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        MPV modern nan elegan, suspensi empuk, dan irit bahan bakar untuk mobilitas praktis di dalam &amp; luar kota.
                    </p>
                    <span class="text-[var(--color-accent)] text-xs font-semibold inline-flex items-center gap-1">
                        Kirim Pesan WhatsApp &rarr;
                    </span>
                </a>

                {{-- Option 4: Drop Juanda --}}
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya butuh layanan antar/jemput (drop-off) Bandara Juanda Surabaya. Mohon bantuan info tarifnya.') }}"
                   target="_blank" rel="noopener noreferrer"
                   class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 no-underline transition-all duration-200 hover:-translate-y-1 hover:border-[var(--color-primary)]">
                    <div class="text-3xl mb-3">✈️</div>
                    <h3 class="text-white font-bold text-base mb-2 group-hover:text-[var(--color-accent)] transition-colors">Antar-Jemput Bandara Juanda</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Penjemputan tepat waktu langsung di Terminal 1 atau Terminal 2 Juanda dengan driver ramah dan berseragam rapi.
                    </p>
                    <span class="text-[var(--color-accent)] text-xs font-semibold inline-flex items-center gap-1">
                        Kirim Pesan WhatsApp &rarr;
                    </span>
                </a>

                {{-- Option 5: Ziarah Wali 5 --}}
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin tanya paket ziarah Wali 5 Jawa Timur bersama rombongan. Mohon info rute dan tarif armadanya.') }}"
                   target="_blank" rel="noopener noreferrer"
                   class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 no-underline transition-all duration-200 hover:-translate-y-1 hover:border-[var(--color-primary)]">
                    <div class="text-3xl mb-3">🕌</div>
                    <h3 class="text-white font-bold text-base mb-2 group-hover:text-[var(--color-accent)] transition-colors">Paket Ziarah Wali 5 Jatim</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Rute ziarah komplit ke Sunan Ampel, Sunan Giri, Sunan Maulana Malik Ibrahim, Sunan Drajat, dan Sunan Bonang.
                    </p>
                    <span class="text-[var(--color-accent)] text-xs font-semibold inline-flex items-center gap-1">
                        Kirim Pesan WhatsApp &rarr;
                    </span>
                </a>

                {{-- Option 6: Sewa Luar Kota / Tour Jatim --}}
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi perjalanan luar kota / wisata Jawa Timur (Malang/Batu/Banyuwangi/lainnya).') }}"
                   target="_blank" rel="noopener noreferrer"
                   class="group bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-lg)] p-6 no-underline transition-all duration-200 hover:-translate-y-1 hover:border-[var(--color-primary)]">
                    <div class="text-3xl mb-3">🌄</div>
                    <h3 class="text-white font-bold text-base mb-2 group-hover:text-[var(--color-accent)] transition-colors">Sewa Luar Kota &amp; Wisata</h3>
                    <p class="text-[var(--color-text-muted)] text-xs leading-relaxed mb-4">
                        Perjalanan bisnis atau wisata ke Malang, Batu, Bromo, Nganjuk, Madiun, Jember, hingga Banyuwangi dengan driver handal.
                    </p>
                    <span class="text-[var(--color-accent)] text-xs font-semibold inline-flex items-center gap-1">
                        Kirim Pesan WhatsApp &rarr;
                    </span>
                </a>
            </div>
        </div>
    </section>

    {{-- LOKASI & PETA GOOGLE MAPS --}}
    <section class="py-16 bg-[var(--color-bg)]">
        <div class="max-w-[1200px] mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                {{-- Detail Lokasi --}}
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-xl)] p-8 flex flex-col justify-between">
                    <div>
                        <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Lokasi Pool &amp; Garasi</span>
                        <h2 class="text-white font-bold text-2xl mb-4">Kunjungi Kantor Kami</h2>
                        <p class="text-[var(--color-text-muted)] text-sm leading-relaxed mb-6">
                            Garasi dan operasional kami berlokasi di area Ganting, Gedangan, Sidoarjo &mdash; lokasi yang sangat strategis dengan akses cepat menuju jalan tol dan Bandara Internasional Juanda.
                        </p>

                        <div class="space-y-4 text-sm text-[var(--color-text-light)]">
                            <div class="flex items-start gap-3">
                                <span class="text-xl">📍</span>
                                <div>
                                    <strong class="text-white block">Alamat Garasi:</strong>
                                    <span>{{ config('site.address') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-xl">🕐</span>
                                <div>
                                    <strong class="text-white block">Jam Operasional:</strong>
                                    <span>Layanan Sepanjang Hari</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="text-xl">🛡️</span>
                                <div>
                                    <strong class="text-white block">Fasilitas Unit:</strong>
                                    <span>Armada wangi, AC dingin, full audio, snack &amp; mineral water gratis hari pertama.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SINGKAT KONTAK --}}
    <section class="py-16 bg-[var(--color-bg-2)]">
        <div class="max-w-[800px] mx-auto px-6">
            <div class="text-center mb-10">
                <span class="text-[0.75rem] tracking-[0.25em] uppercase text-[var(--color-accent)] mb-3 block">Bantuan Cepat</span>
                <h2 class="text-2xl font-bold text-white">Pertanyaan Seputar Pemesanan</h2>
            </div>

            <div class="space-y-4">
                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-md)] p-6">
                    <h3 class="text-white font-semibold text-base mb-2">Berapa lama waktu yang dibutuhkan untuk konfirmasi reservasi?</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Konfirmasi sangat cepat melalui WhatsApp. Dalam hitungan menit, tim customer service kami akan mengonfirmasi ketersediaan unit beserta detail driver yang bertugas.
                    </p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-md)] p-6">
                    <h3 class="text-white font-semibold text-base mb-2">Apakah bisa memesan mobil secara mendadak atau dini hari?</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Bisa. Kami beroperasi sepanjang hari. Anda dapat menghubungi nomor WhatsApp Customer Service kami kapan pun saat membutuhkan armada mendesak.
                    </p>
                </div>

                <div class="bg-[var(--gradient-card)] border border-[var(--color-border)] rounded-[var(--radius-md)] p-6">
                    <h3 class="text-white font-semibold text-base mb-2">Bagaimana tata cara pembayaran sewa mobil?</h3>
                    <p class="text-[var(--color-text-muted)] text-sm leading-relaxed">
                        Pembayaran dapat dilakukan melalui transfer bank resmi atau tunai. Detail invoice dan nomor rekening akan dikirimkan langsung oleh CS setelah detail reservasi disepakati.
                    </p>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="{{ \App\Support\WhatsApp::link('Halo '.config('site.brand').', saya ingin konsultasi sewa mobil sekarang') }}"
                   class="inline-flex items-center gap-2 px-8 py-3.5 rounded-[32px] font-semibold text-sm no-underline bg-gradient-to-r from-[#25d366] to-[#128c7e] text-white shadow-lg transition-transform hover:scale-[1.02]"
                   target="_blank" rel="noopener noreferrer">
                    💬 Mulai Chat Sekarang
                </a>
            </div>
        </div>
    </section>
</x-layouts::public>
