<?php

namespace App\Traits;

use App\Mail\LoanApplication;
use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\LoanInstallment;
use App\Models\LoanManualApprover;
use App\Models\LoanPackage;
use App\Models\LoanProduct;
use App\Models\Loans;
use App\Models\LoanStatus;
use App\Models\User;
use App\Notifications\LoanRequestNotification;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

trait LoanTrait{
    use EmailTrait;
    public $application;

    public function get_all_loan_products(){
        return LoanProduct::with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method',
            'interest_types.interest_type',
            ])->get();
    }

    public function get_loan_product($id){
        return LoanProduct::where('id', $id)->with([
            'disbursed_by.disbursed_by',
            'interest_methods.interest_method',
            'interest_types.interest_type',
            'loan_accounts.account_payment',
            'loan_status.status',
            'loan_decimal_places',
            'service_fees.service_charge',
            'loan_institutes.institutions'
        ])->first();
    }

    public function get_loan_statuses($id){
        return LoanStatus::with('status')->where('loan_product_id', $id)
                        ->get();
    }
    public function get_loan_current_stage($id){
        return LoanStatus::with('status')->where('loan_product_id', $id)
                        ->first();
    }

    public function getAllLoanRequests($type){
        $userId = auth()->user()->id;

        if(auth()->user()->hasRole('admin')){
            // dd('here');
            return Application::with('loan_product')->get();
        }else{
            switch ($type) {
                case 'spooling':
                    return Application::with('loan_product')->get();
                    break;

                case 'manual':
                    return Application::with('loan_product')->with(['manual_approvers' => function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    }])->whereHas('manual_approvers', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    })
                    ->get();
                    break;

                case 'auto':
                    # code...
                    break;

                default:
                    # code...
                break;
            }
        }
    }

    public function getLoanRequests($type){
        $userId = auth()->user()->id;

        if(auth()->user()->hasRole('admin')){
            // dd('here');
            return Application::orWhere('status', 0)->orWhere('status', 2)->with('loan_product')->get();
        }else{
            switch ($type) {
                case 'spooling':
                    return Application::orWhere('status', 0)->orWhere('status', 2)->with('loan_product')->get();
                    break;

                case 'manual':
                    return Application::with('loan_product')->with(['manual_approvers' => function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    }])->whereHas('manual_approvers', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    })
                    ->orWhere('status', 2)->orWhere('status', 0)
                    ->get();
                    break;

                case 'auto':
                    # code...
                    break;

                default:
                    # code...
                break;
            }
        }
    }
    public function getOpenLoanRequests($type){
        $userId = auth()->user()->id;
        if(auth()->user()->hasRole('admin')){
            return Application::with('loan_product')->where('complete', 1)->where('status', 1)->get();
        }else{
            switch ($type) {
                case 'spooling':
                    return Application::with('loan_product')->where('complete', 1)
                    ->where('status', 1)->get();
                    break;
                case 'manual':
                    return Application::with('loan_product')->with(['manual_approvers' => function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    }])->whereHas('manual_approvers', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    })
                    ->where('status', 1)
                    ->where('complete', 1)
                    ->get();

                    break;
                case 'auto':
                    # code...
                    break;

                default:
                    # code...
                break;
            }
        }
    }
    public function getDueLoanRequests($type){
        $userId = auth()->user()->id;
        if(auth()->user()->hasRole('admin')){
            return Application::with('loan_product')->where('complete', 1)->where('status', 1)->get();
        }else{
            switch ($type) {
                case 'spooling':
                    return Application::with('loan_product')->where('complete', 1)
                    ->where('status', 1)->get();
                    break;
                case 'manual':
                    return Application::with('loan_product')->with(['manual_approvers' => function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    }])->whereHas('manual_approvers', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('is_active', 1);
                    })
                    ->where('status', 1)
                    ->where('complete', 1)
                    ->get();

                    break;
                case 'auto':
                    # code...
                    break;

                default:
                    # code...
                break;
            }
        }
    }

    public function getLoanPackages(){
        return LoanPackage::orderBy('created_at', 'desc')->get();
    }

    public function removeLoanPackage($id){
        $package = LoanPackage::find($id);
        if ($package) {
            $package->delete();
            return true;
        } else {
            return false;
        }
    }

    public function getCurrentLoan(){
        return Application::with('loan')
        ->where('email', auth()->user()->email)
        ->orWhere('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc') // Add this line to order by 'created_at' column in descending order
        ->first();
    }
    public function get_loan_details($id){
        $data = Application::with('user.nextkin')
        ->with('user.uploads')->where('id', $id)->first();
        return $data;
    }

    public function apply_loan($data){
            try {
                // check if user already created a loan application
                // that is not approved yet and not complete
                $check = Application::where('status', 0)->where('complete', 0)
                                    ->where('user_id', $data['user_id'])->orderBy('created_at', 'desc')->get();

                if($data['email'] != ''){
                    $mail = [
                        'name' => $data['fname'].' '.$data['lname'],
                        'to' => $data['email'],
                        'from' => 'info@mightyfinance.co.zm',
                        'phone' => $data['phone'],
                        'payback' => Application::payback($data['amount'], $data['repayment_plan']),
                        'subject' => $data['type'].' Loan Application',
                        'message' => 'Thank you for choosing us. Your loan request is submitted. Sign in with username '.$data['email'].' and password is "mighty4you" to check the status. We value your trust and are committed to your satisfaction.',
                        'message2'=>'Before proceeding, please fill out the attached Pre-approval form and submit it for the final processing of your '.$data['type'].' loan application.'
                    ];
                }

                if(empty($check->toArray())){
                    $item = Application::create($data);
                    if($data['email'] != ''){
                        $loan_data = new LoanApplication($mail);
                        Mail::to($data['email'])->send($loan_data);
                    }

                    // Fetch the loan status with relationships.
                    $status = DB::table('loan_statuses')
                        ->join('statuses', 'loan_statuses.status_id', '=', 'statuses.id')
                        ->select('loan_statuses.*', 'statuses.status')
                        ->where('loan_statuses.loan_product_id', $data['loan_product_id'])
                        ->orderBy('loan_statuses.id', 'asc')
                        ->first();

                    // Create a new application stage.
                    DB::table('application_stages')->insert([
                        'application_id' => $item->id,
                        'loan_status_id' => 1,
                        'state' => 'current',
                        'status' => $status->status ?? 'verification', // Using the status retrieved from the query
                        'stage' => 'processing',
                        'prev_status' => 'current',
                        'curr_status' => '',
                        'position' => 1
                    ]);

                    return $item->id;
                }else{
                    // redirect to you already have loan request
                    return 'exists';
                }

            } catch (\Throwable $th) {
                dd($th);
            }
    }

    public function apply_update_loan($data, $loan_id){
            try {
                // check if user already created a loan application that is not approved yet and not complete
                $check = Application::where('id', $loan_id)->first();
                $check->update($data);

            } catch (\Throwable $th) {
                return 0;
            }
    }

    public function updateGuarantors($data){
        $application = Application::where('id', $data['application_id'])->first();
        $application->update($data);
    }


    public function remake_loan($loan_id, $new_due_date){
        $x = Application::where('id', $loan_id)->first();
        Loans::where('application_id', '=', $loan_id)->delete();
        $this->make_loan($x, $new_due_date);
    }

    public function make_loan($x, $due_date){
        try {
            if($due_date !== null){
                $due = $due_date.' 00:00:00';
            }else{
                $due = Carbon::now()->addMonth($x->repayment_plan);
            }
            $loan = Loans::create([
                'application_id' => $x->id,
                'repaid' => 0,
                'principal' => $x->amount ?? 0,
                'payback' => $x->amount * 0.2,
                'penalty' => 0,
                'interest' => $x->interest ?? 20,
                'final_due_date' => $due,
                'closed' => 0
            ]);

            $payback_amount = Application::payback($x->amount, $x->repayment_plan);
            $installments = $payback_amount / $x->repayment_plan;

            for ($i=0; $i < $x->repayment_plan; $i++) {
                if($x->doa !== null){
                    $date_str = $x->doa;
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                    $moths = 'P'. $i+1 .'M';
                    $next_due = $date->add(new DateInterval($moths));

                }else{
                    $due = Carbon::now()->addMonth($x->repayment_plan);
                    $next_due = Carbon::now()->addMonth($i+1);
                }

                LoanInstallment::create([
                    'loan_id' => $loan->id,
                    'next_dates' => $next_due,
                    'amount' => $installments
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function notify_loan_request($data){

        $admin = User::where('id', $data['user_id']);
        try {
            Notification::send($admin, new LoanRequestNotification($data));
            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function payback_ammount($amount, $duration){
        $interest_rate = 20 / 100;
        return $amount * (1 + ($interest_rate * (int)$duration));
    }

    public function missed_repayments(){
        if (auth()->user()->hasRole('user')) {
            return DB::table('applications')
                ->join('users', 'users.id', '=', 'applications.user_id')
                ->join('loans', 'applications.id', '=', 'loans.application_id')
                ->join('loan_installments', 'loans.id', '=', 'loan_installments.loan_id')
                ->where('applications.status', '=', 1)
                ->where('applications.complete', '=', 1)
                ->where('applications.user_id', '=', auth()->user()->id)
                ->where('loan_installments.next_dates', '<', now())
                ->whereNotNull('applications.type')
                ->select('loans.id','users.fname', 'users.lname', 'applications.*', 'loan_installments.next_dates')
                ->get();
        }else{
            return DB::table('applications')
                ->join('users', 'users.id', '=', 'applications.user_id')
                ->join('loans', 'applications.id', '=', 'loans.application_id')
                ->join('loan_installments', 'loans.id', '=', 'loan_installments.loan_id')
                ->where('applications.status', '=', 1)
                ->where('applications.complete', '=', 1)
                ->where('loan_installments.next_dates', '<', now())
                ->whereNotNull('applications.type')
                ->select('loans.id','users.fname', 'users.lname', 'applications.*', 'loan_installments.next_dates')
                ->get();
        }
    }
    public function past_maturity_date(){
        if (auth()->user()->hasRole('user')) {
            return Application::with(['loan' => function ($query) {
                $query->where('final_due_date', '<', now());
            }])->with('user')
            ->where('user_id', auth()->user()->id)
            ->where('status', 1)->where('complete', 1)->get();
        }else{
            return Application::with(['loan' => function ($query) {
                $query->where('final_due_date', '<', now());
            }])->with('user')->where('status', 1)->where('complete', 1)->get();
        }

    }


    // -------- Approvals
    public function final_approver($application_id)
    {
        $approvers = LoanManualApprover::where('application_id', $application_id)->get();
        $userPriority = $approvers->where('user_id', auth()->user()->id)->pluck('priority')->first();
        $is_passed = $approvers->where('user_id', auth()->user()->id)->pluck('is_passed')->first();

        // dd((int)$approvers->count());
        // dd((int)$userPriority);

        // If false then there are still more approvers | must be dynamic
        if ((int)$approvers->count() >= (int)$userPriority) {
            return [
                'status' => true,
                'priority' => $userPriority,
                'total_approvers' => $approvers->count(),
                'is_passed' =>$is_passed
            ];
        } else {
            return [
                'status' => false,
                'priority' => $userPriority,
                'total_approvers' => $approvers->count(),
                'is_passed' => $is_passed
            ];
        }
    }

    public function my_approval_status($application_id){
        return LoanManualApprover::where('user_id', auth()->user()->id)
                        ->where('application_id', $application_id)
                        ->pluck('is_passed')->first();
    }

    public function my_review_status($application_id){
        return LoanManualApprover::where('user_id', auth()->user()->id)
                        ->where('application_id', $application_id)
                        ->pluck('is_processing')->first();
    }

    public function upvote($application_id){
        $approvers = LoanManualApprover::where('application_id', $application_id)->get();
        $userPriority = $approvers->where('user_id', auth()->user()->id)->pluck('priority')->first();

        // Leave current approver
        $update = $approvers->where('priority', $userPriority)->first();
        // dd($update);
        $update->complete = 1; //optional - remove
        $update->is_passed = 1;
        $update->is_active = 0;
        $update->is_processing = 0;
        $update->save();

        // Elevate to the next priority
        $update = $approvers->where('priority', $userPriority + 1)->first();
        if($update){

            $update->complete = 1; //optional - remove
            $update->is_active = 1;
            $update->is_processing = 1;
            $update->save();
        }
    }
    public function final_upvote($application_id){

        // dd($application_id);
        $approvers = LoanManualApprover::where('application_id', $application_id)->get();
        $userPriority = $approvers->where('user_id', auth()->user()->id)->pluck('priority')->first();

        // dd($userPriority);
        // Leave current approver
        $update = $approvers->where('priority', $userPriority)->first();
        // dd($update);
        $update->is_passed = 1;
        $update->is_active = 0;
        $update->is_processing = 0;
        $update->save();

        // Elevate to the next priority
        $update = $approvers->where('priority', $userPriority + 1)->first();
        $update->is_active = 1;
        $update->is_processing = 1;
        $update->save();
    }


}
