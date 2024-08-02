<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Application;
use Livewire\Component;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Wallet;
use Livewire\WithFileUploads;

class UserView extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public $user_role, $permissions, $assigned_role;
    public $createModal = true;
    public $editModal = false;
    public $name, $fname, $lname, $phone, $address, $occupation, $nrc, $dob, $profile_photo_path, $gender, $loan_status, $basic_pay, $email;
    public $hold = '';
    public $style = '';

    public function render()
    {
        $this->authorize('view system settings');
        $this->user_role = Role::pluck('name')->toArray();
        $this->permissions = Permission::get();
        $roles = Role::orderBy('id','DESC')->paginate(5);
        $users = User::latest()->paginate(7);
        return view('livewire.dashboard.settings.user-view',[
            'users' => $users,
            'roles' => $roles
        ])
        ->layout('layouts.admin');
    }

    public function store(){
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
            // Session::flash('attention', "User created successfully.");
            return redirect()->route('users.index')
                ->withSuccess(__('User created successfully.'));

        } catch (\Throwable $th) {
            dd($th);
            // Session::flash('attention', "User created successfully.");
            // Session::flash('error_msg', "Looks like the email was not sent.");
            // return redirect()->route('users.index');
        }
    }

    public function show(User $user){

    }

    public function edit(User $user){
        // return View::make('page.user.user-edit', [
        //     'user' => $user,
        //     'userRole' => $user->roles->pluck('name')->toArray(),
        //     'roles' => Role::latest()->get()
        // ]);
    }

    public function update(User $user, Request $request){
        // try {
        //     $user->update($request->toArray());
        //     if($request->file('image_path') != null){
        //         $image_path = $request->file('image_path')->store('image_path', 'public');
        //         $user->update([
        //             'image_path' => $image_path
        //         ]);
        //     }

        //     if( Auth::user()->type == 'admin' || $user->hasRole('admin')){
        //         $user->syncRoles($request->get('role'));
        //         Session::flash('attention', "User details updated successfully");
        //         return redirect()->route('users.index');
        //     }
        //     Session::flash('attention', "Profile updated successfully");
        //     return redirect()->route('profile');
        // } catch (\Throwable $th) {
        //     Session::flash('error_msg', $th);
        //     return redirect()->route('profile');
        // }
    }

    public function destory($id){
        $user = User::find($id); 
        if ($user) {
            try {
                $user->delete();
                Application::where('user_id','=',$id)->delete();
                Wallet::where('user_id','=',$id)->delete();
                return redirect()->route('users');
            } catch (\Throwable $th) {
                Session::flash('error_msg', "Oops, something went wrong account can not be deleted.");
            }
        } else {
            return redirect()->route('users');
        }
    }

    // --------------- togggles
}
