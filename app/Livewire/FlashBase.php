<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class FlashBase extends Component
{
    #[On('flash')]
    public function handleFlash($type, $message): void
    {
        session()->flash($type, $message);
    }
}
