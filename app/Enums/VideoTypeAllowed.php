<?php

namespace App\Enums;

enum VideoTypeAllowed: string
{
    case MP4    = 'mp4';
    case MOV    = 'mov';

    public static function scopeAll()
    {
        return [
            self::MP4->value,
            self::MOV->value,
        ];
    }
}
