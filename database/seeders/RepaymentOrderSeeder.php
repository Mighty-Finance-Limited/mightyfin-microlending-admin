<?php

namespace Database\Seeders;

use App\Models\RepaymentOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepaymentOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RepaymentOrder::create([
            'name' => 'Principal',
            'description' => 'Principal',
            'tag' => 'Principal'
        ]);
        RepaymentOrder::create([
            'name' => 'Interest',
            'description' => 'Interest',
            'tag' => 'Interest'
        ]);
        RepaymentOrder::create([
            'name' => 'Penalty',
            'description' => 'Penalty',
            'tag' => 'Penalty'
        ]);
        RepaymentOrder::create([
            'name' => 'Defaulted',
            'description' => 'Defaulted',
            'tag' => 'Defaulted'
        ]);
    }
}
