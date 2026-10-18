@props([
    'status',
])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/30 text-emerald-700 dark:text-emerald-300 px-4 py-3 text-sm font-medium flex items-center justify-center gap-2']) }}>
        <span>ℹ️</span>
        <span>{{ $status }}</span>
    </div>
@endif
