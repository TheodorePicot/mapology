<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Password implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strlen($value) < 8 || preg_match('/[0-9]/', $value) === 0 || preg_match('/[^A-Za-z0-9]/', $value) === 0) {
            $fail('The password must be at least 8 characters and contain at least one number and one special character.');
        }
    }
}
