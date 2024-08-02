<?php

namespace App\Classes\Exports;

use App\Models\Transaction;
use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanInstallment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class LoanStatementExport implements FromCollection, WithHeadings, FromQuery
{
    public $application_id;
    public function __construct(int $application_id)
    {
        $this->application_id = $application_id;
    }

    public function collection()
    {
        // Get approved loans
        return Transaction::where('application_id', $this->application_id)->with('application.user')->orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Fname',
            'Lname',
            'Email',
            'Phone',
            'Gender',
            'Type',
            'Status',
            'Created at',
            'Amount',
            'Interest'
        ];
    }

    public function query(){
        return Transaction::where('application_id', $this->application_id)->with('application.user')->orderBy('created_at', 'desc')->get();
    }



}