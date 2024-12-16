<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('diplays username in dropdown when authenticated', function () {

    $user = User::factory()->create([
        'username' => 'frédéric-chopin',
        'email' => 'frederic.chopin@example.com'
    ]);

    actingAs($user);

    $response = get(route('home'));

    $response->assertSee('frédéric-chopin');
    $response->assertSee('frederic.chopin@example.com');
});

it('diplays login / register buttons when not authenticated', function () {
    get(route('home'))->assertSee('register')->assertSee('login');
});
