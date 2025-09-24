<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{
    CustomerAuthController,
    ForgotPasswordController,
    BusinessAuthController,
    AdminAuthController,
    ResetPasswordController,
    AuthController
};
use App\Http\Controllers\Api\Admin\{
    UserManagementController,
    BusinessManagementController,
    AdminDashboardController,
    ReviewModerationController,
    CampaignsController,
    MasterSetupController,
    SettingController,
    AnalyticsReportsController
};
use App\Http\Controllers\Api\Business\{
    BusinessDashboardController,
    BusinessProfileController,
    ProductController,
    ServiceController,
    InquiryController,
    ReviewController,
    AnalyticsController,
    BusinessSettingController
};

use App\Http\Controllers\Api\Customer\{
    CustomerDashboardController,
    CustomerProfileController,
    CustomerInquiriesController,
    CustomerNotificationController,
    CustomerReviewsController,
    CustomerSettingController
};


use App\Models\Business;
use App\Models\Product;

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



Route::prefix('admin')->group(function () {
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard.show');
        Route::post('/business-approval/{id}', [AdminDashboardController::class, 'updateApproval']);
        Route::get('/business/{id}', [AdminDashboardController::class, 'viewBusiness']);

        //user Management Routes
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        Route::get('/users-list', [UserManagementController::class, 'usersList'])->name('users.list');
        Route::get('/user-view/{id}', [UserManagementController::class, 'userView'])->name('user.view');
        Route::put('/user-update/{id}', [UserManagementController::class, 'userUpdate'])->name('user.update');
        Route::delete('/user-delete/{id}', [UserManagementController::class, 'userDelete'])->name('user.delete');
        Route::post('/user-status/{id}', [UserManagementController::class, 'changeStatus'])->name('user.status');
        Route::post('/user-add', [UserManagementController::class, 'userAdd']);

        // Business Management Routes
        //Route::get('/business-management', [BusinessManagementController::class, 'index'])->name('business.management.index');
        Route::get('/business-list', [BusinessManagementController::class, 'businessList']);
        Route::get('/business-view/{id}', [BusinessManagementController::class, 'businessView'])->name('business.view');
        Route::put('/business-update/{id}', [BusinessManagementController::class, 'businessUpdate'])->name('business.update');
        Route::delete('/business-delete/{id}', [BusinessManagementController::class, 'businessDelete'])->name('business.delete');
        Route::post('/business-add', [BusinessManagementController::class, 'businessAdd']);
        Route::post('/business-status/{id}', [BusinessManagementController::class, 'changeStatus'])->name('business.status');

        // Review Moderation Routes
        Route::get('/review-moderation', [ReviewModerationController::class, 'index'])->name('review.moderation.index');
        Route::get('/reviews/list', [ReviewModerationController::class, 'list'])->name('reviews.list');
        Route::post('reviews/update-status/{id}', [ReviewModerationController::class, 'updateStatus']);
        Route::get('reviews/reviews-show/{id}', [ReviewModerationController::class, 'show']); // for view details

        // Analytics Reports Routes
        Route::get('/analytics-reports', [AnalyticsReportsController::class, 'index'])->name('analytics.reports.index');
        // Route::get('/reviews/list', [ReviewModerationController::class, 'list'])->name('reviews.list');
        // Route::post('reviews/update-status/{id}', [ReviewModerationController::class, 'updateStatus']);
        // Route::get('reviews/reviews-show/{id}', [ReviewModerationController::class, 'show']); // for view details




        // Route::get('/campaigns', [CampaignsController::class, 'index'])->name('campaigns.index');
        Route::post('/save-master', [MasterSetupController::class, 'save'])->name('master.setup.save');

        // Route::get('/setting', [SettingController::class, 'index'])->name('admin.settings');
        Route::post('/save-setting', [SettingController::class, 'save'])->name('save.settings');
    });

    Route::post('addUser', [AdminDashboardController::class, 'addUser']);
});

Route::prefix('business')->group(function () {
    Route::post('register', [BusinessAuthController::class, 'register']);
    Route::post('login', [BusinessAuthController::class, 'login']);
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/dashboard', [BusinessDashboardController::class, 'dashboard'])->name('business.dashboard.show');
        Route::get('/profile', [BusinessProfileController::class, 'editProfile'])->name('business.profile.edit');
        Route::post('/update-profile', [BusinessDashboardController::class, 'updateProfile']);
        


        // Product Routes
        Route::get('/product-list', [ProductController::class, 'index'])->name('business.product.list');
        Route::get('/get-product-data', [ProductController::class, 'getProductsData'])->name('business.product.data');
        Route::post('/products/store', [ProductController::class, 'saveProduct'])->name('business.products.store');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('business.products.show');
        Route::put('/business/products/{id}', [ProductController::class, 'update'])->name('business.products.update');
        Route::delete('/business/products/{id}', [ProductController::class, 'destroy'])->name('business.products.delete');

        // Service Routes
        Route::get('/get-service-data', [ServiceController::class, 'getServiceData'])->name('business.service.data');
        Route::post('/services/store', [ServiceController::class, 'saveService'])->name('business.service.store');

        // Inquiry Routes
        Route::get('/inquiries/stats', [InquiryController::class, 'getInquiryStats'])->name('business.inquiries.stats');
        Route::get('/inquiries-list', [InquiryController::class, 'index'])->name('business.inquiries.list');
        Route::get('/inquiries-data', [InquiryController::class, 'getData'])->name('business.inquiries.data');
        Route::get('/inquiries/{id}', [InquiryController::class, 'show'])->name('business.inquiries.show');
        Route::post('/inquiries/{id}', [InquiryController::class, 'update'])->name('business.inquiries.update');
        Route::get('/inquiries-export', [InquiryController::class, 'export'])->name('business.inquiries.export');


        // Review Routes
        Route::get('/reviews-list', [ReviewController::class, 'index'])->name('business.reviews.list');
        Route::get('/reviews/data', [ReviewController::class, 'getReviews'])->name('business.reviews.data');
        // Route::post('/reviews/update-status/{id}', [ReviewController::class, 'updateStatus'])->name('business.reviews.status');
        // Route::get('/reviews/reviews-show/{id}', [ReviewController::class, 'show'])->name('business.reviews.show'); // for view details

        // Analytics Routes
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('business.analytics');


        Route::get('/settings', [BusinessSettingController::class, 'index'])->name('business.settings');
        Route::post('/save-settings', [BusinessSettingController::class, 'save'])->name('business.save.settings');
    });
});
Route::prefix('customer')->group(function () {
    Route::post('register', [CustomerAuthController::class, 'register']);
    Route::post('login', [CustomerAuthController::class, 'login']);
    Route::middleware(['auth:sanctum'])->group(function () {
        // Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard.show');



        Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile.edit');
        Route::post('/profile', [CustomerDashboardController::class, 'profileUpdate'])->name('customer.profile.update');


        Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile.edit');
        
        Route::get('/settings', [CustomerSettingController::class, 'index'])->name('customer.settings');
        Route::post('/update-email', [CustomerSettingController::class, 'updateEmail'])->name('customer.updateEmail');
        Route::post('/update-password', [CustomerSettingController::class, 'updatePassword'])->name('customer.updatePassword');
        Route::post('/update-notifications', [CustomerSettingController::class, 'updateNotifications'])->name('customer.updateNotifications');


        
        Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile.edit');



        Route::get('/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile.edit');
    });
});
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'reset']);
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
