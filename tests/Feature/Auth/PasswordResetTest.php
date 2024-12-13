<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Mail\ForgotPassword as ForgotPasswordMail;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Livewire;
use function Pest\Laravel\assertDatabaseHas;

it('redirects to dashboard when on forgot password page if authed', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('forgot-password'))
        ->assertRedirect(route('dashboard'));
});

it('redirects to dashboard when on reset page if authed', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('forgot-password'))
        ->assertRedirect(route('dashboard'));
});

it('prefills email from query string', function () {
    Livewire::withQueryParams(['email' => 'test@example.com'])
        ->test(ForgotPassword::class)
        ->assertSet('email', 'test@example.com');
});

it('submits forgot password request', function () {
    Mail::fake();
    $email = 'test@example.com';
    User::factory()->create([
        'email' => $email,
    ]);

    PasswordResetToken::where('email', $email)->delete();

    Livewire::test(ForgotPassword::class)
        ->set('email', $email)
        ->call('submitForgotPasswordRequest')
        ->assertSet('submitted', true)
        ->assertDispatched('flash', 'success', 'Reset email has been sent.');

    assertDatabaseHas('password_reset_tokens', ['email' => $email]);

    Mail::assertQueued(ForgotPasswordMail::class, function ($mail) use ($email) {
        return $mail->hasTo($email);
    });
});

it('deletes old password reset token if expired and creates a new one', function () {
    Mail::fake();
    $email = 'test@example.com';
    User::factory()->create([
        'email' => $email,
    ]);

    PasswordResetToken::factory()->expired()->create([
        'email' => $email,
    ]);

    Livewire::test(ForgotPassword::class)
        ->set('email', $email)
        ->call('submitForgotPasswordRequest')
        ->assertSet('submitted', true)
        ->assertDispatched('flash', 'success', 'Reset email has been sent.');

    assertDatabaseHas('password_reset_tokens', ['email' => $email]);

    $nbTokens = PasswordResetToken::where('email', $email)->count();

    expect($nbTokens)->toBe(1);

    $nbTokens = PasswordResetToken::where('email', $email)->first();

    expect($nbTokens->isExpired())->toBeFalse();

    Mail::assertQueued(ForgotPasswordMail::class, function ($mail) use ($email) {
        return $mail->hasTo($email);
    });
});


it('throws error message if password reset already asked for and not expired', function () {
    Mail::fake();
    $email = 'test@example.com';
    User::factory()->create([
        'email' => $email,
    ]);

    PasswordResetToken::factory()->create([
        'email' => $email,
    ]);

    Livewire::test(ForgotPassword::class)
        ->set('email', $email)
        ->call('submitForgotPasswordRequest')
        ->assertSet('submitted', true)
        ->assertDispatched('flash', 'warning', 'You have already requested a password reset. Please check your email.');

    assertDatabaseHas('password_reset_tokens', ['email' => $email]);

    $nbTokens = PasswordResetToken::where('email', $email)->count();

    expect($nbTokens)->toBe(1);

    $nbTokens = PasswordResetToken::where('email', $email)->first();

    expect($nbTokens->isExpired())->toBeFalse();

    Mail::assertNotQueued(ForgotPasswordMail::class);
});

it('resends password reset email', function () {
    Mail::fake();
    $email = 'test@example.com';

    User::factory()->create([
        'email' => $email,
    ]);

    PasswordResetToken::factory()->create([
        'email' => $email,
    ]);

    Livewire::test(ForgotPassword::class)
        ->set('email', $email)
        ->set('submitted', true)
        ->call('resendEmail')
        ->assertDispatched('flash', 'success', 'Reset email resent.');

    Mail::assertQueued(ForgotPasswordMail::class, function ($mail) use ($email) {
        return $mail->hasTo($email);
    });

    $throttleKey = strtolower($email) . '|password-reset|' . request()->ip();
    expect(RateLimiter::remaining($throttleKey, 3))->toBe(2);
});

it('throws error message if password reset already asked for and not expired with rate limit', function () {
    Mail::fake();
    $email = 'test@example.com';
    User::factory()->create([
        'email' => $email,
    ]);

    PasswordResetToken::factory()->create([
        'email' => $email,
    ]);

    $throttleKey = strtolower($email) . '|password-reset|' . request()->ip();

    Livewire::test(ForgotPassword::class)
        ->set('email', $email)
        ->set('submitted', true)
        ->call('resendEmail')
        ->assertDispatched('flash', 'success', 'Reset email resent.')
        ->call('resendEmail')
        ->assertDispatched('flash', 'success', 'Reset email resent.')
        ->call('resendEmail')
        ->assertDispatched('flash', 'success', 'Reset email resent.')
        ->call('resendEmail')
        ->assertDispatched('flash', 'warning', 'You have tried sending a new mail too many times.');

    Mail::assertQueued(ForgotPasswordMail::class);
    Mail::assertQueuedCount(3);

    expect(RateLimiter::tooManyAttempts($throttleKey, 3))->toBeTrue();
});

it('allows user to access page if reset token valid and not expired', function () {
    $email = 'test@example.com';
    $token = Str::random(64);
    PasswordResetToken::factory()->create([
        'token' => $token,
        'email' => $email,
    ]);

    $this->get(route('reset-password', ['token' => $token]))
        ->assertOk();
});

it('redirects user to home page if reset token expired', function () {
    $email = 'test@example.com';
    $token = Str::random(64);
    PasswordResetToken::factory()->expired()->create([
        'token' => $token,
        'email' => $email,
    ]);

    $this->get(route('reset-password', ['token' => $token]))
        ->assertRedirect()
        ->assertRedirect(route('home'))
        ->assertSessionHas('error', 'Password reset token has expired, ask for a new one.');
});

it('redirects user to home page if reset token doesnt exist', function () {
    $this->get(route('reset-password', ['token' => Str::random(40)]))
        ->assertRedirect()
        ->assertRedirect(route('home'))
        ->assertSessionHas('error', "Password reset token doesn't exist");
});

it('redirects user to home page if reset token doesnt is expired if user waited in livewire page', function () {

    $email = 'test@example.com';
    $token = Str::random(64);
    PasswordResetToken::factory()->expired()->create([
        'token' => $token,
        'email' => $email,
    ]);

    $component = Livewire::test(ResetPassword::class, ['token' => $token]);

    $component
        ->set('email', $email)
        ->set('password', 'password!1')
        ->set('password_confirmation', 'password!1')
        ->call('resetPassword')
        ->assertRedirect(route('home'))
        ->assertSessionHas('error', 'Password reset token has expired, ask for a new one.');
});

it('requires valid password, email and that the given email is the one in the password reset request', function () {

    $email = 'test@example.com';
    $token = Str::random(64);
    PasswordResetToken::factory()->create([
        'token' => $token,
        'email' => $email,
    ]);

    $component = Livewire::test(ResetPassword::class, ['token' => $token]);

    $component
        ->set('email', 'wrong@example.com')
        ->set('password', 'password!1')
        ->set('password_confirmation', 'password!1')
        ->call('resetPassword')
        ->assertHasErrors(['email']);

    $component
        ->set('email', $email)
        ->set('password', '')
        ->set('password_confirmation', 'password!1')
        ->call('resetPassword')
        ->assertHasErrors(['password' => 'required']);

    $component
        ->set('email', $email)
        ->set('password', 'password!1')
        ->set('password_confirmation', '')
        ->call('resetPassword')
        ->assertHasErrors(['password_confirmation' => 'required']);

    $component
        ->set('email', $email)
        ->set('password', 'password!1')
        ->set('password_confirmation', 'differentpassword')
        ->call('resetPassword')
        ->assertHasErrors(['password_confirmation' => 'same']);
});

it('successfully resets password if all data is valid', function () {

    $email = 'test@example.com';
    $token = Str::random(64);

    User::factory()->create([
        'email' => $email,
    ]);

    PasswordResetToken::factory()->create([
        'token' => $token,
        'email' => $email,
    ]);

    Livewire::test(ResetPassword::class, ['token' => $token])
        ->set('email', $email)
        ->set('password', 'password!1')
        ->set('password_confirmation', 'password!1')
        ->call('resetPassword')
        ->assertRedirect(route('login'))
        ->assertSessionHas('success', 'Your password has been reset!');

    $user = User::where('email', $email)->first();
    expect(Hash::check('password!1', $user->password))->toBeTrue();

    $passwordReset = PasswordResetToken::where('email', $email)->first();
    expect($passwordReset)->toBeNull();
});
