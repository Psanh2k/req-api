<?php

namespace App\Enums;

enum ContractTerm: int
{
    case THREE_MONTHS = 3;
    case SIX_MONTHS = 6;
    case A_YEAR = 12;
    case TWO_YEAR = 24;

    public static function getContractTermName($contractTermType)
    {
        return $contractTermType . 'カ月';
    }

    public static function getContractTermNameByValue($contractTermValue)
    {
        return $contractTermValue ? preg_replace('/\D/', '', $contractTermValue) : null;
    }

    public static function all(): array
    {
        return array_column([
            self::THREE_MONTHS,
            self::SIX_MONTHS,
            self::A_YEAR,
            self::TWO_YEAR
        ], 'value');
    }
}
