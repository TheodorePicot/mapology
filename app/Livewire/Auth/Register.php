<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.layout')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.register');
    }
}
