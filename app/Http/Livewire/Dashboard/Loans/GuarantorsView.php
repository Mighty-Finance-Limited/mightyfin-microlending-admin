<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\Exports\GuarantorExport;
use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\References;
use Maatwebsite\Excel\Facades\Excel;

class GuarantorsView extends Component
{
    use AuthorizesRequests;
    public $user_role, $permissions, $assigned_role;
    public $createModal = true;
    public $editModal = false;
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';

    public function render()
    {
        // $this->authorize('view loan relatives');
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','DESC')->paginate(5);

        $references = References::get();
        return view('livewire.dashboard.loans.guarantors-view',[
            'references' => $references,
            'roles' => $roles
        ])->layout('layouts.admin');
    }
    public function exportGuarantors(){
        return Excel::download(new GuarantorExport, 'Guarantors.xlsx');
    }
}