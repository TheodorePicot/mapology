<?php
use App\Livewire\Front\Contact;
use App\Mail\Contact as ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Livewire;

it('renders the contact form', function () {
    Livewire::test(Contact::class)
        ->assertSee('First Name')
        ->assertSee('Last Name')
        ->assertSee('Email address')
        ->assertSee('Message');
});

it('validates the contact form', function () {
    Livewire::test(Contact::class)
        ->set('first_name', '')
        ->set('last_name', '')
        ->set('email', '')
        ->set('message', '')
        ->call('submit')
        ->assertHasErrors(['first_name', 'last_name', 'email', 'message']);
});

it('sends a contact email', function () {
    Mail::fake();

    Livewire::test(Contact::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'john@example.com')
        ->set('message', 'Hello, this is a test message.')
        ->call('submit')
        ->assertDispatched('flash', 'success', 'Your message has been sent successfully.');

    Mail::assertQueued(ContactMail::class, function ($mail) {
        return $mail->hasTo(config('company.email'));
    });
});

it('throttles the contact form', function () {
    Mail::fake();

    $email = 'john@example.com';

    Livewire::test(Contact::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', $email)
        ->set('message', 'Hello, this is a test message.')
        ->call('submit')
        ->assertDispatched('flash', 'success', 'Your message has been sent successfully.')
        ->call('submit')
        ->assertDispatched('flash', 'success', 'Your message has been sent successfully.')
        ->call('submit')
        ->assertDispatched('flash', 'warning', 'You\'ve tried sending a contact request too many times. Please try again in 5 minutes.');

    Mail::assertQueued(ContactMail::class, 2);
});

it('validates the contact form with the correct rules', function () {
    Livewire::test(Contact::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'john@example.com')
        ->set('message', 'Hello, this is a test message.')
        ->call('submit')
        ->assertHasNoErrors();

    Livewire::test(Contact::class)
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'john@example.com')
        ->set('message', 'Hello, this is a test message.')
        ->set('message', Str::random(1025))
        ->call('submit')
        ->assertHasErrors(['message']);
});
