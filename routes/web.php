<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MyFeedController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\Book;


Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('home');
})->name('home');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin_dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');

    Route::resource('admin_categories', AdminCategoryController::class);
    Route::resource('manage_books', AdminBookController::class);


Route::get('/admin/notifications', [NotificationController::class, 'index'])
    ->name('admin.notifications.index');

Route::post('/admin/notifications/{id}/mark-read', [NotificationController::class, 'markRead'])
    ->name('admin.notifications.markRead');

Route::post('/admin/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])
    ->name('admin.notifications.markAllRead');

Route::delete('/admin/notifications/{id}', [NotificationController::class, 'delete'])
    ->name('admin.notifications.delete');

Route::delete('/admin/notifications', [NotificationController::class, 'deleteAll'])
    ->name('admin.notifications.deleteAll');

});

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'signupForm'])->name('signup');
Route::post('/signup', [UserController::class, 'signup']);

Route::get('/categories', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return app(UserCategoryController::class)->index();
})->name('categories');

Route::get('/logout-confirm', [UserController::class, 'logoutConfirmForm'])->name('logout.confirm');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/books/{id}', [AdminBookController::class, 'show'])->name('book.show');

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

Route::get('/books/{book}', [UserCategoryController::class, 'show'])->name('book.show'); 
Route::get('/search', [UserCategoryController::class, 'search'])->name('books.search')->middleware('auth');

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/myfeed', [MyFeedController::class, 'index'])->name('user_dashboard.myfeed');
    Route::post('/books/{book}/reviews', [ReviewController::class, 'store'])->name('books.reviews.store');
    Route::get('/myreviews', [UserReviewController::class, 'index'])->name('user_dashboard.myreviews');
    Route::get('/mycalendar', [CalendarController::class, 'index'])->name('user_dashboard.mycalendar');
    Route::get('/activitystreak', [ReadingController::class, 'showStreak'])->name('user_dashboard.activitystreak');

    Route::get('/book/read/{id}', [ReadingController::class, 'store'])->name('book.read');
    Route::post('/book/mark-complete/{id}', [ReadingController::class, 'markComplete'])->name('book.complete');
    Route::post('/book/read/{id}', [ReadingController::class, 'read'])->name('book.read');

    Route::get('/currentlyread', [ReadingController::class, 'currently'])->name('user_dashboard.currentlyread');
    Route::get('/reading-currently', [ReadingController::class, 'currently'])->name('reading.currently');

    Route::get('/already-read', [ReadingController::class, 'already'])->name('user_dashboard.alreadyread');
    Route::get('/reading-already', [ReadingController::class, 'already'])->name('reading.already');

    Route::post('/book/favorite/{id}', [ReadingController::class, 'toggleFavorite'])->name('book.favorite');
    Route::get('/favorites', [ReadingController::class, 'favorites'])->name('user_dashboard.favorites');
});


Route::get('password/forgot', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::post('password/email', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

