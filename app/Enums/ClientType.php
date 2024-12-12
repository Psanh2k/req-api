<?php

namespace App\Enums;

enum ClientType: int
{
    case GUEST  = 1;
    case AUTH   = 2;
}
