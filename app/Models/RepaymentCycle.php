<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepaymentCycle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function loan_repayment_cycle(){
        return $this->hasMany(LoanRepaymentCycle::class);
    }
}
