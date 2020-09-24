<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FileCategory;

class FileCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FileCategory::factory()
            ->times(5)
            ->create();
    }
}
