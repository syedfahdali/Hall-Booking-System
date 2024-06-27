<?php

use App\Http\Controllers\{
    ExecutiveController,
    ProfileController,
    PaymentController,
    CustomerCareController,
    OwnerController,
    ManagerController,
    EmployeeController,
    HallController,
    BookingController,
    UserController,
    DashboardController,
    HomeController
};
use Illuminate\Support\Facades\Route;

// Resource routes and other routes under the auth middleware
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
    Route::prefix('executive')->name('executive.')->group(function () {
        Route::get('/', [ExecutiveController::class, 'index'])->name('index');
        Route::get('create-owner', [ExecutiveController::class, 'createOwner'])->name('create_owner');
        Route::post('store-owner', [ExecutiveController::class, 'storeOwner'])->name('store_owner');
        Route::delete('destroy-owner/{owner}', [ExecutiveController::class, 'destroyOwner'])->name('destroy_owner');
        Route::get('create-manager', [ExecutiveController::class, 'createManager'])->name('create_manager');
        Route::post('store-manager', [ExecutiveController::class, 'storeManager'])->name('store_manager');
        Route::delete('destroy-manager/{manager}', [ExecutiveController::class, 'destroyManager'])->name('destroy_manager');
    });

    // Profile routes for authenticated users
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Route for creating a booking with hall_id
    Route::get('bookings/create/{hall_id}', [BookingController::class, 'create'])->name('bookings.create');
});

// Home route pointing to the dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Dashboard route showing the list of halls
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Home route for authenticated users
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Auth routes
require __DIR__.'/auth.php';
