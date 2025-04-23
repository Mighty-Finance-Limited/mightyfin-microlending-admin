<?php
namespace App\Http\Livewire\Dashboard\Loans;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\Exports\MissedRepaymentExport;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use Maatwebsite\Excel\Facades\Excel;

class MissedRepaymentsView extends Component
{
    use AuthorizesRequests, LoanTrait, SettingTrait;
    public $user_role, $permissions, $assigned_role, $mssd_repays;
    public $createModal = true;
    public $editModal = false;
    public $title = 'Missed Repayments';
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';

    public function render()
    {
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','desc')->get();
        $users = User::latest()->paginate(7);
        $this->loan_requests = $this->missed_repayments();

        return view('livewire.dashboard.loans.missed-repayments-view',[
            'users' => $users,
            'roles' => $roles
        ])->layout('layouts.admin');
    }

    public function exportMRLoans(){
        return Excel::download(new MissedRepaymentExport, 'Missed Repayment Loans.xlsx');
    }
}
