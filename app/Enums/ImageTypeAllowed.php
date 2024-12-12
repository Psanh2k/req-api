<?php

namespace App\Enums;

enum ImageTypeAllowed: string
{
    case PNG    = 'png';
    case JPG    = 'jpg';
    case JPEG   = 'jpeg';

    public static function scopeAll()
    {
        return [
            self::PNG->value,
            self::JPG->value,
            self::JPEG->value,
        ];
    }
}
