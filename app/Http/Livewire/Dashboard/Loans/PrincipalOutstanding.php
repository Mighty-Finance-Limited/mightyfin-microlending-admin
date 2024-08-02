<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class PrincipalOutstanding extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.principal-outstanding')->layout('layouts.admin');
    }
}
