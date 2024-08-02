<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Http\Livewire\Dashboard\Borrowers\BorrowerView;
use App\Models\LoanProduct;
use App\Models\User;
use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use Livewire\Component;

class NewLoanView extends Component
{
    use UserTrait, LoanTrait;
    public function render()
    {

        return view('livewire.dashboard.loans.new-loan-view')
        ->layout('layouts.admin');
    }
}
