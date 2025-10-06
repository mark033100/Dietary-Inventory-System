<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

test('User can fetch user details when [Authenticated]', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->get('/auth/user');

    $response->assertStatus(200);
});

test('User cannot fetch user details when [Unauthenticated]', function () {

    $response = $this->get('/auth/user');

    $response->assertStatus(401);
});