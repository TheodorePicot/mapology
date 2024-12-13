<?php

namespace App\Livewire\Auth;

use App\Models\PasswordResetToken;
use App\Models\User;
use App\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.front.auth')]
class ResetPassword extends Component
{
    #[Locked]
    public $token;

    public $email;

    public $password;

    public $password_confirmation;

    public function resetPassword() {

        $passwordReset = PasswordResetToken::where('token', $this->token)->first();

        if ($passwordReset->isExpired()) {
            $passwordReset->delete();
            return redirect()->route('home')->with('error', 'Password reset token has expired, ask for a new one.');
        }

        $validatedData = $this->validate([
            'email' => 'required|email|in:' . $passwordReset->email,
            'password' => ['required', new Password],
            'password_confirmation' => 'required|same:password'
        ]);

        User::where('email', $validatedData['email'])
            ->update(['password' => Hash::make($validatedData['password'])]);

        $passwordReset->delete();

        return to_route('login')->with('success', 'Your password has been reset!');
    }
}
