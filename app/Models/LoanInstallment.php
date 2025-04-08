<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'txn_id',
        'next_dates',
        'type', // manual or auto
        'paid_at',
        'penalty',
        'is_cleared',
        'payment_method',
        'amount',
        'due_date',
        'principal',
        'interest',
        'remaining_balance',
        'status'
    ];

    public function loans(){
        return $this->belongsTo(Loans::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

}