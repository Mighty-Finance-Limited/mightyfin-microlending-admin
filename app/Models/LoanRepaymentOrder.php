<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRepaymentOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'repayment_order_id',
        'loan_product_id',
        'status'
    ];

    public function repayment_order(){
        return $this->belongsTo(RepaymentOrder::class);
    }

    public function loan_products(){
        return $this->belongsTo(LoanProduct::class);
    }
}
