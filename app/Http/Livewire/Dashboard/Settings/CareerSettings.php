<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\CareerSetting;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CareerSettings extends Component
{
    use AuthorizesRequests;
    public $dept, $job_role, $location, $last_date, $desc, $careers;
    public function render()
    {
        $this->authorize('view system settings');
        $this->careers = CareerSetting::get();
        return view('livewire.dashboard.settings.career-settings')
        ->layout('layouts.dashboard');
    }

    public function store(){
        // $this->validate([
        //     'dept' => 'required',
        //     'job_role' => 'required',
        //     'location' => 'required',
        //     'last_date' => 'required'
        // ]);
        try {
            CareerSetting::create([
                'dept' => $this->dept, 
                'job_role' => $this->job_role, 
                'location' => $this->location, 
                'last_date' => $this->last_date, 
                'desc' => $this->desc ?? $this->job_role
            ]);
            Session::flash('success', "Career Created Successfully.");
        } catch (\Throwable $th) {
            Session::flash('success', "Action Failed.");
        }
    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){
        $career = CareerSetting::find($id); 
        if ($career) {
            try {
                $career->delete();
                Session::flash('success', "Career Deleted.");
            } catch (\Throwable $th) {            
                Session::flash('error', "Action Failed.");
            }
        } else {
            return redirect()->back();
        }
    }
}
