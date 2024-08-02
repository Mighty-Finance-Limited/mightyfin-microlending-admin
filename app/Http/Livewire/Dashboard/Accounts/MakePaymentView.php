<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\Exports\TransactionExport;
use App\Models\LoanInstallment;
use App\Models\Loans;
use App\Models\Transaction;
use App\Traits\WalletTrait;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class MakePaymentView extends Component
{
    use AuthorizesRequests, WalletTrait;
    public $amount, $loan_id, $loans, $transactions, $payment_method;

    public function render()
    {
        $this->authorize('view accounting');
        $this->loans = Loans::with('application')
                        ->where('closed', 0)
                        ->get();
        $this->transactions = Transaction::with('application.user')->orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.accounts.make-payment-view')
        ->layout('layouts.admin');
    }

    public function makepayment(){     
        DB::beginTransaction();
        try {
            // Update Borrower Balance
            $borrower_loan = Loans::where('id', $this->loan_id)->with('application')->first();
            
            $balance = Loans::loan_balance($borrower_loan->application->id);
        
            if($this->amount <= $balance){
                // Insert in main wallet
                $this->repayLoanWalletFunds($this->amount);

                // Transaction history
                Transaction::create([
                    'application_id' => $borrower_loan->application->id,
                    'amount_settled' => $this->amount,
                    'transaction_fee' => 0,
                    'profit_margin' => $this->amount,
                    'proccess_by' => auth()->user()->fname.' '.auth()->user()->lname,
                    'charge_amount' => $borrower_loan->payback 
                ]);

                // Update Installment
                $installment = LoanInstallment::where('loan_id', $borrower_loan->id)->whereNull('paid_at')->first();
                $installment->paid_at = Carbon::now();
                $installment->save();

                // Close loan if the balance is 0
                if($borrower_loan->payback < 1){
                    $borrower_loan->closed = 1;
                    $borrower_loan->repaid_at = Carbon::now();
                    $borrower_loan->save();
                }

                DB::commit();
                session()->flash('success', 'Successfully repaid '.$this->amount);  
            }else{
                session()->flash('amount_invalid', 'The amount you enter is greater than the repayment amount. Failed Transaction');
            }

            
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    public function exportTransanctions(){
            return Excel::download(new TransactionExport, 'Transaction Log.xlsx');
    }
}
