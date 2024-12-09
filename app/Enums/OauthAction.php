<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum OauthAction: string
{
    use EnumToArray;
    case Login = 'login';

    case Register = 'register';
    case Associate = 'associate';
}
