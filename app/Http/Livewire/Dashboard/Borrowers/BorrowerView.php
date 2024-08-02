<?php

namespace App\Http\Livewire\Dashboard\Borrowers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Wallet;
use App\Classes\Exports\BorrowerExport;
use Livewire\WithFileUploads;
use Dompdf\Dompdf;

class BorrowerView extends Component
{
    use AuthorizesRequests;
    public $user_role, $permissions, $assigned_role;
    public $createModal = true;
    public $editModal = false;
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';
    public $userEdit;

    public function mount(){
        $this->userEdit = '';
    }
    public function render()
    {
        $this->authorize('view clientele');
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','DESC')->paginate(5);
        $users = User::role('user')->orderBy('created_at', 'desc')->paginate(7);
        return view('livewire.dashboard.borrowers.borrower-view',[
            'users' => $users,
            'roles' => $roles
        ])
        ->layout('layouts.admin');
    }

    public function borrowerExcelExport(){
        return Excel::download(new BorrowerExport, 'Customers.xlsx');
    }

    public function borrowerPDFExport(){
        return Excel::download(new BorrowerExport, 'Customers.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function store(){
        $this->authorize('create clientele');
        try {
            //For demo purposes only. When creating user or inviting a user
            // you should create a generated random password and email it to the user
            if($this->profile_photo_path != null){
                $image_path = $this->profile_photo_path->store('image_path', 'public');
            }

            $u = User::create([
                'name' => null,
                'fname' => $this->fname,
                'lname' => $this->lname,
                'phone' => $this->phone,
                'address' => $this->address,
                'occupation' => $this->occupation,
                'nrc' => $this->nrc,
                // 'dob',
                'gender' => $this->gender,
                // 'loan_status => ',
                'basic_pay' => $this->basic_pay,
                'email' => $this->email,
                'password' => bcrypt('peace2u'),
                'photo_profile_path' => $image_path ?? ''
            ]);

            $details = [
                'title' => 'Your account has been created successfully, please visit the site to login',
                'body' => 'Hi '.$u->fname.' '.$u->lname.' your current password is peace2u'
            ];

            $u->syncRoles($this->assigned_role);
            // Mail::to($this->email)->send(new SendUserInfoEmail($details));
            Session::flash('attention', "User created successfully.");
            return redirect()->route('borrowers')
                ->withSuccess(__('User created successfully.'));

        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->route('borrowers');
        }
    }

    public function editUser($id){
        // $this->clear();
        $this->userEdit = User::where('id',$id)->first();
        // dd($this->userEdit);
    }

    public function clear(){
        $this->userEdit = '';
    }

    public function destroy($id){
        $user = User::find($id); 
        if ($user) {
            try {
                $user->delete();
                Application::where('user_id','=',$id)->delete();
                Wallet::where('user_id','=',$id)->delete();
                Session::flash('deleted', "Borrower Deleted.");
            } catch (\Throwable $th) {
                Session::flash('error_msg', "Oops, something went wrong account can not be deleted.");
            }
        } else {
            return redirect()->route('borrowers');
        }
    }
}
