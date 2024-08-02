<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class LoanRepaymentCalculatorView extends Component
{
    public $principal, $duration, $rate, $result; 
    public function render()
    {
        $this->rate = 20;
        return view('livewire.dashboard.loans.loan-repayment-calculator-view')
        ->layout('layouts.dashboard');
    }

    public function mount(){
        $this->principal = 0; 
        $this->duration = 1; 
        $this->rate = 0; 
        $this->result = 0;
    }

    public function calculatePaybackAmount(){
        $interest_rate = $this->rate/ 100;
        $payback_amount = $this->principal * (1 + ($interest_rate * $this->duration));
        $this->result = $payback_amount;
        // return response()->json([
        //     'payback_amount' => $payback_amount
        // ], 200);
    }
}
