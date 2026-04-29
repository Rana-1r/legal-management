<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConsultationController;

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

Route::get('/user-interface', [DashboardController::class, 'index'])
    ->name('user-interface');

Route::resource('consultations', ConsultationController::class);

Route::get('/my-consultations', [ConsultationController::class, 'my'])
    ->name('consultations.my');

Route::get('/legal-manager', [ConsultationController::class, 'managerPage'])->name('legal.manager');

Route::post('/consultations/{id}/assign', [ConsultationController::class, 'assignLawyer'])->name('consultations.assign');

Route::get('/employee/dashboard', [ConsultationController::class, 'employeePage'])
    ->name('employee.dashboard')
    ->middleware('auth');

Route::get('/consultations-page', [ConsultationController::class, 'userPage'])
    ->name('consultations.user');

Route::get('/legal/employee', [ConsultationController::class, 'employeePage'])
    ->name('legal.employee')
    ->middleware('auth');

Route::get('/consultations-page', [ConsultationController::class, 'userPage'])
    ->name('consultations.user');

Route::post('/tasks/{id}/complete', [ConsultationController::class, 'completeTask'])
    ->name('tasks.complete');

Route::get('/manager-interface', [ConsultationController::class, 'managerIndex'])->name('manager.interface');   

Route::post('/assign-task', [ConsultationController::class, 'storeTask'])->name('tasks.assign');

