<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class NoRepayments extends Component
{
    use LoanTrait, SettingTrait;
    public $loan_requests;
    public $title = 'No Repayments';


    public function render()
    {
        $this->loan_requests = $this->no_repayments();
        return view('livewire.dashboard.loans.no-repayments')->layout('layouts.admin');
    }
}
