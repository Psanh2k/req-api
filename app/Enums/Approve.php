<?php

namespace App\Enums;

enum Approve: int
{
    case ON = 1;
    case OFF = 0;

    public function name(): string
    {
        return match ($this) {
            self::ON => 'approve',
        };
    }

}
