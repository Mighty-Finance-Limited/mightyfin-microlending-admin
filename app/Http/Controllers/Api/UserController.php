<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function updateProfile(Request $req){
        $input = $req->toArray();
        $user = User::where('id', $input['user_id'])->first();
        
        // if (isset($input['photo'])) {
        //     $user->updateProfilePhoto($input['photo']);
        // }
        
        if(isset($input['id_type']) && isset($input['basic_pay']) && isset($input['net_pay']) && isset($input['address']) && isset($input['phone']) && isset($input['occupation']) && isset($input['gender']) && isset($input['nrc_no']) && isset($input['dob'])){
            
            $loan = Application::where('status', 0)->where('complete', 0)
                        ->where('user_id', auth()->user()->id)->first();
                        
            if($loan !== null){
                if($loan->tpin_file !== 'no file' && $loan->payslip_file !== 'no file' && $loan->nrc_file !== null){
                    $loan->complete = 1;
                    $loan->save();
                }
            }
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);

        } else {
            try {
                $user->forceFill([
                    'fname' => $input['fname'],
                    'lname' => $input['lname'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'basic_pay' => $input['basic_pay'],
                    'net_pay' => $input['net_pay'],
                    'id_type' => $input['id_type'],
                    'nrc_no' => $input['nrc_no'],
                    'address' => $input['address'],
                    'occupation' => $input['occupation'],
                    'dob' => $input['dob'],
                    'gender' => $input['gender'],
                ])->save();

                return response()->json([
                    'message' => 'Successful updated your profile.', 
                    'user' => $user
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Failed updated your profile.', 
                    'user' => $user
                ]);
            }
        }
    }

    public function updatePassword(Request $req){

        try {
            $input = $req->toArray();
            $user = User::where('id', $input['user_id'])->first();
            Validator::make($input, [
                'current_password' => ['required', 'string']
                // 'password' => $this->passwordRules(),
            ])->after(function ($validator) use ($user, $input) {
                if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                    $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
                }
            })->validateWithBag('updatePassword');
    
            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();
            
            return response()->json([
                'message' => 'Successfully updated your profile.'
            ]);
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return response()->json([
                'validation_message' => $th->getMessage()
            ]);
        }
    }

    public function uploadFiles(Request $request){
        DB::beginTransaction();
        $input = $request->toArray();
        $i = User::where('id', $input['user_id'])->first();
        try {
            if($request->file('nrc_file') !== null){
                $nrc_file = $request->file('nrc_file')->store('nrc_file', 'public'); 
                $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();
                $user->nrc_file = $nrc_file;
                $user->save();      
            }
    
            if($request->file('tpin_file') !== null){               
                $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');   
                $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();
                $user->tpin_file = $tpin_file;
                $user->save();           
            }
    
            if($request->file('payslip_file') !== null){               
                $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');  
                $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();
                $user->payslip_file = $payslip_file;
                $user->save();        
            }

            if($i->id_type !== null && $i->net_pay !== null && $i->basic_pay !== null && $i->address !== null && $i->phone !== null && $i->occupation !== null && $i->gender !== null && $i->nrc_no !== null && $i->dob !== null){
                $loan = Application::where('status', 0)->where('complete', 0)
                            ->where('user_id', auth()->user()->id)->first();
                            
                if($loan !== null){
                    if($loan->tpin_file !== 'no file' && $loan->payslip_file !== 'no file' && $loan->nrc_file !== null){
                        // dd('here in loan');
                        $loan->complete = 1;
                        $loan->save();
                        DB::commit();    
                        return response()->json([
                            'message' => 'Successfully updated your profile.', 
                            'user' => $user
                        ]);
                    }
                }        
            }        
            return response()->json([
                'message' => 'Successfully updated your profile.', 
                'user' => $user
            ]);
        } catch (\Throwable $th) {
            DB::rollback();        
            return response()->json([
                'message' => 'Failed updated your profile.', 
                'user' => $user
            ]);
        }
    }
}
