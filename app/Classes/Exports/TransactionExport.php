<?php

namespace App\Classes\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionExport implements FromView
{
    public function view(): View
    {
        return view('livewire.dashboard.accounts.make-payment-view', [
            'transactions' => Transaction::with('application.user')->orderBy('created_at', 'desc')->get()
        ]);
    }

}