<?php

use App\Http\Controllers\AdminController;
use App\Http\Middleware\SimpleAdminAuth;
use Illuminate\Support\Facades\Route;

// Halaman Depan (Landing Page)
Route::get('/', function () {
    return view('home');
})->name('home');

// CMS Admin Authentication (Tanpa Database)
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// CMS Admin Protected Routes
Route::middleware([SimpleAdminAuth::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/posters', [AdminController::class, 'update'])->name('posters.update');
});
