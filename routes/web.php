<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Business\BusinessDashboardController,
    Customer\CustomerDashboardController,
    Admin\AdminDashboard,
    Admin\UserManagementController,
    Admin\AdminAuthPageController,
    AuthController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('business.auth.show');
Route::get('/business/login', [AuthController::class, 'showBusinessLogin'])->name('business.auth.show');
Route::get('/customer/login', [AuthController::class, 'showCustomerLogin'])->name('customer.auth.show');

Route::middleware(['web'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard.show');
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
});
Route::middleware(['web'])->prefix('business')->group(function () {
    Route::get('/dashboard', [BusinessDashboardController::class, 'dashboard'])->name('business.dashboard.show');
});
Route::middleware(['web'])->prefix('customer')->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard.show');
});


