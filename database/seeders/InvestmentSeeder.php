<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Investment;
use App\Models\Fund;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Investment::factory()
            ->times(30)
            ->hasFiles(21)
            ->hasNotes(12)
            ->has(Fund::factory()->count(30))
            ->create();
    }
}
