<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:600,700,800|orbitron:500,600,700" rel="stylesheet" />
        <style>
            :root {
                --color-primary: #7c3aed;
                --color-accent: #22d3ee;
            }
        </style>
    </head>
    <body class="min-h-screen bg-slate-50 dark:bg-[#0a0c14] text-zinc-900 dark:text-zinc-100 antialiased relative overflow-x-hidden selection:bg-purple-600 selection:text-white">
        <div class="fixed top-[-150px] left-[-150px] w-[500px] h-[500px] rounded-full bg-purple-600/10 dark:bg-purple-600/20 blur-[130px] pointer-events-none"></div>
        <div class="fixed bottom-[-150px] right-[-150px] w-[500px] h-[500px] rounded-full bg-cyan-500/10 dark:bg-cyan-500/15 blur-[130px] pointer-events-none"></div>

        <div class="relative z-10 flex min-h-screen flex-col items-center justify-center p-4 sm:p-6 md:p-8">
            <div class="flex w-full max-w-md flex-col items-center gap-6">
                <a href="{{ route('home') }}" class="group flex flex-col items-center gap-2.5 no-underline transition-transform hover:scale-[1.02]">
                    <img
                        src="{{ asset('apple-touch-icon.png') }}"
                        alt="{{ config('site.brand') }}"
                        class="w-14 h-14 rounded-full border-2 border-purple-500 shadow-[0_0_25px_rgba(124,58,237,0.4)] dark:shadow-[0_0_25px_rgba(124,58,237,0.5)] object-cover bg-white dark:bg-[#141728] transition-shadow group-hover:shadow-[0_0_35px_rgba(124,58,237,0.7)]"
                    >
                    <div class="flex flex-col items-center text-center">
                        <span class="font-['Cinzel',serif] text-lg font-bold text-zinc-900 dark:text-white tracking-[0.1em] leading-tight">
                            {{ config('site.brand') }}
                        </span>
                        <span class="font-['Orbitron',sans-serif] text-[0.62rem] text-purple-600 dark:text-cyan-400 tracking-[0.2em] uppercase mt-0.5">
                            ✦ Premium Transport Service
                        </span>
                    </div>
                </a>

                <div class="w-full rounded-[28px] border border-zinc-200 dark:border-purple-500/30 bg-white/95 dark:bg-[#0f1220]/95 backdrop-blur-2xl p-7 sm:p-9 shadow-[0_16px_50px_rgba(0,0,0,0.06)] dark:shadow-[0_16px_50px_rgba(0,0,0,0.7)]">
                    {{ $slot }}
                </div>

                <div class="flex items-center justify-center gap-4 text-xs text-zinc-500 dark:text-zinc-400">
                    <a href="{{ route('home') }}" class="hover:text-purple-600 dark:hover:text-cyan-400 transition-colors flex items-center gap-1.5 no-underline">
                        <span>←</span> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
