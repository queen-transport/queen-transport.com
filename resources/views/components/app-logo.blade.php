@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand :name="config('site.brand', 'Queen Transport')" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-full">
            <img src="{{ asset('apple-touch-icon.png') }}" alt="{{ config('site.brand', 'Queen Transport') }}" class="size-8 rounded-full border border-purple-200/80 dark:border-purple-500/60 shadow-xs dark:shadow-[0_0_15px_rgba(124,58,237,0.5)] object-cover bg-white dark:bg-[#141728]">
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand :name="config('site.brand', 'Queen Transport')" {{ $attributes }}>
        <x-slot name="logo" class="flex aspect-square size-8 items-center justify-center rounded-full">
            <img src="{{ asset('apple-touch-icon.png') }}" alt="{{ config('site.brand', 'Queen Transport') }}" class="size-8 rounded-full border border-purple-200/80 dark:border-purple-500/60 shadow-xs dark:shadow-[0_0_15px_rgba(124,58,237,0.5)] object-cover bg-white dark:bg-[#141728]">
        </x-slot>
    </flux:brand>
@endif
