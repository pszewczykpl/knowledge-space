<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\Department;
        $user->code = 'DOK';
        $user->name = 'Departamet Obsługi Klienta';
        $user->description = 'DOK jest departemntem odpowiedzialnym za obsługę klienta oraz jest właścicielem takich systemów jak Rejestrator, Pivotal, InIn, Pentalife i inne...';
        $user->save();
    }
}
