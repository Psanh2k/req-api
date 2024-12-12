<?php

namespace App\Enums;

enum AccountType: string
{
    case NORMAL = '普通';
    case TEMP = '当座';

    public static function all(): array
    {
        return [
            self::NORMAL->value => '普通',
            self::TEMP->value   => '当座',
        ];
    }
}
