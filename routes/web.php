<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\InchargeController;
use App\Http\Controllers\Admin\SubadminController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Incharge\InchargeDashboardController;
use App\Http\Controllers\OutpassController;
use App\Http\Controllers\Subadmin\SubadminDashboardController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('client-list', [AdminDashboardController::class, 'clientList'])->name('client-list');
    Route::get('new-client-list', [AdminDashboardController::class, 'newClientList'])->name('new-client-list');
    Route::post('admin-client-approve', [AdminDashboardController::class, 'clientApprove'])->name('admin-client-approve');
    Route::get('admin-notification', [AdminDashboardController::class, 'AdminNotification'])->name('admin-notification');
    Route::get('outpassapprove/{id}', [AdminDashboardController::class, 'approvalOutpass'])->name('outpassapprove');
    Route::put('outpassapprove/{id}', [AdminDashboardController::class, 'outpassApproval'])->name('outpassapprove');
    Route::delete('delete-outpass/{id}', [AdminDashboardController::class, 'deleteOutpass'])->name('delete-outpass');
    Route::post('report-admin', [AdminDashboardController::class, 'reportAdmin'])->name('report-admin');
    Route::resource('subadmins', SubadminController::class);
    Route::resource('incharges', InchargeController::class);
    Route::post('get-floors', [InchargeController::class, 'getFloors'])->name('get-floors');
});

Route::middleware(['auth', 'subadmin'])->group(function () {
    Route::get('admindashboard', [SubadminDashboardController::class, 'index'])->name('admindashboard');
    Route::get('admin-new-client', [SubadminDashboardController::class, 'newClientList'])->name('admin-new-client');
    Route::post('subadmin-client-approve', [SubadminDashboardController::class, 'clientApprove'])->name('subadmin-client-approve');
    Route::get('outpass-approval/{id}', [SubadminDashboardController::class, 'approvalOutpass'])->name('outpass-approval');
    Route::put('outpassapproval/{id}', [SubadminDashboardController::class, 'outpassApproval'])->name('outpassapproval');
    Route::get('subadmin-notification', [SubadminDashboardController::class, 'subadminNotification'])->name('subadmin-notification');
    Route::post('report-subadmin', [SubadminDashboardController::class, 'reportSubadmin'])->name('report-subadmin');
});


Route::middleware(['auth', 'incharge'])->group(function () {
    Route::get('incharge-dashboard', [InchargeDashboardController::class, 'index'])->name('incharge-dashboard');
    Route::get('incharge-new-client', [InchargeDashboardController::class, 'newClientList'])->name('incharge-new-client');
    Route::post('incharge-client-approve', [InchargeDashboardController::class, 'clientApprove'])->name('incharge-client-approve');
    Route::get('approve-outpass/{id}', [InchargeDashboardController::class, 'approvalOutpass'])->name('approve-outpass');
    Route::put('approveoutpass/{id}', [InchargeDashboardController::class, 'outpassApproval'])->name('approveoutpass');
    Route::get('incharge-notification', [InchargeDashboardController::class, 'inchargeNotification'])->name('incharge-notification');
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('additonal-info', [ClientDashboardController::class, 'additonalInfo'])->name('additonal-info');
    Route::post('additonal-info', [ClientDashboardController::class, 'additonalInfoSave'])->name('additonal-info');
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard')->middleware('check_addition');
    Route::get('request-pass', [ClientDashboardController::class, 'createOutpass'])->name('request-pass')->middleware('check_addition');
    Route::post('request-pass', [ClientDashboardController::class, 'storeOutpass'])->name('request-pass')->middleware('check_addition');
    Route::get('client-notification', [ClientDashboardController::class, 'clientNotification'])->name('client-notification');
    Route::post('client-notification-clear', [ClientDashboardController::class, 'clientNotificationClear'])->name('client-notification-clear');
    Route::get('download-outpass/{id}', [ClientDashboardController::class, 'downloadOutpass'])->name('download-outpass')->middleware('check_addition');
    Route::get('change-password', [ClientDashboardController::class, 'changePassword'])->name('change-password')->middleware('check_addition');
    Route::post('update-password', [ClientDashboardController::class, 'updatePassword'])->name('update-password')->middleware('check_addition');
    Route::get('edit-profile', [ClientDashboardController::class, 'editProfile'])->name('edit-profile')->middleware('check_addition');
    Route::post('update-profile', [ClientDashboardController::class, 'updateProfile'])->name('update-profile')->middleware('check_addition');
});

Route::get('checkout', [OutpassController::class, 'checkout'])->name('checkout');
Route::post('submit-checkout', [OutpassController::class, 'checkoutSubmit'])->name('submit-checkout');
Route::get('checkin', [OutpassController::class, 'checkin'])->name('checkin');
Route::post('submit-checkin', [OutpassController::class, 'checkInSubmit'])->name('submit-checkin');

// Route::get('checkoutpass', function () {
//     return view('web.checkoutpass');
// });

require __DIR__ . '/auth.php';
