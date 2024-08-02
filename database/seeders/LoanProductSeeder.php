<?php

namespace Database\Seeders;

use App\Models\LoanAccountPayment;
use App\Models\LoanDecimalPlace;
use App\Models\LoanDisbursedBy;
use App\Models\LoanInterestMethod;
use App\Models\LoanInterestType;
use App\Models\LoanProduct;
use App\Models\LoanProductInstitution;
use App\Models\LoanRepaymentCycle;
use App\Models\LoanServiceCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lp = LoanProduct::create([
            'name' => 'GRZ',
            'description' => 'Civil servant loan',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/>
                        </svg>',
            'icon_alt' => '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/>
                        </svg>',
            'wiz_steps' => 50,
            'release_date' => 0,
            'auto_payment' => 0,
            'loan_duration_period' => 'month',
            'loan_interest_period' => 'per-month',
            
            'min_principal_amount' => 1000,
            'def_principal_amount' => 5000,
            'max_principal_amount' => 10000,
            
            'min_loan_duration' => 1,
            'def_loan_duration' => 1,
            'max_loan_duration' => 2,
    
            'min_loan_interest' => 15,
            'def_loan_interest' => 30,
            'max_loan_interest' => 40,
    
            'min_num_of_repayments' => 1,
            'def_num_of_repayments' => 1,
            'max_num_of_repayments' => 3,
        ]);

        for ($i=0; $i < 4; $i++) { 
            LoanDisbursedBy::Create([
                'disbursed_by_id' =>$i,
                'loan_product_id' => $lp->id
            ]);
        }

        LoanInterestMethod::Create([
            'interest_method_id' => 1,
            'loan_product_id' => $lp->id
        ]);

        // Interest Types
        LoanInterestType::Create([
            'interest_type_id' => 1,
            'loan_product_id' => $lp->id
        ]);

        // Repayment Cycles ****Loop
        for ($i=0; $i < 2; $i++) { 
            LoanRepaymentCycle::Create([
                'repayment_cycle_id' => $i,
                'loan_product_id' => $lp->id
            ]);
        }

        // Loan Decimal Places
        LoanDecimalPlace::Create([
            'value' => 1,
            'loan_product_id' => $lp->id
        ]);

        // Loan Service Charges ****Loop
        for ($i=0; $i < 2; $i++) { 
            LoanServiceCharge::Create([
                'service_charge_id' => $i,
                'loan_product_id' => $lp->id
            ]);
        }

        // Loan Automated Payments ****Loop
        for ($i=0; $i < 4; $i++) { 
            LoanAccountPayment::Create([
                'account_payment_id' => $i,
                'loan_product_id' => $lp->id
            ]);
        }
        // Institutions
        LoanProductInstitution::Create([
            'institution_id' => 1,
            'loan_product_id' => $lp->id
        ]);
    }
}
