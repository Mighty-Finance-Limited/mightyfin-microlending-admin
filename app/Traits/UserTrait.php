<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\BankDetails;
use App\Models\NextOfKing;
use App\Models\References;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use SamuelMwangiW\Africastalking\Facades\Africastalking;

trait UserTrait{

    public function registerUser($input){
        $password = 'mighty4you';

        if($input['email'] !== null){
            $check = User::where('email', $input['email'])->exists();

            if(!$check){
                try {
                    $user = User::create([
                        'fname' => $input['fname'],
                        'lname' => $input['lname'],
                        'mname' => $input['mname'],
                        'phone' => $input['phone'],
                        'email' => $input['email'],
                        'password' => Hash::make($password),
                        'terms' => 'accepted'
                    ]);
                    $user->assignRole('user');
            
                    // Get my applications
                    Wallet::create([
                        'email' => $user->email ?? '',
                        'user_id' => $user->id
                    ]);
                    return $user;
                } catch (\Throwable $th) {
                    return 0;
                }
            }else{
                // User already exists
                return User::where('email', $input['email'])->first();
            }


        }else{
            try {
                $user = User::create([
                    'fname' => $input['fname'],
                    'mname' => $input['mname'],
                    'phone2' => $input['phone2'],
                    'lname' => $input['lname'],
                    'password' => Hash::make($password),
                    'terms' => 'accepted'
                ]);
                $user->assignRole('user');
        
                // Get my applications
                Wallet::create([
                    'email' => $user->email ?? '',
                    'user_id' => $user->id
                ]);
                return $user;
            } catch (\Throwable $th) {
                return 0;
            }
        }

        
    }

    public function isKYCComplete(){
        $loan = Application::where('status', 0)
        ->where('complete', 0)
        ->where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
        $user = User::where('id', auth()->user()->id)->with('uploads')->get()->toArray(); 
        if($loan->first() !== null && !empty($user)){
            if(!empty($user[0]['phone']) && !empty($user[0]['nrc_no']) && !empty($user[0]['dob'])){
                $files = collect($user[0]['uploads']);
                if(
                    $files->contains('name', 'nrc_file') &&
                    $files->contains('name', 'tpin_file')
                ){
                    $a = Application::where('status', 0)
                    ->where('complete', 0)
                    ->where('user_id',auth()->user()->id)
                    ->update(['complete' => 1]);
                    
                    ApplicationStage::where('application_id', $a->id)->update([
                        'position' => 1
                    ]);
                }
            }
        }
    }
    public function isUserKYCComplete($id){
        $loan = Application::where('status', 0)
        ->where('complete', 0)
        ->where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        $user = User::where('id', $id)->with('uploads')->get()->toArray(); 
        if($loan->first() !== null && !empty($user)){
            if(!empty($user['phone']) && !empty($user['nrc_no']) && !empty($user['dob'])){
                if(
                    isset($user[0]['uploads'][0]) &&
                    isset($user[0]['uploads'][1]) &&
                    isset($user[0]['uploads'][2]) &&
                    isset($user[0]['uploads'][3]) &&
                    isset($user[0]['uploads'][4]) 
                ){
                    $loan->complete = 1;
                    $loan->save();

                    ApplicationStage::where('application_id', $loan->id)->update([
                        'position' => 1
                    ]);
                }
            }
        }
    }

    public function createNOK($data){
        NextOfKing::create([
            'email' => $data['nok_email'],
            'fname' => $data['nok_fname'],
            'lname' => $data['nok_lname'],
            'phone' => $data['nok_phone'],
            'relation' => $data['nok_relation'],
            'address' => $data['nok_address'],
            'gender' => $data['nok_gender'],
            'user_id' => $data['user_id']
        ]);
        return true;
    }

    public function updateNOK($data){
        NextOfKing::where('user_id', '=', $data['user_id'])->delete();
        NextOfKing::create([
            'email' => $data['nok_email'],
            'fname' => $data['nok_fname'],
            'lname' => $data['nok_lname'],
            'phone' => $data['nok_phone'],
            'address' => $data['nok_relation'],
            'gender' => $data['nok_gender'],
            'user_id' => $data['user_id']
        ]);
        return true;
    }

    public function updateUser($data){
        $user = User::where('id', $data['borrower_id'])->first();
        $user->dob = $data['dob'];
        $user->nrc_no = $data['nrc_no'];
        $user->phone = $data['phone'];
        $user->gender = $data['gender'];
        $user->id_type = $data['id_type'];
        $user->employeeNo = $data['employeeNo'];
        $user->jobTitle = $data['jobTitle'];
        $user->ministry = $data['ministry'];
        $user->department = $data['department'];
        $user->save();
    }
    public function createRefs($data){
        References::create($data);
        return true;
    }
    public function createBankDetails($data){
        BankDetails::create($data);
        return true;
    }

    public function VerifyOTP(){
        try {
            if(auth()->user()->opt_verified == 0){
                // Generate otp code
                $code = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
    
                // Save into the database
                User::where('id', auth()->user()->id)->update([
                    'opt_code' => $code
                ]);
    
                // Send SMS 
                $data = [
                    'message'=>$code.' is your OTP verification code',
                    'phone'=> '26'.auth()->user()->phone,
                ];
    
                $this->send_with_server($data);
                
                // Then redirect the user to go and verify
                return redirect()->route('otp');
            }else{
                return true;
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function send_with_server($data) {
        $message = $data['message'];
        $username = 'gtzm-mightyfin';
        $password = 'Mighty@2';
    
        $type = '0';
        $dlr = '1';
        $destination = $data['phone'];
        $source = 'Mightyfin';
    
        // API endpoint
        $apiEndpoint = "http://rslr.connectbind.com:8080/bulksms/bulksms";
    
        // Build the query parameters
        $queryParams = http_build_query([
            'username' => $username,
            'password' => $password,
            'type' => $type,
            'dlr' => $dlr,
            'destination' => $destination,
            'source' => $source,
            'message' => $message,
        ]);
    
        // Full API URL with query parameters
        $apiUrl = "{$apiEndpoint}?{$queryParams}";
    
        // Initialize cURL session
        $ch = curl_init();
    
        // Set cURL options for GET request
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // Execute cURL session and get the response
        $response = curl_exec($ch);
    
        // Check for cURL errors
        if (curl_errno($ch)) {
            // Handle cURL error
            echo 'Curl error: ' . curl_error($ch);
        }
    
        // Close cURL session
        curl_close($ch);
    
        // Return the API response
        return $response;
    }
}

