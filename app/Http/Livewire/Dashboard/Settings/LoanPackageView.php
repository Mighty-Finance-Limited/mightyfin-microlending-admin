<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\LoanTrait;
use Livewire\Component;

class LoanPackageView extends Component
{
    use AuthorizesRequests, LoanTrait;
    public $packages, $name, $type, $desc, $image, $image2, $phone_num;
    public function render()
    {
        $this->authorize('view system settings');
        $this->packages = $this->getLoanPackages();
        return view('livewire.dashboard.settings.loan-package-view')
        ->layout('layouts.dashboard');
    }

    public function store(){
        try {
            // Upload images first
            $data = [
                'added_by' => auth()->user()->id,
                'name' => $this->name,
                'type' => $this->type,
                'description' => $this->desc,
                'image' => $this->image,
                'image2' => $this->image2,
                'phone_num' => $this->phone_num
            ];
            $this->createLoanPack($data);
            session()->flash('success', 'Successfully created '.$this->name.'Loan');
            $this->clear();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function clear(){
        $this->name = '';
        $this->type = '';
        $this->desc = '';
        $this->image = '';
        $this->image2 = '';
        $this->phone_num = '';
    }

    public function destroy($id){
        try {
            $this->removeLoanPackage($id);
            session()->flash('warning', 'Successfully Deleted Loan Package!');
        } catch (\Throwable $th) {
            session()->flash('error', $th);
        }
    }
}
