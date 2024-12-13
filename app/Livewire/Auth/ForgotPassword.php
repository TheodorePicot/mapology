<?php

namespace App\Livewire\Auth;

use App\Mail\ForgotPassword as ForgotPasswordMail;
use App\Models\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.auth')]
class ForgotPassword extends Component
{
    public $email;

    public bool $submitted = false;

    public function mount()
    {
        $this->email = request()->query('email');
    }

    public function submitForgotPasswordRequest()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $passwordReset = PasswordResetToken::where('email', $this->email)->first();

        if (filled($passwordReset) && $passwordReset->isExpired()) {
            $passwordReset->delete();
            $passwordReset = null;
        }

        if (filled($passwordReset)) {
            $this->dispatch('flash', 'warning', 'You have already requested a password reset. Please check your email.');
            $this->submitted = true;
            return;
        }

        do {
            $token = Str::random(64);
        } while (PasswordResetToken::where('token', $token)->exists());

        $expiresAt = Carbon::now()->addMinutes(30);

        PasswordResetToken::create([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'expires_at' => $expiresAt
        ]);

        $this->dispatch('flash', 'success', 'Reset email has been sent.');
        Mail::to($this->email)->queue(new ForgotPasswordMail($this->email, $token, $expiresAt));

        $this->submitted = true;
    }

    public function resendEmail()
    {
        $throttleKey = Str::lower($this->email) . '|password-reset|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $this->dispatch('flash', 'warning', 'You have tried sending a new mail too many times.');
            return;
        }

        $passwordReset = PasswordResetToken::where('email', $this->email)->first();

        if ($passwordReset && !$passwordReset->expires_at->isPast()) {
            Mail::to($this->email)->queue(new ForgotPasswordMail($this->email, $passwordReset->token, $passwordReset->expires_at));
            $this->dispatch('flash', 'success', 'Reset email resent.');
            RateLimiter::hit($throttleKey);
        } else {
            $this->dispatch('flash', 'warning', 'No active password reset request found.');
        }
    }
}
