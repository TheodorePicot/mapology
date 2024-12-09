<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Service that handles password reset flow.
 */
class PasswordResetService
{
    /**
     * Check if password reset token is valid.
     * If token is invalid, redirect to home with error message.
     * If token is expired, delete it and redirect to home with error message.
     * @param string $token Password reset token
     * @return void
     */
    public function checkIfExistsByToken(string $token): void
    {
        $passwordReset = $this->getPasswordResetByToken($token);
        $this->handlePasswordReset($passwordReset, $token);
    }

    /**
     * Check if password reset token and email are valid.
     * If token is invalid, redirect to home with error message.
     * If token is expired, delete it and redirect to home with error message.
     * If email is invalid, redirect to home with error message.
     * @param string $email Email of the user
     * @param string $token Password reset token
     * @return void
     */
    public function checkIfExistsByEmailAndByToken(string $email, string $token): void
    {
        $passwordReset = $this->getPasswordResetByEmail($email);
        $this->handlePasswordReset($passwordReset, $token, 'Invalid email for password reset');
    }

    /**
     * Handle password reset flow.
     * If password reset is invalid, redirect to home with error message.
     * If password reset is expired, delete it and redirect to home with error message.
     * @param object|null $passwordReset Password reset data
     * @param string $token Password reset token
     * @param string $invalidMessage Message to display if password reset is invalid
     * @return void
     */
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

    /**
     * Get password reset by token.
     * @param string $token Password reset token
     * @return object|null Password reset data
     */
    private function getPasswordResetByToken(string $token)
    {
        return DB::table('password_resets')->where('token', $token)->first();
    }

    /**
     * Get password reset by email.
     * @param string $email Email of the user
     * @return object|null Password reset data
     */
    private function getPasswordResetByEmail(string $email)
    {
        return DB::table('password_resets')->where(['email' => $email])->first();
    }

    /**
     * Check if password reset is expired.
     * @param object $passwordReset Password reset data
     * @return bool true if password reset is expired
     */
    private function isExpired(object $passwordReset): bool
    {
        return Carbon::parse($passwordReset->expires_at)->isPast();
    }

    /**
     * Delete password reset.
     * @param string $token Password reset token
     * @return void
     */
    public function deletePasswordReset(string $token)
    {
        DB::table('password_resets')->where('token', $token)->delete();
    }
}
