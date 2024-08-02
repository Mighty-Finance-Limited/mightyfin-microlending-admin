<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\LoanRate;
use Livewire\Component;

class LoanRatesView extends Component
{
    public $value, $type, $rates, $due_date;

    public function render()
    {
        $this->rates = LoanRate::get();
        return view('livewire.dashboard.loans.loan-rates-view')
        ->layout('layouts.dashboard');
    }

    public function store(){
        $this->validate([
            'value' => 'required',
            'type' => 'required'
        ]);

        LoanRate::create([
            'value' => $this->value, 
            'for' => 'none', 
            'type' => $this->type
        ]);

        session()->flash('message', 'Loan rate created successfully.');

    }

    public function edit($id){

    }

    public function update($id){

    }
    

    public function destroy($id){
        LoanRate::find($id)->destroy();
        session()->flash('message', 'Loan rate removed successfully.');
    }
}
