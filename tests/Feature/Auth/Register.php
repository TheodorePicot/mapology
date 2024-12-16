<?php

// tests/Feature/Auth/RegisterTest.php

use App\Livewire\Auth\Register;
use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;

it('renders the registration form', function () {
    Livewire::test(Register::class)
        ->assertSee('Display name')
        ->assertSee('Email')
        ->assertSee('Password')
        ->assertSee('Password Confirmation');
});

it('validates the registration form', function () {
    Livewire::test(Register::class)
        ->set('username', '')
        ->set('email', '')
        ->set('password', '')
        ->set('password_confirmation', '')
        ->call('submit')
        ->assertHasErrors(['username', 'email', 'password', 'password_confirmation']);
});

it('throws an error if the email is already taken', function () {
    User::factory()->create(['email' => 'test@example.com']);

    Livewire::test(Register::class)
        ->set('username', 'testuser')
        ->set('email', 'test@example.com')
        ->set('password', 'password123!')
        ->set('password_confirmation', 'password123!')
        ->call('submit')
        ->assertHasErrors(['email']);
});

it('throws an error if the password does not match the confirmation', function () {
    Livewire::test(Register::class)
        ->set('username', 'testuser')
        ->set('email', 'test@example.com')
        ->set('password', 'password123!')
        ->set('password_confirmation', 'wrongpassword!2')
        ->call('submit')
        ->assertHasErrors(['password']);
});

it('registers a new user without an avatar successfully', function () {
    Mail::fake();
    Livewire::test(Register::class)
        ->set('username', 'testuser')
        ->set('email', 'test@example.com')
        ->set('password', 'password123!')
        ->set('password_confirmation', 'password123!')
        ->call('submit')
        ->assertRedirect(route('welcome'));

    $user = User::where('email', 'test@example.com')->first();

    Mail::assertQueued(Welcome::class, function ($mail) use ($user) {
        return $mail->hasTo($user->email);
    });

    expect(Auth::check())->toBeTrue()->and(Auth::id())->toBe($user->id);
});

it('registers a new user with avatar successfully', function () {
    Mail::fake();
    Storage::fake('avatars');

    $avatar = UploadedFile::fake()->image('avatar.jpg');

    Livewire::test(Register::class)
        ->set('username', 'testuser')
        ->set('email', 'test@example.com')
        ->set('password', 'password123!')
        ->set('password_confirmation', 'password123!')
        ->set('avatar', $avatar)
        ->call('submit')
        ->assertRedirect(route('welcome'));

    $user = User::where('email', 'test@example.com')->first();

    expect($user)->toBeTruthy();
    expect(Hash::check('password123!', $user->password))->toBeTrue();
    Storage::disk('avatars')->assertExists($user->avatar_path);

    Mail::assertQueued(Welcome::class, function ($mail) use ($user) {
        return $mail->hasTo($user->email);
    });

    expect(Auth::check())->toBeTrue()->and(Auth::id())->toBe($user->id);
});

it('tests all different validation rules', function () {
    $component = Livewire::test(Register::class);
    $component->set('username', '')
        ->call('submit')
        ->assertHasErrors(['username' => 'required']);

    $component->set('username', 'a')
        ->call('submit')
        ->assertHasErrors(['username']);

    $component->set('username', Str::random(256))
        ->call('submit')
        ->assertHasErrors(['username']);

    $component->set('username', 'this-is-valid')
        ->call('submit')
        ->assertHasNoErrors('username');

    $component = Livewire::test(Register::class);
    User::factory()->create(['email' => 'user@example.com']);
    $component->set('email', '')
        ->call('submit')
        ->assertHasErrors(['email' => 'required']);

    $component->set('email', 'invalid')
        ->call('submit')
        ->assertHasErrors(['email' => 'email']);

    $component->set('email', 'user@example.com')
        ->call('submit')
        ->assertHasErrors(['email' => 'unique']);

    $component->set('email', 'test@example.com')
        ->call('submit')
        ->assertHasNoErrors('email');

    $component = Livewire::test(Register::class);
    $component->set('password', '')
        ->call('submit')
        ->assertHasErrors(['password' => 'required']);

    $component->set('password', 'short')
        ->call('submit')
        ->assertHasErrors(['password']);

    $component->set('password_confirmation', '')
        ->call('submit')
        ->assertHasErrors(['password_confirmation' => 'required']);

    $component->set('password', 'password123!')
        ->set('password_confirmation', 'differentpass')
        ->call('submit')
        ->assertHasErrors(['password' => 'confirmed']);

    $component->set('password', 'password123!')
        ->set('password_confirmation', 'password123!')
        ->call('submit')
        ->assertHasNoErrors('password_confirmation');
});

