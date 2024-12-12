<?php

namespace App\Enums;

enum AllowCompetition: int
{
    case NOT_POSSIBLE = 0;

    case POSSIBLE = 1;

    public static function name($value)
    {
        return match ($value) {
            self::NOT_POSSIBLE->value => '不可',
            self::POSSIBLE->value => '可能',
        };
    }
}
