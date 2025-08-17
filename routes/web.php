<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MyFeedController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth routes
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/signup', [UserController::class, 'signupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'signup']);
Route::get('/logout-confirm', [UserController::class, 'logoutConfirmForm'])->name('logout.confirm');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Categories & Books
Route::get('/categories', [UserCategoryController::class, 'index'])->name('categories');
Route::get('/books/{id}', [AdminBookController::class, 'show'])->name('book.show');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin_categories', AdminCategoryController::class);
    Route::resource('manage_books', AdminBookController::class);
});

// Reviews
Route::middleware('auth')->group(function () {
    Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])
        ->name('books.reviews.store');
});

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

// User dashboard routes
Route::middleware('auth')->group(function () {

    Route::get('/myfeed', [MyFeedController::class, 'index'])->name('user_dashboard.myfeed');
    Route::get('/myreviews', [UserReviewController::class, 'index'])->name('user_dashboard.myreviews');

    // Reading
    Route::post('/book/read/{id}', [ReadingController::class, 'store'])->name('book.read');   // sirf ek rakho
    Route::post('/book/mark-complete/{id}', [ReadingController::class, 'markComplete'])->name('book.complete');

    // Reading categories
    Route::get('/currentlyread', [ReadingController::class, 'currently'])->name('user_dashboard.currentlyread');
    Route::get('/reading-currently', [ReadingController::class, 'currently'])->name('reading.currently');
    Route::get('/already-read', [ReadingController::class, 'already'])->name('user_dashboard.alreadyread');
    Route::get('/reading-already', [ReadingController::class, 'already'])->name('reading.already');

    // Favorites
    Route::post('/book/favorite/{id}', [ReadingController::class, 'toggleFavorite'])->name('book.favorite');
    Route::get('/favorites', [ReadingController::class, 'favorites'])->name('user_dashboard.favorites');

    // Calendar
    Route::get('/mycalendar', function () {
        return view('user_dashboard.mycalendar');
    })->name('user_dashboard.mycalendar');

    // Notes
    Route::get('/mynotes', [NoteController::class, 'index'])->name('user_dashboard.mynotes');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::patch('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    // Activity streak
    Route::get('/activitystreak', [ReadingController::class, 'showStreak'])->name('user_dashboard.activitystreak');
});
