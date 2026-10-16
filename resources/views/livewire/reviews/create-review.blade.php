<div class="max-w-4xl mx-auto space-y-6 pb-12">
    {{-- NAVIGASI KEMBALI --}}
    <div class="flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-sm text-zinc-400 hover:text-white transition">
            <span>←</span> Kembali ke Dashboard
        </a>

        @if ($preselectedArmada)
            <a href="{{ route('armada.show', $preselectedArmada) }}" class="inline-flex items-center gap-1.5 text-xs text-purple-400 hover:text-purple-300 transition">
                <span>🚗</span> Kembali ke halaman {{ $preselectedArmada->title }}
            </a>
        @endif
    </div>

    {{-- ALERT / NOTIFIKASI ERROR --}}
    @if ($feedbackMessage)
        <div class="rounded-xl p-4 flex items-center justify-between border {{ $feedbackType === 'success' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-400' : 'bg-rose-500/10 border-rose-500/30 text-rose-400' }}">
            <div class="flex items-center gap-3">
                <span class="text-xl">{{ $feedbackType === 'success' ? '✅' : '⚠️' }}</span>
                <span class="text-sm font-medium">{{ $feedbackMessage }}</span>
            </div>
            <button type="button" wire:click="$set('feedbackMessage', null)" class="text-zinc-400 hover:text-white text-sm font-bold ml-4">✕</button>
        </div>
    @endif

    {{-- HEADER HALAMAN --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-purple-950/60 via-zinc-900 to-zinc-900 border border-purple-500/20 p-6 md:p-8">
        <div class="relative z-10 space-y-2">
            <div class="flex flex-wrap items-center gap-2">
                <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                    <span>✍️</span> Tulis Ulasan &amp; Pengalaman Sewa
                </h1>
                @if ($preselectedArmada)
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/20 border border-purple-500/40 text-purple-300">
                        🚗 {{ $preselectedArmada->title }} Otomatis Terpilih
                    </span>
                @endif
            </div>
            <p class="text-sm text-zinc-400 max-w-2xl">
                Bagikan pengalaman nyata Anda selama menyewa armada dan layanan di Queen Transport. Ulasan Anda sangat berharga bagi kami dan calon pelanggan lain.
            </p>
        </div>
    </div>

    {{-- FORM ULASAN --}}
    <div class="bg-zinc-900/60 border border-zinc-800 rounded-2xl p-6 sm:p-8 space-y-8 backdrop-blur-sm shadow-xl">
        <form wire:submit.prevent="submit" class="space-y-8">
            {{-- 1. PENILAIAN BINTANG --}}
            <div class="space-y-3 pb-6 border-b border-zinc-800">
                <label class="block text-sm font-semibold text-zinc-200">
                    Penilaian Bintang <span class="text-rose-400">*</span>
                </label>
                <div class="flex items-center gap-2 flex-wrap">
                    <div class="flex items-center gap-1 bg-zinc-950 px-4 py-2 rounded-xl border border-zinc-800">
                        @for ($star = 1; $star <= 5; $star++)
                            <button
                                type="button"
                                wire:click="$set('rating', {{ $star }})"
                                class="text-3xl transition-transform hover:scale-125 focus:outline-none {{ $star <= $rating ? 'text-amber-400' : 'text-zinc-600 hover:text-amber-300/60' }}"
                                title="{{ $star }} Bintang"
                            >
                                ★
                            </button>
                        @endfor
                    </div>

                    <div class="text-sm font-semibold text-zinc-300 ml-2">
                        @switch($rating)
                            @case(5)
                                <span class="text-amber-400">⭐⭐⭐⭐⭐ 5.0 - Sangat Memuaskan &amp; Istimewa</span>
                                @break
                            @case(4)
                                <span class="text-amber-400">⭐⭐⭐⭐ 4.0 - Puas &amp; Menyenangkan</span>
                                @break
                            @case(3)
                                <span class="text-zinc-300">⭐⭐⭐ 3.0 - Cukup Baik</span>
                                @break
                            @case(2)
                                <span class="text-zinc-400">⭐⭐ 2.0 - Kurang Memuaskan</span>
                                @break
                            @case(1)
                                <span class="text-rose-400">⭐ 1.0 - Sangat Mengecewakan</span>
                                @break
                        @endswitch
                    </div>
                </div>
                @error('rating') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 2. PILIH ARMADA --}}
            <div class="space-y-3 pb-6 border-b border-zinc-800">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                    <div>
                        <label class="block text-sm font-semibold text-zinc-200">
                            Pilih Armada yang Digunakan (Opsional)
                        </label>
                        <p class="text-xs text-zinc-400 mt-0.5">
                            Armada yang diarahkan sudah dipilih otomatis. Anda tetap dapat memilih armada lain atau memilih lebih dari satu kendaraan:
                        </p>
                    </div>
                    <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-zinc-800 border border-zinc-700 text-purple-300 shrink-0 self-start sm:self-auto">
                        {{ count($selectedArmadas) }} Armada Terpilih
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 pt-2">
                    @foreach ($availableArmadas as $car)
                        @php
                            $isSelected = in_array($car->id, $selectedArmadas);
                        @endphp
                        <div
                            wire:click="toggleArmada({{ $car->id }})"
                            class="group relative flex items-center gap-3 p-3.5 rounded-xl border transition-all cursor-pointer {{ $isSelected ? 'bg-purple-950/40 border-purple-500 shadow-[0_0_15px_rgba(168,85,247,0.15)] ring-1 ring-purple-500/50' : 'bg-zinc-950/80 border-zinc-800 hover:border-zinc-700 hover:bg-zinc-900/60' }}"
                        >
                            {{-- Checkbox --}}
                            <div class="w-5 h-5 rounded-md border flex items-center justify-center shrink-0 transition-colors {{ $isSelected ? 'bg-purple-600 border-purple-500 text-white' : 'border-zinc-700 bg-zinc-900 text-transparent group-hover:border-zinc-600' }}">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                </svg>
                            </div>

                            {{-- Gambar Armada (Thumbnail) --}}
                            @if ($car->featured_image)
                                <div class="w-12 h-12 rounded-lg overflow-hidden shrink-0 border border-zinc-800 bg-zinc-900">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($car->featured_image) }}" alt="{{ $car->title }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-12 h-12 rounded-lg bg-zinc-900 border border-zinc-800 flex items-center justify-center text-xl shrink-0">
                                    🚗
                                </div>
                            @endif

                            {{-- Info Armada --}}
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs font-semibold truncate {{ $isSelected ? 'text-white' : 'text-zinc-200' }}">
                                    {{ $car->title }}
                                </h4>
                                @if ($car->car_type)
                                    <span class="text-[10px] text-zinc-400 truncate block">
                                        {{ $car->car_type }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('selectedArmadas') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 3. JUDUL ULASAN --}}
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-zinc-200">
                    Judul Ulasan (Opsional)
                </label>
                <input
                    type="text"
                    wire:model="title"
                    placeholder="Contoh: Perjalanan Nyaman &amp; Sopir Sangat Ramah"
                    class="w-full px-4 py-3 rounded-xl bg-zinc-950 border border-zinc-800 text-white placeholder-zinc-500 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition"
                >
                <p class="text-xs text-zinc-500">Ringkasan singkat ulasan pengalaman Anda (maksimal 150 karakter).</p>
                @error('title') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 4. ISI KOMENTAR / ULASAN --}}
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-zinc-200">
                    Cerita &amp; Pengalaman Anda <span class="text-rose-400">*</span>
                </label>
                <textarea
                    wire:model="comment"
                    rows="5"
                    placeholder="Ceritakan pengalaman Anda selama menggunakan armada atau layanan Queen Transport. Bagaimana kondisi kendaraan, ketepatan waktu penjemputan, keramahan sopir, hingga kemudahan reservasi..."
                    class="w-full px-4 py-3 rounded-xl bg-zinc-950 border border-zinc-800 text-white placeholder-zinc-500 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500 transition leading-relaxed"
                ></textarea>
                <div class="flex items-center justify-between text-xs text-zinc-500">
                    <span>Minimal 5 karakter, maksimal 2.000 karakter.</span>
                    <span>{{ strlen($comment) }} / 2000</span>
                </div>
                @error('comment') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- 5. FOTO LAMPIRAN --}}
            <div class="space-y-3 pb-6 border-b border-zinc-800">
                <label class="block text-sm font-semibold text-zinc-200">
                    Unggah Foto (Opsional)
                </label>
                <p class="text-xs text-zinc-400">
                    Bisa memilih lebih dari satu foto kenangan perjalanan Anda (JPG, PNG, WebP, Maks 10MB per foto).
                </p>
                <input
                    type="file"
                    wire:model="photos"
                    multiple
                    accept="image/*"
                    class="w-full text-xs text-zinc-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-purple-300 hover:file:bg-zinc-700 cursor-pointer"
                >
                @error('photos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror

                {{-- Preview Foto Baru --}}
                @if (!empty($photos))
                    <div class="pt-2">
                        <span class="text-xs font-medium text-zinc-400 mb-2 block">Foto yang Akan Diunggah ({{ count($photos) }}):</span>
                        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-3">
                            @foreach ($photos as $index => $photo)
                                <div class="relative group rounded-xl overflow-hidden border border-zinc-700 bg-zinc-950 aspect-square">
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
            <div class="space-y-3 pb-6 border-b border-zinc-800">
                <label class="block text-sm font-semibold text-zinc-200">
                    Unggah Video (Opsional)
                </label>
                <p class="text-xs text-zinc-400">
                    Bisa memilih video singkat suasana armada atau perjalanan (MP4, MOV, WebM, AVI, Maks 50MB per berkas).
                </p>
                <input
                    type="file"
                    wire:model="videos"
                    multiple
                    accept="video/*"
                    class="w-full text-xs text-zinc-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-purple-300 hover:file:bg-zinc-700 cursor-pointer"
                >
                @error('videos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror

                {{-- Preview Video Baru --}}
                @if (!empty($videos))
                    <div class="pt-2 space-y-2">
                        <span class="text-xs font-medium text-zinc-400 block">Video yang Akan Diunggah ({{ count($videos) }}):</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($videos as $vIndex => $video)
                                <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg bg-zinc-800 border border-zinc-700 text-xs text-zinc-300">
                                    <span>🎥 {{ $video->getClientOriginalName() }}</span>
                                    <button
                                        type="button"
                                        wire:click="removeVideo({{ $vIndex }})"
                                        class="text-rose-400 hover:text-rose-300 ml-1 font-bold"
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
            <div wire:loading wire:target="photos,videos" class="p-3 rounded-xl bg-purple-500/10 border border-purple-500/30 text-purple-300 text-xs flex items-center gap-2">
                <span class="animate-spin text-base">⏳</span>
                <span>Sedang mengunggah berkas media ke sistem, mohon tunggu sebentar...</span>
            </div>

            {{-- INFORMASI KEBIJAKAN --}}
            <div class="rounded-xl bg-purple-500/10 border border-purple-500/20 p-4 text-xs text-purple-300 space-y-1.5">
                <p class="font-semibold flex items-center gap-1.5">
                    <span>ℹ️</span> Informasi Moderasi Ulasan:
                </p>
                <ul class="list-disc list-inside space-y-1 text-zinc-400">
                    <li>Setiap ulasan akan diperiksa dan diverifikasi oleh tim kami terlebih dahulu sebelum ditampilkan ke publik.</li>
                    <li>Sesuai kebijakan layanan, Anda dapat melakukan revisi (edit) atau menghapus ulasan ini maksimal dalam waktu 24 jam setelah dikirim melalui Dashboard.</li>
                </ul>
            </div>

            {{-- TOMBOL AKSI --}}
            <div class="flex items-center justify-between pt-4">
                <a
                    href="{{ route('dashboard') }}"
                    class="px-5 py-2.5 rounded-xl bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 text-zinc-300 text-sm font-medium transition cursor-pointer no-underline"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold text-sm shadow-lg shadow-purple-600/30 transition-all cursor-pointer disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="submit">🚀 Kirim Ulasan</span>
                    <span wire:loading wire:target="submit">⏳ Mengirim ulasan...</span>
                </button>
            </div>
        </form>
    </div>
</div>
