<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\User;
use App\Models\Department;

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
        $faker = Faker::create('pl_PL');

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'username' => $faker->unique()->userName,
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->unique()->e164PhoneNumber,
            'password' => bcrypt('admin'),
            'company' => $faker->company,
            'department_id' => Department::all()->random(),
            'position' => $faker->jobTitle,
            'description' => 'dscript',
            'location' => $faker->city,
        ];
    }
}
