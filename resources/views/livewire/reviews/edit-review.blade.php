<div
    x-data="{
        submitting: false,
        scrollToStatus() {
            this.$nextTick(() => {
                setTimeout(() => {
                    const targets = [
                        document.getElementById('review-status-alert'),
                        document.getElementById('review-validation-alert'),
                        document.querySelector('[data-has-error=\'true\']'),
                        document.querySelector('.has-error'),
                        document.querySelector('[aria-invalid=\'true\']'),
                        document.querySelector('.text-rose-400')
                    ];
                    const target = targets.find(el => el && el.offsetParent !== null) || targets.find(el => el);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        const focusable = target.matches('input, textarea, select, button')
                            ? target
                            : target.querySelector('input:not([type=\'hidden\']), textarea, select, button');
                        if (focusable && typeof focusable.focus === 'function' && !target.id?.includes('alert')) {
                            focusable.focus({ preventScroll: true });
                        }
                    }
                }, 80);
            });
        },
        init() {
            if (window.Livewire) {
                Livewire.hook('commit', ({ component, succeed }) => {
                    if (component.id === this.$wire.$id) {
                        succeed(() => {
                            if (this.submitting) {
                                this.scrollToStatus();
                                this.submitting = false;
                            }
                        });
                    }
                });
            }
        }
    }"
    x-on:scroll-to-status.window="scrollToStatus()"
    class="max-w-4xl mx-auto space-y-6 pb-12"
>
    {{-- NAVIGASI KEMBALI --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white transition">
            <span>←</span> Kembali ke Dashboard
        </a>

        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/25">
            ⏱️ Batas edit: {{ $review->created_at?->addHours(24)->translatedFormat('d M Y, H:i') }}
        </span>
    </div>

    {{-- ALERT / NOTIFIKASI STATUS (SUCCESS / ERROR) --}}
    @if ($feedbackMessage)
        <div id="review-status-alert" class="scroll-mt-28 rounded-2xl p-4 sm:p-5 flex items-center justify-between border {{ $feedbackType === 'success' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-600 dark:text-emerald-400' : 'bg-rose-500/10 border-rose-500/30 text-rose-600 dark:text-rose-400' }} shadow-sm backdrop-blur-xl">
            <div class="flex items-center gap-3">
                <span class="text-2xl">{{ $feedbackType === 'success' ? '✅' : '⚠️' }}</span>
                <span class="text-sm font-semibold">{{ $feedbackMessage }}</span>
            </div>
            <button type="button" wire:click="$set('feedbackMessage', null)" class="text-zinc-400 hover:text-zinc-900 dark:hover:text-white text-sm font-bold ml-4">✕</button>
        </div>
    @endif

    {{-- ALERT KESALAHAN VALIDASI FORM --}}
    @if ($errors->any())
        <div id="review-validation-alert" class="scroll-mt-28 rounded-2xl p-4 sm:p-5 border border-rose-500/30 bg-rose-500/10 text-rose-600 dark:text-rose-400 backdrop-blur-xl shadow-sm space-y-2.5">
            <div class="flex items-center gap-2.5 font-semibold text-sm">
                <span class="text-xl">⚠️</span>
                <span>Terdapat kesalahan pada formulir ulasan:</span>
            </div>
            <ul class="list-disc list-inside text-xs space-y-1.5 pl-1 text-rose-700 dark:text-rose-300">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <p class="text-[11px] text-zinc-500 dark:text-zinc-400 pt-1 border-t border-rose-500/20">
                Silakan periksa dan lengkapi isian pada kolom formulir di bawah ini.
            </p>
        </div>
    @endif

    {{-- HEADER HALAMAN EDIT --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-purple-50 via-indigo-50/50 to-slate-100 dark:from-[#0a0c14] dark:via-[#1a1035] dark:to-[#0f2030] border border-purple-500/20 dark:border-purple-500/30 p-6 md:p-8 shadow-sm dark:shadow-[0_12px_40px_rgba(0,0,0,0.6)] backdrop-blur-xl">
        <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-purple-600/10 dark:bg-purple-600/20 blur-3xl pointer-events-none"></div>
        <div class="absolute -left-16 -bottom-16 w-64 h-64 rounded-full bg-cyan-500/10 dark:bg-cyan-500/15 blur-3xl pointer-events-none"></div>

        <div class="relative z-10 space-y-2">
            <div class="flex flex-wrap items-center gap-2.5">
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white flex items-center gap-2 font-['Cinzel',serif] tracking-wide">
                    <span>✏️</span> Edit Ulasan &amp; Pengalaman Sewa
                </h1>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/15 dark:bg-purple-500/20 border border-purple-400/40 text-purple-700 dark:text-purple-300 font-['Orbitron',sans-serif] tracking-wider uppercase">
                    ID #{{ substr($review->id, 0, 8) }}
                </span>
            </div>
            <p class="text-sm text-zinc-600 dark:text-zinc-400 max-w-2xl leading-relaxed">
                Perbarui penilaian atau ulasan Anda mengenai armada dan layanan Queen Transport. Anda dapat mengedit ulasan dalam waktu 24 jam setelah dibuat.
            </p>
        </div>
    </div>

    {{-- FORM EDIT ULASAN --}}
    <div class="bg-white/95 dark:bg-[#0f1220]/95 border border-purple-500/15 dark:border-purple-500/25 rounded-3xl p-6 sm:p-8 space-y-8 backdrop-blur-2xl shadow-sm dark:shadow-[0_16px_50px_rgba(0,0,0,0.7)]">
        <form wire:submit.prevent="submit" @submit="submitting = true" class="space-y-8">
            {{-- 1. PENILAIAN BINTANG --}}
            <div id="field-rating" class="scroll-mt-28 space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20 {{ $errors->has('rating') ? 'has-error' : '' }}" @error('rating') data-has-error="true" @enderror>
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Penilaian Bintang <span class="text-rose-400">*</span>
                </label>
                <div class="flex items-center gap-2 flex-wrap">
                    <div class="flex items-center gap-1 bg-slate-50 dark:bg-[#0a0c14] px-4 py-2 rounded-xl border {{ $errors->has('rating') ? 'border-rose-500 ring-2 ring-rose-500/30' : 'border-zinc-200 dark:border-purple-500/25' }} shadow-inner">
                        @for ($star = 1; $star <= 5; $star++)
                            <button
                                type="button"
                                wire:click="$set('rating', {{ $star }})"
                                class="text-3xl transition-transform hover:scale-125 focus:outline-none {{ $star <= $rating ? 'text-amber-400' : 'text-zinc-300 dark:text-zinc-600 hover:text-amber-300/60' }}"
                                title="{{ $star }} Bintang"
                            >
                                ★
                            </button>
                        @endfor
                    </div>

                    <div class="text-sm font-semibold text-zinc-700 dark:text-zinc-300 ml-2">
                        @switch($rating)
                            @case(5)
                                <span class="text-amber-500 dark:text-amber-400">⭐⭐⭐⭐⭐ 5.0 - Sangat Memuaskan &amp; Istimewa</span>
                                @break
                            @case(4)
                                <span class="text-amber-500 dark:text-amber-400">⭐⭐⭐⭐ 4.0 - Puas &amp; Menyenangkan</span>
                                @break
                            @case(3)
                                <span class="text-zinc-600 dark:text-zinc-300">⭐⭐⭐ 3.0 - Cukup Baik</span>
                                @break
                            @case(2)
                                <span class="text-zinc-500 dark:text-zinc-400">⭐⭐ 2.0 - Kurang Memuaskan</span>
                                @break
                            @case(1)
                                <span class="text-rose-500 dark:text-rose-400">⭐ 1.0 - Sangat Mengecewakan</span>
                                @break
                        @endswitch
                    </div>
                </div>
                @error('rating') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 2. DETAIL ULASAN (WAJIB DIISI: MOBIL, DRIVER, FASILITAS) --}}
            <div class="space-y-4 pt-2 pb-6 border-b border-purple-500/15 dark:border-purple-500/20">
                <div class="space-y-1">
                    <h3 class="text-sm font-bold text-zinc-800 dark:text-zinc-200 flex items-center gap-2">
                        <span>🔍</span> Isi Ulasan Per Detail Layanan <span class="text-rose-400">*</span>
                    </h3>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">
                        Mohon lengkapi penilaian dan cerita pengalaman Anda pada 3 kategori di bawah ini:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- 1. Tentang Mobil --}}
                    <div id="field-carReview" class="space-y-1.5 p-4 rounded-2xl bg-slate-50/80 dark:bg-[#0a0c14]/80 border border-zinc-200 dark:border-purple-500/20 {{ $errors->has('carReview') ? 'has-error' : '' }}" @error('carReview') data-has-error="true" @enderror>
                        <label class="block text-xs font-semibold text-zinc-800 dark:text-zinc-200 flex items-center gap-1.5">
                            <span class="text-base">🚗</span> 1. Tentang Mobil <span class="text-rose-400">*</span>
                        </label>
                        <p class="text-[11px] text-zinc-500 dark:text-zinc-400">Kondisi fisik, kebersihan kabin, keharuman, &amp; kenyamanan AC/suspensi.</p>
                        <textarea
                            wire:model="carReview"
                            rows="4"
                            maxlength="500"
                            placeholder="Contoh: Mobil sangat bersih, wangi, AC dingin merata, suspensi nyaman untuk perjalanan jauh..."
                            class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#141728] border {{ $errors->has('carReview') ? 'border-rose-500 ring-1 ring-rose-500/30' : 'border-zinc-300 dark:border-purple-500/20 focus:border-purple-500 focus:ring-1 focus:ring-purple-500' }} text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-xs transition leading-relaxed"
                        ></textarea>
                        @error('carReview') <span class="text-[11px] text-rose-400 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- 2. Tentang Driver --}}
                    <div id="field-driverReview" class="space-y-1.5 p-4 rounded-2xl bg-slate-50/80 dark:bg-[#0a0c14]/80 border border-zinc-200 dark:border-purple-500/20 {{ $errors->has('driverReview') ? 'has-error' : '' }}" @error('driverReview') data-has-error="true" @enderror>
                        <label class="block text-xs font-semibold text-zinc-800 dark:text-zinc-200 flex items-center gap-1.5">
                            <span class="text-base">👨‍✈️</span> 2. Tentang Driver <span class="text-rose-400">*</span>
                        </label>
                        <p class="text-[11px] text-zinc-500 dark:text-zinc-400">Ketepatan waktu, keramahan, kerapian, penguasaan rute, &amp; etika mengemudi.</p>
                        <textarea
                            wire:model="driverReview"
                            rows="4"
                            maxlength="500"
                            placeholder="Contoh: Driver datang tepat waktu, sopan, berseragam rapi, mengemudi dengan sangat hati-hati..."
                            class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#141728] border {{ $errors->has('driverReview') ? 'border-rose-500 ring-1 ring-rose-500/30' : 'border-zinc-300 dark:border-purple-500/20 focus:border-purple-500 focus:ring-1 focus:ring-purple-500' }} text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-xs transition leading-relaxed"
                        ></textarea>
                        @error('driverReview') <span class="text-[11px] text-rose-400 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- 3. Tentang Kualitas & Fasilitas --}}
                    <div id="field-facilitiesReview" class="space-y-1.5 p-4 rounded-2xl bg-slate-50/80 dark:bg-[#0a0c14]/80 border border-zinc-200 dark:border-purple-500/20 {{ $errors->has('facilitiesReview') ? 'has-error' : '' }}" @error('facilitiesReview') data-has-error="true" @enderror>
                        <label class="block text-xs font-semibold text-zinc-800 dark:text-zinc-200 flex items-center gap-1.5">
                            <span class="text-base">✨</span> 3. Kualitas &amp; Fasilitas <span class="text-rose-400">*</span>
                        </label>
                        <p class="text-[11px] text-zinc-500 dark:text-zinc-400">Respon reservasi, air mineral, charger, keandalan fasilitas pelengkap.</p>
                        <textarea
                            wire:model="facilitiesReview"
                            rows="4"
                            maxlength="500"
                            placeholder="Contoh: Admin fast response, fasilitas kabin berfungsi normal, proses serah terima lancar..."
                            class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#141728] border {{ $errors->has('facilitiesReview') ? 'border-rose-500 ring-1 ring-rose-500/30' : 'border-zinc-300 dark:border-purple-500/20 focus:border-purple-500 focus:ring-1 focus:ring-purple-500' }} text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-xs transition leading-relaxed"
                        ></textarea>
                        @error('facilitiesReview') <span class="text-[11px] text-rose-400 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- 3. PILIH ARMADA --}}
            <div id="field-selectedArmadas" class="scroll-mt-28 space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20 {{ $errors->has('selectedArmadas') || $errors->has('selectedArmadas.*') ? 'has-error' : '' }}" @error('selectedArmadas') data-has-error="true" @enderror>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                    <div>
                        <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                            Pilih Armada yang Digunakan (Opsional)
                        </label>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">
                            Pilih satu atau beberapa armada kendaraan yang Anda sewa:
                        </p>
                    </div>
                    <span class="text-xs font-medium px-3 py-1 rounded-full bg-purple-100 dark:bg-purple-950/60 border border-purple-300 dark:border-purple-500/40 text-purple-700 dark:text-purple-300 shrink-0 self-start sm:self-auto shadow-sm">
                        {{ count($selectedArmadas) }} Armada Terpilih
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 pt-2">
                    @foreach ($availableArmadas as $car)
                        @php
                            $isSelected = in_array($car->id, $selectedArmadas);
                            $photoUrl = $car->photo_url;
                        @endphp
                        <div
                            wire:click="toggleArmada({{ $car->id }})"
                            class="group relative flex flex-col rounded-2xl border transition-all duration-300 cursor-pointer overflow-hidden {{ $isSelected ? 'bg-gradient-to-b from-purple-100 to-indigo-50/50 dark:from-purple-950/70 dark:to-[#0f1220] border-purple-500 shadow-[0_0_25px_rgba(124,58,237,0.2)] dark:shadow-[0_0_25px_rgba(124,58,237,0.35)] ring-2 ring-purple-500/70 -translate-y-0.5' : 'bg-slate-50 dark:bg-[#141728]/80 border-zinc-200 dark:border-purple-500/20 hover:border-purple-500/50 hover:bg-slate-100 dark:hover:bg-[#1a1f35]/90 hover:-translate-y-0.5 shadow-sm' }}"
                        >
                            {{-- Foto Armada Bila Ada --}}
                            <div class="relative w-full h-36 bg-slate-100 dark:bg-[#0a0c14] overflow-hidden">
                                @if ($photoUrl)
                                    <img
                                        src="{{ $photoUrl }}"
                                        alt="{{ $car->title }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 dark:bg-gradient-to-br dark:from-[#141728] dark:to-[#0a0c14] text-zinc-400 dark:text-zinc-500">
                                        <span class="text-4xl mb-1 group-hover:scale-110 transition-transform duration-300">{{ $car->car_icon ?: '🚗' }}</span>
                                        <span class="text-[10px] text-zinc-500 font-medium tracking-wider uppercase font-['Orbitron',sans-serif]">Armada Queen</span>
                                    </div>
                                @endif

                                {{-- Badge Pojok Kanan Atas Foto --}}
                                @if ($car->car_badge)
                                    <span class="absolute top-2.5 right-2.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-purple-900/80 dark:bg-purple-950/85 border border-purple-300 dark:border-purple-400/40 text-purple-100 dark:text-purple-200 backdrop-blur-md shadow-sm">
                                        {{ $car->car_badge }}
                                    </span>
                                @endif

                                {{-- Checkbox / Indicator Pojok Kiri Atas Foto --}}
                                <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold transition-all backdrop-blur-md {{ $isSelected ? 'bg-purple-600 text-white shadow-[0_0_12px_rgba(124,58,237,0.8)] border border-purple-400/50' : 'bg-white/80 dark:bg-[#0a0c14]/75 text-zinc-600 dark:text-zinc-400 border border-zinc-200 dark:border-purple-500/20 group-hover:text-zinc-900 dark:group-hover:text-white' }}">
                                    <span class="w-3.5 h-3.5 rounded-full flex items-center justify-center text-[10px] {{ $isSelected ? 'bg-white text-purple-600 font-black' : 'border border-zinc-400 dark:border-zinc-500' }}">
                                        @if ($isSelected) ✓ @endif
                                    </span>
                                    <span>{{ $isSelected ? 'Terpilih' : 'Pilih' }}</span>
                                </div>
                            </div>

                            {{-- Info Armada --}}
                            <div class="p-3.5 flex flex-col justify-between flex-1 gap-2">
                                <div>
                                    <h4 class="text-sm font-bold leading-snug transition-colors {{ $isSelected ? 'text-purple-950 dark:text-white' : 'text-zinc-900 dark:text-zinc-100 group-hover:text-purple-600 dark:group-hover:text-cyan-300' }}">
                                        {{ $car->title }}
                                    </h4>
                                    @if ($car->car_type)
                                        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5 flex items-center gap-1">
                                             <span>{{ $car->car_icon ?: '🚗' }}</span>
                                             <span>{{ $car->car_type }}</span>
                                        </p>
                                    @endif
                                </div>

                                @if ($car->formatted_price)
                                    <div class="pt-2 border-t border-purple-500/15 flex items-baseline justify-between text-xs">
                                        <span class="text-[10px] text-zinc-500 dark:text-zinc-400">Tarif Sewa</span>
                                        <span class="font-bold text-purple-700 dark:text-cyan-300">{{ $car->formatted_price }} <span class="text-[10px] font-normal text-zinc-500 dark:text-zinc-400">/hari</span></span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('selectedArmadas') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 4. KELOLA MEDIA TERPASANG --}}
            @if ($existingPhotos->isNotEmpty() || $existingVideos->isNotEmpty())
                <div class="space-y-4 pb-6 border-b border-purple-500/15 dark:border-purple-500/20">
                    <div>
                        <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                            Berkas Lampiran Saat Ini
                        </label>
                        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">
                            Klik tombol hapus pada berkas yang ingin Anda singkirkan.
                        </p>
                    </div>

                    {{-- Existing Photos --}}
                    @if ($existingPhotos->isNotEmpty())
                        <div>
                            <span class="text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-2 block">📷 Foto Lampiran Terpasang:</span>
                            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3">
                                @foreach ($existingPhotos as $med)
                                    @php
                                        $isMarkedForRemoval = in_array($med->id, $removeMediaIds);
                                    @endphp
                                    <div class="relative group rounded-xl overflow-hidden border aspect-square {{ $isMarkedForRemoval ? 'border-rose-500 opacity-60' : 'border-zinc-200 dark:border-purple-500/30' }} bg-slate-50 dark:bg-[#0a0c14]">
                                        <img src="{{ $med->getUrl() }}" alt="Media" class="w-full h-full object-cover {{ $isMarkedForRemoval ? 'grayscale' : '' }}">

                                        @if ($isMarkedForRemoval)
                                            <div class="absolute inset-0 bg-rose-950/80 text-rose-200 text-xs font-bold flex flex-col items-center justify-center p-2 text-center gap-1">
                                                <span>Akan Dihapus</span>
                                                <button
                                                    type="button"
                                                    wire:click="unmarkMediaForRemoval({{ $med->id }})"
                                                    class="px-2 py-0.5 rounded bg-white text-zinc-900 text-[10px] font-semibold hover:bg-zinc-200 transition"
                                                >
                                                    Batal Hapus
                                                </button>
                                            </div>
                                        @else
                                            <button
                                                type="button"
                                                wire:click="markMediaForRemoval({{ $med->id }})"
                                                class="absolute top-1.5 right-1.5 w-6 h-6 rounded-full bg-rose-600 text-white text-xs flex items-center justify-center hover:bg-rose-500 transition shadow"
                                                title="Hapus foto ini"
                                            >
                                                ✕
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Existing Videos --}}
                    @if ($existingVideos->isNotEmpty())
                        <div>
                            <span class="text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-2 block">🎥 Video Lampiran Terpasang:</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach ($existingVideos as $med)
                                    @php
                                        $isMarkedForRemoval = in_array($med->id, $removeMediaIds);
                                    @endphp
                                    <div class="relative rounded-xl overflow-hidden border {{ $isMarkedForRemoval ? 'border-rose-500 opacity-60' : 'border-zinc-200 dark:border-purple-500/30' }} bg-black">
                                        <video src="{{ $med->getUrl() }}" controls class="w-full h-40 object-contain"></video>

                                        <div class="p-2.5 bg-slate-100 dark:bg-[#141728] flex items-center justify-between text-xs">
                                            <span class="text-zinc-600 dark:text-zinc-300 font-medium">Video Terunggah</span>
                                            @if ($isMarkedForRemoval)
                                                <button
                                                    type="button"
                                                    wire:click="unmarkMediaForRemoval({{ $med->id }})"
                                                    class="px-2.5 py-1 rounded bg-rose-600 hover:bg-rose-500 text-white font-semibold text-[11px] transition"
                                                >
                                                    Batal Hapus
                                                </button>
                                            @else
                                                <button
                                                    type="button"
                                                    wire:click="markMediaForRemoval({{ $med->id }})"
                                                    class="px-2.5 py-1 rounded bg-rose-500/10 hover:bg-rose-500/20 text-rose-600 dark:text-rose-400 border border-rose-500/30 font-semibold text-[11px] transition"
                                                >
                                                    🗑️ Hapus Video
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            {{-- 5. UNGGAH FOTO BARU --}}
            <div id="field-photos" class="scroll-mt-28 space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20 {{ $errors->has('photos') || $errors->has('photos.*') ? 'has-error' : '' }}" @error('photos.*') data-has-error="true" @enderror>
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Tambah Foto Baru (Opsional)
                </label>
                <p class="text-xs text-zinc-500 dark:text-zinc-400">
                    Bisa memilih foto baru untuk ditambahkan ke ulasan Anda (JPG, PNG, WebP, Maks 10MB per foto).
                </p>
                <input
                    type="file"
                    wire:model="photos"
                    multiple
                    accept="image/*"
                    class="w-full text-xs text-zinc-600 dark:text-zinc-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-100 dark:file:bg-[#141728] file:text-purple-700 dark:file:text-purple-300 hover:file:bg-zinc-200 dark:hover:file:bg-[#1a1f35] cursor-pointer"
                >
                @error('photos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror

                {{-- Preview Foto Baru --}}
                @if (!empty($photos))
                    <div class="pt-2">
                        <span class="text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-2 block">Foto Baru yang Akan Ditambahkan ({{ count($photos) }}):</span>
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-3">
                            @foreach ($photos as $index => $photo)
                                <div class="relative group rounded-xl overflow-hidden border border-zinc-200 dark:border-purple-500/30 bg-slate-50 dark:bg-[#0a0c14] aspect-square">
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="w-full h-full object-cover">
                                    <button
                                        type="button"
                                        wire:click="removePhoto({{ $index }})"
                                        class="absolute top-1 right-1 w-6 h-6 rounded-full bg-rose-600 text-white text-xs flex items-center justify-center hover:bg-rose-500 transition shadow"
                                        title="Hapus foto ini"
                                    >
                                        ✕
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- 6. UNGGAH VIDEO BARU --}}
            <div id="field-videos" class="scroll-mt-28 space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20 {{ $errors->has('videos') || $errors->has('videos.*') ? 'has-error' : '' }}" @error('videos.*') data-has-error="true" @enderror>
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Tambah Video Baru (Opsional)
                </label>
                <p class="text-xs text-zinc-500 dark:text-zinc-400">
                    Bisa memilih video singkat suasana armada atau perjalanan (MP4, MOV, WebM, AVI, Maks 50MB per berkas).
                </p>
                <input
                    type="file"
                    wire:model="videos"
                    multiple
                    accept="video/*"
                    class="w-full text-xs text-zinc-600 dark:text-zinc-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-100 dark:file:bg-[#141728] file:text-purple-700 dark:file:text-purple-300 hover:file:bg-zinc-200 dark:hover:file:bg-[#1a1f35] cursor-pointer"
                >
                @error('videos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror

                {{-- Preview Video Baru --}}
                @if (!empty($videos))
                    <div class="pt-2">
                        <span class="text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-2 block">Video Baru yang Akan Ditambahkan ({{ count($videos) }}):</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($videos as $index => $video)
                                <div class="relative rounded-xl overflow-hidden border border-zinc-200 dark:border-purple-500/30 bg-slate-50 dark:bg-[#0a0c14] p-3 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="text-2xl">🎬</span>
                                        <div class="truncate">
                                            <span class="text-xs font-medium text-zinc-700 dark:text-zinc-200 block truncate">{{ $video->getClientOriginalName() }}</span>
                                            <span class="text-[10px] text-zinc-400">{{ round($video->getSize() / 1024 / 1024, 2) }} MB</span>
                                        </div>
                                    </div>
                                    <button
                                        type="button"
                                        wire:click="removeVideo({{ $index }})"
                                        class="w-7 h-7 rounded-full bg-rose-600 text-white text-xs flex items-center justify-center hover:bg-rose-500 transition shadow"
                                        title="Hapus video ini"
                                    >
                                        ✕
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- LOADING NOTIFICATION UNTUK FILE UPLOADS --}}
            <div wire:loading wire:target="photos,videos" class="p-3 rounded-xl bg-purple-500/10 border border-purple-500/20 text-purple-700 dark:text-purple-300 text-xs flex items-center gap-2 font-medium">
                <span class="animate-spin text-sm">⏳</span> Sedang mengunggah berkas media, mohon tunggu sebentar...
            </div>

            {{-- 7. TOMBOL AKSI SUBMIT --}}
            <div class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-4">
                <a
                    href="{{ route('dashboard') }}"
                    class="w-full sm:w-auto px-6 py-3 rounded-xl bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700 text-zinc-800 dark:text-zinc-200 font-semibold text-xs transition text-center no-underline cursor-pointer"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit,photos,videos"
                    class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-gradient-to-r from-purple-600 via-purple-500 to-cyan-500 hover:opacity-95 text-white font-bold text-sm shadow-[0_0_25px_rgba(124,58,237,0.4)] transition-all cursor-pointer flex items-center justify-center gap-2 disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="submit">💾 Simpan Perubahan Ulasan</span>
                    <span wire:loading wire:target="submit" class="flex items-center gap-2">
                        <span class="animate-spin">⏳</span> Menyimpan perubahan...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
