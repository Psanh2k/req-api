<?php

namespace App\Enums;

enum VideoSettingType: int
{
    case ONE_MINUTE = 1;
    case TWO_MINUTES = 2;
    case FIVE_MITUTES = 5;
    case PRICE_MIN = 5000;
    case PRICE_MAX = 100000;
    case PRICE_GAP = 1000;

    public static function allType(): array
    {
        return array_column([
            self::ONE_MINUTE,
            self::TWO_MINUTES,
            self::FIVE_MITUTES
        ], 'value');
    }
}
