<x-layouts::auth :title="__('Verifikasi Email')">
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Verifikasi Alamat Email')" :description="__('Terima kasih telah bergabung! Silakan klik tautan verifikasi yang baru saja kami kirimkan ke email Anda.')" />

        @if (session('status') == 'verification-link-sent')
            <div class="rounded-xl bg-emerald-500/10 dark:bg-emerald-500/15 border border-emerald-500/30 text-emerald-700 dark:text-emerald-300 px-4 py-3 text-sm font-medium text-center">
                {{ __('Tautan verifikasi baru telah berhasil dikirim ke alamat email Anda.') }}
            </div>
        @endif

        <div class="flex flex-col items-center justify-between space-y-4 pt-2">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                @csrf
                <button
                    type="submit"
                    class="w-full py-3 px-4 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-purple-600 via-indigo-600 to-cyan-600 hover:from-purple-500 hover:to-cyan-500 shadow-[0_4px_20px_rgba(124,58,237,0.4)] transition-all cursor-pointer"
                >
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="w-full text-center">
                @csrf
                <button
                    type="submit"
                    class="text-xs text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-rose-400 transition-colors cursor-pointer bg-transparent border-0"
                    data-test="logout-button"
                >
                    {{ __('Keluar dari Akun') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts::auth>
