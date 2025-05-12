<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login
Route::get('/', [LoginController::class, 'showlogin'])->name('showlogin');
Route::post('/loginaction', [LoginController::class, 'loginaction'])->name('loginaction');

// register
Route::get('/register', [RegisterController::class, 'showregister'])->name('showregister');
Route::post('/registeraction', [RegisterController::class, 'registeraction'])->name('registeraction');

// forgot password
Route::get('/forgot', [ForgotController::class, 'showforgot'])->name('showforgot');
Route::post('/forgotaction', [ForgotController::class, 'forgotaction'])->name('forgotaction');

// dashboard
Route::get('/dashboard', [DashboardController::class, 'showdash'])->name('showdash');