<?php

namespace App\Enums;

enum TransactionStatus: int
{
    case TEMPORARY = 0;
    case SUCCESSFUL = 1;
    case CANCELED = 2;
    case EXPIRED = 3;
    case FAILED = 9;
}
