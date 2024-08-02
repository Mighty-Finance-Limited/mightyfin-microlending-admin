<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanInstallment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Traits\LoanTrait;

class MissedRepaymentExport implements FromView
{
    use LoanTrait;
    public function view(): View
    {
        return view('livewire.dashboard.loans.missed-repayments-view', [
            'mssd_repays' => $this->missed_repayments()
        ]);
    }

}