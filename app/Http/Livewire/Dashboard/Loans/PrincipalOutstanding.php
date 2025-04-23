<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class PrincipalOutstanding extends Component
{
    use LoanTrait, SettingTrait;
    public $loan_requests;
    public $title = 'Principal Outstanding Loans';

    public function render()
    {
        return view('livewire.dashboard.loans.principal-outstanding')->layout('layouts.admin');
    }
}