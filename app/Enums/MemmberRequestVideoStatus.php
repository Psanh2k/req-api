<?php

namespace App\Enums;

enum MemmberRequestVideoStatus: int
{
    case DOING      = 0;
    case DONE       = 1;
    case CANCEL     = 2;
    case AUTOCANCEL = 3;
}
