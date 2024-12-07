<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
// Admin Route
Route::group(['middleware' => ['auth', 'cekRole:admin']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/user', UserController::class)->names('user');
    Route::get('/kotak-masuk', [NotificationController::class, 'index'])->name('inbox');
    Route::get('/kotak-masuk/detail/{notifikasi}', [NotificationController::class, 'show'])->name('detail');
    Route::post('/update-area', [AreaController::class, 'update'])->name('update-area');
});
