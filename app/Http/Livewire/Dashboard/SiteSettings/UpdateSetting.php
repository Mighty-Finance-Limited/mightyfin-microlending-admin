<?php

namespace App\Http\Livewire\Dashboard\SiteSettings;

use App\Models\LoanAccountPayment;
use App\Models\LoanServiceCharge;
use App\Traits\LoanTrait;
use Livewire\Component;
use App\Models\AccountPayment;
use App\Models\DisbursedBy;
use App\Models\Institution;
use App\Models\InterestMethod;
use App\Models\InterestType;
use App\Models\LoanDecimalPlace;
use App\Models\LoanDisbursedBy;
use App\Models\LoanInterestMethod;
use App\Models\LoanInterestType;
use App\Models\LoanProduct;
use App\Models\LoanProductInstitution;
use App\Models\LoanRepaymentCycle;
use App\Models\Penalty;
use App\Models\RepaymentCycle;
use App\Models\RepaymentOrder;
use App\Models\ServiceCharge;
use App\Models\CrbProduct;
use App\Models\LoanCrbProduct;
use App\Traits\DisbursementTrait;
use Illuminate\Support\Facades\Session;


class UpdateSetting extends Component
{
    use LoanTrait, DisbursementTrait;
    public $page;

    // Preset Data
    public $interest_methods, $interest_types, $disbursements, $repayment_cycles;
    public $repayment_orders, $decimal_places, $company_accounts, $service_charges;

    // Loan Product Update Data
    public $new_loan_name, $loan_release_date, $minimum_loan_principal_amount, $loan_interest_type;
    public $default_loan_principal_amount, $maximum_principal_amount, $loan_interest_method, $num_of_steps;
    public $loan_interest_period, $minimum_loan_interest, $default_loan_interest;
    public $maximum_loan_interest, $loan_duration_period, $minimum_loan_duration;
    public $loan_decimal_place, $add_automatic_payments, $loan_product, $new_loan_desc, $new_loan_icon,$new_loan_icon_alt;
    public $default_loan_duration, $maximum_loan_duration, $default_num_of_repayments;
    public $maximum_num_of_repayments, $minimum_num_of_repayments;
    public $auto_payment_sources = [];
    public $loan_disbursed_by = [];
    public $loan_repayment_cycle = [];
    public $extra_fees = [];

    // Loan Statuses
    // public $processing = [];
    public $open = [];
    public $defaulted = [];
    public $denied = [];
    public $no_taken_up = [];
    public $loan_institution = [];

    // Other Update Data
    public $disbursement_name, $disbursement;
    public $repayment_cycle_name,$repayment_cycle_method;
    public $penalty_amount, $penalty_name, $penalty_grace, $penalty;
    public $loan_charge, $loan_charge_name, $loan_charge_amount, $institutions, $institution;
    public $loan_institute_name, $loan_institute_type;
    public $current_statuses = [];

    public $crb_products;
    public $crb_selected_products = [];

    public function render()
    {
        $this->page = $_GET['page'];
        $this->id = $_GET['item_id'];

        switch ($_GET['page']) {
            case 'loan-product':
                $this->get_data();
                $this->loan_product = $this->get_loan_product($_GET['item_id']);
                $this->set_loan_product_values();
            break;

            case 'loan-disbursements':
                $this->disbursement = $this->get_disbursement_method($_GET['item_id']);
                $this->set_disbursements_values();
            break;

            case 'loan-repayment-cycle':
                $this->repayment_cycle_method = $this->get_repayment_cycle($_GET['item_id']);
                $this->set_repayment_cycle();
            break;

            case 'loan-penalty-settings':
                $this->penalty = $this->get_penalty_settings($_GET['item_id']);
                $this->set_penalty_settings();
            break;

            case 'loan-fees':
                $this->loan_charge = $this->get_loan_fees($_GET['item_id']);
                $this->set_loan_fees();
            break;

            case 'loan-statuses':
                $this->get_data();
                $this->loan_product = $this->get_loan_product($_GET['item_id']);
                $this->current_statuses = $this->get_loan_statuses($_GET['item_id']);
                $this->set_loan_product_values();
            break;

            case 'institutes':
                $this->institution = Institution::where('id', $_GET['item_id'])->where('status', 1)->first();
                $this->loan_institute_name = $this->institution->name;
                $this->loan_institute_type = $this->institution->type;
            break;

            default:
            break;
        }
        return view('livewire.dashboard.site-settings.update-setting')
        ->layout('layouts.admin');
    }


    public function get_data(){
        $this->interest_methods =  InterestMethod::get();
        $this->interest_types = InterestType::get();
        $this->disbursements =  DisbursedBy::get();
        $this->repayment_cycles = RepaymentCycle::get();
        $this->repayment_orders = RepaymentOrder::get();
        $this->company_accounts = AccountPayment::get();
        $this->service_charges = ServiceCharge::get();
        $this->institutions = Institution::where('status', 1)->get();
        $this->crb_products = CrbProduct::get();
    }

    public function update_loan_product(){
        try {
            LoanProduct::where('id', $this->loan_product->id)->update([
                'name' => $this->new_loan_name,
                'release_date' => $this->loan_release_date,
                'icon'=> $this->new_loan_icon,
                'icon_alt' => $this->new_loan_icon_alt,
                'wiz_steps' => $this->num_of_steps,
                'auto_payment' => $this->add_automatic_payments,
                'loan_duration_period' => $this->loan_duration_period,
                'loan_interest_period' => $this->loan_interest_period,
                'min_principal_amount' => $this->minimum_loan_principal_amount,
                'def_principal_amount' => $this->default_loan_principal_amount,
                'max_principal_amount' => $this->maximum_principal_amount,
                'min_loan_duration' => $this->minimum_loan_duration,
                'def_loan_duration' => $this->default_loan_duration,
                'max_loan_duration' => $this->maximum_loan_duration,
                'min_loan_interest' => $this->minimum_loan_interest,
                'def_loan_interest' => $this->default_loan_interest,
                'max_loan_interest' => $this->maximum_loan_interest,
                'min_num_of_repayments' => $this->minimum_num_of_repayments,
                'def_num_of_repayments' => $this->default_num_of_repayments,
                'max_num_of_repayments' => $this->maximum_num_of_repayments,
            ]);

            // Delete existing records where loan_product_id matches $this->loan_product->id
            LoanCrbProduct::where('loan_product_id', $this->loan_product->id)->delete();
            // Create new records based on $this->crb_selected_products
            foreach ($this->crb_selected_products as $value) {
                LoanCrbProduct::create([
                    'loan_product_id' => $this->loan_product->id,
                    'crb_product_id' => $value
                ]);
            }
            foreach ($this->loan_disbursed_by as $value) {
                LoanDisbursedBy::updateOrCreate(
                    ['loan_product_id' => $this->loan_product->id],
                    ['disbursed_by_id' => $value, 'loan_product_id' => $this->loan_product->id]
                );
            }

            // Interest Methods
            LoanInterestMethod::updateOrCreate(
                ['loan_product_id' => $this->loan_product->id],
                ['interest_method_id' => $this->loan_interest_method, 'loan_product_id' => $this->loan_product->id]
            );


            // Interest Types
            LoanInterestType::updateOrCreate(
                ['loan_product_id' => $this->loan_product->id],
                ['interest_type_id' => $this->loan_interest_type, 'loan_product_id' => $this->loan_product->id]
            );

            // Repayment Cycles ****Loop
            foreach ($this->loan_repayment_cycle as $value) {
                LoanRepaymentCycle::updateOrCreate(
                    ['loan_product_id' => $this->loan_product->id, 'repayment_cycle_id' => $value],
                    ['repayment_cycle_id' => $value, 'loan_product_id' => $this->loan_product->id]
                );
            }


            // Loan Decimal Places
            foreach ($this->loan_decimal_place as $value) {
                LoanDecimalPlace::updateOrCreate(
                    ['loan_product_id' => $this->loan_product->id],
                    ['value' => $value, 'loan_product_id' => $this->loan_product->id]
                );
            }


            // Loan Repayment Orders ****Loop
            // LoanRepaymentOrder::Create([
            //     'repayment_order_id' => rand(1, 12),
            //     'loan_product_id' => $loan_product->id
            // ]);

            // Loan Service Charges ****Loop
            foreach ($this->extra_fees as $value) {
                LoanServiceCharge::updateOrCreate(
                    ['loan_product_id' => $this->loan_product->id, 'service_charge_id' => $value],
                    ['service_charge_id' => $value, 'loan_product_id' => $this->loan_product->id]
                );
            }


            // Loan Automated Payments ****Loop
            foreach ($this->auto_payment_sources as $value) {
                LoanAccountPayment::updateOrCreate(
                    ['loan_product_id' => $this->loan_product->id, 'account_payment_id' => $value],
                    ['account_payment_id' => $value, 'loan_product_id' => $this->loan_product->id]
                );
            }

            // Institutions
            foreach ($this->loan_institution as $key => $value) {
                LoanProductInstitution::where('loan_product_id', $this->loan_product->id)
                ->update([
                    'institution_id' => $value,
                    'loan_product_id' => $this->loan_product->id
                ]);
            }

            Session::flash('success', "Loan product updated successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);

        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);

        }
    }

    public function update_institution(){
        try {
            Institution::where('id', $this->institution->id)->update([
                'name' => $this->loan_institute_name,
                'type' => $this->loan_institute_type
            ]);
            Session::flash('success', "Loan Institution created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'institutes']);
        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'institutes']);
        }
    }

    public function update_disbursement(){
        try{
            DisbursedBy::where('id', $this->disbursement->id)->update([
                'name' => $this->disbursement_name,
            ]);
            Session::flash('success', "Disbursement method updated successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-disbursements']);

        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-disbursements']);

        }
    }
    public function update_repayment_cycle(){
        try{
            RepaymentCycle::where('id', $this->repayment_cycle_method->id)->update([
                'name' => $this->repayment_cycle_name,
            ]);
            Session::flash('success', "Loan Repayment Cycle updated successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-repayment-cycle']);

        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-repayment-cycle']);

        }
    }

    public function update_penalty(){
        try {
            Penalty::where('id', $this->penalty->id)->update([
                'name' => $this->penalty_name,
                'value' => $this->penalty_amount,
                'grace_period' => $this->penalty_grace,
                'tag' => strtolower(str_replace(' ', '-', $this->disbursement_name))
            ]);

            Session::flash('success', "Penalty created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-penalty-settings']);

        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-penalty-settings']);
        }
    }

    public function update_loan_fee(){
        try {
            ServiceCharge::Create([
                'name' => $this->loan_charge_name,
                'value' => $this->loan_charge_amount,
                'tag' => strtolower(str_replace(' ', '-', $this->loan_charge_name))
            ]);

            Session::flash('success', "Loan Fee created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-fees']);

        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-fees']);
        }
    }

    public function update_loan_product_process(){
        // dd($this->processing);
    }

    // ---- Setters
    public function set_loan_product_values(){
        // Loan Product
        $this->new_loan_name = $this->loan_product->name;
        $this->loan_release_date = $this->loan_product->release_date;
        $this->new_loan_desc = $this->loan_product->description;
        $this->new_loan_icon = $this->loan_product->icon;
        $this->new_loan_icon_alt = $this->loan_product->icon_alt;
        $this->add_automatic_payments = $this->loan_product->auto_payment;
        $this->num_of_steps = $this->loan_product->wiz_steps;

        // Decimal Places
        $this->loan_decimal_place = $this->loan_product->loan_decimal_places->first()->value;

        // Dropdowns
        $this->loan_interest_method = $this->loan_product->interest_methods->first()->id;
        $this->loan_interest_type = $this->loan_product->interest_types->first()->id;

        // Checkboxes
        $this->loan_disbursed_by = $this->loan_product->disbursed_by->pluck('id')->all();
        $this->loan_repayment_cycle = $this->loan_product->repayment_cycle->pluck('id')->all();
        $this->auto_payment_sources = $this->loan_product->loan_accounts->pluck('id')->all();
        $this->loan_institution = $this->loan_product->loan_institutes->pluck('id')->all();
        $this->crb_selected_products = $this->loan_product->loan_crb->pluck('id')->all();

        // Durations
        $this->loan_duration_period = $this->loan_product->loan_duration_period;
        $this->loan_interest_period = $this->loan_product->loan_interest_period;

        // Principal
        $this->minimum_loan_principal_amount = $this->loan_product->min_principal_amount;
        $this->default_loan_principal_amount = $this->loan_product->def_principal_amount;
        $this->maximum_principal_amount = $this->loan_product->max_principal_amount;

        // Interest
        $this->minimum_loan_interest = $this->loan_product->min_loan_interest;
        $this->default_loan_interest = $this->loan_product->def_loan_interest;
        $this->maximum_loan_interest = $this->loan_product->max_loan_interest;

        // Duration
        $this->minimum_loan_duration = $this->loan_product->min_loan_duration;
        $this->default_loan_duration = $this->loan_product->def_loan_duration;
        $this->maximum_loan_duration = $this->loan_product->max_loan_duration;

        // Repayments
        $this->default_num_of_repayments = $this->loan_product->min_num_of_repayments;
        $this->maximum_num_of_repayments = $this->loan_product->def_num_of_repayments;
        $this->minimum_num_of_repayments = $this->loan_product->max_num_of_repayments;
    }

    public function set_disbursements_values(){
        $this->disbursement_name = $this->disbursement->name;
    }
    public function set_repayment_cycle(){
        $this->repayment_cycle_name = $this->repayment_cycle_method->name;
    }
    public function set_penalty_settings(){
        $this->penalty_amount = $this->penalty->value;
        $this->penalty_name = $this->penalty->name;
        $this->penalty_grace = $this->penalty->grace_period;

    }
    public function set_loan_fees(){
        $this->loan_charge_name = $this->loan_charge->name;
        $this->loan_charge_amount = $this->loan_charge->value;
    }
}
