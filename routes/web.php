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

// Resource routes for all controllers
Route::resource('payments', PaymentController::class);
Route::resource('customer-cares', CustomerCareController::class);
Route::resource('owners', OwnerController::class);
Route::resource('managers', ManagerController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('halls', HallController::class);
Route::resource('bookings', BookingController::class);
Route::resource('users', UserController::class);

// Change home route to point to the dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Dashboard route to show the list of halls
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
Auth::routes();

// Home route for authenticated users
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for creating a booking with hall_id
Route::get('bookings/create/{hall_id}', [BookingController::class, 'create'])->name('bookings.create');
