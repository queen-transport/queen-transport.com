<x-layouts::app :title="__('Dashboard')">
    <div class="flex flex-col gap-6 w-full">
        {{-- PROFIL & SAMBUTAN --}}
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0a0c14] via-[#1a1035] to-[#0f2030] border border-purple-500/30 p-6 md:p-8 shadow-[0_12px_40px_rgba(0,0,0,0.6)] backdrop-blur-xl">
            {{-- Decorative ambient background glow --}}
            <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-purple-600/20 blur-3xl pointer-events-none"></div>
            <div class="absolute -left-16 -bottom-16 w-64 h-64 rounded-full bg-cyan-500/15 blur-3xl pointer-events-none"></div>

            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative z-10">
                <div class="flex items-center gap-4">
                    @if (auth()->user()->avatar)
                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}" class="w-16 h-16 rounded-full border-2 border-purple-500/80 object-cover shadow-[0_0_20px_rgba(124,58,237,0.5)] bg-[#141728]">
                    @else
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-600 to-indigo-600 border-2 border-purple-400/80 text-white font-bold text-xl flex items-center justify-center shadow-[0_0_20px_rgba(124,58,237,0.5)]">
                            {{ auth()->user()->initials() }}
                        </div>
                    @endif

                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h1 class="text-2xl font-bold text-white font-['Cinzel',serif] tracking-wide">{{ auth()->user()->name }}</h1>
                            @if (auth()->user()->isAdmin())
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-purple-500/20 border border-purple-400/40 text-purple-300">Admin</span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-cyan-500/15 border border-cyan-400/30 text-cyan-300 font-['Orbitron',sans-serif] tracking-wider uppercase">Pelanggan VIP</span>
                            @endif
                            @if (auth()->user()->google_id)
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center gap-1">
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
                        <a href="{{ url('/admin') }}" class="px-4 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white text-sm font-semibold transition shadow-[0_0_15px_rgba(124,58,237,0.4)] no-underline">
                            ⚙️ Admin Panel
                        </a>
                    @endif
                    <a href="{{ route('reviews.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-cyan-600 hover:opacity-90 text-white text-sm font-semibold transition shadow-[0_0_20px_rgba(124,58,237,0.3)] no-underline flex items-center gap-1.5">
                        <span>✍️</span> Tulis Ulasan
                    </a>
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2.5 rounded-xl bg-[#141728] hover:bg-[#1a1f35] border border-purple-500/25 text-zinc-200 text-sm font-medium transition no-underline">
                        👤 Edit Profil
                    </a>
                    <a href="{{ route('home') }}" class="px-4 py-2.5 rounded-xl bg-[#141728] hover:bg-[#1a1f35] border border-purple-500/25 text-zinc-200 text-sm font-medium transition no-underline">
                        🚗 Website
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
            <div class="bg-[#0f1220]/90 border border-purple-500/20 hover:border-purple-500/40 rounded-2xl p-5 flex items-center justify-between shadow-lg backdrop-blur-xl transition-all">
                <div>
                    <span class="text-xs font-medium text-zinc-400">Total Ulasan Anda</span>
                    <h3 class="text-2xl font-bold text-white mt-1">{{ $totalReviews }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/30 text-purple-400 text-2xl flex items-center justify-center shadow-[0_0_15px_rgba(124,58,237,0.2)]">
                    ✍️
                </div>
            </div>

            <div class="bg-[#0f1220]/90 border border-purple-500/20 hover:border-purple-500/40 rounded-2xl p-5 flex items-center justify-between shadow-lg backdrop-blur-xl transition-all">
                <div>
                    <span class="text-xs font-medium text-zinc-400">Ulasan Ditayangkan</span>
                    <h3 class="text-2xl font-bold text-emerald-400 mt-1">{{ $approvedReviews }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-2xl flex items-center justify-center shadow-[0_0_15px_rgba(16,185,129,0.2)]">
                    ⭐
                </div>
            </div>

            <div class="bg-[#0f1220]/90 border border-purple-500/20 hover:border-purple-500/40 rounded-2xl p-5 flex items-center justify-between shadow-lg backdrop-blur-xl transition-all">
                <div>
                    <span class="text-xs font-medium text-zinc-400">Menunggu Moderasi</span>
                    <h3 class="text-2xl font-bold text-amber-400 mt-1">{{ $pendingReviews }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-400 text-2xl flex items-center justify-center shadow-[0_0_15px_rgba(245,158,11,0.2)]">
                    ⏳
                </div>
            </div>
        </div>

        {{-- KOMPONEN KELOLA REVIEW LIVEWIRE --}}
        <livewire:dashboard.review-manager />
    </div>
</x-layouts::app>
