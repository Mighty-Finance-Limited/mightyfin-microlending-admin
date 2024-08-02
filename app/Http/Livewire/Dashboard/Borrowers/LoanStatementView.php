<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\Application;
use App\Models\Transaction;
use App\Models\User;
use App\Classes\Exports\LoanStatementExport;
use Livewire\Component;

class LoanStatementView extends Component
{
    public $loan, $transactions;
    public function mount($id){
        /**
            *loan main details
            *Loan owner
            *Loan status timeline
        **/  
        $this->loan = Application::where('id', $id)->with('user')->first();
        $this->transactions = Transaction::where('application_id', $id)->with('application.user')->orderBy('created_at', 'desc')->get();
        
    }

    public function render()
    {
        
        if (auth()->user()->hasRole('user')) {
            return view('livewire.dashboard.borrowers.loan-statement-view')
            ->layout('layouts.dashboard');
        }else{
            return view('livewire.dashboard.borrowers.loan-statement-view')
            ->layout('layouts.admin');
        }
    }

    public function exportLoanStatement(){
        return Excel::download(new LoanStatementExport($this->loan->id), $this->loan->fname.' '.$this->loan->lname.' Loan Statement.xlsx');
    }
}
