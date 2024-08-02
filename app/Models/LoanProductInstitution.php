<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProductInstitution extends Model
{
    use HasFactory;
    protected $fillable = [
        'institution_id',
        'loan_product_id',
        'status',
    ];

    public function institutions(){
        return $this->belongsTo(Institution::class);
    }

    public function loan_products(){
        return $this->belongsTo(LoanProduct::class);
    }
}
