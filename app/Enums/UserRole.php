<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN   = 1;
    case MANAGER = 2;
    case TALENT  = 3;
    case MEMBER  = 4;

    /**
     * @throws \Exception
     */
    public function getNameRole()
    {
        return match ($this->value) {
            self::ADMIN->value   => \Str::lower(self::ADMIN->name),
            self::MANAGER->value => \Str::lower(self::MANAGER->name),
            self::TALENT->value  => \Str::lower(self::TALENT->name),
            self::MEMBER->value  => \Str::lower(self::MEMBER->name),
            default              => throw new \Exception('Unexpected match value'),
        };
    }
}
