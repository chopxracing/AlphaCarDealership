<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminShowController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CreateCallController;
use App\Http\Controllers\CreateCarController;
use App\Http\Controllers\DeleteCarController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewCheckController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Основные маршруты
Route::get('/', MainController::class)->name('home');
Route::get('/catalog', CatalogController::class)->name('catalog');
Route::get('/review', ReviewController::class)->name('review');
Route::post('/review/check', ReviewCheckController::class)->name('review.check');
Route::get('/about', AboutController::class)->name('about');
Route::get('/contacts', ContactsController::class)->name('contacts');

// Аутентификация
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Защищенные маршруты
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::patch('/profile', [AuthController::class, 'editProfile'])->name('updateProfile');
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('changePasswordForm');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('changePassword');
    Route::post('/catalog',CreateCallController::class)->name('createCall');
});

// админские маршруты
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', AdminShowController::class)->name('adminCarCreateForm');
    Route::post('/admin', CreateCarController::class)->name('adminCarCreate');
    Route::delete('/admin', DeleteCarController::class)->name('adminCarDelete');
});

require __DIR__.'/settings.php';
