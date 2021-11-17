<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Department::create([
            'name' => 'Departament Obsługi Klienta',
            'code' => 'DOK',
            'description' => 'DOK'
        ]);
    }
}
