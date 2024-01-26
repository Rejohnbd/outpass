<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\InchargeController;
use App\Http\Controllers\Admin\SubadminController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Incharge\InchargeDashboardController;
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
    // Route::get('approval-outpass/{id}', [AdminDashboardController::class, 'approvalOutpass'])->name('approval-outpass');
    Route::resource('subadmins', SubadminController::class);
    Route::resource('incharges', InchargeController::class);
    Route::get('client-list', [AdminDashboardController::class, 'clientList'])->name('client-list');
    Route::post('get-floors', [InchargeController::class, 'getFloors'])->name('get-floors');
    Route::get('admin-notification', [AdminDashboardController::class, 'AdminNotification'])->name('admin-notification');
});

Route::middleware(['auth', 'incharge'])->group(function () {
    Route::get('incharge-dashboard', [InchargeDashboardController::class, 'index'])->name('incharge-dashboard');
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
    Route::get('change-password', [ClientDashboardController::class, 'changePassword'])->name('change-password');
    Route::post('update-password', [ClientDashboardController::class, 'updatePassword'])->name('update-password');
    Route::get('edit-profile', [ClientDashboardController::class, 'editProfile'])->name('edit-profile');
    Route::post('update-profile', [ClientDashboardController::class, 'updateProfile'])->name('update-profile');
});


require __DIR__ . '/auth.php';
