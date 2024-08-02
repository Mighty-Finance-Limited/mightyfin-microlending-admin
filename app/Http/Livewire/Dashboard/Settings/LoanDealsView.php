<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class LoanDealsView extends Component
{
    use AuthorizesRequests;
    public function render()
    {
        $this->authorize('view system settings');
        return view('livewire.dashboard.settings.loan-deals-view')
        ->layout('layouts.dashboard');
    }
    public function store(){

    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){
        
    }
}
