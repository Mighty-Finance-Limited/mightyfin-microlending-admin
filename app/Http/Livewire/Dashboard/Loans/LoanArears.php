<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class LoanArears extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.loan-arears')->layout('layouts.admin');
    }
}
