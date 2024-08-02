<?php

namespace App\Actions\Fortify;

use App\Models\Application;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'phone' => ['required'],
            'address' => ['required'],
            'occupation' => ['required'],
            'dob' => ['required'],
            'gender' => ['required'],
            'nrc_no' => ['required'],
            'net_pay' => ['required'],
            'id_type' => ['required']
            // 'basic_pay' => ['required']
        ])->validateWithBag('updateProfileInformation');

        
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        
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

                return redirect()->to('/user/profile');
            } catch (\Throwable $th) {
                dd($th);
            }
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'email' => $input['email'],
            'basic_pay' => $input['basic_pay'],
            'net_pay' => $input['net_pay'],
            'id_type' => $input['id_type'],
            'nrc_no' => $input['nrc_no'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'occupation' => $input['occupation'],
            'dob' => $input['dob'],
            'gender' => $input['gender'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}