<?php

namespace App\Http\Livewire\Dashboard\HRM;

use Livewire\Component;

class Staff extends Component
{
    public function render()
    {
        return view('livewire.dashboard.h-r-m.staff')->layout('layouts.admin');
    }
}
