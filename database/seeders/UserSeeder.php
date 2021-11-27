<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'password' => bcrypt('admin1234')
        ]);
        $admin->assignRole('admin');

        $admin = User::create([
            'username' => 'superadmin',
            'password' => bcrypt('admin1234')
        ]);
        $admin->assignRole('superadmin');

    }
}
