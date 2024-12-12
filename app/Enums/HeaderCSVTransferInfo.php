<?php

namespace App\Enums;

enum HeaderCSVTransferInfo: int
{
    public static function headerExport()
    {
        return ['年月', '売上番号', '売上日', '支払い予定日', '支払い先', '支払い合計（税込）'];
    }
}
