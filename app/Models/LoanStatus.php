<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_id',
        'step',
        'stage',
        'state',
        'loan_product_id'
    ];

    public function loan_products(){
        return $this->belongsTo(LoanProduct::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
