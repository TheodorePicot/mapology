<?php

namespace App\Livewire\Auth;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.auth')]
class VerifyEmail extends Component
{
    public function resendEmail()
    {
        $throttleKey = 'email.verification.' . Auth::id();

        if (!RateLimiter::tooManyAttempts($throttleKey, 3)) {
            RateLimiter::hit($throttleKey, 300);
            Auth::user()->sendEmailVerificationNotification();
            $this->dispatch('flash', 'success', 'Verification email resent.');
        } else {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->dispatch('flash', 'error', __("You've resent the verification email too many times. Please try again in :time.", [
                'time' => $seconds > 60
                    ? __(':minutes minutes', ['minutes' => ceil($seconds / 60)])
                    : __(':seconds seconds', ['seconds' => $seconds])
            ]));
        }
    }
}
