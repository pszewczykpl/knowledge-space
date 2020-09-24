<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\Risk;
use App\Models\User;

class RiskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Risk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'code' => $faker->regexify('[A-Z0-9][A-Z0-9]'),
            'name' => $faker->name,
            'category' => $faker->randomElement($array = array ('WYPADKOWE', 'CHOROBOWE')),
            'group' => $faker->regexify('[1-5]'),
            'grace_period' => $faker->randomElement($array = array ('6 miesięcy', '3 miesięca', 'n/d')),
            'user_id' => User::all()->random(),
        ];
    }
}
