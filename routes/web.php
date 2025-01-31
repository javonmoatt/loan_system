<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoanFeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CreditScoreController;
use App\Http\Controllers\LoanCommentController;
use App\Http\Controllers\LoanPenaltyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LoanGuarantorController;
use App\Http\Controllers\LoanInsuranceController;
use App\Http\Controllers\LoanCollateralController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Settings Route
Route::middleware('auth')->group(function () {
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::middleware('auth')->group(function () {
    Route::resource('payments', PaymentController::class);
});

// Loan Routes
Route::middleware('auth')->group(function () {
    Route::resource('loans', LoanController::class)->except(['destroy']);
    Route::get('loans/{loan}/approve', [LoanController::class, 'approve'])->name('loans.approve');
    Route::get('loans/{loan}/reject', [LoanController::class, 'reject'])->name('loans.reject');
});

// Transaction Routes
Route::middleware('auth')->group(function () {
    Route::resource('transactions', TransactionController::class);
});

// Application Routes
Route::middleware('auth')->group(function () {
    Route::resource('applications', ApplicationController::class);
    // Route::post('/approvals', [ApprovalController::class, 'store'])->name('approvals.store');
    // Route::post('/approvals', [ApprovalController::class, 'store'])->name('reject.store');
    //Route::get('applications/{application}/approve', [ApplicationController::class, 'approve'])->name('application.approve');
    //Route::get('applications/{application}/reject', [ApplicationController::class, 'reject'])->name('application.reject');
});

// Notification Routes
Route::middleware('auth')->group(function () {
    Route::resource('notifications', NotificationController::class)->only(['index', 'show']);
});

Route::middleware('auth')->group(function () {
    Route::resource('loan-types', LoanTypeController::class);
});

// Loan Penalty Routes
Route::middleware('auth')->group(function () {
    Route::resource('loan-penalties', LoanPenaltyController::class);
});

// Loan Insurance Routes
Route::middleware('auth')->group(function () {
    Route::resource('loan-insurances', LoanInsuranceController::class);
});

// Loan Guarantor Routes
Route::middleware('auth')->group(function () {
    Route::resource('loan-guarantors', LoanGuarantorController::class);
});

// Loan Fee Routes
Route::middleware('auth')->group(function () {
    Route::resource('loan-fees', LoanFeeController::class);
});

// Loan Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('loans', LoanController::class);
});

// Loan Comment Routes
Route::middleware('auth')->group(function () {
    Route::resource('loan-comments', LoanCommentController::class);
});

// Loan Collateral Routes
Route::middleware('auth')->group(function () {
    Route::resource('loan-collaterals', LoanCollateralController::class);
});

// Document Routes
Route::middleware('auth')->group(function () {
    Route::resource('documents', DocumentController::class);
});

// Credit Score Routes
Route::middleware('auth')->group(function () {
    Route::resource('credit-scores', CreditScoreController::class)->only(['index', 'show']);
});

// Customer Routes
Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
});

// Approval Routes
Route::middleware('auth')->group(function () {
    Route::resource('approvals', ApprovalController::class);
});

// Audit Log Routes
Route::middleware('auth')->group(function () {
    Route::resource('audit-logs', AuditLogController::class)->only(['index', 'show']);
});

// Reports Page
Route::prefix('reports')->group(function () {
    // Main Reports Page
    Route::get('/', [ReportController::class, 'index'])->name('reports.index');
    // Loans Report
    Route::get('/loans', [ReportController::class, 'loans'])->name('reports.loans');
    // Customers Report
    Route::get('/customers', [ReportController::class, 'customers'])->name('reports.customers');
    // Payments Report
    Route::get('/payments', [ReportController::class, 'payments'])->name('reports.payments');
});

// Audit Log Routes
Route::middleware('auth')->group(function () {
    Route::resource('riskcompliance', RiskController::class);
});

// Audit Log Routes
Route::middleware('auth')->group(function () {
    Route::resource('financial', FinancialController::class);
});

require __DIR__.'/auth.php';
