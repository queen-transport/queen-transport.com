<x-layouts::auth :title="__('Lupa Kata Sandi')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Lupa Kata Sandi?')" :description="__('Masukkan email terdaftar Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi')" />

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
            @csrf

            <!-- Email Address -->
            <div>
                <flux:input
                    name="email"
                    :label="__('Alamat Email')"
                    type="email"
                    required
                    autofocus
                    placeholder="nama@email.com"
                />
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 shadow-[0_4px_20px_rgba(124,58,237,0.4)] transition-all cursor-pointer"
                    data-test="email-password-reset-link-button"
                >
                    {{ __('Kirim Tautan Reset Sandi') }}
                </button>
            </div>
        </form>

        <div class="text-center text-sm text-zinc-400 pt-2 border-t border-purple-500/20">
            <span>{{ __('Ingat kata sandi Anda?') }}</span>
            <a href="{{ route('login') }}" class="text-cyan-400 hover:text-cyan-300 font-semibold transition-colors no-underline ml-1" wire:navigate>
                {{ __('Kembali untuk masuk') }}
            </a>
        </div>
    </div>
</x-layouts::auth>
