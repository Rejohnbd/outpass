<?php

use App\Http\Controllers\Admin\AdminDashboardController;
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
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::resource('outpass', ClientOutpassController::class);
});


require __DIR__ . '/auth.php';
