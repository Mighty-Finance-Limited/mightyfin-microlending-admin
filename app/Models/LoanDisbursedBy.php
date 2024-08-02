<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDisbursedBy extends Model
{
    use HasFactory;
    protected $fillable = [
        'loan_product_id',
        'disbursed_by_id'
    ];

    public function disbursed_by(){
        return $this->belongsTo(DisbursedBy::class);
    }
    public function loan_product(){
        return $this->belongsTo(LoanProduct::class);
    }
}
