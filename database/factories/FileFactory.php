<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

use App\Models\File;
use App\Models\FileCategory;
use App\Models\User;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'path' => 'files/deleted.pdf',
            'name' => $faker->name,
            'extension' => $faker->randomElement($array = array ('pdf', 'docx', 'xlsx', 'pptx')),
            'file_category_id' => FileCategory::all()->random(),
            'user_id' => User::all()->random(),
        ];
    }
}
