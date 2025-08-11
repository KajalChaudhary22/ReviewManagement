<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{
    CustomerAuthController,
    ForgotPasswordController,
    BusinessAuthController,
    AdminAuthController,
    ResetPasswordController
};
use App\Http\Controllers\Api\Admin\{
    UserManagementController,
    BusinessManagementController,
    AdminDashboardController,
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('customer')->group(function () {
    Route::post('register', [CustomerAuthController::class, 'register']);
    Route::post('login', [CustomerAuthController::class, 'login']);
});

Route::prefix('business')->group(function () {
    Route::post('register', [BusinessAuthController::class, 'register']);
    Route::post('login', [BusinessAuthController::class, 'login']);
});

Route::prefix('admin')->group(function () {
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard.show');
        Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        Route::get('/users-list', [UserManagementController::class, 'usersList'])->name('users.list');
        Route::get('/user-view/{id}', [UserManagementController::class, 'userView'])->name('user.view');
        Route::put('/user-update/{id}', [UserManagementController::class, 'userUpdate'])->name('user.update');
        Route::delete('/user-delete/{id}', [UserManagementController::class, 'userDelete'])->name('user.delete');
        Route::post('/user-status/{id}', [UserManagementController::class, 'changeStatus'])->name('user.status');
        Route::post('/user-add', [UserManagementController::class, 'userAdd']);
        // Route::post('users', [UserController::class, 'store']);      // Create
        // Route::get('users/{id}', [UserController::class, 'show']);   // View single
        // Route::put('users/{id}', [UserController::class, 'update']); // Update
        // Route::delete('users/{id}', [UserController::class, 'destroy']); // Delete
        Route::get('/business-management', [BusinessManagementController::class, 'index'])->name('business.management.index');
        // Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard.show');
        // Route::get('/user-management', [BusinessManagementController::class, 'index'])->name('user.management.index');
        Route::get('/business-list', [BusinessManagementController::class, 'BusinessList']);
        Route::get('/user-view/{id}', [BusinessManagementController::class, 'userView'])->name('user.view');
        Route::put('/user-update/{id}', [BusinessManagementController::class, 'userUpdate'])->name('user.update');
        Route::delete('/user-delete/{id}', [BusinessManagementController::class, 'userDelete'])->name('user.delete');
        Route::post('/user-add', [BusinessManagementController::class, 'userAdd']);
        // Route::get('/review-moderation', [BusinessManagementController::class, 'index'])->name('review.moderation.index');
        // Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
        // Route::get('/', [UserController::class, 'index']);
        // Route::post('/', [UserController::class, 'store']);
        // Route::get('{user}', [UserController::class, 'show']);
        // Route::put('{user}', [UserController::class, 'update']);
        // Route::delete('{user}', [UserController::class, 'destroy']);
    });
    // Route::post('addUser', [AdminAuthController::class, 'addUser']);
    
});
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'reset']);
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
