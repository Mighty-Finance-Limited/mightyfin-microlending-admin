<?php

namespace App\Http\Controllers;

use App\Models\LoanAccountPayment;
use App\Models\LoanCrbProduct;
use App\Models\LoanDecimalPlace;
use App\Models\LoanDisbursedBy;
use App\Models\LoanInterest;
use App\Models\LoanInterestMethod;
use App\Models\LoanInterestType;
use App\Models\LoanProduct;
use App\Models\LoanProductInstitution;
use App\Models\LoanRepaymentCycle;
use App\Models\LoanServiceCharge;
use App\Models\LoanStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoanProductController extends Controller
{

    public function updateLoanStatus(Request $request){
        try {
            $data = $request->toArray();
            // dd($data);
            // Processing
            foreach (($data['processing']) as $key => $value) {

                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'processing',
                        'step' => $key + 1,
                    ]
                );
            }
            // Open
            foreach (($data['open']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'open',
                        'step' => $key + 1,
                    ]
                );
            }

            // Defaulted
            foreach (($data['defaulted']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'defaulted',
                        'step' => $key + 1,
                    ]
                );
            }

            // Denied
            foreach (($data['denied']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'denied',
                        'step' => $key + 1,
                    ]
                );
            }

            // Not Taken Up
            foreach (($data['not_taken_up']) as $key => $value) {
                LoanStatus::create(
                    [
                        'loan_product_id' => $data['loan_id'],
                        'status_id' => $value,
                        'stage' => 'Not Taken Up',
                        'step' => $key + 1,
                    ]
                );
            }

            Session::flash('success', "Loan statuses created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        } catch (\Throwable $th) {
            Session::flash('error', "Failed. ". $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan','settings' => 'loan-types']);
        }
    }

    public function create_loan_product(Request $request)
    {
        try {
            $loan_product = LoanProduct::create([
                'name' => $request->input('new_loan_name'),
                'description' => $request->input('new_loan_desc'),
                'loan_type' => $request->input('loan_type_id'),
                'loan_child_type_id' => $request->input('loan_child_type_id'),
                'wiz_steps' => $request->input('num_of_steps'),
                'release_date' => $request->input('loan_release_date'),
                'auto_payment' => $request->input('add_automatic_payments'),
                'loan_duration_period' => $request->input('loan_duration_period'),
                'loan_interest_period' => $request->input('loan_interest_period'),

                'min_principal_amount' => $request->input('minimum_loan_principal_amount'),
                'def_principal_amount' => $request->input('default_loan_principal_amount'),
                'max_principal_amount' => $request->input('maximum_principal_amount'),

                'min_loan_duration' => $request->input('minimum_loan_duration'),
                'def_loan_duration' => $request->input('default_loan_duration'),
                'max_loan_duration' => $request->input('maximum_loan_duration'),

                'min_loan_interest' => $request->input('minimum_loan_interest'),
                'def_loan_interest' => $request->input('default_loan_interest'),
                'max_loan_interest' => $request->input('maximum_loan_interest'),

                'min_num_of_repayments' => $request->input('minimum_num_of_repayments'),
                'def_num_of_repayments' => $request->input('default_num_of_repayments'),
                'max_num_of_repayments' => $request->input('maximum_num_of_repayments'),
            ]);

            // Loan Interest Type
            foreach ($request->input('loan_interest_type', []) as $value) {
                LoanInterestType::create([
                    'interest_type_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            // Loan Interest Method
            foreach ($request->input('loan_interest_method', []) as $value) {
                LoanInterestMethod::create([
                    'interest_method_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            // Loan Decimal Place
            LoanDecimalPlace::create([
                'value' => $request->input('loan_decimal_place'),
                'loan_product_id' => $loan_product->id,
            ]);

            // Loan Disbursed By
            foreach ($request->input('loan_disbursed_by', []) as $value) {
                LoanDisbursedBy::create([
                    'disbursed_by_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            // Loan Repayment Cycle
            foreach ($request->input('loan_repayment_cycle', []) as $value) {
                LoanRepaymentCycle::create([
                    'repayment_cycle_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            // Loan Service Charges
            foreach ($request->input('extra_fees', []) as $value) {
                LoanServiceCharge::create([
                    'service_charge_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            // Loan Automated Payments
            foreach ($request->input('auto_payment_sources', []) as $value) {
                LoanAccountPayment::create([
                    'account_payment_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            // Loan Institutions
            foreach ($request->input('loan_institution', []) as $value) {
                LoanProductInstitution::create([
                    'institution_id' => $value,
                    'loan_product_id' => $loan_product->id,
                ]);
            }

            Session::flash('success', "Loan product created successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan', 'settings' => 'loan-types']);
        } catch (\Throwable $th) {
            Session::flash('error', "Failed. " . $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan', 'settings' => 'loan-types']);
        }
    }

    public function update_loan_product(Request $request)
    {
        try {
            // Update the loan product
            LoanProduct::where('id', $request->input('loan_product_id'))->update([
                'name' => $request->input('new_loan_name'),
                'release_date' => $request->input('loan_release_date') ?? 0,
                // 'icon' => $request->input('new_loan_icon'),
                // 'icon_alt' => $request->input('new_loan_icon_alt'),
                'wiz_steps' => $request->input('num_of_steps'),
                'auto_payment' => $request->input('add_automatic_payments'),
                'loan_duration_period' => $request->input('loan_duration_period'),
                'loan_interest_period' => $request->input('loan_interest_period'),
                'min_principal_amount' => $request->input('minimum_loan_principal_amount'),
                'def_principal_amount' => $request->input('default_loan_principal_amount'),
                'max_principal_amount' => $request->input('maximum_principal_amount'),
                'min_loan_duration' => $request->input('minimum_loan_duration'),
                'def_loan_duration' => $request->input('default_loan_duration'),
                'max_loan_duration' => $request->input('maximum_loan_duration'),
                'min_loan_interest' => $request->input('minimum_loan_interest'),
                'def_loan_interest' => $request->input('default_loan_interest'),
                'max_loan_interest' => $request->input('maximum_loan_interest'),
                'min_num_of_repayments' => $request->input('minimum_num_of_repayments'),
                'def_num_of_repayments' => $request->input('default_num_of_repayments'),
                'max_num_of_repayments' => $request->input('maximum_num_of_repayments'),
                'loan_type' => $request->input('loan_type_id'),
                'loan_child_type_id' => $request->input('loan_child_type_id'),
            ]);

            // Delete existing records where loan_product_id matches
            LoanCrbProduct::where('loan_product_id', $request->input('loan_product_id'))->delete();
            // Create new records based on input
            foreach ($request->input('crb_selected_products', []) as $value) {
                LoanCrbProduct::create([
                    'loan_product_id' => $request->input('loan_product_id'),
                    'crb_product_id' => $value
                ]);
            }
            // Disbursed By
            foreach ($request->input('loan_disbursed_by', []) as $value) {
                LoanDisbursedBy::updateOrCreate(
                    ['loan_product_id' => $request->input('loan_product_id')],
                    ['disbursed_by_id' => $value, 'loan_product_id' => $request->input('loan_product_id')]
                );
            }

            // Update Interest Method
            LoanInterestMethod::updateOrCreate(
                ['loan_product_id' => $request->input('loan_product_id')], // Search criteria
                [
                    'interest_method_id' => (int)$request->input('loan_interest_method'), // Ensure integer ID
                    'loan_product_id' => $request->input('loan_product_id')
                ]
            );


            // Interest Types
            LoanInterestType::updateOrCreate(
                ['loan_product_id' => $request->input('loan_product_id')],
                ['interest_type_id' => $request->input('loan_interest_type'), 'loan_product_id' => $request->input('loan_product_id')]
            );

            // Repayment Cycles
            foreach ($request->input('loan_repayment_cycle', []) as $value) {
                LoanRepaymentCycle::updateOrCreate(
                    ['loan_product_id' => $request->input('loan_product_id'), 'repayment_cycle_id' => $value],
                    ['repayment_cycle_id' => $value, 'loan_product_id' => $request->input('loan_product_id')]
                );
            }

            // Loan Decimal Places
            foreach ($request->input('loan_decimal_place', []) as $value) {
                LoanDecimalPlace::updateOrCreate(
                    ['loan_product_id' => $request->input('loan_product_id')],
                    ['value' => $value, 'loan_product_id' => $request->input('loan_product_id')]
                );
            }

            // Loan Service Charges
            foreach ($request->input('extra_fees', []) as $value) {
                LoanServiceCharge::updateOrCreate(
                    ['loan_product_id' => $request->input('loan_product_id'), 'service_charge_id' => $value],
                    ['service_charge_id' => $value, 'loan_product_id' => $request->input('loan_product_id')]
                );
            }

            // Loan Automated Payments
            foreach ($request->input('auto_payment_sources', []) as $value) {
                LoanAccountPayment::updateOrCreate(
                    ['loan_product_id' => $request->input('loan_product_id'), 'account_payment_id' => $value],
                    ['account_payment_id' => $value, 'loan_product_id' => $request->input('loan_product_id')]
                );
            }

            // Institutions
            foreach ($request->input('loan_institution', []) as $value) {
                LoanProductInstitution::updateOrCreate(
                    ['loan_product_id' => $request->input('loan_product_id')],
                    ['institution_id' => $value, 'loan_product_id' => $request->input('loan_product_id')]
                );
            }

            Session::flash('success', "Loan product updated successfully.");
            return redirect()->route('item-settings', ['confg' => 'loan', 'settings' => 'loan-types']);

        } catch (\Throwable $th) {
            dd($th);
            Session::flash('error', "Failed. " . $th->getMessage());
            return redirect()->route('item-settings', ['confg' => 'loan', 'settings' => 'loan-types']);
        }
    }

    public function deleteStep($loan_step){
        $del = LoanStatus::where('id', $loan_step)->first();
        $id = $del->loan_product_id;
        $del->delete();
        return redirect()->route('system-edit', ['page' => 'loan-statuses', 'item_id' => $id]);
    }
}