<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fund;
use App\Models\Investment;

class FundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fund::factory()
            ->times(10)
            ->hasNotes(12)
            ->create();
    }
}
