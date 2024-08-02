<?php

namespace App\Traits;

use App\Models\DisbursedBy;
use App\Models\Penalty;
use App\Models\RepaymentCycle;
use App\Models\ServiceCharge;

trait DisbursementTrait{


    public function get_all_disbursement_methods(){
        return DisbursedBy::orderBy('created_at', 'desc')->get();
    }
    public function get_disbursement_method($id){
        return DisbursedBy::where('id', $id)->first();
    }
    public function get_all_repayment_cycle(){
        return RepaymentCycle::orderBy('created_at', 'desc')->get();
    }
    public function get_repayment_cycle($id){
        return RepaymentCycle::where('id', $id)->first();
    }

    public function get_all_penalties(){
        return Penalty::orderBy('created_at', 'desc')->get();
    }
    public function get_penalty_settings($id){
        return Penalty::where('id', $id)->first();
    }
    public function get_all_loan_fees(){
        return ServiceCharge::orderBy('created_at', 'desc')->get();
    }
    public function get_loan_fees($id){
        return ServiceCharge::where('id', $id)->first();
    }

}