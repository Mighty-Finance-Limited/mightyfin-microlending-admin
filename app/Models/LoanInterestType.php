<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanInterestType extends Model
{
    use HasFactory;
    protected $fillable = [
        'interest_type_id',
        'loan_product_id',
        'status'
    ];

    public function interest_type(){
        return $this->belongsTo(InterestType::class);
    }

    public function loan_product(){
        return $this->belongsTo(LoanProduct::class);
    }
}
