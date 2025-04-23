<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class OneMonthLate extends Component
{
    use LoanTrait, SettingTrait;
    public $loan_requests;
    public $title = 'One Month Late';

    public function render()
    {
        return view('livewire.dashboard.loans.one-month-late')->layout('layouts.admin');
    }
}
