<?php

namespace App\Http\Livewire\Dashboard\Loans;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Maatwebsite\Excel\Facades\Excel;
use App\Classes\Exports\LoanExport;
use App\Models\Application;
use App\Models\LoanManualApprover;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;
use App\Traits\UserTrait;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoanRequestView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait, SettingTrait, UserTrait, AuthorizesRequests;
    public $loan_requests, $loan_request, $new_loan_user, $user_basic_pay, $user_net_pay, $loan_id;
    public $type = [];
    public $status = [];
    public $view = 'list';
    public $users, $due_date;
    public $assignModal = false;
    public $title = 'Recent Loan Requests';
    public function render()
    {

        $this->authorize('view loans');
        try {
            // Retrieve users with the 'user' role, excluding their applications
            $this->users = User::role('user')->without('applications')->get();

            if($this->current_configs('loan-approval')->value == 'auto'){
                // get loan only if first review as approved
                $this->loan_requests = $this->getLoanRequests('auto');
            }elseif($this->current_configs('loan-approval')->value == 'manual'){

                $this->loan_requests = $this->getLoanRequests('manual');
                $requests = $this->getLoanRequests('manual');
            }else{
                $this->loan_requests = $this->getLoanRequests('spooling');
                $requests = $this->getLoanRequests('spooling');
            }
            return view('livewire.dashboard.loans.loan-request-view',[
                'requests'=>$requests
            ])->layout('layouts.admin');

        } catch (\Throwable $th) {
            // If an exception occurs, set $loan_requests to an empty array
            $this->loan_requests = [];
            $requests = [];
            if (auth()->user()->hasRole('user')) {
                return view('livewire.dashboard.loans.loan-request-view',[
                    'requests'=>$requests
                ])->layout('layouts.dashboard');
            }else{
                dd($th);
                return view('livewire.dashboard.loans.loan-request-view',[
                    'requests'=>$requests
                ])->layout('layouts.admin');
            }
        }
    }


    public function exportLoans(){
        switch ($this->status) {
            case 0:
                $name = 'Pending';
                break;
            case 1:
                $name = 'Approved';
                break;
            case 2:
                $name = 'Paused';
                break;
            case 3:
                $name = 'Rejected';
                break;

            default:
                $name = 'All';
                break;
        }
        return Excel::download(new LoanExport($this->status, $this->type), $name.' Loans.xlsx');
    }

    public function changeView($view){
        $this->view = $view;
    }

    public function setLoanID($id){
        $this->loan_id = $id;
    }


    // This method is the actual approval process - Recommended
    public function accept($id){

        DB::beginTransaction();
        try {
            $x = Application::find($id);
            // Make the loan
            $this->make_loan($x, $this->due_date);
            // $this->isCompanyEnough($x->amount);

            // Do this - If this officer is the last approver
            $this->final_approval($x);
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error', 'Oops something failed here, please contact the Administrator.'.$th);
        }
    }

    public function final_approval($x){
        if(true){
            $x->status = 1;
            $x->save();
            if($x->email != null){
                $mail = [
                    'user_id' => '',
                    'application_id' => $x->id,
                    'name' => $x->fname.' '.$x->lname,
                    'loan_type' => $x->type,
                    'phone' => $x->phone,
                    'email' => $x->email,
                    'duration' => $x->repayment_plan,
                    'amount' => $x->amount,
                    'payback' => Application::payback($x->amount, $x->repayment_plan),
                    'type' => 'loan-application',
                    'msg' => 'Your '.$x->type.' loan application request has been successfully accepted'
                ];
                $this->send_loan_feedback_email($mail);
            }
            $this->deposit($x->amount, $x);
            DB::commit();
            session()->flash('success', 'Successfully transfered '.$x->amount.' to '.$x->fname.' '.$x->lname);
        }else{
            session()->flash('warning', 'Insuficient funds in the company account, please update funds.');
        }
    }

    // This method places the loan request on hold
    public function stall($id){
        try {
            $x = Application::find($id);
            $x->status = 2;
            $x->save();

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x->amount, $x->repayment_plan),
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application is under review'
            ];
            $this->send_loan_feedback_email($mail);
            $this->render();
            session()->flash('info', 'Application is under review.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }


    // This method reverses the loan request from being accepted to rejected
    public function reverse($id){
        try {
            $x = Application::find($id);
            $x->status = 3;
            $x->save();

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x->amount, $x->repayment_plan),
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been rejected'
            ];
            $this->withdraw($x->amount, $x);
            $this->send_loan_feedback_email($mail);
            session()->flash('success', 'Loan has been rejected');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    // This method rejects the loan request
    public function rejectOnly($id){
        try {
            $x = Application::find($id);
            $x->status = 3;
            $x->save();

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname.' '.$x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x->amount, $x->repayment_plan),
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been rejected'
            ];
            $this->send_loan_feedback_email($mail);
            session()->flash('success', 'Loan has been rejected');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    public function reviewLoan()
    {

        Application::where('id', $this->loan_id)->update(['status' => 2]);
        LoanManualApprover::where('user_id', auth()->id())->update(['is_processing' => 1]);
        // Redirect to other page here
        Redirect::route('loan-details',['id' => $this->loan_id]);
        session()->flash('success', 'Loan successfully set under review!');
        sleep(3);

    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }

    public function clear(){
        $this->due_date = '';
    }

    public function destroy($id){
        Application::where('id', $id)->first()->delete();
        session()->flash('success', 'Deleted permanently');
    }
}
