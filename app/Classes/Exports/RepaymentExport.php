<?php

namespace App\Classes\Exports;

use App\Models\Loans;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RepaymentExport implements FromView
{
    public function view(): View
    {
        $loan_requests = Loans::with('application')->where('closed', 0)->get();
        return view('livewire.dashboard.loans.loan-repayment-view',[
            'loan_requests' => $loan_requests
        ]);
    }

}