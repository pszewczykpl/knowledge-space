<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->first_name = 'Piotr';
        $user->last_name = 'Szewczyk';
        $user->username = 'pszewczyk';
        $user->email = 'piotr.szewczyk@openlife.pl';
        $user->phone = '+48 723 315 543';
        $user->password = bcrypt('openlife8!@#');
        $user->company = 'Open Life TU Życie S.A.';
        $user->department_id = 1;
        $user->position = 'Tester Oprogramowania';
        $user->description = 'Wdrażanie oprogramowania w zakresie systemów: Rejestrator, Pent@life, Pivotal CRM oraz Baza Wiedzy.';
        $user->location = 'Warszawa';
        $user->avatar_filename = '1.jpg';
        $user->save();
        $user->permissions()->attach(Permission::all());
        
    }
}
