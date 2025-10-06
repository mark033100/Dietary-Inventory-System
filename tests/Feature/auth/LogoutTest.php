<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);


test('User CAN Logout when [Authenticated]', function () {
    // Create a user and authenticate

    // $this->actingAs(User::factory()->create());

    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->postJson('/auth/logout');

    $response->assertStatus(200);
});


test('User CANNOT Logout when [Unauthenticated]', function () {
    // Create a user and authenticate

    $response = $this->postJson('/auth/logout');

    $response->assertStatus(401);
});
