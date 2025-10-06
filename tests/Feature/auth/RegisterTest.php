<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('User can register', function () {


    $response = $this->postJson('/auth/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(200);
});

test('User cannot register with [EMAIL VALIDATION ERROR]', function () {


    $response = $this->postJson('/auth/register', [
        'name' => 'Test User',
        'email' => 'wrong-email',
        'password' => 'password',
    ]);

    $response->assertStatus(422);
});

test('User cannot register with [PASSWORD VALIDATION ERROR]', function () {


    $response = $this->postJson('/auth/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'short',
    ]);

    $response->assertStatus(422);
});