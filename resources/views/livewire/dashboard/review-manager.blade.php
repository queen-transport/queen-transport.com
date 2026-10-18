<div class="space-y-6">
    {{-- ALERT / NOTIFIKASI --}}
    @if (session()->has('feedbackMessage'))
        <div class="rounded-xl p-4 flex items-center justify-between border {{ session('feedbackType') === 'success' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-400' : 'bg-rose-500/10 border-rose-500/30 text-rose-400' }}">
            <div class="flex items-center gap-3">
                <span class="text-xl">{{ session('feedbackType') === 'success' ? '✅' : '⚠️' }}</span>
                <span class="text-sm font-medium">{{ session('feedbackMessage') }}</span>
            </div>
        </div>
    @elseif ($feedbackMessage)
        <div class="rounded-xl p-4 flex items-center justify-between border {{ $feedbackType === 'success' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-400' : 'bg-rose-500/10 border-rose-500/30 text-rose-400' }}">
            <div class="flex items-center gap-3">
                <span class="text-xl">{{ $feedbackType === 'success' ? '✅' : '⚠️' }}</span>
                <span class="text-sm font-medium">{{ $feedbackMessage }}</span>
            </div>
            <button type="button" wire:click="$set('feedbackMessage', null)" class="text-zinc-400 hover:text-white text-sm font-bold ml-4">✕</button>
        </div>
    @endif

    {{-- HEADER KELOLA ULASAN --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white dark:bg-[#0f1220]/90 border border-purple-500/15 dark:border-purple-500/25 rounded-2xl p-6 backdrop-blur-xl shadow-sm dark:shadow-lg">
        <div>
            <h2 class="text-xl font-bold text-zinc-900 dark:text-white flex items-center gap-2 font-['Cinzel',serif] tracking-wide">
                <span>⭐</span> Ulasan &amp; Pengalaman Sewa
            </h2>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">
                Bagikan ulasan dan penilaian Anda mengenai armada serta layanan Queen Transport.
            </p>
        </div>
        <a
            href="{{ route('reviews.create') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 via-purple-500 to-cyan-500 hover:opacity-95 text-white font-semibold text-sm shadow-[0_0_20px_rgba(124,58,237,0.3)] transition-all cursor-pointer shrink-0 no-underline"
        >
            <span>✍️</span> Tulis Ulasan Baru
        </a>
    </div>

    {{-- DAFTAR ULASAN SAYA --}}
    @if ($reviews->isEmpty())
        <div class="bg-white dark:bg-[#0f1220]/60 border border-purple-500/15 dark:border-purple-500/20 rounded-2xl p-12 text-center flex flex-col items-center justify-center backdrop-blur-xl">
            <div class="w-16 h-16 rounded-full bg-purple-500/10 border border-purple-500/30 flex items-center justify-center text-3xl mb-4 shadow-[0_0_20px_rgba(124,58,237,0.15)]">
                💬
            </div>
            <h3 class="text-base font-semibold text-zinc-800 dark:text-zinc-200">Belum ada ulasan yang dibuat</h3>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 max-w-md mt-1 mb-6">
                Anda belum pernah memberikan ulasan. Ulasan Anda sangat berharga bagi kami dan pelanggan lain.
            </p>
            <a
                href="{{ route('reviews.create') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-cyan-600 hover:opacity-90 text-white text-sm font-semibold transition shadow-md cursor-pointer no-underline"
            >
                <span>➕</span> Buat Ulasan Pertama Anda
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 gap-5">
            @foreach ($reviews as $rev)
                <div class="bg-white dark:bg-[#0f1220]/90 border border-purple-500/15 dark:border-purple-500/20 hover:border-purple-500/40 rounded-2xl p-6 transition-all shadow-sm dark:shadow-lg backdrop-blur-xl space-y-4">
                    {{-- Baris Atas: Rating, Status, Tanggal --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-zinc-200 dark:border-zinc-800/80">
                        <div class="flex items-center gap-3">
                            <div class="flex text-amber-400 text-lg">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= $rev->rating ? '★' : '☆' }}</span>
                                @endfor
                            </div>
                            <span class="text-sm font-bold text-zinc-800 dark:text-zinc-200">{{ $rev->rating }}.0 / 5.0</span>
                        </div>

                        <div class="flex items-center gap-2">
                            @if ($rev->status === \App\Models\Review::STATUS_APPROVED)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 border border-emerald-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Ditayangkan
                                </span>
                            @elseif ($rev->status === \App\Models\Review::STATUS_PENDING)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/15 text-amber-600 dark:text-amber-400 border border-amber-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu Persetujuan
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-500/15 text-rose-600 dark:text-rose-400 border border-rose-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
                                </span>
                            @endif

                            <span class="text-xs text-zinc-500">
                                {{ $rev->created_at?->translatedFormat('d M Y, H:i') }}
                            </span>
                        </div>
                    </div>

                    {{-- Armada Tags --}}
                    @if ($rev->armadas->isNotEmpty())
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="text-xs text-zinc-500">Armada:</span>
                            @foreach ($rev->armadas as $armada)
                                <a href="{{ route('armada.show', $armada) }}" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-purple-700 dark:text-purple-300 text-xs border border-zinc-200 dark:border-zinc-700 hover:border-purple-500 transition">
                                    🚗 {{ $armada->title }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                    {{-- Konten Review --}}
                    <div class="space-y-3">
                        {{-- Detail Ulasan (Mobil, Driver, Fasilitas) --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2.5 pt-1 text-xs">
                            <div class="p-3 rounded-xl bg-purple-500/5 dark:bg-purple-950/30 border border-purple-500/15 dark:border-purple-500/20">
                                <span class="font-semibold text-purple-700 dark:text-purple-300 block mb-0.5">🚗 Tentang Mobil:</span>
                                <span class="text-zinc-600 dark:text-zinc-400 leading-relaxed">{{ $rev->car_review }}</span>
                            </div>
                            <div class="p-3 rounded-xl bg-purple-500/5 dark:bg-purple-950/30 border border-purple-500/15 dark:border-purple-500/20">
                                <span class="font-semibold text-purple-700 dark:text-purple-300 block mb-0.5">👨‍✈️ Tentang Driver:</span>
                                <span class="text-zinc-600 dark:text-zinc-400 leading-relaxed">{{ $rev->driver_review }}</span>
                            </div>
                            <div class="p-3 rounded-xl bg-purple-500/5 dark:bg-purple-950/30 border border-purple-500/15 dark:border-purple-500/20">
                                <span class="font-semibold text-purple-700 dark:text-purple-300 block mb-0.5">✨ Kualitas &amp; Fasilitas:</span>
                                <span class="text-zinc-600 dark:text-zinc-400 leading-relaxed">{{ $rev->facilities_review }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Foto Lampiran --}}
                    @php
                        $revPhotos = $rev->getMedia('photos');
                        $revVideos = $rev->getMedia('videos');
                    @endphp

                    @if ($revPhotos->isNotEmpty() || $revVideos->isNotEmpty())
                        <div class="pt-2 space-y-3">
                            @if ($revPhotos->isNotEmpty())
                                <div>
                                    <span class="text-xs font-medium text-zinc-400 mb-2 block">📷 Foto Lampiran:</span>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach ($revPhotos as $photo)
                                            <a href="{{ $photo->getUrl() }}" target="_blank" class="block w-20 h-20 rounded-xl overflow-hidden border border-zinc-200 dark:border-zinc-700 hover:border-purple-500 transition">
                                                <img src="{{ $photo->getUrl() }}" alt="Lampiran ulasan" class="w-full h-full object-cover">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if ($revVideos->isNotEmpty())
                                <div>
                                    <span class="text-xs font-medium text-zinc-500 dark:text-zinc-400 mb-2 block">🎥 Video Lampiran:</span>
                                    <div class="flex flex-wrap gap-4">
                                        @foreach ($revVideos as $video)
                                            <div class="w-64 max-w-full rounded-xl overflow-hidden border border-zinc-200 dark:border-zinc-700 bg-black">
                                                <video src="{{ $video->getUrl() }}" controls class="w-full h-36 object-contain"></video>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Footer Aksi (Aturan 24 Jam via ReviewPolicy) --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-zinc-200 dark:border-zinc-800 text-xs">
                        <div>
                            @can('update', $rev)
                                <span class="text-emerald-600 dark:text-emerald-400 inline-flex items-center gap-1">
                                    ⏱️ Dapat diedit hingga: <strong class="font-medium text-zinc-700 dark:text-zinc-300">{{ $rev->created_at?->addHours(24)->translatedFormat('d M Y, H:i') }}</strong>
                                </span>
                            @else
                                <span class="text-zinc-500 inline-flex items-center gap-1">
                                    🔒 Terkunci (melewati batas waktu 24 jam)
                                </span>
                            @endcan
                        </div>

                        <div class="flex items-center gap-2">
                            @can('update', $rev)
                                <button
                                    type="button"
                                    wire:click="openEditModal('{{ $rev->id }}')"
                                    class="px-3 py-1.5 rounded-lg bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700 text-zinc-800 dark:text-zinc-200 border border-zinc-200 dark:border-zinc-700 transition cursor-pointer font-medium"
                                >
                                    ✏️ Edit
                                </button>
                            @endcan

                            @can('delete', $rev)
                                <button
                                    type="button"
                                    wire:click="deleteReview('{{ $rev->id }}')"
                                    wire:confirm="Apakah Anda yakin ingin menghapus ulasan ini?"
                                    class="px-3 py-1.5 rounded-lg bg-rose-500/10 hover:bg-rose-500/20 text-rose-600 dark:text-rose-400 border border-rose-500/30 transition cursor-pointer font-medium"
                                >
                                    🗑️ Hapus
                                </button>
                            @endcan

                            @cannot('update', $rev)
                                <span class="text-zinc-400 dark:text-zinc-600 italic">Tidak dapat diubah/dihapus</span>
                            @endcannot
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{-- MODAL EDIT REVIEW --}}
    @if ($showEditModal && $editingReview)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 dark:bg-black/85 backdrop-blur-md overflow-y-auto">
            <div class="bg-white dark:bg-[#0f1220] border border-purple-500/20 dark:border-purple-500/30 rounded-3xl w-full max-w-2xl p-6 sm:p-8 space-y-6 my-8 shadow-2xl">
                <div class="flex items-center justify-between pb-3 border-b border-purple-500/15 dark:border-purple-500/20">
                    <h3 class="text-lg font-bold text-zinc-900 dark:text-white flex items-center gap-2 font-['Cinzel',serif] tracking-wide">
                        <span>✏️</span> Edit Ulasan
                    </h3>
                    <button type="button" wire:click="$set('showEditModal', false)" class="text-zinc-400 hover:text-zinc-900 dark:hover:text-white text-lg">✕</button>
                </div>

                <form wire:submit.prevent="submitEdit" class="space-y-5">
                    {{-- Rating Bintang --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Penilaian Bintang (1 - 5) <span class="text-rose-400">*</span></label>
                        <div class="flex items-center gap-2">
                            @for ($star = 1; $star <= 5; $star++)
                                <button
                                    type="button"
                                    wire:click="$set('rating', {{ $star }})"
                                    class="text-3xl transition-transform hover:scale-110 focus:outline-none {{ $star <= $rating ? 'text-amber-400' : 'text-zinc-300 dark:text-zinc-600' }}"
                                >
                                    ★
                                </button>
                            @endfor
                            <span class="text-sm font-semibold text-zinc-700 dark:text-zinc-300 ml-2">({{ $rating }} Bintang)</span>
                        </div>
                        @error('rating') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Pilih Armada (Dengan Foto Bila Ada) --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Armada yang Digunakan (Opsional)</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 max-h-56 overflow-y-auto p-2.5 rounded-xl bg-slate-50 dark:bg-[#0a0c14] border border-purple-500/15 dark:border-purple-500/20">
                            @foreach ($availableArmadas as $armada)
                                @php
                                    $isSelectedArmada = in_array($armada->id, $selectedArmadas);
                                @endphp
                                <label class="flex items-center gap-3 p-2.5 rounded-xl border cursor-pointer transition-all {{ $isSelectedArmada ? 'bg-purple-100 dark:bg-purple-950/40 border-purple-500 text-purple-950 dark:text-white shadow-[0_0_12px_rgba(124,58,237,0.2)]' : 'bg-white dark:bg-[#141728]/70 border-zinc-200 dark:border-purple-500/15 hover:border-purple-500/40 text-zinc-700 dark:text-zinc-300' }}">
                                    <input
                                        type="checkbox"
                                        value="{{ $armada->id }}"
                                        wire:model="selectedArmadas"
                                        class="rounded bg-white dark:bg-[#0a0c14] border-zinc-300 dark:border-purple-500/40 text-purple-600 focus:ring-purple-500"
                                    >
                                    @if ($armada->photo_url)
                                        <img src="{{ $armada->photo_url }}" alt="{{ $armada->title }}" class="w-11 h-11 rounded-lg object-cover border border-purple-500/30 shrink-0">
                                    @else
                                        <div class="w-11 h-11 rounded-lg bg-purple-100 dark:bg-purple-950/40 border border-purple-500/20 flex items-center justify-center text-lg shrink-0">
                                            {{ $armada->car_icon ?: '🚗' }}
                                        </div>
                                    @endif
                                    <div class="min-w-0 flex-1">
                                        <div class="text-xs font-semibold truncate">{{ $armada->title }}</div>
                                        @if ($armada->car_type)
                                            <div class="text-[10px] text-zinc-500 dark:text-zinc-400 truncate">{{ $armada->car_type }}</div>
                                        @endif
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Detail Ulasan (Wajib Diisi: Mobil, Driver, Fasilitas) --}}
                    <div class="space-y-3 pt-1">
                        <label class="block text-xs font-bold text-zinc-800 dark:text-zinc-200">Ulasan Detail Layanan <span class="text-rose-400">*</span></label>
                        <div class="grid grid-cols-1 gap-3">
                            <div>
                                <label class="block text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-1">🚗 1. Tentang Mobil <span class="text-rose-400">*</span></label>
                                <textarea
                                    wire:model="carReview"
                                    rows="2"
                                    maxlength="500"
                                    placeholder="Kondisi mobil, kebersihan, AC, kenyamanan suspensi..."
                                    class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#0a0c14] border border-zinc-300 dark:border-purple-500/20 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-xs focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                                ></textarea>
                                @error('carReview') <span class="text-xs text-rose-400 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-1">👨‍✈️ 2. Tentang Driver <span class="text-rose-400">*</span></label>
                                <textarea
                                    wire:model="driverReview"
                                    rows="2"
                                    maxlength="500"
                                    placeholder="Ketepatan waktu, keramahan sopir, penguasaan jalan..."
                                    class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#0a0c14] border border-zinc-300 dark:border-purple-500/20 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-xs focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                                ></textarea>
                                @error('driverReview') <span class="text-xs text-rose-400 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-zinc-600 dark:text-zinc-400 mb-1">✨ 3. Kualitas &amp; Fasilitas <span class="text-rose-400">*</span></label>
                                <textarea
                                    wire:model="facilitiesReview"
                                    rows="2"
                                    maxlength="500"
                                    placeholder="Kemudahan pemesanan, fasilitas kabin, respon pelayanan..."
                                    class="w-full px-3 py-2 rounded-xl bg-white dark:bg-[#0a0c14] border border-zinc-300 dark:border-purple-500/20 text-zinc-900 dark:text-white placeholder-zinc-400 dark:placeholder-zinc-500 text-xs focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                                ></textarea>
                                @error('facilitiesReview') <span class="text-xs text-rose-400 mt-0.5 block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Media yang Sudah Ada --}}
                    @php
                        $existingMedia = $editingReview->media;
                    @endphp
                    @if ($existingMedia->isNotEmpty())
                        <div>
                            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1.5">Berkas Media Saat Ini</label>
                            <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                                @foreach ($existingMedia as $med)
                                    <div class="relative rounded-xl overflow-hidden border {{ in_array($med->id, $removeMediaIds) ? 'border-rose-500 opacity-40' : 'border-zinc-200 dark:border-purple-500/20' }} group">
                                        @if (str_starts_with($med->mime_type, 'image/'))
                                            <img src="{{ $med->getUrl() }}" alt="Media" class="w-full h-20 object-cover">
                                        @else
                                            <div class="w-full h-20 bg-slate-100 dark:bg-[#0a0c14] flex items-center justify-center text-xs text-zinc-600 dark:text-zinc-400">
                                                🎥 Video
                                            </div>
                                        @endif

                                        @if (in_array($med->id, $removeMediaIds))
                                            <button
                                                type="button"
                                                wire:click="unmarkMediaForRemoval({{ $med->id }})"
                                                class="absolute inset-0 bg-rose-950/80 text-rose-200 text-xs font-bold flex items-center justify-center"
                                            >
                                                Batal Hapus
                                            </button>
                                        @else
                                            <button
                                                type="button"
                                                wire:click="markMediaForRemoval({{ $med->id }})"
                                                class="absolute top-1 right-1 w-6 h-6 rounded-full bg-rose-600/90 text-white text-xs flex items-center justify-center hover:bg-rose-500"
                                                title="Hapus media ini"
                                            >
                                                ✕
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Tambah Foto Baru --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Tambah Foto Baru</label>
                        <input
                            type="file"
                            wire:model="photos"
                            multiple
                            accept="image/*"
                            class="w-full text-xs text-zinc-600 dark:text-zinc-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-100 dark:file:bg-[#141728] file:text-purple-700 dark:file:text-purple-300 hover:file:bg-zinc-200 dark:hover:file:bg-[#1a1f35] cursor-pointer"
                        >
                        @error('photos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tambah Video Baru --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-1">Tambah Video Baru</label>
                        <input
                            type="file"
                            wire:model="videos"
                            multiple
                            accept="video/*"
                            class="w-full text-xs text-zinc-600 dark:text-zinc-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-100 dark:file:bg-[#141728] file:text-purple-700 dark:file:text-purple-300 hover:file:bg-zinc-200 dark:hover:file:bg-[#1a1f35] cursor-pointer"
                        >
                        @error('videos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div wire:loading wire:target="photos,videos" class="text-xs text-purple-600 dark:text-purple-400 font-medium">
                        ⏳ Mengunggah berkas media, mohon tunggu...
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end gap-3 pt-3 border-t border-purple-500/15 dark:border-purple-500/20">
                        <button
                            type="button"
                            wire:click="$set('showEditModal', false)"
                            class="px-4 py-2.5 rounded-xl bg-zinc-100 hover:bg-zinc-200 dark:bg-[#141728] dark:hover:bg-[#1a1f35] text-zinc-700 dark:text-zinc-300 border border-zinc-300 dark:border-purple-500/20 text-sm font-medium transition cursor-pointer"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-cyan-600 hover:opacity-95 disabled:opacity-50 text-white text-sm font-semibold transition cursor-pointer shadow-[0_0_15px_rgba(124,58,237,0.3)]"
                        >
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
