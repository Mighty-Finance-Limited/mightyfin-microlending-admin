<?php

namespace App\Http\Livewire\Dashboard\HRM;

use Livewire\Component;

class Payroll extends Component
{
    public function render()
    {
        return view('livewire.dashboard.h-r-m.payroll')->layout('layouts.admin');
    }
}
