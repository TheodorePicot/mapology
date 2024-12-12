<?php

use App\Livewire\Auth\Login;
use App\Models\User;
use Livewire\Livewire;

it('redirects authenticated user from login page to dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('login'))
        ->assertRedirect(route('dashboard'));
});

it('throws error on invalid credentials', function () {
    Livewire::test(Login::class);
});
