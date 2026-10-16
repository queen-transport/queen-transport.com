<x-layouts::app :title="__('Dashboard')">
    <div class="flex flex-col gap-6 w-full">
        {{-- PROFIL & SAMBUTAN --}}
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-purple-950/60 via-zinc-900 to-zinc-900 border border-purple-500/20 p-6 md:p-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative z-10">
                <div class="flex items-center gap-4">
                    @if (auth()->user()->avatar)
                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" class="w-16 h-16 rounded-full border-2 border-purple-500 object-cover shadow-lg">
                    @else
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-600 to-indigo-600 border-2 border-purple-400 text-white font-bold text-xl flex items-center justify-center shadow-lg">
                            {{ auth()->user()->initials() }}
                        </div>
                    @endif

                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <h1 class="text-2xl font-bold text-white">{{ auth()->user()->name }}</h1>
                            @if (auth()->user()->isAdmin())
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-500/20 border border-purple-500/40 text-purple-300">Admin</span>
                            @endif
                            @if (auth()->user()->google_id)
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center gap-1">
                                    <span>G</span> Terhubung Google
                                </span>
                            @endif
                        </div>
                        <p class="text-sm text-zinc-400 mt-1">{{ auth()->user()->email }}</p>
                        <p class="text-xs text-zinc-500 mt-0.5">Bergabung sejak {{ auth()->user()->created_at?->translatedFormat('d F Y') }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 flex-wrap">
                    @if (auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" class="px-4 py-2 rounded-xl bg-purple-600 hover:bg-purple-500 text-white text-sm font-semibold transition shadow-md">
                            ⚙️ Masuk Admin Panel
                        </a>
                    @endif
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 rounded-xl bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 text-zinc-200 text-sm font-medium transition">
                        👤 Edit Profil
                    </a>
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 text-zinc-200 text-sm font-medium transition">
                        🚗 Lihat Website
                    </a>
                </div>
            </div>
        </div>

        {{-- RINGKASAN STATISTIK --}}
        @php
            $userId = auth()->id();
            $totalReviews = \App\Models\Review::where('user_id', $userId)->count();
            $approvedReviews = \App\Models\Review::where('user_id', $userId)->where('status', \App\Models\Review::STATUS_APPROVED)->count();
            $pendingReviews = \App\Models\Review::where('user_id', $userId)->where('status', \App\Models\Review::STATUS_PENDING)->count();
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-zinc-900/60 border border-zinc-800 rounded-2xl p-5 flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-zinc-400">Total Ulasan Anda</span>
                    <h3 class="text-2xl font-bold text-white mt-1">{{ $totalReviews }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 text-purple-400 text-2xl flex items-center justify-center">
                    ✍️
                </div>
            </div>

            <div class="bg-zinc-900/60 border border-zinc-800 rounded-2xl p-5 flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-zinc-400">Ulasan Ditayangkan</span>
                    <h3 class="text-2xl font-bold text-emerald-400 mt-1">{{ $approvedReviews }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-2xl flex items-center justify-center">
                    ⭐
                </div>
            </div>

            <div class="bg-zinc-900/60 border border-zinc-800 rounded-2xl p-5 flex items-center justify-between">
                <div>
                    <span class="text-xs font-medium text-zinc-400">Menunggu Moderasi</span>
                    <h3 class="text-2xl font-bold text-amber-400 mt-1">{{ $pendingReviews }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-400 text-2xl flex items-center justify-center">
                    ⏳
                </div>
            </div>
        </div>

        {{-- KOMPONEN KELOLA REVIEW LIVEWIRE --}}
        <livewire:dashboard.review-manager />
    </div>
</x-layouts::app>
