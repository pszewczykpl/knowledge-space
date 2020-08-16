<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Reply;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'user_id' => factory(App\User::class),
        'news_id' => App\News::find($faker->randomDigitNotNull)->id,
    ];
});
