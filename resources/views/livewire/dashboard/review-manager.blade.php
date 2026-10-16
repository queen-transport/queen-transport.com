<div class="space-y-6">
    {{-- ALERT / NOTIFIKASI --}}
    @if ($feedbackMessage)
        <div class="rounded-xl p-4 flex items-center justify-between border {{ $feedbackType === 'success' ? 'bg-emerald-500/10 border-emerald-500/30 text-emerald-400' : 'bg-rose-500/10 border-rose-500/30 text-rose-400' }}">
            <div class="flex items-center gap-3">
                <span class="text-xl">{{ $feedbackType === 'success' ? '✅' : '⚠️' }}</span>
                <span class="text-sm font-medium">{{ $feedbackMessage }}</span>
            </div>
            <button type="button" wire:click="$set('feedbackMessage', null)" class="text-zinc-400 hover:text-white text-sm font-bold ml-4">✕</button>
        </div>
    @endif

    {{-- HEADER KELOLA ULASAN --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-zinc-900/60 border border-zinc-800 rounded-2xl p-6 backdrop-blur-sm">
        <div>
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span>⭐</span> Ulasan &amp; Pengalaman Sewa
            </h2>
            <p class="text-sm text-zinc-400 mt-1">
                Bagikan ulasan dan penilaian Anda mengenai armada serta layanan Queen Transport.
            </p>
        </div>
        <button
            type="button"
            wire:click="openCreateModal"
            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold text-sm shadow-lg shadow-purple-600/20 transition-all cursor-pointer shrink-0"
        >
            <span>✍️</span> Tulis Ulasan Baru
        </button>
    </div>

    {{-- DAFTAR ULASAN SAYA --}}
    @if ($reviews->isEmpty())
        <div class="bg-zinc-900/40 border border-zinc-800/80 rounded-2xl p-12 text-center flex flex-col items-center justify-center">
            <div class="w-16 h-16 rounded-full bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-3xl mb-4">
                💬
            </div>
            <h3 class="text-base font-semibold text-zinc-200">Belum ada ulasan yang dibuat</h3>
            <p class="text-sm text-zinc-400 max-w-md mt-1 mb-6">
                Anda belum pernah memberikan ulasan. Ulasan Anda sangat berharga bagi kami dan pelanggan lain.
            </p>
            <button
                type="button"
                wire:click="openCreateModal"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-zinc-200 border border-zinc-700 text-sm font-medium transition cursor-pointer"
            >
                <span>➕</span> Buat Ulasan Pertama Anda
            </button>
        </div>
    @else
        <div class="grid grid-cols-1 gap-5">
            @foreach ($reviews as $rev)
                <div class="bg-zinc-900/60 border border-zinc-800 hover:border-zinc-700 rounded-2xl p-6 transition-colors space-y-4">
                    {{-- Baris Atas: Rating, Status, Tanggal --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-zinc-800/80">
                        <div class="flex items-center gap-3">
                            <div class="flex text-amber-400 text-lg">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= $rev->rating ? '★' : '☆' }}</span>
                                @endfor
                            </div>
                            <span class="text-sm font-bold text-zinc-200">{{ $rev->rating }}.0 / 5.0</span>
                        </div>

                        <div class="flex items-center gap-2">
                            @if ($rev->status === \App\Models\Review::STATUS_APPROVED)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Ditayangkan
                                </span>
                            @elseif ($rev->status === \App\Models\Review::STATUS_PENDING)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-500/15 text-amber-400 border border-amber-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Menunggu Persetujuan
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-500/15 text-rose-400 border border-rose-500/30">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span> Ditolak
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
                                <a href="{{ route('armada.show', $armada) }}" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-zinc-800 text-purple-300 text-xs border border-zinc-700 hover:border-purple-500 transition">
                                    🚗 {{ $armada->title }}
                                </a>
                            @endforeach
                        </div>
                    @endif

                    {{-- Konten Review --}}
                    <div>
                        @if ($rev->title)
                            <h4 class="text-base font-semibold text-white mb-1.5">{{ $rev->title }}</h4>
                        @endif
                        <p class="text-sm text-zinc-300 leading-relaxed whitespace-pre-line">{{ $rev->comment }}</p>
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
                                            <a href="{{ $photo->getUrl() }}" target="_blank" class="block w-20 h-20 rounded-xl overflow-hidden border border-zinc-700 hover:border-purple-500 transition">
                                                <img src="{{ $photo->getUrl() }}" alt="Lampiran ulasan" class="w-full h-full object-cover">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if ($revVideos->isNotEmpty())
                                <div>
                                    <span class="text-xs font-medium text-zinc-400 mb-2 block">🎥 Video Lampiran:</span>
                                    <div class="flex flex-wrap gap-4">
                                        @foreach ($revVideos as $video)
                                            <div class="w-64 max-w-full rounded-xl overflow-hidden border border-zinc-700 bg-black">
                                                <video src="{{ $video->getUrl() }}" controls class="w-full h-36 object-contain"></video>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Footer Aksi (Aturan 24 Jam) --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-zinc-800 text-xs">
                        <div>
                            @if (! $rev->isLockedForUser())
                                <span class="text-emerald-400 inline-flex items-center gap-1">
                                    ⏱️ Dapat diedit hingga: <strong class="font-medium text-zinc-300">{{ $rev->created_at?->addHours(24)->translatedFormat('d M Y, H:i') }}</strong>
                                </span>
                            @else
                                <span class="text-zinc-500 inline-flex items-center gap-1">
                                    🔒 Terkunci (melewati batas waktu 24 jam)
                                </span>
                            @endif
                        </div>

                        <div class="flex items-center gap-2">
                            @if (! $rev->isLockedForUser())
                                <button
                                    type="button"
                                    wire:click="openEditModal('{{ $rev->id }}')"
                                    class="px-3 py-1.5 rounded-lg bg-zinc-800 hover:bg-zinc-700 text-zinc-200 border border-zinc-700 transition cursor-pointer font-medium"
                                >
                                    ✏️ Edit
                                </button>
                                <button
                                    type="button"
                                    wire:click="deleteReview('{{ $rev->id }}')"
                                    wire:confirm="Apakah Anda yakin ingin menghapus ulasan ini?"
                                    class="px-3 py-1.5 rounded-lg bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/30 transition cursor-pointer font-medium"
                                >
                                    🗑️ Hapus
                                </button>
                            @else
                                <span class="text-zinc-600 italic">Tidak dapat diubah/dihapus</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- MODAL CREATE REVIEW --}}
    @if ($showCreateModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm overflow-y-auto">
            <div class="bg-zinc-900 border border-zinc-700 rounded-2xl w-full max-w-xl p-6 space-y-5 my-8 shadow-2xl">
                <div class="flex items-center justify-between pb-3 border-b border-zinc-800">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <span>✍️</span> Tulis Ulasan Queen Transport
                    </h3>
                    <button type="button" wire:click="$set('showCreateModal', false)" class="text-zinc-400 hover:text-white text-lg">✕</button>
                </div>

                <form wire:submit.prevent="submitCreate" class="space-y-4">
                    {{-- Rating Bintang --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-2">Penilaian Bintang (1 - 5) <span class="text-rose-400">*</span></label>
                        <div class="flex items-center gap-2">
                            @for ($star = 1; $star <= 5; $star++)
                                <button
                                    type="button"
                                    wire:click="$set('rating', {{ $star }})"
                                    class="text-3xl transition-transform hover:scale-110 focus:outline-none {{ $star <= $rating ? 'text-amber-400' : 'text-zinc-600' }}"
                                >
                                    ★
                                </button>
                            @endfor
                            <span class="text-sm font-semibold text-zinc-300 ml-2">({{ $rating }} Bintang)</span>
                        </div>
                        @error('rating') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Pilih Armada (Opsional Banyak) --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1.5">Armada yang Digunakan (Opsional)</label>
                        <p class="text-xs text-zinc-500 mb-2">Centang satu atau beberapa kendaraan yang Anda sewa:</p>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 max-h-36 overflow-y-auto p-2 rounded-xl bg-zinc-950 border border-zinc-800">
                            @foreach ($availableArmadas as $armada)
                                <label class="flex items-center gap-2 text-xs text-zinc-300 cursor-pointer hover:text-white">
                                    <input
                                        type="checkbox"
                                        value="{{ $armada->id }}"
                                        wire:model="selectedArmadas"
                                        class="rounded bg-zinc-800 border-zinc-700 text-purple-600 focus:ring-purple-500"
                                    >
                                    <span class="truncate">{{ $armada->title }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Judul Ulasan --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Judul Ulasan (Opsional)</label>
                        <input
                            type="text"
                            wire:model="title"
                            placeholder="Contoh: Perjalanan Nyaman & Sopir Ramah"
                            class="w-full px-3.5 py-2.5 rounded-xl bg-zinc-950 border border-zinc-800 text-white placeholder-zinc-600 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                        >
                        @error('title') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Komentar / Isi Ulasan --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Komentar / Pengalaman Anda <span class="text-rose-400">*</span></label>
                        <textarea
                            wire:model="comment"
                            rows="4"
                            placeholder="Ceritakan pengalaman Anda selama menggunakan armada atau layanan Queen Transport..."
                            class="w-full px-3.5 py-2.5 rounded-xl bg-zinc-950 border border-zinc-800 text-white placeholder-zinc-600 text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                        ></textarea>
                        @error('comment') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Upload Foto --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Unggah Foto (Bisa lebih dari satu)</label>
                        <input
                            type="file"
                            wire:model="photos"
                            multiple
                            accept="image/*"
                            class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-purple-400 hover:file:bg-zinc-700 cursor-pointer"
                        >
                        @error('photos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Upload Video --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Unggah Video (Opsional, MP4/MOV, Maks 50MB)</label>
                        <input
                            type="file"
                            wire:model="videos"
                            multiple
                            accept="video/*"
                            class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-purple-400 hover:file:bg-zinc-700 cursor-pointer"
                        >
                        @error('videos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div wire:loading wire:target="photos,videos" class="text-xs text-purple-400 font-medium">
                        ⏳ Mengunggah berkas media, mohon tunggu...
                    </div>

                    {{-- Notice 24 jam & approval --}}
                    <div class="rounded-xl bg-purple-500/10 border border-purple-500/20 p-3 text-xs text-purple-300 space-y-1">
                        <p>ℹ️ <strong>Informasi:</strong></p>
                        <ul class="list-disc list-inside space-y-0.5 text-zinc-400">
                            <li>Ulasan akan diperiksa dan disetujui admin sebelum tayang publik.</li>
                            <li>Ulasan dapat Anda edit atau hapus dalam waktu 24 jam setelah dikirim.</li>
                        </ul>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end gap-3 pt-3 border-t border-zinc-800">
                        <button
                            type="button"
                            wire:click="$set('showCreateModal', false)"
                            class="px-4 py-2 rounded-xl bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-sm font-medium transition cursor-pointer"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="px-5 py-2 rounded-xl bg-purple-600 hover:bg-purple-500 disabled:opacity-50 text-white text-sm font-semibold transition cursor-pointer"
                        >
                            Kirim Ulasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- MODAL EDIT REVIEW --}}
    @if ($showEditModal && $editingReview)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm overflow-y-auto">
            <div class="bg-zinc-900 border border-zinc-700 rounded-2xl w-full max-w-xl p-6 space-y-5 my-8 shadow-2xl">
                <div class="flex items-center justify-between pb-3 border-b border-zinc-800">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <span>✏️</span> Edit Ulasan
                    </h3>
                    <button type="button" wire:click="$set('showEditModal', false)" class="text-zinc-400 hover:text-white text-lg">✕</button>
                </div>

                <form wire:submit.prevent="submitEdit" class="space-y-4">
                    {{-- Rating Bintang --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-2">Penilaian Bintang (1 - 5) <span class="text-rose-400">*</span></label>
                        <div class="flex items-center gap-2">
                            @for ($star = 1; $star <= 5; $star++)
                                <button
                                    type="button"
                                    wire:click="$set('rating', {{ $star }})"
                                    class="text-3xl transition-transform hover:scale-110 focus:outline-none {{ $star <= $rating ? 'text-amber-400' : 'text-zinc-600' }}"
                                >
                                    ★
                                </button>
                            @endfor
                            <span class="text-sm font-semibold text-zinc-300 ml-2">({{ $rating }} Bintang)</span>
                        </div>
                        @error('rating') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Pilih Armada --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1.5">Armada yang Digunakan (Opsional)</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 max-h-36 overflow-y-auto p-2 rounded-xl bg-zinc-950 border border-zinc-800">
                            @foreach ($availableArmadas as $armada)
                                <label class="flex items-center gap-2 text-xs text-zinc-300 cursor-pointer hover:text-white">
                                    <input
                                        type="checkbox"
                                        value="{{ $armada->id }}"
                                        wire:model="selectedArmadas"
                                        class="rounded bg-zinc-800 border-zinc-700 text-purple-600 focus:ring-purple-500"
                                    >
                                    <span class="truncate">{{ $armada->title }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Judul Ulasan --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Judul Ulasan</label>
                        <input
                            type="text"
                            wire:model="title"
                            class="w-full px-3.5 py-2.5 rounded-xl bg-zinc-950 border border-zinc-800 text-white text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                        >
                        @error('title') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Komentar --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Komentar / Ulasan <span class="text-rose-400">*</span></label>
                        <textarea
                            wire:model="comment"
                            rows="4"
                            class="w-full px-3.5 py-2.5 rounded-xl bg-zinc-950 border border-zinc-800 text-white text-sm focus:border-purple-500 focus:ring-1 focus:ring-purple-500"
                        ></textarea>
                        @error('comment') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Media yang Sudah Ada --}}
                    @php
                        $existingMedia = $editingReview->media;
                    @endphp
                    @if ($existingMedia->isNotEmpty())
                        <div>
                            <label class="block text-sm font-medium text-zinc-300 mb-1.5">Berkas Media Saat Ini</label>
                            <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                                @foreach ($existingMedia as $med)
                                    <div class="relative rounded-xl overflow-hidden border {{ in_array($med->id, $removeMediaIds) ? 'border-rose-500 opacity-40' : 'border-zinc-700' }} group">
                                        @if (str_starts_with($med->mime_type, 'image/'))
                                            <img src="{{ $med->getUrl() }}" alt="Media" class="w-full h-20 object-cover">
                                        @else
                                            <div class="w-full h-20 bg-zinc-950 flex items-center justify-center text-xs text-zinc-400">
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
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Tambah Foto Baru</label>
                        <input
                            type="file"
                            wire:model="photos"
                            multiple
                            accept="image/*"
                            class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-purple-400 hover:file:bg-zinc-700 cursor-pointer"
                        >
                        @error('photos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tambah Video Baru --}}
                    <div>
                        <label class="block text-sm font-medium text-zinc-300 mb-1">Tambah Video Baru</label>
                        <input
                            type="file"
                            wire:model="videos"
                            multiple
                            accept="video/*"
                            class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-purple-400 hover:file:bg-zinc-700 cursor-pointer"
                        >
                        @error('videos.*') <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div wire:loading wire:target="photos,videos" class="text-xs text-purple-400 font-medium">
                        ⏳ Mengunggah berkas media, mohon tunggu...
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end gap-3 pt-3 border-t border-zinc-800">
                        <button
                            type="button"
                            wire:click="$set('showEditModal', false)"
                            class="px-4 py-2 rounded-xl bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-sm font-medium transition cursor-pointer"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="px-5 py-2 rounded-xl bg-purple-600 hover:bg-purple-500 disabled:opacity-50 text-white text-sm font-semibold transition cursor-pointer"
                        >
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
