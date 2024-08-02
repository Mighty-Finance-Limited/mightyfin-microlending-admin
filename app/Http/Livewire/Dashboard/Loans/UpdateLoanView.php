<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\LoanTrait;
use Livewire\Component;

class UpdateLoanView extends Component
{
    use LoanTrait;
    public $data, $loan, $user, $can_edit;
    public $loan_type = '';

    public function mount($id){
        $this->loan = Application::with('loan')->where('id', $id)->first();
        $this->user = User::user_meta($this->loan->user_id);
        $this->can_edit = Transaction::hasTransaction($id);
    }
    public function render()
    {
        $this->loan_type = $this->loan->type;
        return view('livewire.dashboard.loans.update-loan-view')
        ->layout('layouts.admin');
    }
}
