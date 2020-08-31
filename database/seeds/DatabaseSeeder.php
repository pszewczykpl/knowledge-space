<?php

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
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            // NewsTableSeeder::class,
            // RepliesTableSeeder::class,
        ]);
    }
}
