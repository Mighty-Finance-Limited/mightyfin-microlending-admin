<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanWallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'deposit',
        'withraw',
        'acc_no',
        'ccv',
        'sort_code',
        'branch',
        'phone',
        'expire_date'
    ];

    public function history(){
        return $this->hasMany(LoanWalletHistory::class);
    }
}
