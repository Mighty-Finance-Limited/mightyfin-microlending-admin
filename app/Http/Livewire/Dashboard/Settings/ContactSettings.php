<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\ContactSetting;
use Livewire\Component;

class ContactSettings extends Component
{
    use AuthorizesRequests;
    public $name, $slogan, $phone1, $phone2, $phone3, $address, $email, $email2, $city, $state, $province, $business_type, $legal_structure, $contacts;
    public $start_time, $stop_time, $start_day, $stop_day;
    public $facebook, $instagram, $linkedin, $twitter;
    
    // protected $rules = [
    //     'name' => 'required|min:3',
    //     'email1' => 'required|email',
    //     'email2' => 'required|email',
    //     'phone1' => 'required|min:13',
    //     'phone2' => 'required|min:13',
    //     'phone3' => 'required|min:13',
    //     'slogan' => 'required',
    //     'address' => 'required',
    //     'state' => 'required',
    //     'city' => 'required',
    //     'business_type' => 'required',
    //     'legal_structure' => 'required',
    // ];

    public function render()
    {
        $this->authorize('view system settings');
        $this->contacts = ContactSetting::first();
        if($this->contacts != null){
            $this->name = $this->contacts->name; 
            $this->slogan = $this->contacts->slogan; 
            $this->phone1 = $this->contacts->phone1; 
            $this->phone2 = $this->contacts->phone2; 
            $this->phone3 = $this->contacts->phone3; 
            $this->address = $this->contacts->address; 
            $this->email= $this->contacts->email; 
            $this->email2 = $this->contacts->email2; 
            $this->city = $this->contacts->city; 
            $this->start_time = $this->contacts->start_time; 
            $this->stop_time = $this->contacts->stop_time; 
            $this->start_day = $this->contacts->start_day; 
            $this->stop_day = $this->contacts->stop_day; 
            $this->state = $this->contacts->state;
            $this->business_type = $this->contacts->business_type;
            $this->legal_structure = $this->contacts->legal_structure;
            $this->facebook = $this->contacts->facebook;
            $this->instagram = $this->contacts->instagram;
            $this->twitter = $this->contacts->twitter;
            $this->linkedin = $this->contacts->linkedin;
        }
        return view('livewire.dashboard.settings.contact-settings')
        ->layout('layouts.dashboard');
    }
    
    public function saveContacts(){
        
        try {
            if($this->contacts == null){
                ContactSetting::create([
                    'name' => $this->name, 
                    'slogan' => $this->slogan, 
                    'phone1' => $this->phone1, 
                    'phone2'=> $this->phone2, 
                    'phone3'=> $this->phone3, 
                    'address' => $this->address, 
                    'email1'=> $this->email, 
                    'email2' => $this->email2, 
                    'city' => $this->city, 
                    'start_time' => $this->start_time, 
                    'stop_time' => $this->stop_time, 
                    'start_day' => $this->start_day, 
                    'stop_day' => $this->stop_day, 
                    'province'=> $this->state,
                    'business_type'=> $this->business_type,
                    'legal_structure'=> $this->legal_structure,
                    'facebook'=> $this->facebook,
                    'instagram'=> $this->instagram,
                    'twitter'=> $this->twitter,
                    'linkedin'=> $this->linkedin
                ]);
                session()->flash('success', 'Contact details set successfully.');
            }else{
                $this->contacts->delete();
                ContactSetting::create([
                    'name' => $this->name, 
                    'slogan' => $this->slogan, 
                    'phone1' => $this->phone1, 
                    'phone2'=> $this->phone2, 
                    'phone3'=> $this->phone3, 
                    'address' => $this->address, 
                    'email1'=> $this->email, 
                    'email2' => $this->email2, 
                    'city' => $this->city, 
                    'start_time' => $this->start_time, 
                    'stop_time' => $this->stop_time, 
                    'start_day' => $this->start_day, 
                    'stop_day' => $this->stop_day, 
                    'province'=> $this->state,
                    'business_type'=> $this->business_type,
                    'legal_structure'=> $this->legal_structure,
                    'facebook'=> $this->facebook,
                    'instagram'=> $this->instagram,
                    'twitter'=> $this->twitter,
                    'linkedin'=> $this->linkedin
                ]);
                session()->flash('success', 'Contact details Updated successfully.');
            }
        } catch (\Throwable $th) {
            session()->flash('eroor', 'Contact details failed to update.');
        }

    }
}
