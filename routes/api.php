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
    ReviewModerationController,
    CampaignsController,
    MasterSetupController,
    
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

        // Business Management Routes
        Route::get('/business-management', [BusinessManagementController::class, 'index'])->name('business.management.index');
        Route::get('/business-list', [BusinessManagementController::class, 'BusinessList']);
        // Route::get('/user-view/{id}', [BusinessManagementController::class, 'userView'])->name('user.view');
        // Route::put('/user-update/{id}', [BusinessManagementController::class, 'userUpdate'])->name('user.update');
        // Route::delete('/user-delete/{id}', [BusinessManagementController::class, 'userDelete'])->name('user.delete');
        Route::post('/user-status/{id}', [UserManagementController::class, 'changeStatus'])->name('user.status');
        // Route::post('/user-add', [BusinessManagementController::class, 'userAdd']);


        Route::get('/review-moderation', [ReviewModerationController::class, 'index'])->name('review.moderation.index');
        Route::get('/reviews/list', [ReviewModerationController::class, 'list'])->name('reviews.list');
        Route::post('reviews/update-status/{id}', [ReviewModerationController::class, 'updateStatus']);
        Route::get('reviews/reviews-show/{id}', [ReviewModerationController::class, 'show']); // for view details
        // Route::post('/reviews/reviews-show/{id}', [ReviewModerationController::class, 'show'])->name('reviews.approve');
        // Route::post('/reviews/reject/{id}', [ReviewModerationController::class, 'reject'])->name('reviews.reject');



        Route::get('/campaigns', [CampaignsController::class, 'index'])->name('campaigns.index');
        Route::get('/master-setup', [MasterSetupController::class, 'index'])->name('master.setup.index');
       
    });
    // Route::post('addUser', [AdminAuthController::class, 'addUser']);
    
    Route::post('addUser', [AdminDashboardController::class, 'addUser']);
});
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'reset']);
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
