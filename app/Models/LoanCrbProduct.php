<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanCrbProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'crb_product_id',
        'loan_product_id',
        'status'
    ];

    public function crb_product(){
        return $this->belongsTo(CrbProduct::class);
    }
    public function loan_product(){
        return $this->belongsTo(LoanProduct::class);
    }
}
