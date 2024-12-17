<?php

use App\Http\Controllers\MailTester;
use App\Http\Controllers\OauthController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Front\Contact;
use App\Livewire\User\Dashboard;
use App\Services\OauthService;
use App\Services\UsernameService;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');

    Route::get('/email/verify', VerifyEmail::class)->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/dashboard')->with('success', 'Your email has been verified.');
    })->middleware(['signed'])->name('verification.verify');

    Route::view('/welcome', 'front.welcome')->name('welcome');

    Route::get('/settings', function () {})->name('settings');

    Route::middleware('verified')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::get('/quizzes/create', function () {})->name('quizzes.create');

        Route::get('/wikis/create', function () {})->name('wikis.create');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');

    Route::get('/login', Login::class)->name('login');

    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

    Route::get('/reset-password/{token}', ResetPassword::class)
        ->middleware('ensure-password-reset-token-is-valid')
        ->name('reset-password');

    Route::get('/oauth/{provider}/{action}', [OauthController::class, 'redirectToProvider'])->name('redirect.provider');

    Route::get('/callback/{provider}', [OauthController::class, 'handleProviderCallback'])
        ->name('callback.provider');
});


Route::get('/wikis', function () {})->name('wikis');

Route::get('/quizzes', function () {})->name('quizzes');

Route::view('/privacy-policy', 'front.privacy-policy')->name('privacy-policy');

Route::view('/terms-and-conditions', 'front.terms-and-conditions')->name('terms-and-conditions');

Route::get('/become-contributor', function (){})->name('become-contributor');

Route::get('/contact', Contact::class)->name('contact');

if (App::isLocal()) {
    Route::get('/test-forgot-password-mail', [MailTester::class, 'reset_password_email_test']);
    Route::get('/test-welcome-mail', [MailTester::class, 'welcome_email_test']);
    Route::get('/test-verify-mail', [MailTester::class, 'verify_email_test']);
    Route::get('/test-contact-mail', [MailTester::class, 'contact_email_test']);
}
