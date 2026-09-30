<?php

namespace App\Support;

class WhatsApp
{
    /**
     * Semua nomor WhatsApp dari config (CSV → array).
     *
     * @return string[]
     */
    public static function numbers(): array
    {
        $raw = config('site.whatsapp_number', '');

        return array_map('trim', explode(',', $raw));
    }

    /**
     * Nomor pertama — dipakai untuk tampilan teks & schema JSON-LD.
     */
    public static function primaryNumber(): string
    {
        return self::numbers()[0];
    }

    /**
     * Nomor acak — dipakai untuk link WhatsApp agar beban tersebar.
     */
    public static function randomNumber(): string
    {
        $numbers = self::numbers();

        return $numbers[array_rand($numbers)];
    }

    /**
     * Generate link wa.me. Jika $number tidak diisi, pilih nomor secara acak.
     */
    public static function link(string $message = '', ?string $number = null): string
    {
        $default = 'Halo '.config('site.brand').', saya ingin informasi sewa mobil';
        $targetNumber = $number ?: self::randomNumber();

        return 'https://wa.me/'.$targetNumber.'?text='.rawurlencode($message ?: $default);
    }
}
