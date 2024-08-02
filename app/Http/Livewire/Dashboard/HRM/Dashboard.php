<?php

namespace App\Http\Livewire\Dashboard\HRM;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.h-r-m.dashboard')->layout('layouts.admin');
    }
}
