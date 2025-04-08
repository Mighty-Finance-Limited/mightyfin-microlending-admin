<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\Application;
use App\Models\ApplicationStage;
use App\Models\LoanManualApprover;
use App\Models\LoanStatus;
use App\Models\Status;
use App\Models\User;
use App\Traits\CalculatorTrait;
use App\Traits\CRBTrait;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\WalletTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Client\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoanDetailView extends Component
{
    use CalculatorTrait, EmailTrait, WalletTrait, LoanTrait, CRBTrait, AuthorizesRequests;
    public $loan, $user, $loan_id, $msg, $due_date, $reason, $loan_product;
    public $loan_stage, $denied_status, $picked_status, $current, $principal_amt, $code, $crb, $crb_results;
    public $amortizationSchedule, $amo_principal, $amo_duration;
    public $debt_ratio, $gross_pay, $net_pay, $result_amount;
    public $crb_selected_products;

    public function mount($id)
    {
        $this->loan_id = $id;
    }

    public function render()
    {
        try {
            $this->authorize('processes loans');
            $this->loan = $this->get_loan_details($this->loan_id);
            $this->loan_product = $this->get_loan_product($this->loan->loan_product_id);
            $this->crb_selected_products = $this->loan_product->loan_crb;
            $this->loan_stage = $this->get_loan_current_stage($this->loan->loan_product_id);
            $this->denied_status = Status::where('stage', 'denied')->orderBy('id')->get();
            $this->current = ApplicationStage::where('application_id', $this->loan->id)->first();
            $this->change_status();
            return view('livewire.dashboard.loans.loan-detail-view')
                ->layout('layouts.admin');
        } catch (\Throwable $th) {
        }
    }

    public function CheckCRB()
    {
        if ($this->code === 's') {
            $response = $this->soapApiCRBDemoRequest($this->code, $this->loan->user);
        } else {
            $response = $this->soapApiCRBRequest($this->code, $this->loan->user);
        }
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $response, $values, $index);
        xml_parser_free($parser);

        $this->crb_results = [
            'values' => $values,
            'index' => $index
        ];
    }

    public function checkRisk()
    {
        $this->result_amount =  $this->net_pay - ($this->gross_pay * $this->debt_ratio);
    }

    public function calculateAmoritization()
    {
        $this->amortizationSchedule = $this->calculateAmortizationSchedule(
            $this->amo_principal,
            $this->amo_duration,
            $this->loan->loan_product_id
        );
    }


    public function setLoanID($id)
    {
        $this->loan_id = $id;
    }

    public function confirm($id, $msg)
    {
        $this->loan_id = $id;
        $this->msg = $msg;
    }

    public function clear()
    {
        $this->loan_id = '';
        $this->msg = '';
    }

    // This method activates the reviewing state
    public function reviewLoan()
    {
        Application::where('id', $this->loan_id)->update(['status' => 2]);
        LoanManualApprover::where('user_id', auth()->id())->update(['is_processing' => 1]);
        // Redirect to other page here
        Redirect::route('loan-details', ['id' => $this->loan_id]);
        session()->flash('success', 'Loan successfully set under review!');
        sleep(3);
    }
    public function rollbackLoan()
    {
        try {
            switch (strtolower($this->current->status)) {
                case 'approval':
                    // Update the approval to the previous stage Verificiation
                    $this->current->update([
                        'state' => 'current',
                        'status' => 'verification',
                        'stage' => 'processing',
                        'prev_status' => 'complete',
                        'curr_status' => 'bg-white',
                        'position' => $this->current->position - 1, // Decrease position to go backwards
                    ]);
                    break;
                case 'disbursements':
                    // Update the approval to the previous stage Approval
                    $this->current->update([
                        'state' => 'current',
                        'status' => 'approval',
                        'stage' => 'processing',
                        'prev_status' => 'complete',
                        'curr_status' => 'bg-white',
                        'position' => $this->current->position - 1, // Decrease position to go backwards
                    ]);
                    break;

                default:
                    break;
            }
            // Flash success message
            session()->flash('success', 'Loan successfully rolled back!');
            // Redirect back with success message
            return redirect()->route('loan-details', $this->loan_id);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    // This method is the actual approval process - Recommended
    // This method is the actual approval process - Recommended
    public function accept($id, $type = null)
    {
        // DB::beginTransaction();
        try {
            $application = Application::find($id);
            $this->change_stage();
            // dd($this->final_approver($id)['status']);
            if ($this->final_approver($id)['status']) {

                if (strtolower($type) == 'disburse') {
                    $this->current->update([
                        'state' => 'current',
                        'status' => 'Current Loan',
                        'stage' => 'open',
                        'prev_status' => 'complete',
                        'curr_status' => 'bg-white',
                        'position' => 4,
                    ]);
                    $this->disburse($application);
                    Redirect::route('detailed', ['id' => $this->loan_id]);
                } else {
                    // $this->continue_assessment($id);
                    Redirect::route('loan-details', ['id' => $this->loan_id]);
                }
            } else {
                $this->continue_assessment($id);
            }
            Redirect::route('loan-details', ['id' => $this->loan_id])->with(['success', 'Successfully approved stage']);
        } catch (\Throwable $th) {
            dd($th);
            // DB::rollback();
            session()->flash('error', 'Oops something failed here, please contact the Administrator.' . $th);
        }
    }


    // Only when step is accepted
    public function change_stage()
    {
        try {
            $next_status = LoanStatus::with('status')
                ->where('loan_product_id', $this->loan_product->id)
                ->orderBy('id', 'asc')
                ->skip($this->current->position) // $this->current is 0-indexed, no need to subtract 1
                ->take(1)
                ->first();

            $this->current->update([
                'state' => 'current',
                'status' => $next_status->status->name,
                'stage' => $next_status->stage,
                'prev_status' => 'complete',
                'curr_status' => 'bg-white',
                'position' => $this->current->position + 1,
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function change_status()
    {
        try {

            $application = Application::find($this->loan_id);
            if ($this->current->stage == 'open') {
                $application->status = 1;
            } elseif ($this->current->stage == 'denied') {
                $application->status = 3;
            } elseif ($this->current->stage == 'defaulted') {
                $application->status = 4;
            } elseif ($this->current->stage == 'Not Taken Up') {
                $application->status = 5;
            }
            $application->save();
        } catch (\Throwable $th) {
            dd('Cant Change Status: ' . $th->getMessage());
        }
    }

    public function continue_assessment($id)
    {
        $this->upvote($id);
    }

    public function disburse($application)
    {
        try {
            $application->status = 1;
            $application->complete = 1;
            $application->save();

            // Enter statement entry
            $this->sheet_disburse_entry($application, $application->amount, 'cash');
            // dd('here');
            $this->calculateAmortizationScheduleTable($application);
            session()->flash('success', "Successfully disbursed K{$application->amount} to {$application->user->fname} {$application->user->lname} 🎉");
        } catch (\Throwable $th) {
            dd($th);
            session()->flash('error', "Error processing loan: " . $th->getMessage());
        }
    }


    public function stall($id)
    {
        try {
            $x = Application::find($id);
            $x->status = 2;
            $x->save();

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname . ' ' . $x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x),
                'type' => 'loan-application',
                'msg' => 'Your ' . $x->type . ' loan application is under review'
            ];
            $this->send_loan_feedback_email($mail);
            $this->render();
            session()->flash('info', 'Application is under review.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }


    public function reverse($id)
    {
        try {
            $x = Application::find($id);
            $x->status = 2;
            $x->save();

            // Make a Denied Stage status page as active
            LoanStatus::where('loan_product_id', $this->loan_product->id)
                ->orderBy('id')
                ->update(['state' => 'pending']);
            LoanStatus::where('loan_product_id', $this->loan_product->id)
                ->where('status_id', $this->picked_status)
                ->orderBy('id')
                ->first()
                ->update(['state' => 'current']);

            $mail = [
                'user_id' => '',
                'application_id' => $x->id,
                'name' => $x->fname . ' ' . $x->lname,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x),
                'type' => 'loan-application',
                'msg' => 'Your ' . $x->type . ' has been taken up and is currently under review, please wait withing the next 48 hours.'
            ];
            $this->withdraw($x->amount, $x);
            $this->send_loan_feedback_email($mail);
            session()->flash('success', 'Loan has been reverted successfully');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    public function rejectOnly()
    {

        try {
            $x = Application::find($this->loan_id);
            $x->status = 3;
            $x->save();

            $this->current->update([
                'state' => 'current',
                'status' => $this->picked_status,
                'stage' => 'denied',
                'prev_status' => 'complete',
                'curr_status' => 'bg-white',
            ]);

            $mail = [
                'user_id' => $x->user_id,
                'application_id' => $x->id,
                'name' => $x->fname . ' ' . $x->lname,
                'estimate' => 500,
                'loan_type' => $x->type,
                'phone' => $x->phone,
                'email' => $x->email,
                'duration' => $x->repayment_plan,
                'amount' => $x->amount,
                'payback' => Application::payback($x),
                'type' => 'loan-application',
                'msg' => 'Your ' . $x->type . ' loan application request. After careful consideration, we regret to inform you that your loan request has been declined. REASON: ' . $this->reason
            ];

            $this->send_loan_declined_notification($mail);
            Redirect::route('loan-details', ['id' => $this->loan_id]);
            session()->flash('success', 'Loan has been rejected');
        } catch (\Throwable $th) {
            session()->flash('error', 'Oops something failed here, please contact the Administrator.');
        }
    }

    public function reprocess() {}
}
