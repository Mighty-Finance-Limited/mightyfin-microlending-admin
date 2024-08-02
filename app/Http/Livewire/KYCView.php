<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KYCView extends Component
{
    public function render()
    {
        return view('livewire.k-y-c-view')
        ->layout('layouts.dashboard');
    }
}
