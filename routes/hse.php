<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
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

// HSE Route
Route::group(['middleware' => ['auth', 'cekRole:hse']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kotak-masuk', [NotificationController::class, 'index'])->name('inbox');
    Route::get('/kotak-masuk/detail/{notifikasi}', [NotificationController::class, 'show'])->name('detail');
    Route::put('/kotak-masuk/update/{notifikasi}', [NotificationController::class, 'update'])->name('update');
    Route::get('/tindak-lanjut/detail/{notifikasi}', [FollowUpController::class, 'show'])->name('followup.detail');
    Route::put('/tindak-lanjut/update/{notifikasi}', [FollowUpController::class, 'update'])->name('followup.update');
    Route::get('/tindak-lanjut/show/{followUp}', [FollowUpController::class, 'detail'])->name('followup.show');
    Route::get('/tindak-lanjut', [FollowUpController::class, 'index'])->name('followup');
    Route::post('/store-area', [AreaController::class, 'store'])->name('store-area');
    Route::post('/update-area', [AreaController::class, 'update'])->name('update-area');
});
