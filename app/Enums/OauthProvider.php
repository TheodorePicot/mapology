<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum OauthProvider: string
{
    use EnumToArray;
    case Google = 'google';
    case Github = 'github';

    private const PROVIDER_LABELS = [
        'google' => 'Google',
        'github' => 'GitHub',
    ];

    public function label(): string
    {
        return self::PROVIDER_LABELS[$this->value];
    }
}
