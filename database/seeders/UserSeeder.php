<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Department;
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
        /**
         * Create admin account first.
         */
        $user = User::create([
            'first_name' => 'Piotr',
            'last_name' => 'Szewczyk',
            'username' => 'admin',
            'email' => 'admin@admin.pl',
            'phone' => '+48123456789',
            'password' => bcrypt('admin'),
            'department_id' => Department::all()->random()->id,
            'position' => 'PHP Developer',
            'company' => 'Tu może znaleźć się Twoja firma ;-)',
            'location' => 'Warszawa',
            'description' => 'Tworzenie oprogramowania opartego o nowoczesne rozwiazania takie jak Laravel, Symphony czy Vue.js',
        ]);
        $user->permissions()->attach(Permission::all());

        /**
         * Create another standard users.
         */
        User::factory()
        ->times(8)
        ->create();
    }
}
