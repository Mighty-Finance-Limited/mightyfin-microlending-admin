<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'fname' => 'Mighty',
            'lname' => 'Finance',
            'email' => 'admin@mightyfinance.co.zm',
            'password' => bcrypt('@mighty.@2025'),
        ])->assignRole('admin');
    }
}