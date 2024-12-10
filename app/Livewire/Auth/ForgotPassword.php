<?php

namespace App\Livewire\Auth;

use App\Mail\ForgotPassword as ForgotPasswordMail;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.auth')]
class ForgotPassword extends Component
{
    public $email;

    public function mount()
    {
        $this->email = request()->query('email');
    }

    public function submitForgotPasswordRequest()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        $createdAt = Carbon::now();
        $expiresAt = Carbon::now()->addMinutes(30);

        $passwordReset = DB::table('password_reset_tokens')->where('email', $this->email)->first();

        if (filled($passwordReset) && $passwordReset->expires_at->isPast()) {
            DB::table('password_reset_tokens')->where('email', $this->email)->delete();
        } else if (filled($passwordReset)) {
            session()->flash('warning', 'You have already requested a password reset. Please try again after 30 minutes or send a new mail.');
        }

        DB::table('password_reset_tokens')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => $createdAt,
            'expires_at' => $expiresAt
        ]);

        Mail::to($this->email)->queue(new ForgotPasswordMail($this->email, $token, $expiresAt));
    }

    public function sendNewPasswordResetMail()
    {
        $throttleKey = Str::lower($this->email) . '|password-reset|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            session()->flash('warning', 'You have tried sending a new mail too many times.');
            return;
        }

        $passwordReset = DB::table('password_reset_tokens')->where('email', $this->email)->first();

        if ($passwordReset && !$passwordReset->expires_at->isPast()) {
            Mail::to($this->email)->queue(new ForgotPasswordMail($this->email, $passwordReset->token, $passwordReset->expires_at));
            RateLimiter::hit($throttleKey);
        } else {
            session()->flash('warning', 'No active password reset request found.');
        }
    }
}
