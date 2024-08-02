<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OTPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.otp_verification');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request)
    {
        $user = User::where('id', $request->input('user_id'))->first();
        try {
            if ($user->opt_code == $request->input('otp')) {
                $user->update([
                    'opt_verified' => 1
                ]);
                return response()->json('true');
            } else {
                return response()->json('false');
            }
        } catch (\Throwable $th) {
            return response()->json('false');
        }
    }
}
