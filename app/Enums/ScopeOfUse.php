<?php

namespace App\Enums;

enum ScopeOfUse: int
{
    case ALL = 1;
    case TV_COMMERCIALS = 2;
    case WEB_ONLY = 3;
    case INTERNAL_ONLY = 4;
    case TAXI_ADVERTISEMENT_ONLY = 5;
    case SNS_ONLY = 6;

    public static function scopeName($scopeType)
    {
        return match ($scopeType) {
            self::ALL->value                     => '全て',
            self::TV_COMMERCIALS->value          => 'テレビCMを含む',
            self::WEB_ONLY->value                => 'ウェブページのみ',
            self::INTERNAL_ONLY->value           => '社内向け利用のみ',
            self::TAXI_ADVERTISEMENT_ONLY->value => 'タクシー広告のみ',
            self::SNS_ONLY->value                => 'SNS利用のみ'
        };
    }

    public static function all(): array
    {
        return array_column([
            self::ALL,
            self::TV_COMMERCIALS,
            self::WEB_ONLY,
            self::INTERNAL_ONLY,
            self::TAXI_ADVERTISEMENT_ONLY,
            self::SNS_ONLY,
        ], 'value');
    }

}
