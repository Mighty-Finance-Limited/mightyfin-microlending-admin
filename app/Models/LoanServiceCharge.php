<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class LoanServiceCharge extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_charge_id',
        'loan_product_id',
        'status'
    ];

    public function service_charge(){
        return $this->belongsTo(ServiceCharge::class);
    }

    public function loan_products(){
        return $this->belongsTo(LoanProduct::class);
    }
}
