<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClasificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;

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


Route::middleware(['greeting'])->group(function () {
    // Arahkan '/' ke halaman login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showlogin');

});

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function() {
 Route::get('/dashboard', [DashboardController::class, 'index']);
 Route::resource('/room', RoomController::class)->middleware('UserAccess:1');
 Route::resource('/klasifikasi', ClasificationController::class)->middleware('UserAccess:1');
 Route::resource('/product', ProductController::class);
 Route::resource('/user', UserController::class);

Route::get('/products/pdf', [ProductController::class, 'generatePDF'])->name('generatePDF');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
