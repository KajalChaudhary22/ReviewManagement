<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BusinessAuthPageController,
    CustomerAuthPageController,
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
Route::get('/business/login', [BusinessAuthPageController::class, 'show'])->name('business.auth.show');
Route::get('/customer/login', [CustomerAuthPageController::class, 'show'])->name('customer.auth.show');
