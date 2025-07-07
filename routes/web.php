<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use PhpParser\Builder\Class_;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'signupForm']);
Route::post('/signup', [UserController::class, 'signup']);
Route::get('/admin_dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

Route::resource('categories', CategoryController::class);
Route::post('/logout', function () {
    Auth::logout();
    return view('logout'); // redirect to logout page
})->name('logout');