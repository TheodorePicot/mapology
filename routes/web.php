<?php

use App\Http\Controllers\OauthController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
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

    Route::view('/welcome', 'front.welcome')->name('welcome');

    Route::get('/dashboard', function () {})->name('dashboard');

    Route::get('/settings', function () {})->name('settings');

    Route::get('/quizzes/create', function () {})->name('quizzes.create');

    Route::get('/wikis/create', function () {})->name('wikis.create');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');

    Route::get('/login', Login::class)->name('login');

    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

    Route::get('/reset-password/{token}', ResetPassword::class)
        ->middleware('ensure-password-reset-token-is-valid')
        ->name('reset-password');

    // Social authentication routes
    Route::get('/oauth/{provider}/{action}', [OauthController::class, 'redirectToProvider'])->name('redirect.provider');

    Route::get('/callback/{provider}', [OauthController::class, 'handleProviderCallback'])
        ->name('callback.provider');
});


Route::get('/wikis', function () {})->name('wikis');

Route::get('/quizzes', function () {})->name('quizzes');

Route::get('/privacy-policy', function (){})->name('privacy-policy');

Route::get('/terms-and-conditions', function (){})->name('terms-and-conditions');
