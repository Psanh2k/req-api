<?php

namespace App\Enums;

enum OrganizationStructure: int
{
    case CORPORATION = 1;
    case OWNERSHIP   = 2;

    public static function organiStrucName($organiStrucType)
    {
        return match ($organiStrucType) {
            self::CORPORATION->value => __('labels.organization_structure.corporate'),
            self::OWNERSHIP->value   => __('labels.organization_structure.ownership'),
        };
    }

    public static function organiStructNameToValue($organiStrucName)
    {
        return match ($organiStrucName) {
            __('labels.organization_structure.corporate') => self::CORPORATION->value,
            __('labels.organization_structure.ownership') => self::OWNERSHIP->value,
            default => null,
        };
    }
}
