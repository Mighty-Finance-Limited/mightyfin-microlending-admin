<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\LoanStatus;
use App\Models\ServiceCharge;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'fname' => 'Kenobi',
            'lname' => 'Wobby',
            'email' => 'georgemunganga@gmail.com',
            'phone' => '0772147755',
            'password' => bcrypt('mighty4you'),
        ])->assignRole('user');

        $app = Application::create([
            'lname' => 'Ken',
            'fname' => 'Mobby',
            'email' => 'georgemunganga@gmail.com',
            'phone' => '0771235431',
            'gender' => 'male',
            'type' => 'ABX Loan',
            'repayment_plan' => 1,
            'amount' => 5000,
            'status' => 2,
            'user_id' => $user->id,
            'can_change' => 1,
            'complete' => 1,
            'nationality' => 'zambian',
            'continue' => 0,
            'is_assigned' => 0,
            'loan_product_id' => 1
        ]);

        ApplicationStage::create([
            'application_id' => $app->id,
            'loan_status_id' => 1,
            'state' => 'current',
            'status' => 'verification',
            'stage' => 'processing',
            'prev_status' => 'current',
            'curr_status' => '',
            'position'=>1
        ]);
    }
}


