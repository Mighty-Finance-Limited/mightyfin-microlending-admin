<?php

namespace App\Http\Livewire;

use App\Mail\LoanApplication;
use App\Models\Application;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class WelcomePage extends Component
{
    use LoanTrait, EmailTrait, WithFileUploads;

    public $step;
    public $showDiag = 'false';
    public $lname, $fname, $email, $phone, $gender, $type, $loan_type, $repayment_plan, $amount;
    public $glname, $gfname, $gemail, $gphone, $g_gender, $g_relation;
    public $g2lname, $g2fname, $g2email, $g2phone, $g2_gender, $g2_relation;
    // public $nrc_file, $tpin_file, $business_file, $payslip_file, $bank_trans_file, $bill_file;
    public $step_1_title = 'Loan Details';


    public function render()
    {
        return view('livewire.welcome-page');
    }

    public function updatedLoanType(){
        dd($this->loan_type);
    }

    public function canChange(){
        try{
            Application::where('email', $this->email)->update(['can_change' => 1]);
            return redirect()->route('welcome');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function clearForm(){
        $this->lname=''; $this->fname=''; $this->email=''; $this->phone=''; $this->gender=''; $this->type=''; $this->repayment_plan=''; $this->amount = '';
        $this->glname=''; $this->gfname=''; $this->gemail=''; $this->gphone=''; $this->g_gender=''; $this->g_relation='';
        $this->g2lname=''; $this->g2fname=''; $this->g2email=''; $this->g2phone=''; $this->g2_gender=''; $this->g2_relation;
    }
}
