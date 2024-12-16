<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.base')]
class Dashboard extends Component
{
    public function render()
    {
        if (auth()->user()->can('access admin dashboard')) {
            return view('livewire.user.admin-dashboard');
        } else {
            return view('livewire.user.user-dashboard');
        }
    }
}
