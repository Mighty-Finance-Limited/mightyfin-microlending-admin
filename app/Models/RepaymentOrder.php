<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepaymentOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function loan_repayment_order(){
        return $this->hasMany(LoanRepaymentOrder::class);
    }
}
