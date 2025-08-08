<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCategoryController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'signupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/categories', [UserCategoryController::class, 'index'])->name('categories');
Route::get('/books/{id}', [AdminBookController::class, 'show'])->name('book.show');


Route::get('/logout-confirm', [UserController::class, 'logoutConfirmForm'])->name('logout.confirm');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin_categories', AdminCategoryController::class);
    Route::resource('manage_books', AdminBookController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/myfeed', fn() => view('user_dashboard.myfeed'))->name('user_dashboard.myfeed');
    Route::get('/alreadyread', fn() => view('user_dashboard.alreadyread'))->name('user_dashboard.alreadyread');
    Route::get('/currentlyread', fn() => view('user_dashboard.currentlyread'))->name('user_dashboard.currentlyread');
    Route::get('/mycalendar', fn() => view('user_dashboard.mycalendar'))->name('user_dashboard.mycalendar');
    Route::get('/mynotes', fn() => view('user_dashboard.mynotes'))->name('user_dashboard.mynotes');
    Route::get('/myreadingstat', fn() => view('user_dashboard.myreadingstat'))->name('user_dashboard.myreadingstat');
    Route::get('/myreviews', fn() => view('user_dashboard.myreviews'))->name('user_dashboard.myreviews');
    Route::get('/wishlist', fn() => view('user_dashboard.wishlist'))->name('user_dashboard.wishlist');
});
