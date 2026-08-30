<?php

namespace App\Support;

class WhatsApp
{
    public static function link(string $message = '', ?string $number = null): string
    {
        $default = 'Halo '.config('site.brand').', saya ingin informasi sewa mobil';
        $targetNumber = $number ?: config('site.whatsapp_number');

        return 'https://wa.me/'.$targetNumber.'?text='.rawurlencode($message ?: $default);
    }
}
