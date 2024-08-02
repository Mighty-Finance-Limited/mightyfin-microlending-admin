<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class ClientProfileView extends Component
{
    public function render()
    {
        
        return view('livewire.dashboard.loans.client-profile-view')->layout('layouts.admin');
    }
}
