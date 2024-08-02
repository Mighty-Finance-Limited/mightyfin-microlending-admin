<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\LoanProductController;
use App\Http\Livewire\AlreadyExistPage;
use App\Http\Livewire\CareerPage;
use App\Http\Livewire\ContactPage;
use App\Http\Livewire\Dashboard\Accounting\LoanStatementView;
use App\Http\Livewire\Dashboard\Accounts\AccountView;
use App\Http\Livewire\Dashboard\Accounts\MakePaymentView;
use App\Http\Livewire\Dashboard\Accounts\MyProfile;
use App\Http\Livewire\Dashboard\Borrowers\BorrowerView;
use App\Http\Livewire\Dashboard\Borrowers\LoanStatementView as BorrowersLoanStatementView;
use App\Http\Livewire\Dashboard\Borrowers\NewCustomer;
use App\Http\Livewire\Dashboard\Borrowers\SendBorrowerMessageView;
use App\Http\Livewire\Dashboard\DashboardView;
use App\Http\Livewire\Dashboard\Employees\EmployeesView;
use App\Http\Livewire\Dashboard\HRM\Contracts;
use App\Http\Livewire\Dashboard\HRM\Dashboard;
use App\Http\Livewire\Dashboard\HRM\Insurance;
use App\Http\Livewire\Dashboard\HRM\Payroll;
use App\Http\Livewire\Dashboard\HRM\Staff;
use App\Http\Livewire\Dashboard\Loans\ApprovedLoansView;
use App\Http\Livewire\Dashboard\Loans\ClosedLoanView;
use App\Http\Livewire\Dashboard\Loans\CreateLoanView;

use App\Http\Livewire\Dashboard\Loans\EligibilityScoreView;
use App\Http\Livewire\Dashboard\Loans\GuarantorsView;
use App\Http\Livewire\Dashboard\Loans\LoanApplicationStandaloneView;
use App\Http\Livewire\Dashboard\Loans\LoanArears;
use App\Http\Livewire\Dashboard\Loans\LoanCalculator;
use App\Http\Livewire\Dashboard\Loans\LoanCalcutor;
use App\Http\Livewire\Dashboard\Loans\LoanDetailedView;
use App\Http\Livewire\Dashboard\Loans\LoanDetailView;
use App\Http\Livewire\Dashboard\Loans\LoanHistoryView;
use App\Http\Livewire\Dashboard\Loans\LoanRatesView;
use App\Http\Livewire\Dashboard\Loans\LoanRepaymentCalculatorView;
use App\Http\Livewire\Dashboard\Loans\LoanRepaymentView;
use App\Http\Livewire\Dashboard\Loans\LoanRequestView;
use App\Http\Livewire\Dashboard\Loans\LoanViewAllView;
use App\Http\Livewire\Dashboard\Loans\LoanTrackingView;
use App\Http\Livewire\Dashboard\Loans\MissedRepaymentsView;
use App\Http\Livewire\Dashboard\Loans\NewLoanView;
use App\Http\Livewire\Dashboard\Loans\NoRepayments;
use App\Http\Livewire\Dashboard\Loans\OneMonthLate;
use App\Http\Livewire\Dashboard\Loans\PastMaturityDateView;
use App\Http\Livewire\Dashboard\Loans\PrincipalOutstanding;
use App\Http\Livewire\Dashboard\Loans\ThreeMonthLate;
use App\Http\Livewire\Dashboard\Loans\UpdateLoanView;
use App\Http\Livewire\Dashboard\NotificationView;
use App\Http\Livewire\Dashboard\PaymentGatePage;
use App\Http\Livewire\Dashboard\PaymentPage;
use App\Http\Livewire\Dashboard\SearchEngineView;
use App\Http\Livewire\Dashboard\Settings\LoanWalletView;
use App\Http\Livewire\Dashboard\Settings\SettingsLanding;
use App\Http\Livewire\Dashboard\Settings\UserRolesView;
use App\Http\Livewire\Dashboard\Settings\UserView;
use App\Http\Livewire\Dashboard\Settings\CareerSettings;
use App\Http\Livewire\Dashboard\Settings\ContactSettings;
use App\Http\Livewire\Dashboard\Settings\UserUpdateView;
use App\Http\Livewire\Dashboard\SiteSettings\CreateSetting;
use App\Http\Livewire\Dashboard\SiteSettings\SystemItemSettings;
use App\Http\Livewire\Dashboard\SiteSettings\SystemSettings;
use App\Http\Livewire\Dashboard\SiteSettings\TestPage;
use App\Http\Livewire\Dashboard\SiteSettings\UpdateSetting;
use App\Http\Livewire\Dashboard\SiteSettings\ViewSetting;

use App\Http\Livewire\GuidelinePage;
use App\Http\Livewire\KYCView;
use App\Http\Livewire\PersonFour;
use App\Http\Livewire\PersonOne;
use App\Http\Livewire\PersonThree;
use App\Http\Livewire\PersonTwo;
use App\Http\Livewire\PrivacyPolicyPage;
use App\Http\Livewire\ReportView;
use App\Http\Livewire\ServicePage;
use App\Http\Livewire\SuccessEmailPage;
use App\Http\Livewire\SuccessPage;

use App\Http\Livewire\TermsConditionPage;
use App\Http\Livewire\WelcomePage;
use App\Http\Livewire\WithdrawRequestView;
use App\Models\LoanWallet;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });
Route::get('/', function () {
  return redirect()->route('login');
})->name('home');
Route::get('/welcome', function () {
    return redirect()->route('login');
})->name('welcome');

Route::post('/share-docs', [UserController::class, 'share_doc'])->name('share.docs');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('otp-verification', [OTPController::class, 'index'])->name('otp');
    Route::get('/dashboard', DashboardView::class)->name('dashboard');
    Route::get('/search', SearchEngineView::class)->name('search');
    // Administrator
    Route::get('view-all-loans', LoanViewAllView::class)->name('loans');
    Route::get('open-loans', ApprovedLoansView::class)->name('approved-loans');
    Route::get('due-loans', ApprovedLoansView::class)->name('due-loans');
    Route::get('new-loan-request', NewLoanView::class)->name('new-loan');
    Route::get('client-loan-requests', LoanRequestView::class)->name('view-loan-requests');
    Route::get('active-repayments', LoanRepaymentView::class)->name('repayments');
    Route::get('track-repayments/{id}', LoanTrackingView::class)->name('track-repayments');
    Route::get('closed-loans', ClosedLoanView::class)->name('closed-loans');
    Route::get('edit-loan-details/{id}', UpdateLoanView::class)->name('edit-loan');
    Route::get('new-loan', CreateLoanView::class)->name('proxy-loan-create');
    Route::get('withdraw-requests', WithdrawRequestView::class)->name('withdraw-requests');
    Route::get('client-loan-history', LoanHistoryView::class)->name('view-loan-history');
    Route::get('loan-rates', LoanRatesView::class)->name('view-loan-rates');
    Route::get('repayment-calculator', LoanRepaymentCalculatorView::class)->name('view-repayment-calculator');
    Route::get('edit-user/{id}', UserUpdateView::class)->name('edit-user');


    // ---- Borrowers
    Route::get('borrowers', BorrowerView::class)->name('borrowers');
    Route::get('new-borrower', NewCustomer::class)->name('new-borrower');
    Route::get('loan-statement/{id}', BorrowersLoanStatementView::class)->name('loan-statement');
    Route::get('send-messages-to-borrowers', SendBorrowerMessageView::class)->name('notify-borrowers');

    // ---- loans
    Route::get('apply-for-a-loan/{id}', LoanApplicationStandaloneView::class)->name('apply-for');
    Route::get('loan-approval/{id}', LoanDetailView::class)->name('loan-details');
    Route::get('loan-details/{id}', LoanDetailedView::class)->name('detailed');
    Route::get('no-repayments', NoRepayments::class)->name('no-repayments');
    Route::get('loan-calculator', LoanCalculator::class)->name('loan-calculator');
    Route::get('loan-arrears', LoanArears::class)->name('loan-arrears');
    Route::get('principal-outstanding', PrincipalOutstanding::class)->name('principal-outstanding');
    Route::get('one-month-late-loans', OneMonthLate::class)->name('one-month-late');
    Route::get('three-months-late-loans', ThreeMonthLate::class)->name('three-month-late');
    Route::get('past-maturity-date', PastMaturityDateView::class)->name('past-maturity-date');
    Route::get('guarantors', GuarantorsView::class)->name('guarantors');
    Route::get('missed-repayments', MissedRepaymentsView::class)->name('missed-repayments');
    Route::post('apply-for-loan', [LoanApplicationController::class, 'new_loan'])->name('apply-loan');
    Route::post('apply-proxy-loan', [LoanApplicationController::class, 'new_proxy_loan'])->name('proxy-apply-loan');
    Route::post('update-loan', [LoanApplicationController::class, 'updateLoanDetails'])->name('update-loan-details');
    Route::post('delete-loans', [LoanApplicationController::class, 'deleteLoans'])->name('delete-loans');
    Route::post('reset-loans', [LoanApplicationController::class, 'resetLoans'])->name('reset-loans');
    Route::post('update-loan-statuses', [LoanProductController::class, 'updateLoanStatus'])->name('update-loan-statuses');
    Route::get('delete-loan-step/{loan_step}', [LoanProductController::class, 'deleteStep'])->name('delete-loan-step');

    // Data Import & Export

    Route::post('export-loans', [ExportController::class, 'export_loans'])->name('export-loans');
    Route::post('import-loans', [ImportController::class, 'import_loans'])->name('import-loans');

    // ---- Payments
    Route::get('make-payments', PaymentPage::class)->name('payments');
    Route::get('/payments-portal', PaymentGatePage::class)->name('payment.gate');

    // ---- HRM
    Route::get('hrm-dashboard', Dashboard::class)->name('hrm.dashboard');
    Route::get('staff', Staff::class)->name('hrm.staff');
    Route::get('payroll', Payroll::class)->name('hrm.payroll');
    Route::get('insurance', Insurance::class)->name('insurance');
    Route::get('contracts', Contracts::class)->name('contracts');

    // ---- Employees
    Route::get('view-employees', EmployeesView::class)->name('employees');

    // ---- Accounts
    Route::get('client-account', AccountView::class)->name('client-account');
    Route::get('loan-statements', LoanStatementView::class)->name('loan-statements');
    Route::get('my-wallet-account', LoanWalletView::class)->name('loan-wallet');
    Route::get('transactions', MakePaymentView::class)->name('make-payment');

    // ----- Reports
    Route::get('reports/loan-report', ReportView::class)->name('loan-report');
    Route::get('reports/borrower-report', ReportView::class)->name('borrower-report');

    // ----- settings
    Route::get('users', UserView::class)->name('users');
    Route::get('loan-rates', LoanRatesView::class)->name('loan-rates');
    Route::get('careers-settings', CareerSettings::class)->name('careers-settings');
    Route::get('contact-settings', ContactSettings::class)->name('contact-settings');
    Route::post('/create-user', [UserController::class, 'store'])->name('create-user');
    Route::post('/update-user', [UserController::class, 'update'])->name('update-user');
    Route::get('notifications', NotificationView::class)->name('notifications');
    Route::get('user-roles-and-permissions', UserRolesView::class)->name('roles');
    Route::get('settings', SettingsLanding::class)->name('settings');


    // ------ Role Permission
    Route::post('create-role', [RoleController::class, 'store'])->name('create-role');
    Route::post('update-role', [RoleController::class, 'update'])->name('update-role');

    // ----- System Settings
    Route::get('system-settings', SystemSettings::class)->name('sys-settings');
    Route::get('system-property-settings', SystemItemSettings::class)->name('item-settings');
    Route::get('system-create-setting', CreateSetting::class)->name('system-create');
    Route::get('system-edit-setting', UpdateSetting::class)->name('system-edit');
    Route::get('system-view-setting', ViewSetting::class)->name('system-view');
    Route::get('test-page', TestPage::class)->name('test-page');

    // ------ KYC Profile
    Route::get('kyc-profile', KYCView::class)->name('kyc');
    Route::post('updating-file-uploads', [LoanApplicationController::class, 'updateFiles'])->name('update-file-uploads');
    Route::post('updating-kyc-uploads', [LoanApplicationController::class, 'updateKYCFiles'])->name('update-kyc-uploads');
    Route::post('update-prof-pic', [UserController::class, 'updatePic'])->name('update-prof-pic');
    Route::post('update-profile', [UserController::class, 'updateProfile'])->name('update-profile');

    Route::get('my-profile', MyProfile::class)->name('my-profile');

    // ------- Loan Continue Completion
    Route::post('continue-loan', [LoanApplicationController::class, 'continue_loan'])->name('continue-loan');

});

// Route::resource('posts', PostController::class);
Route::get('eligibility-score/{id}', EligibilityScoreView::class)->name('score');


Route::post('request-for-loan', [LoanApplicationController::class, 'store'])->name('loan-request');
Route::post('assign-manual-approval', [LoanApplicationController::class, 'assign_manual'])->name('assign-manual-approval');

Route::get('get-application', [LoanApplicationController::class, 'getLoan'])->name('get-application');
Route::get('update-existing-application', [LoanApplicationController::class, 'updateExistingLoan'])->name('update-existing-application');

// Legal Pages
Route::get('privacy-policy', PrivacyPolicyPage::class)->name('pp');
Route::get('terms-and-conditions', TermsConditionPage::class)->name('terms');
Route::get('how-to', GuidelinePage::class)->name('guideline');

// Alerts and Notifications
Route::get('successfully-applied-a-loan', SuccessPage::class)->name('success-application');
Route::get('email-sent-successfully', SuccessEmailPage::class)->name('success-email');

// Errors
Route::get('account-already-exists', AlreadyExistPage::class)->name('already-exists');
Route::get('you-already-have-a-loan/{id}', [LoanApplicationController::class, 'alreadyLoaned'])->name('loan-exists');
