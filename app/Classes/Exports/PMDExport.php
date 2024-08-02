<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PMDExport implements FromView
{
    public function view(): View
    {
        return view('livewire.dashboard.loans.past-maturity-date-view', [
            'loan_requests' => Loans::with('application')->where('final_due_date', '<', now())
            ->orderBy('created_at', 'desc')->get()
        ]);
    }
}