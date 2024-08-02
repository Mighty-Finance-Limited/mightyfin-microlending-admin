<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProductAttribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'usage_count',
        'loan_product_id',
        'usage_success_count',
        'usage_success_count'
    ];
}
