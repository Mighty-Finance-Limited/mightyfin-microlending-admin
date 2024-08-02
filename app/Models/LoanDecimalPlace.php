<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDecimalPlace extends Model
{
    use HasFactory;
    protected $fillable = [
        'value',
        'loan_product_id',
        'status'
    ];

    public function loan_products(){
        return $this->belongsTo(LoanProduct::class);
    }
}
