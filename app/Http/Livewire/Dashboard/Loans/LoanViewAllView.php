<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use App\Traits\UserTrait;
use App\Models\User;

class LoanViewAllView extends Component
{
    use LoanTrait,SettingTrait,AuthorizesRequests;

    public $type = [];
    public $status = [];
    public $view = 'list';
    public $users, $due_date;
    public $assignModal = false;
    public $title = 'View All Loans';

    public function render(){
        $this->authorize('view loans');
        try {
            // Retrieve users with the 'user' role, excluding their applications
            $this->users = User::role('user')->without('applications')->get();

            if($this->current_configs('loan-approval')->value == 'auto'){
                // get loan only if first review as approved
                $this->loan_requests = $this->getAllLoanRequests('auto');
            }elseif($this->current_configs('loan-approval')->value == 'manual'){

                $this->loan_requests = $this->getAllLoanRequests('manual');
                $requests = $this->getAllLoanRequests('manual');
            }else{
                $this->loan_requests = $this->getAllLoanRequests('spooling');
                $requests = $this->getAllLoanRequests('spooling');
            }
            return view('livewire.dashboard.loans.loan-view-all-view',[
                'requests'=>$requests
            ])->layout('layouts.admin');
        }catch (\Throwable $th) {
            dd($th);
        }
    }
}
