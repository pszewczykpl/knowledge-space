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
        $user = new Department;
        $user->code = 'DOK';
        $user->name = 'Departamet Obsługi Klienta';
        $user->description = 'DOK jest departemntem odpowiedzialnym za obsługę klienta oraz jest właścicielem takich systemów jak Rejestrator, Pivotal, InIn, Pentalife i inne...';
        $user->save();
    }
}
