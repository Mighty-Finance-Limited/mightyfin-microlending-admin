<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use Livewire\Component;

class NewCustomer extends Component
{
    public function render()
    {
        return view('livewire.dashboard.borrowers.new-customer')->layout('layouts.admin');
    }
}
