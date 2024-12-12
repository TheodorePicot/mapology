<?php

namespace App\Livewire\Auth;

use App\Enums\OauthAction;
use App\Mail\Welcome;
use App\Mail\VerifyEmail as VerifyEmailMail;
use App\Models\User;
use App\Rules\Password;
use App\Rules\Username;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.front.auth')]
class Register extends Component
{
    use WithFileUploads;

    public $username;

    public $email;

    public $password;

    public $password_confirmation;

    #[Validate('nullable|image|max:1024')]
    public $avatar;

    public $oauthAction;

    public function mount()
    {
        $this->oauthAction = OauthAction::Register;
    }


    public function submit()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if ($this->avatar) {
            $user->uploadAvatar($this->avatar);
        }

        event(new Registered($user));
        Mail::to($user->email)->queue(new Welcome($user));

        Auth::login($user);

        return redirect()->route('welcome');
    }

    protected function rules()
    {
        return [
            'username' => ['required', new Username],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', new Password],
            'password_confirmation' => ['required'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'username' => 'display name',
            'email' => 'email',
            'password' => 'password',
            'password_confirmation' => 'password confirmation',
            'avatar' => 'avatar',
        ];
    }
}
