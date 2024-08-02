<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\User;
use Livewire\Component;

class MyProfile extends Component
{
    public $data;
    public function render()
    {
        $this->data = User::where('id', auth()->user()->id)
        ->with('loans')->with('wallet')->with('blacklist')->get()->first();
        return view('livewire.dashboard.accounts.my-profile')
        ->layout('layouts.dashboard');
    }
}
