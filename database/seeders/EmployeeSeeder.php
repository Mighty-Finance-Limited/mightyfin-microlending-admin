<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Karen',
            'lname' => 'Doe',
            'phone' => '068770022',
            'email' => 'employee@mfs.com',
            'password' => bcrypt('mighty.@123'),
        ])->assignRole('loan officer');

        User::create([
            'fname' => 'Dan',
            'lname' => 'Maxwell',
            'phone' => '077000022',
            'email' => 'employee2@mfs.com',
            'password' => bcrypt('mighty.@123'),
        ])->assignRole('operations manager');
    }
}
