<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class PaymentPage extends Component
{
    public function render()
    {
        return view('livewire.dashboard.payment-page')
        ->layout('layouts.dashboard');
    }
}
