<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Processing
        Status::create([
            'name' => 'Verification',
            'stage' => 'processing'
        ]);
        Status::create([
            'name' => 'Approval',
            'stage' => 'processing'
        ]);
        Status::create([
            'name' => 'Disbursements',
            'stage' => 'processing'
        ]);


        // Open
        Status::create([
            'name' => 'Current Loan',
            'stage' => 'open'
        ]);
        Status::create([
            'name' => 'Current Due Today',
            'stage' => 'open'
        ]);
        Status::create([
            'name' => 'Missed Areas',
            'stage' => 'open'
        ]);
        Status::create([
            'name' => 'Past Maturity Date',
            'stage' => 'open'
        ]);


        // Defaulted
        Status::create([
            'name' => 'Credit Counseling',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Collection Agency',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Sequestrate',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Debt Review',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Fraud',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Investigation',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Legal',
            'stage' => 'defaulted'
        ]);
        Status::create([
            'name' => 'Write-Off',
            'stage' => 'defaulted'
        ]);


        // Denied
        Status::create([
            'name' => 'Incomplete KYC',
            'stage' => 'denied'
        ]);
        Status::create([
            'name' => 'Incomplete CRB',
            'stage' => 'denied'
        ]);
        Status::create([
            'name' => 'Bad Credit Score',
            'stage' => 'denied'
        ]);
        Status::create([
            'name' => 'Financial Risk',
            'stage' => 'denied'
        ]);
        Status::create([
            'name' => 'Fraud',
            'stage' => 'denied'
        ]);


        // Denied
        Status::create([
            'name' => 'Administration Fault',
            'stage' => 'Not Taken Up'
        ]);
        Status::create([
            'name' => 'User Fault',
            'stage' => 'Not Taken Up'
        ]);
        Status::create([
            'name' => 'Under Maintenance',
            'stage' => 'Not Taken Up'
        ]);
    }
}
