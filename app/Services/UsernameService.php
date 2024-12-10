<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;

class UsernameService
{
    public function formatNameToNickname(string|null $name): string
    {
        if (empty($name)) {
            return $this->generateRandomUsername();
        }
        $name = strtolower(str_replace(' ', '_', $name));
        $existingUsernames = User::pluck('username')->toArray();
        if (in_array($name, $existingUsernames)) {
            $explodedName = explode('_', $name);
            $lastPart = array_pop($explodedName);
            $newLastPart = $lastPart . '_1';
            array_push($explodedName, $newLastPart);
            $name = implode('_', $explodedName);
        }
        return $name;
    }


    public function generateRandomUsername(): string
    {
        $randomUsername = 'user_' . Str::lower(Str::random(12));
        $existingUsernames = User::pluck('username')->toArray();
        if (in_array($randomUsername, $existingUsernames)) {
            $randomUsername = 'user_' . Str::lower(Str::random(12));
        }
        return $randomUsername;
    }
}
