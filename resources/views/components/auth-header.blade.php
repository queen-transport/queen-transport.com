@props([
    'title',
    'description' => null,
])

<div class="flex w-full flex-col text-center space-y-1 mb-2">
    <h2 class="text-2xl font-bold text-white tracking-wide font-[family-name:var(--font-display,serif)]">
        {{ $title }}
    </h2>
    @if ($description)
        <p class="text-sm text-zinc-400">
            {{ $description }}
        </p>
    @endif
</div>
