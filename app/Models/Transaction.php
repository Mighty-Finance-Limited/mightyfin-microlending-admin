<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_no',
        'amount_settled',
        'transaction_fee',
        'profit_margin',
        'charge_amount',
        'application_id',
        'proccess_by',
        'installment_id',
        'user_id'
    ];

    public function installment(){
        return $this->belongsTo(LoanInstallment::class, 'installment_id');
    }

    public function application(){
        return $this->belongsTo(Application::class, 'application_id');
    }

    public static function customer_transactions($user_id){
        return Transaction::with('application')->where('user_id', $user_id)->get();
    }
    public static function hasTransaction($application_id){
        return Transaction::where('application_id', $application_id)->exists();
    }

    public static function total_collected(){
        return Transaction::whereNotNull('application_id')->sum('amount_settled');
    }
}
