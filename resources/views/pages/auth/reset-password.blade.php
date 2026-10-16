<x-layouts::auth :title="__('Atur Ulang Kata Sandi')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Atur Ulang Kata Sandi')" :description="__('Silakan masukkan kata sandi baru untuk akun Anda')" />

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-5">
            @csrf
            <!-- Token -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email Address -->
            <div>
                <flux:input
                    name="email"
                    value="{{ request('email') }}"
                    :label="__('Alamat Email')"
                    type="email"
                    required
                    autocomplete="email"
                />
            </div>

            <!-- Password -->
            <div>
                <flux:input
                    name="password"
                    :label="__('Kata Sandi Baru')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Masukkan kata sandi baru')"
                    passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                    viewable
                />
            </div>

            <!-- Confirm Password -->
            <div>
                <flux:input
                    name="password_confirmation"
                    :label="__('Konfirmasi Kata Sandi Baru')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Ulangi kata sandi baru')"
                    passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                    viewable
                />
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 shadow-[0_4px_20px_rgba(124,58,237,0.4)] transition-all cursor-pointer"
                    data-test="reset-password-button"
                >
                    {{ __('Simpan Kata Sandi Baru') }}
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-zinc-400 pt-2 border-t border-purple-500/20">
            <span>{{ __('Batal atur ulang?') }}</span>
            <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300 font-semibold transition-colors no-underline ml-1" wire:navigate>
                {{ __('Kembali ke login') }}
            </a>
        </div>
    </div>
</x-layouts::auth>
