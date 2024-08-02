<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\User;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use App\Traits\EmailTrait;
use App\Traits\FileTrait;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use App\Traits\UserTrait;
use App\Traits\WalletTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoanApplicationController extends Controller
{     
    use EmailTrait, LoanTrait, UserTrait, WalletTrait, FileTrait, SettingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function alreadyLoaned($id){
        $check = Application::where('status', 0)->where('complete', 0)
        ->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('livewire.already-have-loan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLoan(Request $req)
    {
        $email = $req->toArray()['email']; 
        $application = User::where('email', $email)->get()->toArray();  
        // $application = Application::where('email', $email)
        //                             ->where('status', 0)
        //                             ->where('can_change', 0)->get()->first();             
        if(!empty($application)){
            $data = 1;
            return response()->json($data, 200);
        }else{
            $data = 0;
            return response()->json($data, 200);
        }
    }

    public function updateExistingLoan(Request $req)
    {
        $email = $req->toArray()['email']; 
        try{
            Application::where('email', $email)->update(['can_change' => 1]);
            $data = 1;
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data = 0;
            return response()->json($data, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $form = $request->toArray();
            // Create the new user account or Not if exists
            $register = [
                'lname'=> $form['lname'],
                'fname'=> $form['name'],
                'mname'=> $form['mname'],
                'phone2'=> $form['phone2'],
                'email'=> $form['email'] ?? '',
                'password' => 'mighty4you',
                'terms' => 'accepted'
            ];
            $user = $this->registerUser($register);
            
            // If the user data exists 
            if($user !== 0){
                $data = [
                    'lname'=> $form['lname'],
                    'fname'=> $form['name'],
                    'email'=> $form['email'],
                    'amount'=> $form['amount'],
                    'phone'=> $form['phone'],
                    'loan_product_id'=> $form['loan_type'],
                    'repayment_plan'=> $form['repayment_plan'],
                    'user_id' =>  $user->id,
                    'complete' => 0
                ];
                
                // Apply for the loan
                $res = $this->apply_loan($data);
                
                if($res == 'exists'){
                    $loan = Application::where('status', 0)->where('complete', 0)->where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
                    return response()->json([
                        "status" => 500, 
                        "success" => false, 
                        "message" => "Already have a Loan.",
                        'fname' => $form['name'],
                        'lname' => $form['lname'],
                        "loan_id" => $loan->id,
                        "amount" => $loan->amount
                    ]); 
                }else{
                    
                    $mail = [
                        'user_id' => $user->id,
                        'name' => $form['name'].' '.$form['lname'],
                        'loan_type' => $form['type'].' '.$form['package_personal'],
                        'phone' => $form['phone'],
                        'duration' => $form['repayment_plan'],
                        'amount' => $form['amount'],
                        'type' => 'loan-application',
                        'msg' => 'You have new a '.$form['type'].' loan application request, with an incomplete loan submission form and kyc update'
                    ];  
            
                    // Send information to the admin
                    $this->send_loan_email($mail);
                    
                    DB::commit();
                    return response()->json([
                        "status" => 200, 
                        "success" => true, 
                        'amount' => $form['amount'],
                        'fname' => $form['name'],
                        'lname' => $form['lname'],
                        "message" => "Your loan has been sent."
                    ]); 
                }
        
            }else{
                
                DB::rollback();
                dd('failed');
                return response()->json([
                    "status" => 500, 
                    "success" => false, 
                    'amount' => $form['amount'],
                    'fname' => $form['name'],
                    'lname' => $form['lname'],
                    "message" => "Failed to submit your loan request, please try again."
                ]); 
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updateFiles(Request $request)
    {
        // DB::beginTransaction();  
        try {
            $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();

            if($request->file('nrc_file') !== null){
                $nrc_file = $request->file('nrc_file')->store('nrc_file', 'public'); 
                $user->nrc_file = $nrc_file;
                $user->save();      
            }
    
            if($request->file('tpin_file') !== null){               
                $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');   
                $user->tpin_file = $tpin_file;
                $user->save();           
            }
    
            if($request->file('payslip_file') !== null){               
                $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');  
                $user->payslip_file = $payslip_file;
                $user->save();        
            }

            $this->isKYCComplete();
            
            // DB::commit();
            return redirect()->to('/user/profile');
        } catch (\Throwable $th) {
            dd($th);
            // DB::rollback();
            return redirect()->to('/user/profile');
        }

    }

    public function updateKYCFiles(Request $request){
        try {
            // First Upload the files
            $this->uploadCommonFiles($request);

            // Personal Info
            $input = $request->toArray();
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
            return redirect()->route('dashboard')->with('success', 'KYC Updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with('success', 'KYC Update failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new_loan(Request $request)
    {
        $form = $request->toArray();
        // Remove non-numeric characters
        $amount = intval(str_replace(['K', ',', '$', "'", '"', ' '], '', $form['amount']));
        
        DB::beginTransaction();
        try {
            
            // First Upload the files
            $this->uploadCommonFiles($request);
    
            $data = [
                'user_id'=> auth()->user()->id,
                'lname'=> auth()->user()->lname,
                'fname'=> auth()->user()->fname,
                'email'=>  auth()->user()->email,
                'amount'=> $amount,
                'gender'=> auth()->user()->gender,
                'type'=> $form['loan_type'],
                'repayment_plan'=> $form['duration'],
                'personal_loan_type'=> $form['loan_type'],
                'status' => 0,
                'continue' => 1
            ];
            $application = $this->apply_loan($data);
            $this->isKYCComplete();
            $mail = [
                'user_id' => auth()->user()->id,
                'application_id' => $application,
                'name' => $data['fname'].' '.$data['lname'],
                'loan_type' => $data['type'],
                'duration' => $data['repayment_plan'],
                'amount' => $data['amount'],
                'type' => 'loan-application',
                'msg' => 'You have new a '.$data['type'].' loan application request, with an incomplete loan submission form and kyc update'
            ];
            $process = $this->send_loan_email($mail);
            
            if($request->wantsJson()){
                return response()->json([
                    "status" => 200, 
                    "success" => true, 
                    "message" => "Your loan has been sent.", 
                    "data" => $application
                ]);
            }else{
                if($process){
                    DB::commit();
                    Session::flash('success', "Loan created successfully. ");
                    return redirect()->route('view-loan-requests');
                }else{
                    DB::commit();
                    Session::flash('success', "Loan created successfully, Email could not be sent to the Borrower. ");
                    return redirect()->route('view-loan-requests');
                }
            }  
        } catch (\Throwable $th) {
            DB::rollback();
            Session::flash('error', "Loan could not be created, check your internet connection and try again. ");
            return redirect()->back();
        }     
    }


    public function new_proxy_loan(Request $request)
    {
        // DB::beginTransaction();
        try {
            $form = $request->toArray();
            // dd($form);
            // First Upload the files
            $this->uploadCommonFiles($request);
            $user = User::where('id', $form['borrower_id'])->first();
            
            // Collect the loan application data
            $data = [
                'user_id'=> $form['borrower_id'],
                'lname'=> $user->lname,
                'fname'=> $user->fname,
                'email'=> $user->email ?? '',
                'amount'=> $form['amount'],
                'phone'=> $user->phone,
                'gender'=> $user->gender,
                'loan_product_id'=> $form['loan_product_id'],
                'repayment_plan'=> $form['repayment_plan'],
                'processed_by'=> auth()->user()->id
            ];
            
            $nok = [
                'nok_email' => $form['nok_email'],
                'nok_fname' => $form['nok_fname'],
                'nok_lname' => $form['nok_lname'],
                'nok_phone' => $form['nok_phone'],
                'nok_relation' => $form['nok_relation'],
                'nok_gender' => $form['nok_gender'],
                'user_id' => $form['borrower_id']
            ];
            $this->createNOK($nok);
                
            // Create a loan request application and send email to borrower
            $application = $this->apply_loan($data);

            // Send Email to Admin about this new loan
            $mail = [
                'user_id' => '',
                'application_id' => $application,
                'name' => $user->fname.' '.$user->lname,
                'loan_type' => $form['type'],
                'phone' => $user->phone,
                'duration' => $form['repayment_plan'],
                'amount' => $form['amount'],
                'type' => 'loan-application',
                'msg' => 'You have new a '.$form['type'].' loan application request from '.$user->fname.' '.$user->lname.', please visit the site to view more details'
            ];
    
            // Email going to the Administrator
            $process = $this->send_loan_email($mail);
    
            if($request->wantsJson()){
                return response()->json([
                    "status" => 200, 
                    "success" => true, 
                    "message" => "Your loan has been sent.", 
                    "data" => $application
                ]);
            }else{
                if($process){
                    DB::commit();
                    return redirect()->route('view-loan-requests');
                }else{
                    DB::commit();
                    return redirect()->back();
                }
            } 
            // DB::commit();
        } catch (\Throwable $th) {
            dd($th);
            // DB::rollback();
            // return redirect()->back();
        }      
    }

    public function updateLoanDetails(Request $request)
    {
        DB::beginTransaction();
        try {
            $form = $request->toArray();
            // Update files
            $this->uploadCommonFiles($request);
            $user = User::where('id', $form['borrower_id'])->first();
            
            $data = [
                'user_id'=> $form['borrower_id'],
                'lname'=> $user->lname,
                'fname'=> $user->fname,
                'email'=> $user->email ?? '',
                'amount'=> $form['amount'],
                'phone'=> $user->phone,
                'gender'=> $user->gender,
                'loan_product_id'=> $form['loan_product_id'],
                'repayment_plan'=> $form['repayment_plan'],

                // 'glname'=> $form['glname'],
                // 'gfname'=> $form['gfname'],
                // 'gemail'=> $form['gemail'],
                // 'gphone'=> $form['gphone'],
                // 'g_gender'=> $form['g_gender'],
                // 'g_relation'=> $form['g_relation'],
    
                // 'g2lname'=> $form['g2lname'],
                // 'g2fname'=> $form['g2fname'],
                // 'g2email'=> $form['g2email'],
                // 'g2phone'=> $form['g2phone'],
                // 'g2_gender'=> $form['g2_gender'],
                // 'g2_relation'=> $form['g2_relation'],

                // 'doa' => $form['doa'] ?? $loan_req->doa,

                // 'tpin_file' => $form['tpin_file'] ?? $tpin_file,
                // 'payslip_file' => $form['payslip_file'] ?? $payslip_file,
                // 'nrc_file' => $form['nrc_file'] ?? $nrc_file,
                // 'complete' => $form['complete'],
                'processed_by'=> auth()->user()->id
            ];
            
            $this->apply_update_loan($data, $form['loan_id']);
            // if($form['loan_status'] == 1){
            //     // Update borrower wallet
            //     $this->updateUserWallet($form['borrower_id'], $form['amount'], $form['old_amount']);
                
            //     // Delete Withdrawal requests
            //     WithdrawRequest::where('user_id', '=', $form['borrower_id'])->delete();

            //     // Update due date
            //     if($form['new_due_date'] !== null){
            //         $this->remake_loan($form['loan_id'], $form['new_due_date']);
            //     }
            // }
    
            // Email going to the Administrator
            // $process = $this->send_loan_email($mail);
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
            return redirect()->back();
        }      
    }
    public function continue_loan(Request $request){
        try {
            $data = $request->toArray();
           
            // First Upload the files
            $this->uploadCommonFiles($request);

            // Data Segmentation
            if(isset($data['dob'])){
                $personal = [
                    'dob' => $data['dob'],
                    'nrc_no' => $data['nrc'],
                    'id_type' => $data['nrc_id'],
                    'phone' => $data['phone'],
                    'employeeNo' => $data['employeeNo'],
                    'jobTitle' => $data['jobTitle'],
                    'ministry' => $data['ministry'],
                    'department' => $data['department'],
                    'borrower_id' => $data['borrower_id'],
                    'gender'=> $data['gender']
                ];
                $this->updateUser($personal);
            }

            if (isset($data['nextOfKinFirstName'])) {
                $nok = [
                    'nok_fname' => $data['nextOfKinFirstName'],
                    'nok_lname' => $data['nextOfKinLastName'],
                    'nok_phone' => $data['nextOfKinPhone'],
                    'nok_relation' => $data['relationship'],
                    'nok_address' => $data['physicalAddress'],
                    'user_id' => $data['borrower_id']
                ];
                $this->createNOK($nok);
            }
            // $guarants = [
            //     'gfname'=> $data['guarantorName'],
            //     'gnrc_no'=> $data['guarantorNRC'],
            //     'gdob'=> $data['guarantorDOB'],
            //     'gphone'=> $data['guarantorContactNumber'],
            //     'gphone2'=> $data['alternativeNumber'],
            //     'gphonesp3'=> $data['spouseContactNumber'],
            //     'gaddress'=> $data['guarantorAddress'],
            //     'g_relation'=> $data['relationshipToBorrower'],
            //     'application_id' => $data['application_id']
            // ];
            if (isset($data['hrFirstName'])) {
                $refs = [
                    'hrFname'=> $data['hrFirstName'],
                    'hrLname'=> $data['hrLastName'],
                    'hrContactNumber'=> $data['hrContactNumber'],
                    'supervisorFirstName'=> $data['supervisorFirstName'],
                    'supervisorLastName'=> $data['supervisorLastName'],
                    'supervisorContactNumber'=> $data['supervisorContactNumber'],
                    'user_id' => $data['borrower_id'],
                    'application_id' => $data['application_id']
                ];
                $this->createRefs($refs);  
            }

            if (isset($data['bankName'])) {
                $bank = [
                    'bankName'=> $data['bankName'],
                    'branchName'=> $data['branchName'],
                    'accountNames'=> $data['accountNames'],
                    'accountNumber'=> $data['accountNumber'],
                    'user_id' => auth()->user()->id,
                ];
                $this->createBankDetails($bank);
            }

            // Update Loan info
            if(isset($data['final'])){
                $loan = Application::where('id',  $data['application_id'])->first();
                $loan->continue = 0;
                $loan->save();

                $mail = [
                    'user_id' => auth()->user()->id,
                    'name' => auth()->user()->fname.' '.auth()->user()->lname,
                    'loan_type' => $loan->type,
                    'phone' => '',
                    'duration' => $loan->repayment_plan,
                    'amount' => $loan->amount,
                    'type' => 'loan-application',
                    'msg' => $loan->type.' loan submission form and kyc successfully completed.'
                ];  
        
                // Send information to the admin
                $this->send_loan_email($mail);

                return view('livewire.dashboard.loans.success-page')
                ->layout('layouts.dashboard');
            }
            
            if($request->wantsJson()){
                return response()->json([
                    "status" => 200, 
                    "success" => true
                ]);
            }else{
                return redirect()->back();
            } 
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function assign_manual(Request $request){
        try {
            $set = $this->set_manual_loan_approvers($request->toArray());
            Session::flash('success', "Loan successfully assigned.");
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function resetLoans(Request $request)
    {
        $loanIds = $request->toArray(); // Assuming $request->toArray() contains an array of loan IDs
    
        foreach ($loanIds as $id) {
            // Assuming 'Application' is the model representing your loans table
            $loan = Application::where('id',$id)->first();
    
            if ($loan) {
                $loan->status = 2;
                $loan->save();
            }

            // $stage = ApplicationStage::where('application_id', $loan->id)->first();
            // $stage->status = 'verification';
            // $stage->stage = 'processing';
            // $stage->state = 'current';
            // $stage->position = 1;
            // $stage->save();
        }
        return response()->json([
            "status" => 200, 
            "success" => true
        ]);
    }
    public function deleteLoans(Request $request)
    {
        $loanIds = $request->toArray(); // Assuming $request->toArray() contains an array of loan IDs
    
        foreach ($loanIds as $id) {
            // Assuming 'Application' is the model representing your loans table
            $loan = Application::where('id',$id)->first();
    
            if ($loan) {
                $loan->delete();
            }
        }
        return response()->json([
            "status" => 200, 
            "success" => true
        ]);
    }
    
}
