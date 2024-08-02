<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanWalletHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'amount',
        'user_id',
        'loan_wallet_id'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function loanWallet(){
        return $this->belongsTo(LoanWallet::class, 'loan_wallet_id');
    }
}
