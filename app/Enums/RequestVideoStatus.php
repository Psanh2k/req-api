<?php

namespace App\Enums;

enum RequestVideoStatus: int
{
    case DOING      = 0;
    case DONE       = 1;
    case CANCEL     = 2;
    case AUTOCANCEL = 3;

    public function statusText() : string
    {
        return match ($this) {
            self::DOING         => '動画作成中',
            self::DONE          => '送信済み',
            self::CANCEL        => 'リクエスト拒否',
            self::AUTOCANCEL    => '自動キャンセル',
        };
    }
}
