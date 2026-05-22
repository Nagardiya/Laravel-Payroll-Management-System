<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EmployeeController::class, 'dashboard'])
        ->middleware(['auth'])
        ->name('dashboard');


// 🔐 EMPLOYEE ROUTES (Protected)
Route::middleware(['auth'])->group(function () {

    // Employee List
    Route::get('/employees', [EmployeeController::class, 'index']);

    // Create Employee
    Route::get('/employees/create', [EmployeeController::class, 'create']);

    // Store Employee
    Route::post('/employees/store', [EmployeeController::class, 'store']);

    // Edit Employee
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);

    // Update Employee
    Route::post('/employees/update/{id}', [EmployeeController::class, 'update']);

    // 🔥 Dashboard Stats
    Route::get('/dashboard-stats', [EmployeeController::class, 'dashboard']);

    // Delete Employee
    Route::get('/employees/delete/{id}', [EmployeeController::class, 'delete']);



    // 👤 PROFILE ROUTES
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';