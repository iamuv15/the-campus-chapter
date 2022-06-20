<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'comment' => $faker->text(30)
         // Any other Fields in your Comments Model
    ];
});
