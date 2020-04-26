<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return User::all()->random();
        },
        'question_id' => function() {
            return Question::all()->random();
        },
        'description' => $faker->text,
    ];
});
