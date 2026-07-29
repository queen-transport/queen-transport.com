<?php

namespace App\Support;

class WhatsApp
{
    public static function link(string $message = ''): string
    {
        $default = 'Halo '.config('site.brand').', saya ingin informasi sewa mobil';

        return 'https://wa.me/'.config('site.whatsapp_number').'?text='.rawurlencode($message ?: $default);
    }
}
