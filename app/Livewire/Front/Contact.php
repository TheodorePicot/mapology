<?php

namespace App\Livewire\Front;

use App\Mail\Contact as ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.auth')]
class Contact extends Component
{
    public string $first_name;
    public string $last_name;
    public $email;
    public string $message;

    protected function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1024',
        ];
    }

    public function submit()
    {
        $throttleKey = strtolower($this->email) . '|contact-submit|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 2)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $minutes = intval($seconds / 60);
            $this->dispatch('flash', 'warning', __('You\'ve tried sending a contact request too many times. Please try again in ' . ($minutes > 1 ? "$minutes minutes" : "$seconds seconds"). '.', [
                'seconds' => $seconds,
            ]));
            return;
        }

        $this->validate();

        RateLimiter::hit($throttleKey, 300);

        Mail::to(config('company.email'))->queue(new ContactMail($this->first_name, $this->last_name, $this->email, $this->message));

        // Send contact mail logic here
        $this->dispatch('flash', 'success', 'Your message has been sent successfully.');
    }
}
