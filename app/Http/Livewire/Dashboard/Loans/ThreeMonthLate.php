<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class ThreeMonthLate extends Component
{
    use LoanTrait, SettingTrait;
    public $loan_requests;
    public $title = 'Three Month Late';

    public function render()
    {
        return view('livewire.dashboard.loans.three-month-late')->layout('layouts.admin');
    }
}
