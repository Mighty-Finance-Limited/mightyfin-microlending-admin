<?php

namespace App\Models;

use App\Traits\CalculatorTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Application extends Model
{
    use HasFactory;
    use CalculatorTrait;

    protected $fillable = [
        'lname',
        'fname',
        'email',
        'phone',
        'gender',
        'type',
        'loan_product_id',
        'repayment_plan',
        'amount',
        'interest',
        'payback_amount',

        'glname',
        'gfname',
        'gemail',
        'gphone',
        'g_gender',
        'g_relation',
        'gnrc_no',
        'gdob',
        'gphone2',
        'gphonesp3',
        'gaddress',

        'g2lname',
        'g2fname',
        'g2email',
        'g2phone',
        'g2_gender',
        'g2_relation',

        'nrc_file',
        'tpin_file',
        'business_file',
        'payslip_file',
        'bank_trans_file',
        'bill_file',
        'status',

        'user_id',
        'guest_id',
        'payback_amount',
        'penalty_addition',
        'due_date',
        'can_change',

        'processed_by',
        'approved_by',

        'complete',
        'doa',

        'monthly_payments',
        'maximum_deductable',
        'net_pay_blr', //net before loan recovery
        'net_pay_alr', //net pay after loan recovery
        'service_cost',
        'cust_type',
        'personal_loan_type',
        'age',
        'is_zambian',
        'nationality',
        'continue',
        'is_assigned'
    ];
    protected $appends = [
        'done_by',
        'confirmed_by'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('withUser', function ($builder) {
            $builder->with('user');
        });
    }

    public function getDoneByAttribute()
    {
        return User::where('id', $this->processed_by)->first();
    }


    public function getLoanNumberAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

    public function getConfirmedByAttribute()
    {
        // must change to loan
        return User::where('id', $this->processed_by)->first();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function manual_approvers()
    {
        return $this->hasMany(LoanManualApprover::class);
    }

    public function loan()
    {
        return $this->hasOne(Loans::class);
    }
    public function loan_product()
    {
        return $this->belongsTo(LoanProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function loan_scores()
    {
        return $this->hasMany(LoanScore::class);
    }

    public function approvedLoans()
    {
        return $this->hasOne(Loans::class);
    }

    public static function loanProduct($id)
    {
        return LoanProduct::where('id', $id)->first();
    }

    public function balance_statement()
    {
        return $this->hasMany(LoanBalanceStatement::class, 'loan_id');
    }
    // Pending for approval
    public static function currentApplication()
    {
        return Application::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')->first();
        // ->where('status', 0)->where('complete', 0)->first();
    }

    // Pending for payback
    public static function activeApplication()
    {
        return Application::where('user_id', auth()->user()->id)
            ->where('status', 1)->where('complete', 1)->first();
    }

    public static function payback($loan = null)
    {
        // dd($loan);
        if ($loan->amount) {
            $instance = new self();
            if ($loan) {
                $data = $instance->calculateAmortizationScheduleTotalRepayment($loan);
            } else {
                $data = $instance->calculateAmortizationScheduleTotalRepayment($loan);
            }
            return $data['total_repayment'];
        }
        return 0;
    }

    public static function monthInstallment($loan)
    {

        if ($loan->amount) {
            $instance = new self();
            if ($loan) {
                $data = $instance->calculateAmortizationScheduleTotalRepayment($loan);
            } else {
                $data = $instance->calculateAmortizationScheduleTotalRepayment($loan);
            }
            return $data['monthly_payment'];
        }
        return 0;
    }

    public static function loan_balance($application_id)
    {
        try {
            $loan = Application::where('id', $application_id)->where('status', 1)->first();
            if ($loan !== null) {
                $paid = Transaction::where('application_id', $application_id)->sum('amount_settled');
                $payback = Application::payback($loan);
                $paidStr = number_format((float)$paid, 2, '.', '');
                $paybackStr = number_format((float)$payback, 2, '.', '');

                $paidStr = number_format((float)$paid, 2, '.', '');
                $balance = bcsub($paybackStr, $paidStr, 2);
                return (float)$balance;
            }
        } catch (\Throwable $th) {
            Log::error("Loan Balance Error: " . $th->getMessage(), ['exception' => $th]);
            return 0;
        }
    }

    public static function paidOnLoan($id)
    {
        return (string) Transaction::where('application_id', $id)->sum('amount_settled');
    }

    public static function receiveAmount($principal, $duration, $product_id = null)
    {
        $discount = $principal * 0.1;
        $finalPayback = $principal - $discount;
        return number_format($finalPayback, 2, '.', '');
    }

    public static function paybackNextDate($application)
    {
        // Assuming $application->created_at is a Carbon instance
        if ($application) {
            try {
                $nextDate = $application->created_at;

                return $nextDate;
            } catch (\Throwable $th) {
                return 'No Date';
            }
        } else {
            return 'No Application';
        }
    }


    public static function paybackStatement($loan_id){
        try {
            $instance = new self();
            $schedule = $instance->loanStatement($loan_id);
            $statement = [];
            foreach ($schedule as $i => $entry) {
                $statement[] = (object) [
                    'id' => $entry['id'],
                    'payment_date' => $entry['created_at'],
                    'description' => $entry['description'],
                    'debit' => $entry['debit'], // No new loan charges
                    'credit' => $entry['credit'], // Total installment paid
                    'principal_paid' => 0,
                    'interest_paid' => 0,
                    'balance_after_payment' => $entry['balance'],
                    'payment_method' => "Bank Transfer", // Example, can be dynamic
                ];
            }

            return $statement;

        } catch (\Throwable $th) {
            return [];
        }
    }

    public static function interest_rate($product_id)
    {
        $loan_product = LoanProduct::where('id', $product_id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method',
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places'
        ])->first();
        if (!empty($loan_product->interest_types->toArray())) {
            if ($loan_product->interest_types->first()->interest_type->first()->name == 'Percentage') {
                return $loan_product->def_loan_interest . '%';
            } else {
                return 'K ' . $loan_product->def_loan_interest;
            }
        } else {
            return 'Not Set';
        }
    }

    //Depricated
    public static function monthly_installment($amount, $duration)
    {
        try {
            $total_collectable = Application::payback($amount, $duration);
            $total = $total_collectable / $duration;
            return number_format($total, 2, '.', '');
        } catch (\Throwable $th) {
            return 0;
        }
    }

    // COUNTS
    public static function totalLoans()
    {
        return Application::get()->count();
    }
    public static function totalApprovedLoans()
    {
        return Application::where('status', 1)->get()->count();
    }
    public static function totalPendingLoans()
    {
        return Application::where('status', 0)->where('complete', 1)->get()->count();
    }


    // FUNDS
    public static function totalAmountLoans()
    {
        //  Total amount for all loans with complete KYC
        return Application::where('complete', 1)->sum('amount');
    }
    public static function totalAmountLoanedOut()
    {
        //  Total amount for complete and approved loans
        return Application::where('complete', 1)->where('status', 1)->whereNotNull('due_date')->sum('amount');
    }
    public static function totalAmountPending()
    {
        // Total amount for complete and under review / pending approval
        return Application::where('complete', 1)->where('status', [0, 2])->sum('amount');
    }


    // ELIGIBILITY
    public static function loan_assemenent_table($loan)
    {
        $basic_pay = $loan->user->basic_pay; // Clear
        $net_pay = $loan->user->net_pay; //Unclear //Net Pay Before Loan Recovery
        $principal = $loan->amount; // Clear
        $interest = $loan->interest; // Clear
        $total_collectable = Application::payback($loan->amount, $loan->repayment_plan); // Clear
        $payment_period = $loan->repayment_plan; // Clear
        $monthly_payment = Application::monthly_installment($loan->amount, $loan->repayment_plan); // Clear
        $maximum_deductable_amount = $net_pay * 0.75; // Clear
        $net_pay_alr = $net_pay * 0.25;; //Net Pay After Loan Recovery //Clear

        // if($maximum_deductable_amount > 0){
        $credit_score = $monthly_payment < $maximum_deductable_amount;
        // }else{
        //     $credit_score = false;
        // }

        $data = [
            'borrower' => $loan->user->fname . ' ' . $loan->user->lname,
            'basic_pay' => $basic_pay, // Clear
            'net_pay_blr' => $net_pay, //Unclear //Net Pay Before Loan Recovery
            'principal' => $principal, // Clear
            'interest' => $payment_period < 2 ? '20%' : '44%', // Clear
            'total_collectable' =>  $total_collectable, // Clear
            'payment_period' => $payment_period, // Clear
            'monthly_payment' =>  $monthly_payment, // Clear
            'maximum_deductable_amount' => $maximum_deductable_amount, // Clear
            'net_pay_alr' => $net_pay_alr, //Net Pay After Loan Recovery //Clear
            'dob' => $loan->user->dob,
            'doa' => $loan->created_at->toFormattedDateString(), //Date of Application
            'dop' => '',
            'credit_score' => $credit_score
        ];
        return $data;
    }

    public static function loanPaidSofar($application_id)
    {
        try {
            $loan = Application::where('id', $application_id)->first();
            if ($loan !== null && $loan->status == 1) {
                $paid = (string) Transaction::where('application_id', $application_id)->sum('amount_settled');
                return (float)$paid;
            } else {
                return 0;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public static function loanBalance($application_id)
    {
        try {
            $loan = Application::where('id', $application_id)->first();
            if ($loan !== null && $loan->status == 1) {
                $paid = (string) Transaction::where('application_id', $application_id)->sum('amount_settled');
                $payback = (string) Application::payback($loan->amount, $loan->repayment_plan, $loan->loan_product_id, $loan);

                return (float) bcsub($payback, $paid, 2);
            } else {
                return 0;
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}