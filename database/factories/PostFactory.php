<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'category_id' =>\App\Category::pluck('id')->random(),
        'user_id' => \App\User::pluck('id')->random(),
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        //'photo' => $faker->image('public/photo/',640,480, null, false),
    ];
});
