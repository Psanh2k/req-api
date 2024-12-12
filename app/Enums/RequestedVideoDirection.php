<?php

namespace App\Enums;

enum RequestedVideoDirection: int
{
    case VERTICAL = 1;
    case HORIZONTAL = 2;

    public static function all(): array
    {
        return array_column([
            self::VERTICAL,
            self::HORIZONTAL
        ], 'value');
    }

    public static function name($value)
    {
        return match ($value) {
            self::VERTICAL->value => '縦向き',
            self::HORIZONTAL->value => '横向き',
        };
    }
}
