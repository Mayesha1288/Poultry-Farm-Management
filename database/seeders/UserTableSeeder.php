<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345'),
            'contact'=>'01234568891',
            'role'=>'admin'

        ]);

        User::create([
            'username'=>'Manager',
            'email'=>'manager@gmail.com',
            'password'=>bcrypt('67890'),
            'contact'=>'01234567891',
            'role'=>'manager'

        ]);
    }
}
