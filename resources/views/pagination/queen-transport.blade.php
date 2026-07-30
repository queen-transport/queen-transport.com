@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center gap-2">
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-sm)] cursor-not-allowed opacity-50">
                {{ __('pagination.previous') }}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-sm)] no-underline hover:border-[var(--color-primary)] transition-colors">
                {{ __('pagination.previous') }}
            </a>
        @endif

        <span class="hidden md:flex items-center gap-2">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)]">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-[image:var(--gradient-btn)] rounded-[var(--radius-sm)]">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-sm)] no-underline hover:border-[var(--color-primary)] transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-sm)] no-underline hover:border-[var(--color-primary)] transition-colors">
                {{ __('pagination.next') }}
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-[var(--color-text-muted)] bg-[var(--color-surface)] border border-[var(--color-border)] rounded-[var(--radius-sm)] cursor-not-allowed opacity-50">
                {{ __('pagination.next') }}
            </span>
        @endif
    </nav>
@endif
