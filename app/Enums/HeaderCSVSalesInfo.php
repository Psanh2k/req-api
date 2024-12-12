<?php

namespace App\Enums;

enum HeaderCSVSalesInfo: int
{
    public static function headerExport()
    {
        return ['年月', 'ID', 'タレント名', '会員名', '動画リクエスト日', '商品名', '出演料', '支払い状況'];
    }

    public static function headerExportTalent()
    {
        return ['年月', 'ID', 'タレント名', '会員名', '動画リクエスト日', '商品名', '出演料', '納品日'];
    }

    public static function headerManagerSalesExport()
    {
        return ['年月', 'ID', 'タレント名', '会員名', '動画リクエスト日', '商品名', '出演料', '納品日'];
    }
}
