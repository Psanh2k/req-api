<?php

namespace App\Enums;

enum SecondaryUse: int
{
    case NO = 0;

    case YES = 1;

    public static function name($value)
    {
        return match ($value) {
            self::NO->value => 'いいえ、同意しません。',
            self::YES->value => 'はい、同意します。',
        };
    }

    public static function all(): array
    {
        return array_column([
            self::NO,
            self::YES
        ], 'value');
    }

}
