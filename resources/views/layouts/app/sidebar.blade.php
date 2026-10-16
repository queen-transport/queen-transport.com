<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-[#0a0c14] text-zinc-100 antialiased relative overflow-x-hidden selection:bg-purple-600 selection:text-white font-['Inter',sans-serif]">
        {{-- AMBIENT GLOW EFFECTS --}}
        <div class="fixed top-[-150px] left-[-150px] w-[500px] h-[500px] rounded-full bg-purple-600/15 blur-[140px] pointer-events-none -z-10"></div>
        <div class="fixed bottom-[-150px] right-[-150px] w-[500px] h-[500px] rounded-full bg-cyan-500/10 blur-[140px] pointer-events-none -z-10"></div>

        <flux:sidebar sticky collapsible="mobile" class="border-e border-purple-500/20 bg-[#0c0f1d]/95 backdrop-blur-xl dark:border-purple-500/20 dark:bg-[#0c0f1d]/95">
            <flux:sidebar.header class="pb-2">
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden text-zinc-400 hover:text-white" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                <flux:sidebar.group :heading="__('Platform')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="star" :href="route('reviews.create')" :current="request()->routeIs('reviews.create')" wire:navigate>
                        {{ __('Tulis Ulasan') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="truck" :href="route('armada.index')" target="_blank">
                        {{ __('Lihat Armada') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="globe-alt" :href="route('home')" target="_blank">
                        {{ __('Website Queen') }}
                    </flux:sidebar.item>

                    @if (auth()->user()?->isAdmin())
                        <flux:sidebar.item icon="cog-6-tooth" href="/admin">
                            {{ __('Filament Admin') }}
                        </flux:sidebar.item>
                    @endif
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden border-b border-purple-500/20 bg-[#0c0f1d]/95 backdrop-blur-xl">
            <flux:sidebar.toggle class="lg:hidden text-zinc-400 hover:text-white" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    :avatar="auth()->user()->avatar"
                    icon-trailing="chevron-down"
                />

                <flux:menu class="border border-purple-500/20 bg-[#0f1220]/95 backdrop-blur-xl">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                    :src="auth()->user()->avatar"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate text-zinc-400">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer text-rose-400 hover:text-rose-300"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
