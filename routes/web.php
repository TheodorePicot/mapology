<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', function () {
})->name('register');

Route::get('/login', function () {
})->name('login');
