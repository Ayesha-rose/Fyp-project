<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')->name('admin.dashboard');

Route::resource('admin_categories', CategoryController::class);


Route::post('/logout', function () {
    Auth::logout();
    return view('logout');
})->name('logout');
