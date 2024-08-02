<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use App\Models\Loan;
use App\Models\LoanInstallment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoanDetailExport implements FromCollection, WithHeadings
{
    public function collection()
    {

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

}