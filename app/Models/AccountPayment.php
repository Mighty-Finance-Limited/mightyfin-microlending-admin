<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_name',
        'branch_name',
        'type',
        'account_number',
        'account_name',
        'description',
        'status'
    ];

    public function loan_account_payments(){
        return $this->hasMany(LoanAccountPayment::class);
    }
    
}
