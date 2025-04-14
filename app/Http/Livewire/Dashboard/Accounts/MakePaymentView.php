<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Classes\Exports\TransactionExport;
use App\Models\Application;
use App\Models\LoanInstallment;
use App\Models\Loans;
use App\Models\Transaction;
use App\Traits\LoanTrait;
use App\Traits\WalletTrait;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class MakePaymentView extends Component
{
    use AuthorizesRequests, WalletTrait, LoanTrait;
    public $amount, $loan_id, $loans, $transactions, $payment_method;

    public function render()
    {
        $this->authorize('view accounting');
        $this->loans = Application::where('status', 1)
            ->where('closed', 0)
            ->get();
        $this->transactions = Transaction::with('application.user')->orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.accounts.make-payment-view')
            ->layout('layouts.admin');
    }

    public function makepayment()
    {
        DB::beginTransaction();
        try {
            $this->validate([
                'loan_id' => 'required|exists:applications,id',
                'amount' => 'required|numeric|min:0.01',
            ]);
            $borrower_loan = Application::where('id', $this->loan_id)->first();
            $balance = Application::loan_balance($borrower_loan->id);

            // dd($this->amount <= $balance);
            if ($this->amount <= $balance) {

                $transaction = new Transaction;
                $transaction->application_id = $borrower_loan->id;
                $transaction->amount_settled = $this->amount;
                $transaction->transaction_fee = 0;
                $transaction->profit_margin = $this->amount;
                $transaction->user_id = $borrower_loan->user_id;
                $transaction->save();

                // Close loan if the balance is 0
                if (Loans::loan_balance($borrower_loan->id) < 1.0) {
                    $borrower_loan->closed = 1;
                    $borrower_loan->date_settled = Carbon::now();
                    $borrower_loan->save();
                }

                //Record Balance Statement Entry
                $this->sheet_installment_entry($borrower_loan, $this->amount, $this->payment_method);
                DB::commit();
                session()->flash('success', 'Successfully repaid ' . $this->amount);
            } else {
                session()->flash('amount_invalid', 'The amount you enter is greater than the repayment amount. Failed Transaction');
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('success', 'Payment done.');
            return redirect()->back();
        }
    }

    public function exportTransanctions()
    {
        return Excel::download(new TransactionExport, 'Transaction Log.xlsx');
    }
}