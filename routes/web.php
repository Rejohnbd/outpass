<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\InchargeController;
use App\Http\Controllers\Client\ClientDashboardController;
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
    Route::get('approval-outpass/{id}', [AdminDashboardController::class, 'approvalOutpass'])->name('approval-outpass');
    Route::put('approvaloutpass/{id}', [AdminDashboardController::class, 'outpassApproval'])->name('approvaloutpass');
    Route::resource('incharges', InchargeController::class);
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('additonal-info', [ClientDashboardController::class, 'additonalInfo'])->name('additonal-info');
    Route::post('additonal-info', [ClientDashboardController::class, 'additonalInfoSave'])->name('additonal-info');
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard')->middleware('check_addition');
    Route::get('request-pass', [ClientDashboardController::class, 'createOutpass'])->name('request-pass')->middleware('check_addition');
    Route::post('request-pass', [ClientDashboardController::class, 'storeOutpass'])->name('request-pass')->middleware('check_addition');
});


require __DIR__ . '/auth.php';
