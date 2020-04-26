<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Like;
use App\Models\Reply;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'reply_id' => function() {
            return Reply::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        },
    ];
});
