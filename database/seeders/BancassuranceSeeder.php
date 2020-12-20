<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bancassurance;

class BancassuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bancassurance::factory()
            ->times(30)
            ->hasFiles(17)
            ->hasNotes(12)
            ->create();
    }
}
