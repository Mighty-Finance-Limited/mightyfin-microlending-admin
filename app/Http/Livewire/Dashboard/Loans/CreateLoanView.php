<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\LoanProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Livewire\Component;

class CreateLoanView extends Component
{
    use AuthorizesRequests;
    public $users, $user_basic_pay, $user_net_pay;
    public $loan_products, $borrowers;
    public function render()
    {
        
    // $this->authorize('accept and reject loan requests');
        
        $this->loan_products = LoanProduct::has('loan_status')->with('loan_status')->get();
        $this->borrowers = User::role('user')->get();
        $this->users = User::role('user')->with('active_loans.loan')->get();
        return view('livewire.dashboard.loans.create-loan-view')->layout('layouts.admin');
    }
    
}
