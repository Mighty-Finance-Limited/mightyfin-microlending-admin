<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class LoanArears extends Component
{
    use LoanTrait, SettingTrait;
    public $loan_requests;
    public $title = 'Loans In Arrears';

    public function render()
    {
        $this->loan_requests = $this->loans_in_arrears();
        return view('livewire.dashboard.loans.loan-arears')->layout('layouts.admin');
    }
}