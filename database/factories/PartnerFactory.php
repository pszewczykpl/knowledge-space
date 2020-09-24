<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\Partner;
use App\Models\User;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

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
            'number_rau' => $faker->regexify('[0-9][0-9][0-9][0-9][0-9][0-9]/P'),
            'code' => $faker->regexify('[A-Z][A-Z]'),
            'nip' => $faker->regexify('[0-9][0-9][0-9][0-9][0-9][0-9]'),
            'regon' => $faker->regexify('[0-9][0-9][0-9][0-9][0-9][0-9]'),
            'type' => $faker->randomElement($array = array ('Agent', 'Dystrybutor', 'Broker', 'Multiagencja')),
            'user_id' => User::all()->random(),
        ];
    }
}
