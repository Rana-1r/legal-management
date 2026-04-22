<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/', [LoginController::class, 'login']);

Route::get('/user-interface', [DashboardController::class, 'index'])
    ->middleware('auth:web')
    ->name('user-interface');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::post('/profile/update', [ProfileController::class, 'updateInfo'])->name('profile.update');

Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
