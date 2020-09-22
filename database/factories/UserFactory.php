<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
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
    }
}
