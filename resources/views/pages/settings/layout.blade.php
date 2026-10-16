<div class="bg-[#0f1220]/90 border border-purple-500/25 rounded-3xl p-6 md:p-8 backdrop-blur-xl shadow-[0_16px_50px_rgba(0,0,0,0.6)]">
    <div class="flex items-start max-md:flex-col gap-6">
        <div class="w-full pb-4 md:w-[220px] shrink-0">
            <flux:navlist aria-label="{{ __('Settings') }}" class="space-y-1">
                <flux:navlist.item icon="user" :href="route('profile.edit')" :current="request()->routeIs('profile.edit')" wire:navigate>{{ __('Profile') }}</flux:navlist.item>
                <flux:navlist.item icon="shield-check" :href="route('security.edit')" :current="request()->routeIs('security.edit')" wire:navigate>{{ __('Security') }}</flux:navlist.item>
                <flux:navlist.item icon="paint-brush" :href="route('appearance.edit')" :current="request()->routeIs('appearance.edit')" wire:navigate>{{ __('Appearance') }}</flux:navlist.item>
            </flux:navlist>
        </div>

        <div class="hidden md:block w-px self-stretch bg-purple-500/20"></div>
        <div class="md:hidden w-full h-px bg-purple-500/20 my-2"></div>

        <div class="flex-1 self-stretch min-w-0">
            <h2 class="text-lg font-bold text-white font-['Cinzel',serif] tracking-wide">{{ $heading ?? '' }}</h2>
            <p class="text-sm text-zinc-400 mt-0.5">{{ $subheading ?? '' }}</p>

            <div class="mt-6 w-full max-w-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
