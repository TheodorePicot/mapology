<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Username implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string, ?string=): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (User::where('username', $value)->exists()) {
            $fail('The username has already been taken.');
        }
        if (strlen($value) < 3) {
            $fail('The username must be at least 3 characters long.');
        }

        if (!preg_match('/^[a-zA-Z0-9]/', $value)) {
            $fail('The username must start with a letter or number.');
        }

        if (preg_match('/[-_]{2,}/', $value)) {
            $fail('The username may not contain consecutive dashes or underscores.');
        }

        if (!preg_match('/^[a-zA-Z0-9]+(?:[-_][a-zA-Z0-9]+)*$/', $value)) {
            $fail('The username may only contain letters, numbers, dashes, underscores.');
        }


        if (preg_match('/[-_]$/', $value)) {
            $fail('The username may not end with a dash or underscore.');
        }
    }
}
