<?php

namespace App\Traits;

use App\Models\LoanProduct;
use App\Models\UserFile;
use Illuminate\Support\File;
trait CoreTrait{

    public function payback($principal, $duration, $product_id = null){
        $loan_product = LoanProduct::where('id', $product_id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method', 
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places'
            ])->first();
            
        if( $loan_product->interest_types->first()->interest_type->first()->name == 'Percentage' ){
            $def_int = (float)$loan_product->def_loan_interest;
            
            // return number_format($interest, 2, '.', '');
        }else{
            return 'K '.$loan_product->def_loan_interest;
        }



    }
}