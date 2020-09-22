<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // PermissionSeeder::class,
            // DepartmentSeeder::class,
            // UserSeeder::class,
            NoteSeeder::class,
            // NewsTableSeeder::class,
            // RepliesTableSeeder::class,
        ]);
    }
}
