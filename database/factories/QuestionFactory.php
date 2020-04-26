<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    $description = $faker->sentence;
    return [
        'description' => $description,        
        'slug' => Str::of($description)->slug('-'),
        'user_id' => function() {
            return User::all()->random();
        },
        'category_id' => function() {
            return Category::all()->random();
        },
    ];
});
