<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PasswordResetService
{
    public function checkIfExistsByToken(string $token): void
    {
        $passwordReset = $this->getPasswordResetByToken($token);
        $this->handlePasswordReset($passwordReset, $token);
    }

    public function checkIfExistsByEmailAndByToken(string $email, string $token): void
    {
        $passwordReset = $this->getPasswordResetByEmail($email);
        $this->handlePasswordReset($passwordReset, $token, 'Invalid email for password reset');
    }

    private function handlePasswordReset($passwordReset, string $token, string $invalidMessage = 'Invalid password reset token'): void
    {
        if (empty($passwordReset)) {
            redirect()->route('home')->with('error', $invalidMessage);
        }

        if ($this->isExpired($passwordReset)) {
            $this->deletePasswordReset($token);
            redirect()->route('home')->with('error', 'Password reset token has expired');
        }
    }

    private function getPasswordResetByToken(string $token)
    {
        return DB::table('password_resets')->where('token', $token)->first();
    }

    private function getPasswordResetByEmail(string $email)
    {
        return DB::table('password_resets')->where(['email' => $email])->first();
    }

    private function isExpired(object $passwordReset): bool
    {
        return Carbon::parse($passwordReset->expires_at)->isPast();
    }

    public function deletePasswordReset(string $token)
    {
        DB::table('password_resets')->where('token', $token)->delete();
    }
}
