<?php

use App\Livewire\Auth\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Livewire;

it('shows the login form', function () {
    Livewire::test(Login::class)
        ->assertSee('Email address')
        ->assertSee('Password')
        ->assertSee('Remember me');
});


it('redirects authenticated user from login page to dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('login'))
        ->assertRedirect(route('dashboard'));
});

it('throws error on invalid credentials', function () {
    $component = Livewire::test(Login::class);
    $user = User::factory()->create();

    $component
        ->set('email', $user->email)
        ->set('password', 'wrongpassword')
        ->call('authenticate')
        ->assertHasErrors(['email' => 'The provided credentials are incorrect.']);

    $component
        ->set('email', 'nonexistent@example.com')
        ->set('password', 'password')
        ->call('authenticate')
        ->assertHasErrors(['email' => 'The provided credentials are incorrect.']);

    $component
        ->set('email', '')
        ->set('password', 'password')
        ->call('authenticate')
        ->assertHasErrors(['email' => 'required']);

    $component
        ->set('email', 'user@example.com')
        ->set('password', '')
        ->call('authenticate')
        ->assertHasErrors(['password' => 'required']);
});

it('redirects user to dashboard after successful login', function () {
    User::where('email', 'correct_credentials@example.com')->delete();
    $user = User::factory()->create([
        'email' => 'correct_credentials@example.com',
        'password' => bcrypt('password'),
    ]);

    Livewire::test(Login::class)
        ->set('email', 'correct_credentials@example.com')
        ->set('password', 'password')
        ->call('authenticate')
        ->assertRedirect(route('dashboard'));

    expect(Auth::check())->toBeTrue()->and(Auth::user()->id)->toBe($user->id);

    $this->get(route('home'))->assertStatus(200);
});

it('remembers user when checkbox is checked', function () {
    User::where('email', 'remember_checked@example.com')->delete();
    $user = User::factory()->create([
        'email' => 'remember_checked@example.com',
        'password' => bcrypt('password'),
        'remember_token' => null,
    ]);

    Livewire::test(Login::class)
        ->set('email', 'remember_checked@example.com')
        ->set('password', 'password')
        ->set('remember', true)
        ->call('authenticate');

    // Rafraîchir l'instance de l'utilisateur depuis la base de données
    $user->refresh();

    // Vérifier que le remember_token n'est plus null
    expect($user->remember_token)->not->toBeNull();
});

it('does not remember user when checkbox is unchecked', function () {
    User::where('email', 'remember_unchecked@example.com')->delete();
    $user = User::factory()->create([
        'email' => 'remember_unchecked@example.com',
        'password' => bcrypt('password'),
        'remember_token' => null,
    ]);

    Livewire::test(Login::class)
        ->set('email', 'remember_unchecked@example.com')
        ->set('password', 'password')
        ->set('remember', false)
        ->call('authenticate');

    $user->refresh();
    expect($user->remember_token)->toBeNull();
});

it('throws error after too many login attempts', function () {
    $user = User::factory()->create([
        'email' => 'max_attempts@example.com',
        'password' => bcrypt('password'),
    ]);

    // Ensure the throttle key is cleared before the test
    $throttleKey = Str::lower($user->email) . '|' . request()->ip();
    RateLimiter::clear($throttleKey);

    $component = Livewire::test(Login::class);

    // Attempt to login more than the allowed attempts
    for ($i = 0; $i < 5; $i++) {
        $component->set('email', $user->email)
            ->set('password', 'wrongpassword')
            ->call('authenticate')
            ->assertHasErrors(['email' => 'The provided credentials are incorrect.']);
    }

    // The next attempt should throw a too many attempts error
    $component->set('email', $user->email)
        ->set('password', 'wrongpassword')
        ->call('authenticate')
        ->assertHasErrors(['email' => 'Too many login attempts. Please try again in 59 seconds.']);
});

// TODO fix socialite tests
