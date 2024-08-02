<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id', 
        'next_dates', 
        'type', //manual or auto
        'paid_at', 
        'payment_method',
        'amount'
    ];

    public function loans(){
        return $this->belongsTo(Loans::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

}
