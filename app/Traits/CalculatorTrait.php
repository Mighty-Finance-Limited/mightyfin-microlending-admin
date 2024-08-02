<?php

namespace App\Traits;

use App\Models\LoanProduct;
use App\Models\UserFile;
use Illuminate\Support\File;
trait CalculatorTrait{

    public function calculateAmortizationSchedule($loanAmount, $loanTermYears, $loanProductId) {
        
        try {
            $info = $this->get_LoanProductDetails($loanProductId);

            switch ($info->interest_methods->first()->interest_method->name) {
                case 'Flat Rate':
                    return $this->flatRateAmortization($loanAmount, $loanTermYears, $info);
                    break;
                
                default:
                    # code...
                    break;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    function flatRateAmortization($principal, $termMonths, $info) {
            $schedule = [];
            $monthlyInterestRate = $info->def_loan_interest / 100 / 12;
            $monthlyPayment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$termMonths));
        
            $remainingBalance = $principal;
        
            for ($i = 0; $i < $termMonths; $i++) {
                $interest = $remainingBalance * $monthlyInterestRate;
                $principalPayment = $monthlyPayment - $interest;
                $remainingBalance -= $principalPayment;
        
                $schedule[] = [
                    'month' => $i + 1,
                    'payment' => $monthlyPayment,
                    'principal' => $principalPayment,
                    'interest' => $interest,
                    'balance' => $remainingBalance
                ];
            }
            return $schedule;
    }


    // Getters
    public function get_LoanProductDetails($id){
        return LoanProduct::where('id', $id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method', 
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places',
            'service_fees.service_charge',
            'loan_institutes.institutions'
        ])->first();
    }
}