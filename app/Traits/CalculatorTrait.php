<?php

namespace App\Traits;

use App\Models\LoanInstallment;
use App\Models\LoanProduct;
use App\Models\UserFile;
use Carbon\Carbon;
use Illuminate\Support\File;
use MathPHP\Finance;

trait CalculatorTrait
{

    public function calculateAmortizationSchedule($loanAmount, $loanTermYears, $loanProductId)
    {

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

    function flatRateAmortization($principal, $termMonths, $info)
    {
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
    public function get_LoanProductDetails($id)
    {
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


    //New Updates ....


    //Returns table
    public function calculateAmortizationScheduleTotalRepayment($loan)
    {

        try {
            $info = $this->get_LoanProductDetails($loan->loan_product_id);

            // dd($info->interest_methods->first()->interest_method->name);
            switch ($info->interest_methods?->first()->interest_method->name) {

                case 'Flat Rate':
                    return $this->flatRate($loan->amount, $loan->repayment_plan, $info, $loan);
                    break;

                case 'Reducing Balance - Equal Principal':
                    // return $this->calculateReducingBalanceEqualPrincipal($loan->amount, $loan->repayment_plan, $loan);
                    break;

                case 'Reducing Balance - Equal Installments':
                    return $this->calculateReducingBalanceEqualInstallment($loan->amount, $loan->repayment_plan, $info, $loan);
                    break;

                case 'Interest-Only':
                    return $this->calculateInterestOnly($loan->amount, $loan->repayment_plan, $loan);
                    break;

                case 'Compound Interest':
                    return $this->calculateInterestOnly($loan->amount, $loan->repayment_plan, $loan);
                    break;
                default:
                    // return $this->calculateReducingBalanceEqualInstallmentSchedule($loan->amount, $loan->repayment_plan, $loan);
                    break;
            }
        } catch (\Throwable $th) {
            // return $th->getMessage();
        }
    }


    //Returns table
    public function calculateAmortizationScheduleTable($loan = null)
    {
        try {
            $info = $this->get_LoanProductDetails($loan->loan_product_id);

            // dd($info->interest_methods->first()->interest_method->name);
            switch ($info->interest_methods?->first()->interest_method->name) {

                case 'Flat Rate':
                    return $this->flatRate($loan->amount, $loan->repayment_plan, $info, $loan);
                    break;

                case 'Reducing Balance - Equal Principal':
                    // return $this->calculateReducingBalanceEqualPrincipal($loan->amount, $loan->repayment_plan, $loan);
                    break;

                case 'Reducing Balance - Equal Installments':
                    return $this->calculateReducingBalanceEqualInstallmentSchedule($loan->amount, $loan->repayment_plan, $info, $loan);
                    break;

                case 'Interest-Only':
                    return $this->calculateInterestOnly($loan->amount, $loan->repayment_plan, $loan);
                    break;

                case 'Compound Interest':
                    return $this->calculateInterestOnly($loan->amount, $loan->repayment_plan, $loan);
                    break;
                default:
                    return $this->calculateReducingBalanceEqualInstallmentSchedule($loan->amount, $loan->repayment_plan, $info, $loan);
                    break;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    //Write the correct formula for flatRate
    public function flatRate($principal, $termMonths, $product, $loan = null)
    {
        try {
            // Convert annual interest rate to a decimal monthly rate
            $monthlyInterestRate = ($product->def_loan_interest / 100);

            // Calculate monthly payment
            $monthlyPayment = Finance::pmt(
                $monthlyInterestRate,
                $termMonths,
                -$principal,
                0,
                false
            );

            // Calculate totals
            $totalRepayment = $monthlyPayment * $termMonths;
            $totalInterest = $totalRepayment - $principal;

            // Generate and save installment schedule
            $balance = $principal;
            $schedule = [];
            $currentDate = now();

            // First delete any existing installments for this loan
            LoanInstallment::where('loan_id', $loan->id)?->delete();

            for ($i = 1; $i <= $termMonths; $i++) {
                $interest = $balance * $monthlyInterestRate;
                $principalPayment = $monthlyPayment - $interest;
                $balance -= $principalPayment;

                // Adjust final payment for rounding
                if ($i == $termMonths) {
                    $principalPayment += $balance;
                    $balance = 0;
                }

                // Calculate due date (monthly)
                $dueDate = (new Carbon($currentDate))->addMonths($i);

                // Create installment record
                $installment = LoanInstallment::create([
                    'loan_id' => $loan->id,
                    'application_id' => $loan->application_id,
                    'due_date' => $dueDate,
                    'amount' => round($monthlyPayment, 2),
                    'principal' => round($principalPayment, 2),
                    'interest' => round($interest, 2),
                    'remaining_balance' => round(max($balance, 0), 2),
                    'type' => 'auto',
                    'status' => 'Pending'
                ]);

                $schedule[] = $installment;
            }

            return [
                'principal' => round($principal, 2),
                'total_interest' => round($totalInterest, 2),
                'total_repayment' => round($totalRepayment, 2),
                'monthly_payment' => round($monthlyPayment, 2),
                'interest_rate' => $product->def_loan_interest,
                'term' => $termMonths,
                'schedule' => $schedule
            ];
        } catch (\Throwable $th) {
            dd('Error here ' . $th);
            // return [
            //     'error' => true,
            //     'message' => 'Calculation failed: ' . $th->getMessage(),
            //     'trace' => $th->getTraceAsString()
            // ];
        }
    }


    public function calculateReducingBalanceEqualPrincipal($principal, $termMonths, $info, $loan = null)
    {
        try {
            // Determine the annual interest rate based on loan-specific interest or a default
            $annualInterestRate = $loan && $loan->interest ? $loan->interest / 100 : $info->def_loan_interest / 100;
            $monthlyInterestRate = $annualInterestRate / 12;

            // Initialize amortization schedule array
            $schedule = [];

            // Calculate the fixed principal repayment amount per month
            $principal_payment = $principal / $termMonths;

            // Initialize loan balance
            $loan_balance = $principal;

            // Loop through each installment to calculate details
            for ($i = 0; $i < $termMonths; $i++) {
                // Calculate interest for the current installment based on the remaining balance
                $interest = $loan_balance * $monthlyInterestRate;

                // Calculate total payment for the current month (principal + interest)
                $monthlyPayment = $principal_payment + $interest;

                // Update the remaining balance
                $loan_balance -= $principal_payment;

                // Add current installment's data to the schedule
                $schedule[] = [
                    'month' => $i + 1,
                    'payment' => $monthlyPayment,
                    'principal' => number_format($principal_payment, 2),
                    'interest' => number_format($interest, 2),
                    'balance' => number_format(max($loan_balance, 0), 2), // Ensure non-negative balance
                ];
            }

            // Return the amortization schedule
            return $schedule;
        } catch (\Throwable $th) {
            // Handle exceptions
            dd($th);
        }
    }


    public function calculateReducingBalanceEqualInstallmentSchedule($principal, $termMonths, $product, $loan)
    {
        try {
            // Convert annual interest rate to a decimal monthly rate
            $monthlyInterestRate = ($product->def_loan_interest / 100);

            // Calculate monthly payment
            $monthlyPayment = Finance::pmt(
                $monthlyInterestRate,
                $termMonths,
                -$principal,
                0,
                false
            );

            // Calculate totals
            $totalRepayment = $monthlyPayment * $termMonths;
            $totalInterest = $totalRepayment - $principal;

            // Generate and save installment schedule
            $balance = $principal;
            $schedule = [];
            $currentDate = now();

            // First delete any existing installments for this loan
            LoanInstallment::where('loan_id', $loan->id)->delete();

            for ($i = 1; $i <= $termMonths; $i++) {
                $interest = $balance * $monthlyInterestRate;
                $principalPayment = $monthlyPayment - $interest;
                $balance -= $principalPayment;

                // Adjust final payment for rounding
                if ($i == $termMonths) {
                    $principalPayment += $balance;
                    $balance = 0;
                }

                // Calculate due date (monthly)
                $dueDate = (new Carbon($currentDate))->addMonths($i);

                // Create installment record
                $installment = LoanInstallment::create([
                    'loan_id' => $loan->id,
                    'due_date' => $dueDate,
                    'amount' => round($monthlyPayment, 2),
                    'principal' => round($principalPayment, 2),
                    'interest' => round($interest, 2),
                    'remaining_balance' => round(max($balance, 0), 2),
                    'type' => 'auto',
                    'status' => 'Pending'
                ]);

                $schedule[] = $installment;
            }

            return [
                'principal' => round($principal, 2),
                'total_interest' => round($totalInterest, 2),
                'total_repayment' => round($totalRepayment, 2),
                'monthly_payment' => round($monthlyPayment, 2),
                'interest_rate' => $product->def_loan_interest,
                'term' => $termMonths,
                'schedule' => $schedule
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'message' => 'Calculation failed: ' . $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ];
        }
    }



    public function calculateReducingBalanceEqualInstallment($principal, $termMonths, $product)
    {
        try {
            // Convert annual interest rate to a decimal monthly rate
            $monthlyInterestRate = ($product->def_loan_interest / 100);

            // dd($monthlyInterestRate);
            // Use the PMT function from math-php
            $monthlyPayment = Finance::pmt(round($monthlyInterestRate, 2), $termMonths, -$principal, 0, false);

            // dd($monthlyPayment);
            // Calculate total repayment and total interest
            $totalRepayment = $monthlyPayment * $termMonths;
            $totalInterest = $totalRepayment - $principal;

            return [
                'principal' => round($principal, 2),
                'total_interest' => round($totalInterest, 2),
                'total_repayment' => round($totalRepayment, 2),
                'monthly_payment' => round($monthlyPayment, 2),
                'interest_rate' => $product->def_loan_interest,
                'term' => $termMonths
            ];
        } catch (\Throwable $th) {
            return [
                'error' => true,
                'message' => 'Calculation failed: ' . $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ];
        }
    }
}