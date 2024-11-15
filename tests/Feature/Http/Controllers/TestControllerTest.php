<?php

use App\Http\Controllers\TestController;
use App\Models\User;

covers(TestController::class);

test('list users', function () {
    User::factory()->create();

    $result = (new TestController)->index();

    expect($result)->toBeArray();
});

test('list users per get', function () {
    User::factory()->create();

    (new TestController)->index();

    $this->getJson('/users')->assertStatus(200);
});


test('list users per get with username', function () {
    User::factory()->create([
        'name' => 'testuser',
    ]);

    (new TestController)->index();

    $this->getJson('/users')
        ->assertStatus(200)
        ->assertJson([
            ['name' => 'testuser'],
        ]);
});
