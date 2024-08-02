<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepaymentCycle extends Model
{
    use HasFactory;
    protected $fillable = [
        'repayment_cycle_id',
        'loan_product_id',
        'status'
    ];

    public function repayment_cycle(){
        return $this->belongsTo(RepaymentCycle::class);
    }

    public function loan_products(){
        return $this->belongsTo(LoanProduct::class);
    }
}
