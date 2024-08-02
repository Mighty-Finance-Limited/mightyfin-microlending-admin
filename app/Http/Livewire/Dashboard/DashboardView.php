<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Application;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use App\Traits\WalletTrait;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait, UserTrait;
    public $loan_requests, $loan_request, $all_loan_requests, $my_loan, $wallet;
    public $payment_method, $withdraw_amount, $mobile_number, $card_name, $bank_name, $card_number;

    public function render()
    {
        $this->isKYCComplete();
        $this->my_loan = $this->getCurrentLoan();
        $this->wallet = $this->getWalletBalance(auth()->user());
        if (auth()->user()->hasRole('user')) {
            Auth::logout(); // Logout the user
        } else {
            $this->all_loan_requests = Application::orWhere('status', 2)
                ->orWhere('status', 0)
                ->orderBy('created_at', 'desc')->take(5)->get();
            return view('livewire.dashboard.dashboard-view')
                ->layout('layouts.admin');
        }
    }

    public function submitWithdrawRequest(){
        $uuid = Str::orderedUuid();
        WithdrawRequest::create([
            'wallet_id' => Wallet::where('user_id', auth()->user()->id)->first()->id,
            'amount' => $this->withdraw_amount,
            'ref' => substr($uuid, 0, 6),
            'withdraw_method' => $this->payment_method,
            'mobile_number' => $this->mobile_number,
            'card_name' => $this->card_name,
            'bank_name' => $this->bank_name,
            'comments' => 'You have received a new wallet withdraw request',
            'card_number' => $this->card_number,
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'Your withdraw request has been sent');
    }

    public function approve($id){
        try {
            $x = Application::find($id);
            $x->status = 1;
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
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been successfully accepted'
            ];
            $this->send_loan_feedback_email($mail);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function stall($id){
        // set under review
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
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application is under review'
            ];
            $this->send_loan_feedback_email($mail);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function reject($id){
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
                'type' => 'loan-application',
                'msg' => 'Your '.$x->type.' loan application request has been rejected'
            ];
            $this->send_loan_feedback_email($mail);

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
