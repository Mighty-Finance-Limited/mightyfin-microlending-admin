<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\Exports\PMDExport;
use App\Models\Application;
use App\Models\Loans;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use Maatwebsite\Excel\Facades\Excel;

class PastMaturityDateView extends Component
{
    use AuthorizesRequests, EmailTrait, WalletTrait;
    public $loan_requests;
    public $type = [];

    public function render()
    {
        if (auth()->user()->hasRole('user')) {
            $this->loan_requests = Loans::with(['application' => function($q){
                $q->where('user_id', auth()->user()->id);
            }])->where('final_due_date', '<', now())
            ->orderBy('id', 'desc')->get();
            return view('livewire.dashboard.loans.past-maturity-date-view')
            ->layout('layouts.dashboard');
        }else{
            $this->loan_requests = Loans::with('application')
            ->where('final_due_date', '<', now())
            ->orderBy('id', 'desc')->get();
            return view('livewire.dashboard.loans.past-maturity-date-view')
            ->layout('layouts.admin');
        }
        

    }

    public function exportPMLoans(){
        return Excel::download(new PMDExport,  'Past Maturity Loans.xlsx');
    }
}
