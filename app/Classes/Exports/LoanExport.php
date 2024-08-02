<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class LoanExport implements FromCollection, WithHeadings
{
    public $status, $type;

    public function __construct(array $status, array $type)
    {
        $this->status = $status;
        $this->status = $type;
    }

    public function collection()
    {
        if(!empty($this->status) && !empty($this->type)){
            return Application::whereIn('status', $this->status)
            ->whereIn('type', $this->type)
            ->get(['id','fname', 'lname', 'email', 'phone', 'gender', 'type', 'amount', 'interest','payback_amount', 'due_date', 'repayment_plan', 'status', 'created_at']);
        
        }elseif(!empty($this->status)){
            return Application::whereIn('status', $this->status)
            ->get(['id','fname', 'lname', 'email', 'phone', 'gender', 'type', 'amount', 'interest','payback_amount', 'due_date', 'repayment_plan', 'status', 'created_at']);

        }elseif(!empty($this->type)){
            return Application::whereIn('type', $this->type)
            ->get(['id','fname', 'lname', 'email', 'phone', 'gender', 'type', 'amount', 'interest','payback_amount', 'due_date', 'repayment_plan', 'status', 'created_at']);

        }else{
            return Application::get(['id', 'fname', 'lname', 'email', 'phone', 'gender', 'type', 'amount', 'interest', 'payback_amount', 'due_date', 'repayment_plan', 'status', 'created_at']);
        }
    }

    public function headings(): array
    {
        return [
            'ID#',
            'Fname',
            'Lname',
            'Email',
            'Phone',
            'Gender',
            'Type',
            'Amount',
            'Interest',
            'payback_amount',
            'due_date',
            'Status',
            'Created at'
        ];
    }

    
}