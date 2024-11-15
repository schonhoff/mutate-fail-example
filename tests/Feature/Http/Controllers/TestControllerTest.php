<?php

use App\Http\Controllers\TestController;
use App\Models\User;

covers(TestController::class);

test('list users', function () {
    User::factory()->create();

    $result = (new TestController)->index();

    expect($result)->toBeArray();
});
