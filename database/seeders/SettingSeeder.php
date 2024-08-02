<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemSetting::create([
            'name' => 'loan-approval',
            'code' => null,
            'value' => 'spooling',
            'type' => 'spooling',
            'status' => 1,
            'active' => 1,
            'count' => 1
        ]);
    }
}
