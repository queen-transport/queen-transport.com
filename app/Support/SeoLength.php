<?php

namespace App\Support;

class SeoLength
{
    /** Google search title guidance (~50-60 characters before truncation). */
    public const TITLE_MIN = 40;

    public const TITLE_IDEAL_MIN = 50;

    public const TITLE_IDEAL_MAX = 60;

    /** Google meta description guidance (~120-160 characters before truncation). */
    public const DESCRIPTION_MIN = 70;

    public const DESCRIPTION_IDEAL_MIN = 120;

    public const DESCRIPTION_IDEAL_MAX = 160;

    /**
     * @return array{label: string, color: string}
     */
    public static function evaluate(?string $value, int $idealMin, int $idealMax, int $tooShortBelow): array
    {
        $length = mb_strlen($value ?? '');

        if ($length === 0) {
            return ['label' => 'Kosong', 'color' => 'gray'];
        }

        if ($length < $tooShortBelow) {
            return ['label' => "{$length} karakter · terlalu pendek", 'color' => 'danger'];
        }

        if ($length < $idealMin) {
            return ['label' => "{$length} karakter · agak pendek", 'color' => 'warning'];
        }

        if ($length <= $idealMax) {
            return ['label' => "{$length} karakter · ideal", 'color' => 'success'];
        }

        return ['label' => "{$length} karakter · terlalu panjang", 'color' => 'danger'];
    }

    /**
     * @return array{label: string, color: string}
     */
    public static function title(?string $value): array
    {
        return self::evaluate($value, self::TITLE_IDEAL_MIN, self::TITLE_IDEAL_MAX, self::TITLE_MIN);
    }

    /**
     * @return array{label: string, color: string}
     */
    public static function description(?string $value): array
    {
        return self::evaluate($value, self::DESCRIPTION_IDEAL_MIN, self::DESCRIPTION_IDEAL_MAX, self::DESCRIPTION_MIN);
    }
}
