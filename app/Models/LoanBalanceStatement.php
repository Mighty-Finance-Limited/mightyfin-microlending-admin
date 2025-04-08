<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanBalanceStatement extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_id',
        'txn_id',
        'payment_date',
        'description',
        'debit',
        'credit',
        'principal_paid',
        'interest_paid',
        'balance_after_payment',
        'payment_method',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}