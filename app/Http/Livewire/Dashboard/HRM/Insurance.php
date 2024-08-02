<?php

namespace App\Http\Livewire\Dashboard\HRM;

use Livewire\Component;

class Insurance extends Component
{
    public function render()
    {
        return view('livewire.dashboard.h-r-m.insurance')->layout('layouts.admin');
    }
}
