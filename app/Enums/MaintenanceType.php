<?php

namespace App\Enums;

enum MaintenanceType: int
{
    case IN_PROGRESS = 0;
    case CANCEL = 1;
}
