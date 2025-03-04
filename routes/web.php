<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Client routes with ownership check
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    
    Route::middleware('client.owner')->group(function () {
        Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
        Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
        
        // Cash Loan routes
        Route::get('clients/{client}/cash-loan/create', [LoanController::class, 'createCashLoan'])->name('clients.cash-loan.create');
        Route::post('clients/{client}/cash-loan', [LoanController::class, 'storeCashLoan'])->name('clients.cash-loan.store');
        Route::get('clients/{client}/cash-loan/edit', [LoanController::class, 'editCashLoan'])->name('clients.cash-loan.edit');
        Route::put('clients/{client}/cash-loan', [LoanController::class, 'updateCashLoan'])->name('clients.cash-loan.update');
        Route::delete('clients/{client}/cash-loan', [LoanController::class, 'destroyCashLoan'])->name('clients.cash-loan.destroy');
        
        // Home Loan routes
        Route::get('clients/{client}/home-loan/create', [LoanController::class, 'createHomeLoan'])->name('clients.home-loan.create');
        Route::post('clients/{client}/home-loan', [LoanController::class, 'storeHomeLoan'])->name('clients.home-loan.store');
        Route::get('clients/{client}/home-loan/edit', [LoanController::class, 'editHomeLoan'])->name('clients.home-loan.edit');
        Route::put('clients/{client}/home-loan', [LoanController::class, 'updateHomeLoan'])->name('clients.home-loan.update');
        Route::delete('clients/{client}/home-loan', [LoanController::class, 'destroyHomeLoan'])->name('clients.home-loan.destroy');
    });
    
    // Report routes
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/export', [ReportController::class, 'export'])->name('reports.export');
});

