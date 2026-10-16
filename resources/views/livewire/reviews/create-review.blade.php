<div class="max-w-4xl mx-auto space-y-6 pb-12">
    {{-- NAVIGASI KEMBALI --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white transition">
            <span>←</span> Kembali ke Dashboard
        </a>

        @if ($preselectedArmada)
            <a href="{{ route('armada.show', $preselectedArmada) }}" class="inline-flex items-center gap-1.5 text-xs text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 transition">
                <span>🚗</span> Kembali ke halaman {{ $preselectedArmada->title }}
            </a>
        @endif
    </div>

    {{-- ALERT / NOTIFIKASI ERROR --}}
    @if ($feedbackMessage)
        <div class="rounded-xl p-4 flex items-center justify-between border {{ $feedbackType === 'success' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-600 dark:text-emerald-400' : 'bg-rose-500/10 border-rose-500/30 text-rose-600 dark:text-rose-400' }}">
            <div class="flex items-center gap-3">
                <span class="text-xl">{{ $feedbackType === 'success' ? '✅' : '⚠️' }}</span>
                <span class="text-sm font-medium">{{ $feedbackMessage }}</span>
            </div>
            <button type="button" wire:click="$set('feedbackMessage', null)" class="text-zinc-400 hover:text-zinc-900 dark:hover:text-white text-sm font-bold ml-4">✕</button>
        </div>
    @endif

    {{-- HEADER HALAMAN --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-purple-50 via-indigo-50/50 to-slate-100 dark:from-[#0a0c14] dark:via-[#1a1035] dark:to-[#0f2030] border border-purple-500/20 dark:border-purple-500/30 p-6 md:p-8 shadow-sm dark:shadow-[0_12px_40px_rgba(0,0,0,0.6)] backdrop-blur-xl">
        <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-purple-600/10 dark:bg-purple-600/20 blur-3xl pointer-events-none"></div>
        <div class="absolute -left-16 -bottom-16 w-64 h-64 rounded-full bg-cyan-500/10 dark:bg-cyan-500/15 blur-3xl pointer-events-none"></div>

        <div class="relative z-10 space-y-2">
            <div class="flex flex-wrap items-center gap-2.5">
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white flex items-center gap-2 font-['Cinzel',serif] tracking-wide">
                    <span>✍️</span> Tulis Ulasan &amp; Pengalaman Sewa
                </h1>
                @if ($preselectedArmada)
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/15 dark:bg-purple-500/20 border border-purple-400/40 text-purple-700 dark:text-purple-300 font-['Orbitron',sans-serif] tracking-wider uppercase">
                        🚗 {{ $preselectedArmada->title }} Otomatis Terpilih
                    </span>
                @endif
            </div>
            <p class="text-sm text-zinc-600 dark:text-zinc-400 max-w-2xl leading-relaxed">
                Bagikan pengalaman nyata Anda selama menyewa armada dan layanan di Queen Transport. Ulasan Anda sangat berharga bagi kami dan calon pelanggan lain.
            </p>
        </div>
    </div>

    {{-- FORM ULASAN --}}
    <div class="bg-white/95 dark:bg-[#0f1220]/95 border border-purple-500/15 dark:border-purple-500/25 rounded-3xl p-6 sm:p-8 space-y-8 backdrop-blur-2xl shadow-sm dark:shadow-[0_16px_50px_rgba(0,0,0,0.7)]">
        <form wire:submit.prevent="submit" class="space-y-8">
            {{-- 1. PENILAIAN BINTANG --}}
            <div class="space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20">
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Penilaian Bintang <span class="text-rose-400">*</span>
                </label>
                <div class="flex items-center gap-2 flex-wrap">
                    <div class="flex items-center gap-1 bg-slate-50 dark:bg-[#0a0c14] px-4 py-2 rounded-xl border border-zinc-200 dark:border-purple-500/25 shadow-inner">
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

            {{-- 2. PILIH ARMADA (DENGAN TAMPILAN FOTO TIAP ARMADA) --}}
            <div class="space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20">
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

            {{-- 3. JUDUL ULASAN --}}
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Judul Ulasan (Opsional)
                </label>
                <input
                    type="text"
                    wire:model="title"
                    placeholder="Contoh: Perjalanan Nyaman &amp; Sopir Sangat Ramah"
                    class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0a0c14] border border-zinc-300 dark:border-purple-500/20 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition"
                >
                <p class="text-xs text-zinc-500">Ringkasan singkat ulasan pengalaman Anda (maksimal 150 karakter).</p>
                @error('title') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 4. ISI KOMENTAR / ULASAN --}}
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Cerita &amp; Pengalaman Anda <span class="text-rose-400">*</span>
                </label>
                <textarea
                    wire:model="comment"
                    rows="5"
                    placeholder="Ceritakan pengalaman Anda selama menggunakan armada atau layanan Queen Transport. Bagaimana kondisi kendaraan, ketepatan waktu penjemputan, keramahan sopir, hingga kemudahan reservasi..."
                    class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0a0c14] border border-zinc-300 dark:border-purple-500/20 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition leading-relaxed"
                ></textarea>
                <div class="flex items-center justify-between text-xs text-zinc-500">
                    <span>Minimal 5 karakter, maksimal 2.000 karakter.</span>
                    <span>{{ strlen($comment) }} / 2000</span>
                </div>
                @error('comment') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 5. FOTO LAMPIRAN --}}
            <div class="space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20">
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Unggah Foto (Opsional)
                </label>
                <p class="text-xs text-zinc-500 dark:text-zinc-400">
                    Bisa memilih lebih dari satu foto kenangan perjalanan Anda (JPG, PNG, WebP, Maks 10MB per foto).
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
                        <span class="text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-2 block">Foto yang Akan Diunggah ({{ count($photos) }}):</span>
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

            {{-- 6. VIDEO LAMPIRAN --}}
            <div class="space-y-3 pb-6 border-b border-purple-500/15 dark:border-purple-500/20">
                <label class="block text-sm font-semibold text-zinc-800 dark:text-zinc-200">
                    Unggah Video (Opsional)
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
                    <div class="pt-2 space-y-2">
                        <span class="text-xs font-medium text-zinc-600 dark:text-zinc-400 block">Video yang Akan Diunggah ({{ count($videos) }}):</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($videos as $vIndex => $video)
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-zinc-100 dark:bg-[#141728] border border-zinc-200 dark:border-purple-500/25 text-xs text-zinc-700 dark:text-zinc-300">
                                    <span>🎥 {{ $video->getClientOriginalName() }}</span>
                                    <button
                                        type="button"
                                        wire:click="removeVideo({{ $vIndex }})"
                                        class="text-rose-500 hover:text-rose-400 ml-1 font-bold"
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

            {{-- UPLOAD LOADING INDICATOR --}}
            <div wire:loading wire:target="photos,videos" class="p-3 rounded-xl bg-purple-500/10 border border-purple-500/30 text-purple-700 dark:text-purple-300 text-xs flex items-center gap-2">
                <span class="animate-spin text-base">⏳</span>
                <span>Sedang mengunggah berkas media ke sistem, mohon tunggu sebentar...</span>
            </div>

            {{-- INFORMASI KEBIJAKAN --}}
            <div class="rounded-2xl bg-purple-50/80 dark:bg-purple-950/30 border border-purple-200 dark:border-purple-500/30 p-4 sm:p-5 text-xs text-purple-900 dark:text-purple-200 space-y-2 backdrop-blur-sm">
                <p class="font-semibold flex items-center gap-2 text-sm text-purple-700 dark:text-cyan-300">
                    <span>ℹ️</span> Informasi Kebijakan &amp; Moderasi Ulasan:
                </p>
                <ul class="list-disc list-inside space-y-1 text-zinc-600 dark:text-zinc-400">
                    <li>Setiap ulasan akan diverifikasi terlebih dahulu sebelum ditayangkan ke publik di halaman armada terkait.</li>
                    <li>Sesuai kebijakan layanan, Anda dapat melakukan revisi (edit) atau menghapus ulasan ini maksimal dalam waktu 24 jam setelah dikirim melalui Dashboard.</li>
                </ul>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="flex items-center justify-between pt-4">
                <a
                    href="{{ route('dashboard') }}"
                    class="px-5 py-2.5 rounded-xl bg-zinc-100 hover:bg-zinc-200 dark:bg-[#141728] dark:hover:bg-[#1a1f35] border border-zinc-300 dark:border-purple-500/20 text-zinc-700 dark:text-zinc-300 text-sm font-medium transition cursor-pointer no-underline"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 via-purple-500 to-cyan-500 hover:opacity-95 text-white font-semibold text-sm shadow-[0_0_25px_rgba(124,58,237,0.4)] transition-all cursor-pointer disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="submit">🚀 Kirim Ulasan</span>
                    <span wire:loading wire:target="submit">⏳ Mengirim ulasan...</span>
                </button>
            </div>
        </form>
    </div>
</div>
