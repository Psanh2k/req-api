<?php

namespace App\Enums;

enum MailType: int
{
    case TEMP_REGISTER = 1;
    case VERIFY_ACCOUNT = 2;
    case RESET_PASSWORD = 3;
    case CHANGE_EMAIL = 4;
    case CHANGE_PASSWORD = 5;
}
