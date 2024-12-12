<?php

namespace App\Enums;

enum RequestedVideoBusiness: int
{
    case NON_COMMERCIAL = 0;
    case COMMERCIAL     = 1;

    public function text() : string
    {
        return match ($this) {
            self::COMMERCIAL => '商用利用'
        };
    }
}
