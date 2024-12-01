<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.layout')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.auth.login');
    }
}
