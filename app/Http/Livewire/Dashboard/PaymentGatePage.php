<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class PaymentGatePage extends Component
{
    public function render()
    {
        return view('livewire.dashboard.payment-gate-page')
        ->layout('layouts.dashboard');
    }
}
