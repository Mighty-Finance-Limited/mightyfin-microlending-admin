<?php

namespace Database\Seeders;

use App\Models\DisbursedBy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisbursedBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisbursedBy::create([
            'name' => 'Cash',
            'description' => 'Cash',
            'tag' => 'cash'
        ]);
        DisbursedBy::create([
            'name' => 'Wire Transfer',
            'description' => 'Wire Transfer',
            'tag' => 'wire transfer'
        ]);
        DisbursedBy::create([
            'name' => 'Cheque',
            'description' => 'Cheque',
            'tag' => 'cheque'
        ]);
        DisbursedBy::create([
            'name' => 'Online Transfer',
            'description' => 'Online Transfer',
            'tag' => 'online transfer'
        ]);
    }
}
