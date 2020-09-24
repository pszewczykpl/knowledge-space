<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\Investment;
use App\Models\User;

class InvestmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Investment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'group' => $faker->regexify('[A-Z][A-Z][0-9][0-9]'),
            'name' => $faker->name,
            'code' => $faker->numberBetween($min = 1000, $max = 9000),
            'dist_short' => $faker->regexify('[A-Z][A-Z]'),
            'dist' => $faker->name,
            'code_owu' => $faker->regexify('[A-Z][A-Z][A-Z]_[A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9]'),
            'code_toil' => $faker->regexify('T/II/[A-Z][A-Z]/[A-Z][A-Z][0-9][0-9][0-9]/00[1-9]'),
            'edit_date' => $faker->dateTimeThisCentury($max = 'now', $timezone = null),
            'type' => $faker->randomElement($array = array ('Inwestycyjny', 'Grupowy')),
            'status' => $faker->randomElement($array = array ('A', 'N')),
            'user_id' => User::all()->random(),
        ];
    }
}
