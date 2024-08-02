<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\EmailTrait;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Mail\BTFAccount;
use App\Models\Wallet;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    use EmailTrait, UserTrait;
    // public function __construct()
    // {
    //     $this->middleware('can:admin.users.index')->only('index');
    //     $this->middleware('can:admin.users.edit')->only('edit', 'update');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function store(User $user, Request $request) 
    {
        DB::beginTransaction();
        try {     
            if ($request->file('image_path')) {
                $url = Storage::put('public/users', $request->file('image_path'));
            }
            
            $u = $user->create(array_merge($request->all(), [
                'password' => bcrypt('mighty.@2023@'),
                'active' => 1,
                'profile_photo_path' => $url ?? ''
            ]));
            
            $u->syncRoles($request->assigned_role);

            // Onyl users with Emails
            if($u->email != null){ 
                $mail = [
                    'name' => $u->fname.' '.$u->lname,
                    'to' => $u->email,
                    'from' => 'admin@mightyfinance.co.zm',
                    'phone' => $u->phone,
                    'subject' => 'Your Might Finance Account',
                    'message' => 'Hello '.$u->fname.' '.$u->lname.' Your Might Finance account is now ready, Click on login to goto your dashboard. Your password is mighty.@2023@  -  feel free to change your password.',
                ];
            }
            
            try {
                // Send Email to User with Email only about their New Account Created
                if($u->email != null){
                    $eMail = new BTFAccount($mail);
                    Mail::to($u->email)->send($eMail);
                }
                if($request->assigned_role == 'user'){
                    $url = '/apply-for-a-loan/ '.$u->id;
                    Wallet::create([
                        'user_id' => $u->id
                    ]);
                    // $link = new HtmlString('<a target="_blank" href="' . $url . '">Create a loan for '.$u->fname.' '.$u->lname.'</a>');
                    $msg = '<a target="_blank" href="'.$url.'">Apply for Loan on Behalf</a>';
                    Session::flash('success', "Borrower created successfully. ");
                    Session::flash('borrower_id', $u->id);
                }else{
                    Session::flash('success', "User created successfully.");
                }

                DB::commit();
                return back();
            } catch (\Throwable $th) {
                Session::flash('error', "Email not sent. Check your internet connection. You may contact '.$u->fname.' '.$u->lname,.' and provide them with their account login information. ");
                // DB::rollback();
                DB::commit();
                return back();
            }
        } catch (\Throwable $th) {
            DB::rollback();
            if($request->assigned_role == 'user'){
                Session::flash('error', 'Oops.. There is a borrower account already using this email.');
            }elseif($request->assigned_role == 'employee'){
                Session::flash('error', 'Oops. There is an employee account already with this email.');
            }else{
                Session::flash('error', 'Oops.. An with this email already exists. please try again.');
            }
            return back();
        }

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view ('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request) 
    {
        DB::beginTransaction();
        try {
            // Role::firstOrCreate(['name' => 'employee']);
            //For demo purposes only. When creating user or inviting a user
            // you should create a generated random password and email it to the user        
            if ($request->file('image_path')) {
                $url = Storage::put('public/users', $request->file('image_path'));
            }
            
            $user = User::find($request->user_edit_id);
            // dd($user);
            // $user->update(array_merge($request->all(), [
            //     'profile_photo_path' => $url ?? ''
            // ]));
            $data = array_merge($user->toArray(), $request->all(),[
                'profile_photo_path' => $url ?? ''
            ]);

            $user->fill($data);
            $user->save();
            $user->syncRoles($request->assigned_role);


            if($request->assigned_role == 'user'){
                $url = '/apply-for-a-loan/ '.$user->id;
                // $link = new HtmlString('<a target="_blank" href="' . $url . '">Create a loan for '.$u->fname.' '.$u->lname.'</a>');
                $msg = '<a target="_blank" href="'.$url.'">Apply for Loan on Behalf</a>';
                Session::flash('attention', "Borrower Updated successfully. ");
                Session::flash('borrower_id', $user->id);
            }else{
                Session::flash('attention', "User Updated successfully.");
            }
            DB::commit();
            return back();
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
            
            if($request->assigned_role == 'user'){
                Session::flash('error_msg', 'Oops.. There is a borrower account already using this email.');
            }elseif($request->assigned_role == 'employee'){
                Session::flash('error_msg', 'Oops. There is an employee account already with this email.');
            }else{
                Session::flash('error_msg', 'Oops.. An with this email already exists. please try again.');
            }
            return back();
        }

    }


    public function share_doc(Request $request){
        $email = $request->toArray()['email'];
        $res = $this->send_pre_approval_forms($email);
        if($res){
            return response()->json(['msg' => 'success']);
        }else{
            return response()->json(['msg' => 'error']);
        }
    }

    public function updatePic(Request $request)
    {
        
        try {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($request->hasFile('photo')) {
                // Process and save the file
                $url = Storage::put('public/users', $request->file('photo'));
    
                // Update user's profile_photo_path
                auth()->user()->update([
                    'profile_photo_path' => $url,
                ]);
    
                return redirect()->back()->with('success', 'Profile photo updated successfully.');
            } else {
                return redirect()->back()->with('error', 'No photo uploaded.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while updating the profile photo.');
        }
    }
    public function updateProfile(Request $request)
    {
        try {
            $input = $request->toArray();
            Validator::make($input, [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                // 'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->email)],
                'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
                'phone' => ['required'],
                'address' => ['required'],
                'occupation' => ['required'],
                'dob' => ['required'],
                'nrc_no' => ['required'],
                'id_type' => ['required'],
            ])->validateWithBag('updateProfileInformation');

            $user = auth()->user();
            $user->fname = $input['fname'];
            $user->lname = $input['lname'];
            $user->phone = $input['phone'];
            // $user->email = $input['email'];
            $user->address = $input['address'];
            $user->occupation = $input['occupation'];
            $user->id_type = $input['id_type'];
            $user->nrc_no = $input['nrc_no'];
            $user->nrc = $input['nrc_no'];
            $user->dob = $input['dob'];
            $user->gender = $input['gender'];
            $user->save();

            $this->isKYCComplete();



            return redirect()->back()->with('success', 'Profile photo updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while updating the profile photo. '.$th->getMessage());
        }
    }
}
