<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminDashboardController;

// Route::get('/', function () {
//     return view('home'); 
// })->name('home');

// Route::get('/login', [UserController::class, 'loginForm'])->name('login');
// Route::post('/login', [UserController::class, 'login']);

// Route::get('/signup', [UserController::class, 'signupForm']);
// Route::post('/signup', [UserController::class, 'signup']);

Route::get('/', function () {
    return view('/admin_dashboard/dashboard'); 
});

Route::resource('categories', CategoryController::class);