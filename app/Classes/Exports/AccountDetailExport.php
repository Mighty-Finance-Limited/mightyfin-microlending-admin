<?php

namespace App\Classes\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountDetailExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all();
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