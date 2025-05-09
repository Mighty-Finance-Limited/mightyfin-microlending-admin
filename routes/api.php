<?php

use App\Http\Controllers\Api\LoanRequestController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserAuthenticationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\LoanProductController;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('apply-loan', LoanRequestController::class);
Route::post('register', [UserAuthenticationController::class, 'register']);
Route::post('login', [UserAuthenticationController::class, 'login']);
Route::post('verify-otp', [OTPController::class, 'verifyOTP']);



Route::post('update-profile', [UserController::class, 'updateProfile']);
Route::post('change-password', [UserController::class, 'updatePassword']);
Route::post('upload-files', [UserController::class, 'uploadFiles']);


// Functions
Route::post('request-for-loan', [LoanApplicationController::class, 'store']);
Route::post('apply-for-loan', [LoanApplicationController::class, 'new_loan']);
Route::get('get-my-loans/{id}', [LoanRequestController::class, 'getMyLoans']);

Route::get('get-my-loan-balance/{loan_id}', [LoanRequestController::class, 'loanBalance']);
Route::get('get-my-balance/{user_id}', [LoanRequestController::class, 'customerBalance']);

Route::get('get-loan-interest-rate/{duration}/{principal}', [LoanRequestController::class, 'interestRate']);
Route::get('get-loan-interest-amount/{duration}/{principal}', [LoanRequestController::class, 'interestAmount']);
Route::get('get-loan-monthly-installment-amount/{duration}/{principal}', [LoanRequestController::class, 'loanMonthlyInstallments']);
Route::get('/v2/loan-monthly/{loan_id}', [LoanRequestController::class, 'loanMonthlyInstallments']);
Route::get('get-total-payback-amount/{duration}/{principal}', [LoanRequestController::class, 'totalCollectable']);


Route::get('/get-loan-products', [SettingController::class, '__get_loan_products']);
Route::get('/get-loan-product-details/{loan_id}', [SettingController::class, '__get_loan_details']);

Route::get('/get-loan-processing-statuses', [SettingController::class, '__get_processing_status']);
Route::get('/get-loan-open-statuses', [SettingController::class, '__get_open_status']);
Route::get('/get-loan-defaulted-statuses', [SettingController::class, '__get_defaulted_status']);
Route::get('/get-loan-denied-statuses', [SettingController::class, '__get_denied_status']);
Route::get('/get-loan-not-taken-up-statuses', [SettingController::class, '__get_not_taken_status']);


// Deprected
Route::get('get-my-wallet/{id}', [LoanRequestController::class, 'getWallets']);
Route::get('get-my-withdrawal-requests/{id}', [LoanRequestController::class, 'getWithdrawalRequests']);
Route::post('make-withdrawal-request', [LoanRequestController::class, 'makeWithdrawalRequest']);

// ------ Administration
// Admin Settings
Route::get('/get-approvers-users', [SettingController::class, '__get_approvers']);
Route::post('/set-auto-approvers', [SettingController::class, '__set_approvers']);
Route::post('/loan-products/update-status', [LoanProductController::class, 'update_status']);


// -----------------------------------------------version2
Route::get('/v2/loan/{id}/details', [LoanApplicationController::class, 'getDetails']);

//payback
Route::get('/v2/payback', function (Request $request) {
    $id = $request->query('loan');
    $loan = Application::where('id', $id)->first();
    if (!$loan) {
        return response()->json(['error' => 'Missing required parameters'], 400);
    }

    $paybackAmount = Application::payback($loan);

    return response()->json(['payback' => $paybackAmount]);
});


//loan_monthly_installment
Route::get('/v2/monthly', function (Request $request) {
    $id = $request->query('loan');
    Log::info('Data is: ' . $id);
    $loan = Application::where('id', $id)->first();
    if (!$loan) {
        return response()->json(['error' => 'Missing required parameters loan'], 400);
    }
    $paybackInstall = Application::monthInstallment($loan);
    return response()->json(['month' => $paybackInstall]);
});

//loan_repayment_schedule
Route::get('/v2/loan-repayment-schedule', function (Request $request) {
    $id = $request->query('loan');
    $loan = Application::where('id', $id)->first();
    if (!$loan) {
        return response()->json(['error' => 'Missing required parameters'], 400);
    }

    $paybackAmount = Application::payback($loan);

    return response()->json(['payback' => $paybackAmount]);
});
Route::post('/api/submit-risk-assessment', [RiskAssessmentController::class, 'store']);