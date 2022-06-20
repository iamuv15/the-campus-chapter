<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
      'user_id' => rand(6,50),
      'post_message' => $faker->text(200)
    ];
});
