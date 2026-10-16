<x-layouts::auth :title="__('Masuk')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Selamat Datang')" :description="__('Masuk ke akun Anda untuk menikmati kemudahan layanan kami')" />

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <x-passkey-verify />

        <div class="flex flex-col gap-4">
            <x-google-button>
                {{ __('Masuk dengan Akun Google') }}
            </x-google-button>

            <div class="relative flex items-center justify-center my-1">
                <div class="border-t border-purple-500/25 w-full"></div>
                <span class="bg-white dark:bg-[#0f1220] px-3 text-xs text-zinc-500 dark:text-zinc-400 uppercase font-medium tracking-wider">atau masuk dengan email</span>
            </div>
        </div>

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <div>
                <flux:input
                    name="email"
                    :label="__('Alamat Email')"
                    :value="old('email')"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="nama@email.com"
                />
            </div>

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Kata Sandi')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Masukkan kata sandi')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="absolute top-0 text-xs end-0 text-purple-600 dark:text-cyan-400 hover:text-purple-700 dark:hover:text-cyan-300 transition-colors no-underline font-medium" wire:navigate>
                        {{ __('Lupa sandi?') }}
                    </a>
                @endif
            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Ingat saya')" :checked="old('remember')" />

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 shadow-[0_4px_20px_rgba(124,58,237,0.4)] hover:shadow-[0_4px_25px_rgba(34,211,238,0.4)] transition-all cursor-pointer"
                    data-test="login-button"
                >
                    {{ __('Masuk Sekarang') }}
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-zinc-500 dark:text-zinc-400 pt-2 border-t border-purple-500/20">
            <span>{{ __('Belum memiliki akun?') }}</span>
            <a href="{{ route('register') }}" class="text-purple-600 dark:text-cyan-400 hover:text-purple-700 dark:hover:text-cyan-300 font-semibold transition-colors no-underline ml-1" wire:navigate>
                {{ __('Daftar sekarang') }}
            </a>
        </div>
    </div>
</x-layouts::auth>
