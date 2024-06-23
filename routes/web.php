<?php

use App\Http\Controllers\ExecutiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerCareController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Resource routes for all controllers
Route::middleware('auth')->group(function () {
    Route::resource('payments', PaymentController::class);
    Route::resource('customer-cares', CustomerCareController::class);
    Route::resource('owners', OwnerController::class);
    Route::resource('managers', ManagerController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('halls', HallController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('users', UserController::class);

    // Executive section routes
    Route::get('/executive', [ExecutiveController::class, 'index'])->name('executive.index');
    Route::get('/executive/create-owner', [ExecutiveController::class, 'createOwner'])->name('executive.create_owner');
    Route::post('/executive/store-owner', [ExecutiveController::class, 'storeOwner'])->name('executive.store_owner');
    Route::delete('/executive/destroy-owner/{owner}', [ExecutiveController::class, 'destroyOwner'])->name('executive.destroy_owner');
    Route::get('/executive/create-manager', [ExecutiveController::class, 'createManager'])->name('executive.create_manager');
    Route::post('/executive/store-manager', [ExecutiveController::class, 'storeManager'])->name('executive.store_manager');
    Route::delete('/executive/destroy-manager/{manager}', [ExecutiveController::class, 'destroyManager'])->name('executive.destroy_manager');
});

// Home route pointing to the dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Dashboard route showing the list of halls
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';

// Home route for authenticated users
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route for creating a booking with hall_id
Route::get('bookings/create/{hall_id}', [BookingController::class, 'create'])->middleware('auth')->name('bookings.create');
