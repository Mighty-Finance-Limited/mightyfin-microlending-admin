<?php

namespace App\Actions\Fortify;

use App\Models\Application;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
            Validator::make($input, [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                // 'gender' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => $this->passwordRules(),
                // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ])->validate();


            try {
                $user = User::create([
                    'fname' => $input['fname'],
                    'lname' => $input['lname'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'password' => Hash::make($input['password']),
                ]);
                $user->assignRole('user');
        
                // // Get my applications & wallet
                // Application::where('email', $input['email'])
                //                 ->update(['user_id' => $user->id]);

                Wallet::create([
                    'email' => $user->email,
                    'user_id' => $user->id,
                    'phone' => $input['phone']
                ]);
                return $user;
            } catch (\Throwable $th) {
                dd($th->getMessage());
            }
    }
}
