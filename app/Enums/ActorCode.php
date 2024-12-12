<?php

namespace App\Enums;

enum ActorCode: int
{
    case MEMBER = 10;
    case FREE_TALENT = 20;
    case ENTERTAINMENT_AGENCY_TALENT = 30;
    case ENTERTAINMENT_AGENCY = 40;
    case SYSTEM_ADMIN = 50;

    public static function actorCodeInYear($actorCode)
    {
        $year = now()->format('y');

        return match ($actorCode) {
            self::MEMBER->value                      => $actorCode . $year,
            self::FREE_TALENT->value                 => $actorCode . $year,
            self::ENTERTAINMENT_AGENCY_TALENT->value => $actorCode . $year,
            self::ENTERTAINMENT_AGENCY->value        => $actorCode . $year,
            self::SYSTEM_ADMIN->value                => $actorCode . $year,
        };
    }
}
