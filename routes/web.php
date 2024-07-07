<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClasificationController;

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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index']);


Auth::routes();

Route::middleware('auth')->group(function() {
 Route::get('/dashboard', [DashboardController::class, 'index']);
 Route::resource('/room', RoomController::class);
 Route::resource('/klasifikasi', ClasificationController::class);
 Route::resource('/product', ProductController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
