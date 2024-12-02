<?php

namespace App\Enums;

enum UserRole: string
{
    case Administrator = 'administrator';

    case Contributor = 'contributor';
    case User = 'user';
}
