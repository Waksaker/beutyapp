<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

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

// profile
Route::get('/profile', [ProfileController::class, 'showprofile'])->name('showprofile');
Route::post('/actionprofile', [ProfileController::class, 'actionprofile'])->name('actionprofile');

// order
Route::get('/listorder', [OrderController::class, 'showorder'])->name('showorder');
Route::get('/listorders', [OrderController::class, 'listorder'])->name(name: 'listorder');
Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::post('/orderaction', [OrderController::class, 'orderaction'])->name('orderaction');
Route::get('/delete/{name}/{date}/{item}', [OrderController::class, 'deleteorder'])->name('deleteorder');
Route::get('/invoice/{name}/{date}/{item}', [OrderController::class, 'invoiceorder'])->name('invoiceorder');
Route::get('/invoiceall/{name}/{bulan}', [OrderController::class, 'invoiceallorder'])->name('invoiceallorder');
Route::get('/delete_all_order/{name}/{bulan}', [OrderController::class, 'deleteallorder'])->name('deleteallorder');
Route::get('/order_setting/{name}/{date}/{item}', [OrderController::class, 'ordersetting'])->name('ordersetting');
Route::post('/update_order', [OrderController::class, 'update_order'])->name('update_order');