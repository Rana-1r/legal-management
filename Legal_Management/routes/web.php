<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConsultationController;


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// تسجيل الدخول
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

// كل صفحات المنصة محمية
Route::middleware('auth')->group(function () {


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'updateInfo'])->name('profile.update');
Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');

/* مهم: لازم status يكون قبل resource */
Route::get('/consultations/status', [ConsultationController::class, 'status'])
    ->name('consultations.status');

/* عدلناها عشان ما ينادي show */
Route::resource('consultations', ConsultationController::class)
    ->except(['show']);

    Route::get('/user-interface', [DashboardController::class, 'index'])
        ->name('user-interface');

    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::post('/profile/update', [ProfileController::class, 'updateInfo'])
        ->name('profile.update');

    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])
        ->name('profile.photo.update');

    Route::resource('consultations', ConsultationController::class);
};