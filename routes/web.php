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

Route::resource('payments', PaymentController::class);
Route::resource('customer-cares', CustomerCareController::class);
Route::resource('owners', OwnerController::class);
Route::resource('managers', ManagerController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('halls', HallController::class);
Route::resource('bookings', BookingController::class);
Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
