<?php

namespace Database\Seeders;

use App\Models\AccountPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        AccountPayment::create([
            'bank_name' => 'Cash',
            'branch_name' => '',
            'type' => 'cash',
            'account_number' => '123123123123123',
            'account_name' => 'Cash',
            'description' => 'Cash',
            'status' => 1
        ]);

        AccountPayment::create([
            'bank_name' => 'ZANACO (Zambia National Commercial Bank)',
            'branch_name' => '',
            'type' => 'bank',
            'account_number' => '123123123123123',
            'account_name' => 'Mighty Finance Limited',
            'description' => 'ZANACO (Zambia National Commercial Bank)',
            'status' => 1
        ]);

        AccountPayment::create([
            'bank_name' => 'Stanbic Bank Zambia',
            'branch_name' => '',
            'type' => 'bank',
            'account_number' => '123123123123123',
            'account_name' => 'Mighty Finance Limited',
            'description' => 'Stanbic Bank Zambia',
            'status' => 1
        ]);

        AccountPayment::create([
            'bank_name' => 'Petty Cash',
            'branch_name' => '',
            'type' => 'petty cash',
            'account_number' => '123123123123123',
            'account_name' => 'Mighty Finance Limited',
            'description' => 'Petty Cash',
            'status' => 1
        ]);
    }
}
