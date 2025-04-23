<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Models\InterestMethod;
use App\Models\InterestType;
use App\Models\DisbursedBy;
use App\Models\RepaymentCycle;
use App\Models\RepaymentOrder;
use App\Models\AccountPayment;
use App\Models\ServiceCharge;
use App\Models\Institution;
use App\Models\CrbProduct;
use MathPHP\Finance;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoanCalculator extends Component
{
    use LoanTrait, AuthorizesRequests;

    public $principal;
    public $release_date;
    public $loan_interest_method = 'Flat Rate';
    public $loan_interest_type = 1;
    public $loan_interest_value;
    public $loan_interest_period;
    public $loan_duration_period;
    public $minimum_num_of_repayments = 1;
    public $loan_duration_value = 1;
    public $loan_repayment_cycle = 'Daily';
    public $amortization_table;
    public $total_repayment_amount;
    public $loan_product_id;
    // Declare public properties for the models
    public $interest_methods;
    public $interest_types;
    public $repayment_cycles;
    public $lp;

    public function render()
    {
        // $this->authorize('view calculator');
        $this->interest_methods = InterestMethod::get();
        $this->interest_types = InterestType::get();
        $this->repayment_cycles = RepaymentCycle::get();
        return view('livewire.dashboard.loans.loan-calculator')->layout('layouts.admin');
    }

    public function prefillLoanProductValues(){
        $this->lp = $this->get_loan_product($this->loan_product_id);
        $this->loan_interest_value =$this->lp->def_loan_interest / 100;
        $this->principal = $this->lp->def_loan_amount ?? 0;
    }
    // Method to increase the loan interest value
    public function increaseDurationValue()
    {
        $this->loan_duration_value++;
        $this->increaseRepayments();
        $this->convertTime();

    }
    // Method to decrease the loan interest value
    public function decreaseDurationValue()
    {
        // Check if the value is greater than 0 before decrementing
        if ($this->loan_duration_value > 0) {
            $this->loan_duration_value--;
            $this->decreaseRepayments();
            $this->convertTime();
        }
    }

    // Method to increase the minimum number of repayments
    public function increaseRepayments()
    {
        $this->minimum_num_of_repayments++;
    }

    // Method to decrease the minimum number of repayments
    public function decreaseRepayments()
    {
        // Check if the value is greater than 0 before decrementing
        if ($this->minimum_num_of_repayments > 0) {
            $this->minimum_num_of_repayments--;
        }
    }

    public function updateLoanDurationPeriod()
    {
        $this->convertTime();
    }

    public function convertTime(){
        // Determine the loan duration period
        switch ($this->loan_duration_period) {
            case 'day':
                // Handle loan duration specified in days
                switch ($this->loan_repayment_cycle) {
                    case 'Daily':
                        // Minimum number of repayments equals the loan duration value (days)
                        $this->minimum_num_of_repayments = $this->loan_duration_value;
                        break;
                    case 'Weekly':
                        // Convert days to weeks for weekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / 7;
                        break;
                    case 'Biweekly':
                        // Convert days to biweeks for biweekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / 14;
                        break;
                    case 'Bimonthly':
                        // Convert days to bimonths for bimonthly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / (30 * 2);
                        break;
                    case 'Quarterly':
                        // Convert days to quarters for quarterly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / (30 * 3);
                        break;
                    default:
                        // Handle default case
                        break;
                }
                break;
            case 'week':
                // Handle loan duration specified in weeks
                switch ($this->loan_repayment_cycle) {
                    case 'Daily':
                        // Convert weeks to days for daily repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 7;
                        break;
                    case 'Weekly':
                        // Minimum number of repayments equals the loan duration value (weeks)
                        $this->minimum_num_of_repayments = $this->loan_duration_value;
                        break;
                    case 'Biweekly':
                        // Convert weeks to biweeks for biweekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / 2;
                        break;
                    case 'Bimonthly':
                        // Convert weeks to bimonths for bimonthly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / (4 * 2);
                        break;
                    case 'Quarterly':
                        // Convert weeks to quarters for quarterly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value / (4 * 3);
                        break;
                    default:
                        // Handle default case
                        break;
                }
                break;
            case 'month':
                // Handle loan duration specified in months
                switch ($this->loan_repayment_cycle) {
                    case 'Daily':
                        // Convert months to days for daily repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 30;
                        break;
                    case 'Weekly':
                        // Convert months to weeks for weekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 4;
                        break;
                    case 'Biweekly':
                        // Convert months to biweeks for biweekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 2;
                        break;
                    case 'Monthly':
                        // Minimum number of repayments equals the loan duration value (months)
                        $this->minimum_num_of_repayments = $this->loan_duration_value;
                        break;
                    default:
                        // Default conversion to days
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 30;
                        break;
                }
                break;
            case 'year':
                // Handle loan duration specified in years
                switch ($this->loan_repayment_cycle) {
                    case 'Daily':
                        // Convert years to days for daily repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 365;
                        break;
                    case 'Weekly':
                        // Convert years to weeks for weekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 52;
                        break;
                    case 'Biweekly':
                        // Convert years to biweeks for biweekly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 26;
                        break;
                    case 'Bimonthly':
                        // Convert years to bimonths for bimonthly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 6;
                        break;
                    case 'Quarterly':
                        // Convert years to quarters for quarterly repayment cycle
                        $this->minimum_num_of_repayments = $this->loan_duration_value * 4;
                        break;
                    default:
                        // Handle default case
                        break;
                }
                break;
            default:
                // Handle default case
                break;
        }
    }

    public function calculateLoan()
    {
        try {
            switch ($this->loan_interest_method) {
                case 'Flat Rate':
                    // Perform calculation for flat rate interest
                    // You can define a separate method for this calculation
                    $this->calculateFlatRate();
                    break;
                case 'Reducing Balance - Equal Installments':
                    // Perform calculation for reducing balance with equal installment interest
                    // You can define a separate method for this calculation
                    $this->calculateReducingBalanceEqualInstallment();
                    break;
                case 'Reducing Balance - Equal Principal':
                    // Perform calculation for reducing balance with equal principal interest
                    // You can define a separate method for this calculation
                    $this->calculateReducingBalanceEqualPrincipal();
                    break;
                case 'Interest-Only':
                    // Perform calculation for interest only interest
                    // You can define a separate method for this calculation
                    $this->calculateInterestOnly();
                    break;
                case 'Compound Interest':
                    // Perform calculation for compound interest
                    // You can define a separate method for this calculation
                    $this->calculateCompoundInterest();
                    break;
                default:
                    // Handle other cases or show an error message
                    break;
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'An error occurred: ' . $th->getMessage());
        }
    }

    public function calculateReducingBalanceEqualInstallment()
    {
        $principal = $this->principal;
        $term = $this->minimum_num_of_repayments;

        // Convert interest to decimal
        $rate = $this->loan_interest_value / 100;

        // Adjust if interest is annual (convert to monthly)
        if ($this->loan_interest_period === 'annual') {
            $rate /= 12;
        }

        // Calculate installment using PMT formula
        $installment = Finance::pmt($rate, $term, -$principal, 0, false);

        $balance = $principal;
        $schedule = [];
        $totalInterest = 0;

        for ($i = 1; $i <= $term; $i++) {
            $interest = $balance * $rate;
            $principalPayment = $installment - $interest;
            $balance -= $principalPayment;

            if ($i === $term) {
                // Final adjustment to clear floating point leftovers
                $principalPayment += $balance;
                $balance = 0;
            }

            $schedule[] = [
                'installment' => round($installment, 2),
                'principal' => round($principalPayment, 2),
                'interest' => round($interest, 2),
                'balance' => round($balance, 2),
            ];

            $totalInterest += $interest;
        }

        // dd($schedule);
        $this->amortization_table = $schedule;
        $this->total_repayment_amount = round($principal + $totalInterest, 2);
    }


}
