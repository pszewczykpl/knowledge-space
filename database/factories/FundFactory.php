<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\Fund;
use App\Models\User;

class FundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fund::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'code' => $faker->regexify('[A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9]'),
            'name' => $faker->name,
            'status' => $faker->randomElement($array = array ('A', 'N')),
            'type' => $faker->randomElement($array = array ('Z', 'D')),
            'currency' => $faker->currencyCode,
            'start_date' => $faker->dateTimeThisCentury($max = 'now', $timezone = null),
            'user_id' => User::all()->random(),
        ];
    }
}
