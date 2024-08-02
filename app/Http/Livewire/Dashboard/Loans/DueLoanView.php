<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Models\Application;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class DueLoanView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait, SettingTrait;
    public $loan_requests, $loan_request, $new_loan_user, $user_basic_pay, $user_net_pay, $loan_id;
    public $type = [];
    public $status = [];
    public $view = 'list';
    public $users, $due_date;
    public $assignModal = false;
    public $title = 'Open Loans';

    public function render()
    {
        try {
            $this->users = User::role('user')->without('applications')->get();

            if($this->current_configs('loan-approval')->value == 'auto'){
                // get loan only if first review as approved
                $this->loan_requests = $this->getDueLoanRequests('auto');
            }elseif($this->current_configs('loan-approval')->value == 'manual'){
                $this->loan_requests = $this->getDueLoanRequests('manual');
                $requests = $this->getDueLoanRequests('manual');
            }else{
                $this->loan_requests = $this->getDueLoanRequests('spooling');
                $requests = $this->getDueLoanRequests('spooling');
            }
            return view('livewire.dashboard.loans.due-loan-view',[
                'requests'=>$requests
            ])->layout('layouts.admin');

        } catch (\Throwable $th) {
            // If an exception occurs, set $loan_requests to an empty array
            $this->loan_requests = [];
            $requests = [];
            if (auth()->user()->hasRole('user')) {
                return view('livewire.dashboard.loans.due-loan-view',[
                    'requests'=>$requests
                ])->layout('layouts.dashboard');
            }else{
                dd($th);
                return view('livewire.dashboard.loans.due-loan-view',[
                    'requests'=>$requests
                ])->layout('layouts.admin');
            }
        }
    }
}
