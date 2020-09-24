<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\Employee;
use App\Models\User;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'name' => $faker->name,
            'code_owu' => $faker->regexify('[A-Z][A-Z][A-Z]_[A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9]'),
            'edit_date' => $faker->dateTimeThisCentury($max = 'now', $timezone = null),
            'status' => $faker->randomElement($array = array ('A', 'N')),
            'user_id' => User::all()->random(),
        ];
    }
}
