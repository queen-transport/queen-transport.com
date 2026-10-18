<x-layouts::auth :title="__('Daftar Akun')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Buat Akun Baru')" :description="__('Daftarkan diri Anda untuk pengalaman sewa transportasi terbaik')" />

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <div class="flex flex-col gap-4">
            <x-google-button>
                {{ __('Daftar dengan Akun Google') }}
            </x-google-button>

            <div class="relative flex items-center justify-center my-1">
                <div class="border-t border-purple-500/25 w-full"></div>
                <span class="bg-white dark:bg-[#0f1220] px-3 text-xs text-zinc-600 dark:text-zinc-400 uppercase font-medium tracking-wider">atau daftar dengan email</span>
            </div>
        </div>

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Name -->
            <div>
                <flux:input
                    name="name"
                    :label="__('Nama Lengkap')"
                    :value="old('name')"
                    type="text"
                    required
                    autocomplete="name"
                    :placeholder="__('Nama lengkap Anda')"
                />
            </div>

            <!-- Email Address -->
            <div>
                <flux:input
                    name="email"
                    :label="__('Alamat Email')"
                    :value="old('email')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="nama@email.com"
                />
            </div>

            <!-- Password -->
            <div>
                <flux:input
                    name="password"
                    :label="__('Kata Sandi')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Buat kata sandi aman')"
                    passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                    viewable
                />
            </div>

            <!-- Confirm Password -->
            <div>
                <flux:input
                    name="password_confirmation"
                    :label="__('Konfirmasi Kata Sandi')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Ulangi kata sandi')"
                    passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                    viewable
                />
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 shadow-[0_4px_20px_rgba(124,58,237,0.4)] hover:shadow-[0_4px_25px_rgba(34,211,238,0.4)] transition-all cursor-pointer"
                    data-test="register-user-button"
                >
                    {{ __('Daftar Sekarang') }}
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-zinc-600 dark:text-zinc-400 pt-2 border-t border-purple-500/20">
            <span>{{ __('Sudah memiliki akun?') }}</span>
            <a href="{{ route('login') }}" class="text-purple-600 dark:text-cyan-400 hover:text-purple-700 dark:hover:text-cyan-300 font-semibold transition-colors no-underline ml-1" wire:navigate>
                {{ __('Masuk di sini') }}
            </a>
        </div>
    </div>
</x-layouts::auth>
