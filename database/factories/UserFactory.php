<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->e164PhoneNumber,
        'password' => bcrypt('@FJpoywC00!'),
        'company' => 'Open Life TU Życie S.A.',
        'department_id' => 1,
        'position' => $faker->jobTitle,
        'description' => $faker->catchPhrase,
        'location' => $faker->country,
        'avatar_filename' => '0.png',
    ];
});
