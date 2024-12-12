<?php

namespace App\Enums;

enum RequestedVideosType: int
{
    case ONE_MINUTES  = 1;
    case TWO_MINUTES  = 2;
    case FIVE_MINUTES = 5;

    public function requestVideoText() : string
    {
        return match ($this) {
            self::ONE_MINUTES  => '動画リクエスト1分',
            self::TWO_MINUTES  => '動画リクエスト2分',
            self::FIVE_MINUTES => '動画リクエスト5分',
        };
    }
}
