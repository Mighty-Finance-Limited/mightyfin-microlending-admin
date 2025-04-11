<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Loan;
use App\Models\LoanInstallment;
use App\Traits\LoanTrait;

class DownloaderController extends Controller
{
    use LoanTrait;

    public function downloadSchedule(Application $loan)
    {
        $repayment_schedule = LoanInstallment::where('loan_id', $loan->id)
            ->orderBy('next_dates', 'asc')
            ->get();

        $product = $this->get_loan_product($loan->loan_product_id);
        $data = [
            'loan' => $loan,
            'repayment_schedule' => $repayment_schedule,
            'user' => $loan->user,
            'date' => now()->format('d M, Y'),
            'total_paid' => Application::loanPaidSofar($loan->id),
            'remaining_balance' => Application::loanBalance($loan->id),
            'product' => $product
        ];

        $pdf = Pdf::loadView('downloads.schedule-pdf', $data);

        return $pdf->download("loan-schedule-{$loan->id}.pdf");
    }


    public function downloadBalanceStatement(Application $loan)
    {
        $balance_statement = $loan->balance_statement; // Or your query to get the statement
        $user = $loan->user;

        $product = $this->get_loan_product($loan->loan_product_id);
        $data = [
            'loan' => $loan,
            'balance_statement' => $balance_statement,
            'user' => $user,
            'date' => now()->format('d M, Y'),
            'total_paid' => collect($balance_statement)->sum('credit'),
            'outstanding_balance' => Application::loanBalance($loan->id) ?? 0,
            'product' => $product
        ];

        $pdf = Pdf::loadView('downloads.balance-statement-pdf', $data);

        return $pdf->download("loan-balance-statement-{$loan->id}.pdf");
    }
}