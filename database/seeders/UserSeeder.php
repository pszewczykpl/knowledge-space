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
        $user = User::create([
            'first_name' => 'Piotr',
            'last_name' => 'Szewczyk',
            'username' => 'admin',
            'email' => 'admin@admin.pl',
            'phone' => '+481234567893',
            'password' => bcrypt('admin'),
            'department_id' => Department::all()->random()->id,
            'position' => 'PHP Developer',
            'description' => 'Tworzenie oprogramowania opartego o nowoczesne rozwiazania w języki PHP takie jak Laravel, Symphony czy Vue.js',
        ]);
        $user->permissions()->attach(Permission::all());
        
        User::factory()
            ->times(23)
            ->create();
    }
}
