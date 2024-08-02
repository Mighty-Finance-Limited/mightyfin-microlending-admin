<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\WalletTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Status;
use App\Models\ApplicationStage;
use Livewire\Component;

class LoanDetailedView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait, AuthorizesRequests;
    public $loan, $user, $loan_id, $msg, $due_date, $reason, $loan_product;
    public $loan_stage, $denied_status, $picked_status, $current;
    public function mount($id){
        $this->loan_id = $id;
    }
    public function render()
    {            
        $this->authorize('processes loans');
        $this->loan = $this->get_loan_details($this->loan_id);
        $this->loan_product = $this->get_loan_product($this->loan->loan_product_id);
        $this->loan_stage = $this->get_loan_current_stage($this->loan->loan_product_id);
        $this->denied_status = Status::where('stage', 'denied')
        ->orderBy('id')
        ->get();
        $this->current = ApplicationStage::where('application_id', $this->loan->id)->first();
        
        return view('livewire.dashboard.loans.loan-detailed-view')
        ->layout('layouts.admin');
    }
}
