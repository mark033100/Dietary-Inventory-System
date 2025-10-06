<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('User can login', function () {
    // Arrange: create a user
    $user = User::factory()->create([
        'email' => 'user@example.com',
        'password' => Hash::make('password'),
    ]);

    // Act: attempt login
    $response = $this->postJson('/auth/login', [
        'email' => 'user@example.com',
        'password' => 'password',
    ]);

    // Assert: check response
    $response->assertStatus(200)
        ->assertJsonStructure(['token', 'user', 'message']);
});


test('User cannot login with [EMAIL VALIDATION ERROR]', function () {

    // Act: attempt login
    $response = $this->postJson('/auth/login', [
        'email' => 'not_valid_email',
        'password' => 'password',
    ]);

    // Assert: check response
    $response->assertStatus(422);
});

test('User cannot login with [PASSWORD VALIDATION ERROR]', function () {

    // Act: attempt login
    $response = $this->postJson('/auth/login', [
        'email' => 'user@example.com',
        'password' => 'short',
    ]);

    // Assert: check response
    $response->assertStatus(422);
});

test('User cannot login with INVALID EMAIL', function () {

    // Act: attempt login
    $response = $this->postJson('/auth/login', [
        'email' => 'not_valid_email@example.com',
        'password' => 'password',
    ]);

    // Assert: check response
    $response->assertStatus(401);
});

test('User cannot login with INVALID PASSWORD', function () {

    // Act: attempt login
    $response = $this->postJson('/auth/login', [
        'email' => 'user@example.com',
        'password' => 'not_the_right_password',
    ]);

    // Assert: check response
    $response->assertStatus(401);
});