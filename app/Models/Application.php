<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Application extends Model
{
    use HasFactory;

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
        'service_cost' ,
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

    public function getDoneByAttribute(){
        return User::where('id', $this->processed_by)->first();
    }

    public function getConfirmedByAttribute(){
        // must change to loan
        return User::where('id', $this->processed_by)->first();
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function manual_approvers(){
        return $this->hasMany(LoanManualApprover::class);
    }

    public function loan(){
        return $this->hasOne(Loans::class);
    }
    public function loan_product(){
        return $this->belongsTo(LoanProduct::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function loan_scores()
    {
        return $this->hasMany(LoanScore::class);
    }

    public function approvedLoans(){
        return $this->hasOne(Loans::class);
    }

    // public function approvalAction(){
    //     return $this->hasMany()
    // }

    // public static function payback($principal, $duration){
    //     // 1 month
    //     if( $duration < 2){
    //         return ($principal * 0.2) + $principal;
    //     }

    //     // 2 to 6 months
    //     if( $duration > 1 && $duration < 7 ){
    //         return ($principal * 0.44) + $principal;
    //     } 
        
    //     // 3 months and above
    //     // if( $duration > 3){
    //     //     return ($principal * 1.44) + $principal;
    //     // }
    // }

    public static function loanProduct($id){
        return LoanProduct::where('id', $id)->first();
    }
    // Pending for approval
    public static function currentApplication(){
        return Application::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')->first();
        // ->where('status', 0)->where('complete', 0)->first();
    }

    // Pending for payback
    public static function activeApplication(){
        return Application::where('user_id', auth()->user()->id)
        ->where('status', 1)->where('complete', 1)->first();
    }

    // !important
    public static function payback($principal, $duration, $product_id = null){
        $product = LoanProduct::where('id', $product_id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method', 
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places',
            'service_fees.service_charge'
            ])->first();

        $rate = (float)$product->def_loan_interest / 100;
        $interest = ($principal * $rate * $duration);
        $payback = $principal + $interest;
        return number_format($payback, 2, '.', '');
    }


    public static function receiveAmount($principal, $duration, $product_id = null){
        $discount = $principal * 0.1;
        $finalPayback = $principal - $discount;
        return number_format($finalPayback, 2, '.', '');
    }

    
    // !important
    public static function paybackInstallment($principal, $duration, $product_id = null){
        $product = LoanProduct::where('id', $product_id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method', 
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places',
            'service_fees.service_charge'
            ])->first();

        $rate = (float)$product->def_loan_interest / 100;
        $interest = ($principal * $rate * $duration);
        $payback = $principal + $interest;
        $inst = $payback / $duration;
        return number_format($inst, 2, '.', '');
    }

    public static function paybackNextDate($application){
        // Assuming $application->created_at is a Carbon instance
        if($application){
            try {
                $nextDate = $application->created_at;
        
                return $nextDate;
            } catch (\Throwable $th) {
                return 'No Date';
            }
        }else{
            return 'No Application';
        }
    }
    

    // Deprecating
    public static function interest_amount($principal, $duration){
        // 1 month
        if( $duration == 1){
            $interest = ($principal * 0.21);
            return number_format($interest, 2, '.', '');
        }
        
        // 2 months
        if( $duration == 2 ){
            $interest = ($principal * 1.2 *  1.1) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 3 months
        if( $duration == 3){
            $interest = ($principal * 1.2 * 1.15) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 4 months
        if( $duration == 4){
            $interest=($principal * 1.2 * 1.2) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 5 months
        if( $duration == 5){
            $interest = ($principal * 1.2 * 1.25) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 6 months
        if( $duration == 6){
            $interest = ($principal * 1.2 * 1.3) - $principal;
            return number_format($interest, 2, '.', '');
        }


        // 7 months
        if( $duration == 7){
            $interest = ($principal * 1.2 * 1.35) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 8 months
        if( $duration == 8){
            $interest = ($principal * 1.2 * 1.4) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 9 months
        if( $duration == 9){
            $interest = ($principal * 1.2 * 1.45) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 10 months
        if( $duration == 10){
            $interest = ($principal * 1.2 * 1.5) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 11 months
        if( $duration == 11){
            $interest = ($principal * 1.2 * 1.55) - $principal;
            return number_format($interest, 2, '.', '');
        }
        
        // 12 months
        if( $duration == 12){
            $interest = ($principal * 1.2 * 1.6) - $principal;
            return number_format($interest, 2, '.', '');
        }
    
    }

    public static function interest_rate($product_id){
        $loan_product = LoanProduct::where('id', $product_id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method', 
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places'
            ])->first();
            if(!empty($loan_product->interest_types->toArray())){
                if( $loan_product->interest_types->first()->interest_type->first()->name == 'Percentage' ){
                    return $loan_product->def_loan_interest.'%';
                }else{
                    return 'K '.$loan_product->def_loan_interest;
                }
            }else{
                return 'Not Set';
            }
    }
    
    //Depricated
    public static function monthly_installment($amount, $duration){
        try {
            $total_collectable = Application::payback($amount, $duration);
            $total = $total_collectable / $duration;
            return number_format($total, 2, '.', '');
        } catch (\Throwable $th) {
            return 0;
        }
    }

    // COUNTS
    public static function totalLoans(){
        return Application::get()->count();
    }
    public static function totalApprovedLoans(){
        return Application::where('status', 1 )->get()->count();
    }
    public static function totalPendingLoans(){
        return Application::where('status', 0)->where('complete', 1)->get()->count();
    }


    // FUNDS
    public static function totalAmountLoans(){
        //  Total amount for all loans with complete KYC
        return Application::where('complete', 1)->sum('amount');
    }
    public static function totalAmountLoanedOut(){
        //  Total amount for complete and approved loans 
        return Application::where('complete', 1)->where('status', 1)->whereNotNull('due_date')->sum('amount');
    }
    public static function totalAmountPending(){
        // Total amount for complete and under review / pending approval
        return Application::where('complete', 1)->where('status', [0, 2])->sum('amount');
    }


    // ELIGIBILITY
    public static function loan_assemenent_table($loan){
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
            'borrower' => $loan->user->fname.' '.$loan->user->lname,
            'basic_pay' => $basic_pay, // Clear
            'net_pay_blr' => $net_pay, //Unclear //Net Pay Before Loan Recovery
            'principal' => $principal, // Clear
            'interest' => $payment_period < 2 ? '20%':'44%', // Clear
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
}
