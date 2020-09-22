<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 5)->create()->each(function ($user) {
        //     $user->permissions()->attach(App\Permission::all());
        // });
        
        $user = new App\Models\User;
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
        $user->permissions()->attach(App\Models\Permission::all());
        
    }
}
