<?php

namespace App\Enums;

enum MemberRequestVideoStatus: int
{
    case DOING      = 0;
    case DONE       = 1;
    case CANCEL     = 2;
    case AUTO_CANCEL = 3;

    public static function name($value)
    {
        return match ($value) {
            self::DOING->value => '申請中',
            self::DONE->value => '発送済み',
            self::CANCEL->value => 'キャンセル',
            self::AUTO_CANCEL->value => 'キャンセル'
        };
    }
}
