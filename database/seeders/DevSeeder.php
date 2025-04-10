<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'user@gmail.com',
            'phone' => '0772327908',
            'opt_code' => '77777',
            'opt_verified' => 1,
            'password' => bcrypt('mighty4you'),
        ])->assignRole('user');
    }
}