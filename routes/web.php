    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\{
        Business\BusinessDashboardController,
        Customer\CustomerDashboardController,
        // Admin\AdminDashboard,
        // Admin\UserManagementController,
        Admin\AdminAuthPageController,
        AuthController,
        Auth\ForgotPasswordController,
        WelcomeController,
        LoadPageController,
        CustomerLoadPageController
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

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/', [WelcomeController::class, 'home'])->name('home');
    Route::get('/categories', [WelcomeController::class, 'categories'])->name('categories');
    Route::get('/blogs', [WelcomeController::class, 'blogs'])->name('blogs');
    Route::get('/about-us', [WelcomeController::class, 'aboutUs'])->name('about.us');
    Route::get('/contact-us', [WelcomeController::class, 'contactUs'])->name('contact.us');
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('business.auth.show');
    Route::get('/business/login', [AuthController::class, 'showBusinessLogin'])->name('business.auth.show');
    Route::get('/customer/login', [AuthController::class, 'showCustomerLogin'])->name('customer.auth.show');
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

    Route::middleware(['web'])->prefix('admin')->group(function () {
        Route::get('/master-setup', [LoadPageController::class, 'masterSetup'])->name('admin.master.setup');
        Route::get('/master-setup-add', [LoadPageController::class, 'masterSetupAdd'])->name('admin.masterSetup.Add');
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        // Route::get('/business-management', [BusinessManagementController::class, 'index'])->name('business.management.index');
        // Route::get('/review-moderation', [UserManagementController::class, 'index'])->name('review.moderation.index');
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
        // Route::get('/user-management', [UserManagementController::class, 'index'])->name('user.management.index');
    });
    Route::middleware(['web', 'auth'])->prefix('customer')->group(function () {
        Route::get('/dashboard', [CustomerLoadPageController::class, 'dashboard'])->name('customer.dashboard.show');
        Route::get('/my-profile', [CustomerLoadPageController::class, 'showProfile'])->name('customer.show.profile');
        Route::get('/notifications', [CustomerLoadPageController::class, 'showNotifications'])->name('customer.show.notifications');
        Route::get('/settings', [CustomerLoadPageController::class, 'showSettings'])->name('customer.settings');
        Route::post('/clear-notification', [CustomerLoadPageController::class, 'clearNotifications'])->name('customer.notifications.clear');
    });
    // Route::middleware(['web'])->prefix('business')->group(function () {
    //     Route::get('/dashboard', [BusinessDashboardController::class, 'dashboard'])->name('business.dashboard.show');
    // });
    // Route::middleware(['web'])->prefix('customer')->group(function () {
    //     Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard.show');
    // });



