<?php

namespace App\Enums;

enum CategoryType: int
{
    case TALENT = 1;
    case PERSONAL = 2;
    case COMMERCIAL = 3;

    public function name(): string
    {
        return match ($this) {
            self::COMMERCIAL => 'commerce',
        };
    }
}
