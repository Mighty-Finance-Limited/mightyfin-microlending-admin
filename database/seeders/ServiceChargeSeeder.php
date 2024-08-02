<?php

namespace Database\Seeders;

use App\Models\ServiceCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCharge::create([
            'name' => 'Service Charge',
            'value' => 3.50,
            'description' => 'Document processing and service fee',
            'tag' => 'service fee',
            'status' => 1
        ]);
    }
}
