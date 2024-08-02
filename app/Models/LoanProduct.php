<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'icon_alt',
        'wiz_steps',
        'release_date',
        'auto_payment',
        'loan_duration_period',
        'loan_interest_period',

        'min_principal_amount',
        'def_principal_amount',
        'max_principal_amount',

        'min_loan_duration',
        'def_loan_duration',
        'max_loan_duration',

        'min_loan_interest',
        'def_loan_interest',
        'max_loan_interest',

        'min_num_of_repayments',
        'def_num_of_repayments',
        'max_num_of_repayments',
    ];

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function disbursed_by(){
        return $this->hasMany(LoanDisbursedBy::class);
    }
    public function interest_methods(){
        return $this->hasMany(LoanInterestMethod::class);
    }
    public function interest_types(){
        return $this->hasMany(LoanInterestType::class);
    }
    public function repayment_order(){
        return $this->hasMany(LoanRepaymentOrder::class);
    }
    public function repayment_cycle(){
        return $this->hasMany(LoanRepaymentCycle::class);
    }
    public function loan_decimal_places(){
        return $this->hasMany(LoanDecimalPlace::class);
    }
    public function loan_accounts(){
        return $this->hasMany(LoanAccountPayment::class);
    }
    public function loan_status(){
        return $this->hasMany(LoanStatus::class);
    }

    public function service_fees(){
        return $this->hasMany(LoanServiceCharge::class);
    }

    public function loan_institutes(){
        return $this->hasMany(LoanProductInstitution::class);
    }
    public function loan_crb(){
        return $this->hasMany(LoanCrbProduct::class);
    }

}
