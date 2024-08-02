<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class ThreeMonthLate extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.three-month-late')->layout('layouts.admin');
    }
}
