<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class NoRepayments extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.no-repayments')->layout('layouts.admin');
    }
}
