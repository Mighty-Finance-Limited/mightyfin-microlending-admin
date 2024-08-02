<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanInterest extends Model
{
    use HasFactory;
    protected $fillable = [
        'interest_id',
        'loan_product_id',
        'status'
    ];

    public function interest(){
        return $this->belongsTo(InterestMethod::class);
    }

    public function loan_product(){
        return $this->belongsTo(LoanProduct::class);
    }
}
