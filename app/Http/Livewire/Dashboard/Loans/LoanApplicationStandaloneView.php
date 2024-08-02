<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\User;
use App\Traits\EmailTrait;
use Livewire\Component;

class LoanApplicationStandaloneView extends Component
{
    use EmailTrait;
    public $user;

    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/  
        $this->user = User::find($id);
    }

    public function render()
    {
        return view('livewire.dashboard.loans.loan-application-standalone-view')
        ->layout('layouts.dashboard');
    }

}
