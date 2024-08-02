<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Loans;
use Livewire\Component;

class LoanTrackingView extends Component
{    
    public $loan;
    public function mount($id){
        $this->loan = Loans::with('application')
                    ->with('loan_installments')
                    ->where('id', $id)->first();
    }
    public function render()
    {
        return view('livewire.dashboard.loans.loan-tracking-view')
        ->layout('layouts.dashboard');
    }
}
