<?php

namespace Database\Seeders;

use App\Models\InterestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InterestType::create([
            'name' => 'Percentage',
            'description' => 'I want interest rate to be percentage % based',
            'tag' => 'percentage rate'
        ]);
        InterestType::create([
            'name' => 'Fixed',
            'description' => 'I want interest be a fixed amount Per Cycle',
            'tag' => 'fixed rate'
        ]);
    }
}
