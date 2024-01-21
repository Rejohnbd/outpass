<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOutpassController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientOutpassController;
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
    Route::resource('out-pass', AdminOutpassController::class);
    Route::put('out-pass-approval/{id}', [AdminOutpassController::class, 'outPassApproval'])->name('out-pass-approval');
    Route::put('out-pass-reject/{id}', [AdminOutpassController::class, 'outPassReject'])->name('out-pass-reject');
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('additonal-info', [ClientDashboardController::class, 'additonalInfo'])->name('additonal-info');
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard')->middleware('check_addition');
    Route::resource('outpass', ClientOutpassController::class)->middleware('check_addition');
});


require __DIR__ . '/auth.php';
