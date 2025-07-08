<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use PhpParser\Builder\Class_;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'signupForm']);
Route::post('/signup', [UserController::class, 'signup']);

// Logout Confirmation Page Route (GET request for showing the confirmation page)
Route::get('/logout-confirm', [UserController::class, 'logoutConfirmForm'])->name('logout.confirm');

// Actual Logout Route (POST request from 'Yes I Am' button)
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')->name('admin.dashboard');

Route::resource('admin_categories', AdminCategoryController::class);


Route::post('/logout', function () {
    Auth::logout();
    return view('logout');
})->name('logout');
