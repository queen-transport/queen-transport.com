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
                                <a
                                    href="{{ route('reviews.edit', $rev) }}"
                                    class="px-3 py-1.5 rounded-lg bg-zinc-100 hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700 text-zinc-800 dark:text-zinc-200 border border-zinc-200 dark:border-zinc-700 transition cursor-pointer font-medium no-underline inline-flex items-center gap-1"
                                >
                                    ✏️ Edit
                                </a>
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
</div>
