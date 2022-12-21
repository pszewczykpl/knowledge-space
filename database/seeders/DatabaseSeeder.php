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
            PermissionSeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            
            // Hide these seeders.

            // FileCategorySeeder::class,
            // FileSeeder::class,
            // EmployeeSeeder::class,
            // InvestmentSeeder::class,
            // ProtectiveSeeder::class,
            // FundSeeder::class,
            // NewsSeeder::class,
            // NoteSeeder::class,
            // PartnerSeeder::class,
            // ReplySeeder::class,
            // RiskSeeder::class,
            // SystemSeeder::class,
            // PostCategorySeeder::class,
            // PostSeeder::class,
            // BancassuranceSeeder::class,
        ]);
    }
}
