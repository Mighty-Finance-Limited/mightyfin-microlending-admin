<?php

namespace Database\Seeders;

use App\Models\LoanRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanRate::create([
            'value' => '20',
            'for' => 'Education',
            'type' => 'percentage',
        ]);
        LoanRate::create([
            'value' => '20',
            'for' => 'Personal',
            'type' => 'percentage',
        ]);
        LoanRate::create([
            'value' => '20',
            'for' => 'Home Improvement',
            'type' => 'percentage',
        ]);
        LoanRate::create([
            'value' => '20',
            'for' => 'SMEs',
            'type' => 'percentage',
        ]);
        LoanRate::create([
            'value' => '20',
            'for' => 'Women In Business',
            'type' => 'percentage',
        ]);
        LoanRate::create([
            'value' => '20',
            'for' => 'Asset Finance',
            'type' => 'percentage',
        ]);
        LoanRate::create([
            'value' => '20',
            'for' => 'Vehicle',
            'type' => 'percentage',
        ]);
    }
}
