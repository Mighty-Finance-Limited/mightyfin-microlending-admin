<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use Livewire\Component;

class EligibilityScoreView extends Component
{

    public $loan, $monthly_payment, $net_pay_alr, $net_pay_blr, $interest, $maximum_deductable_amount, $total_collectable;
    public function mount($id){
        $this->loan = Application::with('user')->where('id', $id)->get()->first();
    }
    public function render()
    {
        $this->interest = $this->loan->interest; 
        $this->monthly_payment = Application::monthly_installment($this->loan->amount, $this->loan->repayment_plan);
        $this->net_pay_alr = $this->loan->user->net_pay - $this->monthly_payment;  
        $this->maximum_deductable_amount = $this->net_pay_alr * 0.75;
        $this->total_collectable = Application::payback($this->loan->amount, $this->loan->repayment_plan);
        return view('livewire.dashboard.loans.eligibility-score-view')->layout('layouts.dashboard');
    }
}
