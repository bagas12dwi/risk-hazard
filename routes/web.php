<?php

use App\Http\Controllers\AlmostAccidentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DangerousEventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ViewPdfController;
use App\Http\Controllers\WorkAccidentController;
use App\Models\AlmostAccident;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'indexRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/reset-password', [AuthController::class, 'indexReset'])->name('reset-password');
Route::get('/cekEmail/{email}', [ResetPasswordController::class, 'checkEmail'])->name('cek-email');
Route::post('/update-password', [ResetPasswordController::class, 'updatePassword'])->name('update-password');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/view-pdf/{area}/{parameter}', [ViewPdfController::class, 'viewPdf'])->name('viewPdf');
Route::get('/view-pdf-tindak-lanjut/{followUp}', [ViewPdfController::class, 'viewPdfTindakLanjut'])->name('viewPdfTindakLanjut');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/ganti-password', [ResetPasswordController::class, 'indexGantiPassword'])->name('ganti-password');
    Route::post('/ganti-password', [ResetPasswordController::class, 'gantiPassword'])->name('update-ganti-password');
});


Route::group(['middleware' => ['auth', 'cekRole:pelapor']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kecelakaan', [WorkAccidentController::class, 'index'])->name('kecelakaan');
    Route::post('/store', [WorkAccidentController::class, 'store'])->name('store-laporan');
    Route::get('/kejadian', [DangerousEventController::class, 'index'])->name('kejadian');
    Route::get('/hampir', [AlmostAccidentController::class, 'index'])->name('hampir');
    Route::get('/kotak-masuk', [NotificationController::class, 'index'])->name('inbox');
});
