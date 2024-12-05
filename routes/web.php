<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
});

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');

    Route::get('/login', Login::class)->name('login');

    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

    Route::get('/reset-password/{token}', ResetPassword::class)->name('forgot-password');
});


Route::get('/learn', function () {})->name('learn');

Route::get('/quizzes', function () {})->name('quizzes');

Route::get('/privacy-policy', function (){})->name('privacy-policy');

Route::get('/terms-and-conditions', function (){})->name('terms-and-conditions');

