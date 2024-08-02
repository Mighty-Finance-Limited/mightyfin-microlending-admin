<?php

namespace App\Classes\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class BorrowerExport implements FromView
{
    use Exportable;
    public function view(): View
    {
        return view('livewire.dashboard.borrowers.borrower-view', [
            'users' => User::role('user')->get()
        ]);
    }

}