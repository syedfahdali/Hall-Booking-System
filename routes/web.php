<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

// Resource routes for all controllers
Route::resource('payments', PaymentController::class)->middleware('auth');
Route::resource('customer-cares', CustomerCareController::class)->middleware('auth');
Route::resource('owners', OwnerController::class)->middleware('auth');
Route::resource('managers', ManagerController::class)->middleware('auth');
Route::resource('employees', EmployeeController::class)->middleware('auth');
Route::resource('halls', HallController::class)->middleware('auth');
Route::resource('bookings', BookingController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

// Change home route to point to the dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard route to show the list of halls
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';

// Home route for authenticated users
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route for creating a booking with hall_id
Route::get('bookings/create/{hall_id}', [BookingController::class, 'create'])->name('bookings.create')->middleware('auth');
