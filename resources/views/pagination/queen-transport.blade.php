@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Navigasi Halaman" class="flex flex-wrap items-center justify-center gap-1.5 sm:gap-2">
        {{-- Tombol Sebelumnya --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 text-sm font-medium text-zinc-400 dark:text-zinc-600 bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-md)] cursor-not-allowed opacity-50 select-none">
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="hidden sm:inline">Sebelumnya</span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="group inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-md)] no-underline hover:border-[var(--color-primary)] hover:text-[var(--color-primary)] dark:hover:text-white hover:bg-purple-500/5 dark:hover:bg-purple-500/10 transition-all duration-200 hover:-translate-y-0.5 shadow-xs">
                <svg class="w-4 h-4 shrink-0 transition-transform duration-200 group-hover:-translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="hidden sm:inline">Sebelumnya</span>
            </a>
        @endif

        {{-- Nomor Halaman --}}
        <div class="flex items-center gap-1 sm:gap-1.5">
            @foreach ($elements as $element)
                {{-- Pemisah Tiga Titik --}}
                @if (is_string($element))
                    <span class="min-w-8 h-9 sm:min-w-10 sm:h-10 inline-flex items-center justify-center text-sm font-medium text-zinc-400 dark:text-zinc-500 select-none">
                        {{ $element }}
                    </span>
                @endif

                {{-- Nomor / Tautan Halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="min-w-9 h-9 sm:min-w-10 sm:h-10 px-2.5 sm:px-3 inline-flex items-center justify-center text-sm font-bold text-white bg-[image:var(--gradient-btn)] rounded-[var(--radius-md)] shadow-sm shadow-purple-500/25 select-none ring-1 ring-purple-500/30">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="min-w-9 h-9 sm:min-w-10 sm:h-10 px-2.5 sm:px-3 inline-flex items-center justify-center text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-md)] no-underline hover:border-[var(--color-primary)] hover:text-[var(--color-primary)] dark:hover:text-white hover:bg-purple-500/5 dark:hover:bg-purple-500/10 transition-all duration-200 hover:-translate-y-0.5 shadow-xs">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Tombol Berikutnya --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="group inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 text-sm font-medium text-zinc-700 dark:text-zinc-200 bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-md)] no-underline hover:border-[var(--color-primary)] hover:text-[var(--color-primary)] dark:hover:text-white hover:bg-purple-500/5 dark:hover:bg-purple-500/10 transition-all duration-200 hover:-translate-y-0.5 shadow-xs">
                <span class="hidden sm:inline">Berikutnya</span>
                <svg class="w-4 h-4 shrink-0 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 sm:px-4 py-2 text-sm font-medium text-zinc-400 dark:text-zinc-600 bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-md)] cursor-not-allowed opacity-50 select-none">
                <span class="hidden sm:inline">Berikutnya</span>
                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        @endif
    </nav>
@endif
