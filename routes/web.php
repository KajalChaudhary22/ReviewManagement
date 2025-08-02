<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BusinessAuthPageController,
    CustomerAuthPageController,
    Admin\AdminDashboard,
    Admin\UserManagementController,
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
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard.show');
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
});
Route::get('/business/login', [BusinessAuthPageController::class, 'show'])->name('business.auth.show');
Route::get('/customer/login', [CustomerAuthPageController::class, 'show'])->name('customer.auth.show');
// Route::get('/admin/dashboard', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard.show');
// Route::prefix('customer')->group(function () {

// });
