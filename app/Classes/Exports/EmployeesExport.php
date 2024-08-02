<?php
namespace App\Classes\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeesExport implements FromView
{
    public function view(): View
    {
        return view('livewire.dashboard.employees.employees-view', [
            'users' => $users = User::role('employee')->get()
        ]);
    }

}