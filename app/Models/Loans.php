<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'repaid',
        'settle_at',
        'principal',
        'payback',
        'penalty',
        'interest',
        'final_due_date',
        'grace_due_date',
        'closed'
    ];

    public static function total_loans($user_id){
        return Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('user_id', $user_id)->count();

    }

    public static function total_borrowed($user_id){
        return Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('continue', 0)
        ->where('user_id', $user_id)->sum('amount');

    }

    
    // Completed kyc and final submission form and given funds
    public static function customer_total_borrowed($user_id){
        $loans = Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('continue', 0)
        ->where('user_id', $user_id)->get();

        $total = 0;
        foreach ($loans as $key => $loan) {
            $total += Loans::where('application_id', $loan->id)->first()->principal;
        }
        
        return $total;
    }

    // Completed kyc and final submission form
    public static function customer_total_pending_borrowed($user_id){
        $total = Application::where('status', 0)
        ->where('complete', 1)
        ->where('continue', 0)
        ->where('user_id', $user_id)->sum('amount');
        return $total;
    }

    public static function customer_total_paid($user_id){
        $loans = Application::with('loan')
        ->where('status', 1)
        ->where('complete', 1)
        ->where('user_id', $user_id)->get();

        $amount_paid = 0;
        foreach ($loans as $key => $loan) {
            $amount_paid += Transaction::where('application_id', $loan->id)->first()->amount_settled;
        }
        
        return $amount_paid;
    }

    // customer repayment balance
    public static function customer_balance($user_id){
        
        $loans = Application::with('loan')
            ->where('status', 1)
            ->where('complete', 1)
            ->where('user_id', $user_id)->get();

        $payback = 0;
        $amount_paid = 0;
        foreach ($loans as $key => $loan) {
            // dd($loan);
            $payback += Application::payback($loan->amount, $loan->repayment_plan);
            $amount_paid += Transaction::where('application_id', $loan->id)->first()->amount_settled;
        }
        
        return $payback - $amount_paid;
    }

    public static function loan_balance($application_id){
        $loan = Application::where('id', $application_id)->first();
        if($loan->status == 1){
            $paid = Transaction::where('application_id', $application_id)->sum('amount_settled');
            $payback = Application::payback($loan->amount, $loan->repayment_plan);
            return (float)$payback - (float)$paid;
        }else{
            return Application::payback($loan->amount, $loan->repayment_plan);
        }

    }

    public static function hasLoan($user_id){
        $hasNoOpen = Application::where('user_id', $user_id)
        ->where('status', 1)->where('complete', 1)
        ->with(['loan' => function($query){
            $query->where('closed', 0);
        }])->get()->toArray();

        $hasNoApplication = Application::where('user_id', $user_id)
                    ->without('loan')->get()->toArray();

        if(empty($hasNoOpen) && empty($hasNoApplication)){
            return true;
        }else{
            return false;
        }
    }

    public static function loan_settled($application_id){
        return Transaction::where('application_id', $application_id)->get()->sum('amount_settled');
    }
    public static function last_payment($application_id){
        return Transaction::where('application_id', $application_id)->get()->last();
    }

    public function application(){
        return $this->belongsTo(Application::class, 'application_id');
    }
    public function loan_installments(){
        return $this->hasMany(LoanInstallment::class, 'loan_id');
    }


}
