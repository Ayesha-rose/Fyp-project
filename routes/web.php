<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'signupForm']);
Route::post('/signup', [UserController::class, 'signup']);


Route::get('/logout-confirm', [UserController::class, 'logoutConfirmForm'])->name('logout.confirm');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')->name('admin.dashboard');

Route::resource('admin_categories', AdminCategoryController::class);
