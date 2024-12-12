<?php

namespace App\Enums;

enum VideoDirection: int
{
    case VERTICAL = 1;
    case HORIZONTAL = 2;

    public static function videoDirectionName($videoDirectionType)
    {
        return match ($videoDirectionType) {
            self::VERTICAL->value   => '縦向き',
            self::HORIZONTAL->value => '横向き',
        };
    }
}
