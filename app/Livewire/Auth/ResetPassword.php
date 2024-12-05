<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Rules\Password;
use App\Services\PasswordResetService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.layout')]
class ResetPassword extends Component
{
    #[Locked]
    public $token;

    public $email;

    public $password;

    public $password_confirmation;

    public function resetPassword() {

        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => ['required', new Password],
            'password_confirmation' => 'required|same:password'
        ]);

        $passwordResetService = new PasswordResetService();

        $passwordResetService->checkIfExistsByEmailAndByToken($this->email, $this->token);

        User::where('email', $validatedData['email'])
            ->update(['password' => Hash::make($validatedData['password'])]);

        $passwordResetService->deletePasswordReset($this->token);

        return to_route('login')->with('message', 'Your password has been changed!');
    }
}
