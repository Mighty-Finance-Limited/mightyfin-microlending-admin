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
        User::create([
            'fname' => 'Dev',
            'lname' => 'Mode',
            'email' => 'dev@gmail.com',
            'phone' => '0772327900',
            'opt_code' => '77777',
            'opt_verified' => 1,
            'password' => bcrypt('mighty4you'),
        ])->assignRole('admin');
    }
}