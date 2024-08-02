<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class OneMonthLate extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.one-month-late')->layout('layouts.admin');
    }
}
