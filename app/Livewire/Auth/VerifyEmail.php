<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.auth')]
class VerifyEmail extends Component
{
    public function resendPassword() {
        if (Auth::check()) {
            Auth::user()->sendEmailVerificationNotification();
        }
    }
}
