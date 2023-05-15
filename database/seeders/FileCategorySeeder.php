<?php

namespace Database\Seeders;

use App\Models\FileCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ->count(5)
            ->create();
    }
}
