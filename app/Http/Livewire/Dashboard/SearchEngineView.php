<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class SearchEngineView extends Component
{
    public $results;
    public function mount(){
        $key = $_GET['key'];
        $this->results = User::where('id', $key)
        ->orWhere('fname', $key)
        ->orWhere('lname', $key)
        ->orWhere('email', $key)
        ->orWhere('nrc', $key)
        ->with('loans')
        ->with('wallet')
        ->with('blacklist')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.search-engine-view')
        ->layout('layouts.dashboard');
    }
}
