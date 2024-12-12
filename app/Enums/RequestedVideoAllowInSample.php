<?php

namespace App\Enums;

enum RequestedVideoAllowInSample: int
{
    case NOT_ALLOW  = 0;
    case ALLOW      = 1;

    public static function name($value)
    {
        return match ($value) {
            self::NOT_ALLOW->value => 'しない',
            self::ALLOW->value     => 'する',
        };
    }
}
