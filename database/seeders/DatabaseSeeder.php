<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            FileCategorySeeder::class,
            FileSeeder::class,
            ProductSeeder::class,
            LinkSeeder::class,
            RiskSeeder::class,
            FundSeeder::class,
            CommentSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
