<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Protective;

class ProtectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Protective::factory()
            ->times(30)
            ->hasFiles(17)
            ->hasNotes(12)
            ->create();
    }
}
