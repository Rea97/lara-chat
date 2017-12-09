<?php

use Faker\Generator as Faker;

$factory->define(\App\Message::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::first() ?? factory(\App\User::class)->create()->id,
        'content' => $faker->text
    ];
});
