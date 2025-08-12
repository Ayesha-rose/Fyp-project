<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\ReadingController;

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

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

Route::middleware('auth')->group(function () {

    Route::get('/myfeed', function () {
        return view('user_dashboard.myfeed');
    })->name('user_dashboard.myfeed');

    // Book actions
    Route::get('/book/read/{id}', [ReadingController::class, 'store'])->name('book.read');
    Route::post('/book/mark-complete/{id}', [ReadingController::class, 'markComplete'])->name('book.complete');

    // Currently reading routes (aliases)
    Route::get('/currentlyread', [ReadingController::class, 'currently'])->name('user_dashboard.currentlyread');
    Route::get('/reading-currently', [ReadingController::class, 'currently'])->name('reading.currently');

    // Already read routes (aliases)
    Route::get('/already-read', [ReadingController::class, 'already'])->name('user_dashboard.alreadyread');
    Route::get('/reading-already', [ReadingController::class, 'already'])->name('reading.already');

    Route::get('/mycalendar', function () {
        return view('user_dashboard.mycalendar');
    })->name('user_dashboard.mycalendar');

    Route::get('/mynotes', function () {
        return view('user_dashboard.mynotes');
    })->name('user_dashboard.mynotes');

    Route::get('/myreadingstat', function () {
        return view('user_dashboard.myreadingstat');
    })->name('user_dashboard.myreadingstat');

    Route::get('/myreviews', function () {
        return view('user_dashboard.myreviews');
    })->name('user_dashboard.myreviews');

    Route::get('/wishlist', function () {
        return view('user_dashboard.wishlist');
    })->name('user_dashboard.wishlist');
});
