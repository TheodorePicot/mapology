<?php

namespace App\Livewire\Auth;

use App\Enums\OauthAction;
use App\Mail\Welcome;
use App\Models\User;
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

    public $name;

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
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if ($this->avatar) {
            $user->uploadAvatar($this->avatar);
        }

        Mail::to($user->email)->queue(new Welcome($user));

        Auth::login($user);

        return redirect()->route('welcome');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
            'password_confirmation' => 'password confirmation',
            'avatar' => 'avatar',
        ];
    }
}
