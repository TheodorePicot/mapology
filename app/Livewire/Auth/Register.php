<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.front.auth')]
class Register extends Component
{
    use WithFileUploads;

    public $first_name;

    public $last_name;

    public $email;

    public $password;

    public $password_confirmation;


    #[Validate('required|image|max:1024')]
    public $avatar;

    public function submit()
    {
        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if ($this->avatar) {
            $user->uploadAvatar($this->avatar);
        }

        Auth::login($user);

        return redirect()->route('welcome');
    }

    protected function rules()
    {
        return [
            'first_name' => ['string', 'max:255', 'nullable'],
            'last_name' => ['string', 'max:255', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'first_name' => 'first name',
            'last_name' => 'last name',
            'email' => 'email',
            'password' => 'password',
            'password_confirmation' => 'password confirmation',
            'avatar' => 'avatar',
        ];
    }
}
