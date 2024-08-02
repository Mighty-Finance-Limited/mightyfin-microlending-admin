<?php

namespace Database\Seeders;

use App\Models\RepaymentCycle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RepaymentCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RepaymentCycle::create([
            'name' => 'Daily',
            'description' => 'Daily',
            'tag' => 'Daily'
        ]);
        RepaymentCycle::create([
            'name' => 'Weekly',
            'description' => 'Weekly',
            'tag' => 'Weekly'
        ]);
        RepaymentCycle::create([
            'name' => 'Biweekly',
            'description' => 'Biweekly',
            'tag' => 'Biweekly'
        ]);
        RepaymentCycle::create([
            'name' => 'Bimonthly',
            'description' => 'Bimonthly',
            'tag' => 'Bimonthly'
        ]);
        RepaymentCycle::create([
            'name' => 'Monthly',
            'description' => 'Monthly',
            'tag' => 'Monthly'
        ]);
        RepaymentCycle::create([
            'name' => 'Quarterly',
            'description' => 'Quarterly',
            'tag' => 'Quarterly'
        ]);
        RepaymentCycle::create([
            'name' => 'Every 4 Months',
            'description' => 'Every 4 Months',
            'tag' => 'Every 4 Months'
        ]);
        RepaymentCycle::create([
            'name' => 'Semi Annual',
            'description' => 'Semi Annual',
            'tag' => 'Semi Annual'
        ]);
        RepaymentCycle::create([
            'name' => 'Quarterly',
            'description' => 'Quarterly',
            'tag' => 'Quarterly'
        ]);
        RepaymentCycle::create([
            'name' => 'Every 9 Months',
            'description' => 'Every 9 Months',
            'tag' => 'Every 9 Months'
        ]);
        RepaymentCycle::create([
            'name' => 'Yearly',
            'description' => 'Yearly',
            'tag' => 'Yearly'
        ]);
        RepaymentCycle::create([
            'name' => 'Lamp-Sum',
            'description' => 'Lamp-Sum',
            'tag' => 'Lamp-Sum'
        ]);
    }
}
