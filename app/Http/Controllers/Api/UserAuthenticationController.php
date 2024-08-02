<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\BTFAccount;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserAuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = new User([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Wallet::create([
            'email' => $user->email,
            'user_id' => $user->id
        ]);
        $user->save();
        $user->syncRoles('user');
        $mail = [
            'name' => $user->fname.' '.$user->lname,
            'to' => $user->email,
            'from' => 'admin@bridgetrustfinance.co.zm',
            'phone' => $user->phone,
            'subject' => 'Your Brigetrust Finance User Account',
            'message' => 'Hello '.$user->fname.' '.$user->lname.' Your Bridgetrust Finance account is now ready, Click on login to goto your dashboard. Your password is 20230101bridge.@2you  -  feel free to change your password.',
        ];
        $eMail = new BTFAccount($mail);
        Mail::to($user->email)->send($eMail);
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(Request $request){
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            $remember = true;
            if (Auth::attempt($credentials, $remember)) {
                // $request->session()->regenerate();
                $user = Auth::user();
                $rememberToken = $remember ? $user->getRememberToken() : null;
                return response()->json([
                    'message' => 'Successful.', 
                    'user' => $user, 
                    'remember_me_token' => $rememberToken
                ]);
            }else{
                return response()->json(['message' => 'The provided credentials do not match our records.']);
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
