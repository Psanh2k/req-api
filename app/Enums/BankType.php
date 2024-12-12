<?php

namespace App\Enums;

enum BankType: int
{
    case BANK = 1;
    case CREDIT_FUND = 2;
    case CREDIT_INSTITUTIONS = 3;

    public static function bankTypeName($bankType)
    {
        return match ($bankType) {
            self::BANK->value                => '銀行',
            self::CREDIT_FUND->value         => '信用金庫',
            self::CREDIT_INSTITUTIONS->value => '信用組合',
        };
    }

    public static function allTypeName(): array
    {
        return [
            self::BANK->value                => '銀行',
            self::CREDIT_FUND->value         => '信用金庫',
            self::CREDIT_INSTITUTIONS->value => '信用組合',
        ];
    }

    public static function allType(): array
    {
        return array_column([
            self::BANK,
            self::CREDIT_FUND,
            self::CREDIT_INSTITUTIONS
        ], 'value');
    }

    public static function bankTypeValue($bankTypeName)
    {
        return match ($bankTypeName) {
            '銀行'     => self::BANK->value,
            '信用金庫'  => self::CREDIT_FUND->value ,
            '信用組合'  => self::CREDIT_INSTITUTIONS->value,
        };
    }

}
