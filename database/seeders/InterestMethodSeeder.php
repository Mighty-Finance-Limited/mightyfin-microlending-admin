<?php

namespace Database\Seeders;

use App\Models\InterestMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InterestMethod::create([
            'name' => 'Flat Rate',
            'description' => 'Flat Rate',
            'tag' => 'Flat Rate'
        ]);
        InterestMethod::create([
            'name' => 'Reducing Balance - Equal Installments',
            'description' => 'Reducing Balance - Equal Installments',
            'tag' => 'Reducing Balance - Equal Installments'
        ]);
        InterestMethod::create([
            'name' => 'Reducing Balance - Equal Principal',
            'description' => 'Reducing Balance - Equal Principal',
            'tag' => 'Reducing Balance - Equal Principal'
        ]);
        InterestMethod::create([
            'name' => 'Interest-Only',
            'description' => 'Interest-Only',
            'tag' => 'Interest-Only'
        ]);
        InterestMethod::create([
            'name' => 'Compound Interest',
            'description' => 'Compound Interest',
            'tag' => 'Compound Interest'
        ]);
    }
}
