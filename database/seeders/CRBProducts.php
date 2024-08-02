<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CrbProduct;

class CRBProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CrbProduct::create([
            'name' => 'Consumer Loans',
            'description' => 'Personal loans, GRZ & Private institutional salary advances.',
            'code' => '104',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'SME Loans',
            'description' => 'Business Loans.',
            'code' => '152',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Ticket Loans',
            'description' => 'Small ticket loans.',
            'code' => '124',
            'tag' => 'crb'
        ]);
        CrbProduct::create([
            'name' => 'Consumer Loans (credit score)',
            'description' => 'Comes with a credit score cost.',
            'code' => '109',
            'tag' => 'crb'
        ]);
    }
}
