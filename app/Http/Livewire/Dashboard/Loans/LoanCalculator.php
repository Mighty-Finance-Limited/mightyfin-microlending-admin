<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class LoanCalculator extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.loan-calculator')->layout('layouts.admin');
    }
}
