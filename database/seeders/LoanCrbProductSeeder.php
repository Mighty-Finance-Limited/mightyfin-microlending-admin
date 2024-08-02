<?php

namespace Database\Seeders;

use App\Models\LoanCrbProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanCrbProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanCrbProduct::Create([
            'crb_product_id' => 1,
            'loan_product_id' => 1
        ]);
        LoanCrbProduct::Create([
            'crb_product_id' => 4,
            'loan_product_id' => 1
        ]);
    }
}
