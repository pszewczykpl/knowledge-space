<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(100)
            ->hasComments(10)
            ->hasFiles(10)
            ->forUser([
                'first_name' => 'Piotr',
                'last_name' => 'Szewczyk',
                'email' => 'pszewczykpl@gmail.com',
            ])
            ->create();

        Product::factory()
            ->count(100)
            ->withoutSubscription()
            ->hasComments(3)
            ->hasFiles(10)
            ->create();
    }
}
