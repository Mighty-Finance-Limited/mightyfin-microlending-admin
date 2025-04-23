<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class LoanCalculator extends Component
{
    use LoanTrait, SettingTrait;
    public $loan_requests;
    public $title = 'Loan Calculator';

    public function render()
    {
        return view('livewire.dashboard.loans.loan-calculator')->layout('layouts.admin');
    }
}
