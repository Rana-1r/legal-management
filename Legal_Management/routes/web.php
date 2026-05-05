<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConsultationController;

// التسجيل
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

Route::resource('consultations', ConsultationController::class);
  
Route::get('/my-consultations', [ConsultationController::class, 'my'])
    ->name('consultations.my');

Route::get('/legal-manager', [ConsultationController::class, 'managerPage'])
    ->name('legal.manager');

Route::post('/consultations/{id}/assign', [ConsultationController::class, 'assignLawyer'])
    ->name('consultations.assign');

Route::get('/employee/dashboard', [ConsultationController::class, 'employeePage'])
    ->name('employee.dashboard')
    ->middleware('auth');

Route::get('/consultations-page', [ConsultationController::class, 'userPage'])
    ->middleware('auth')
    ->name('consultations.page');

Route::post('/tasks/{id}/complete', [ConsultationController::class, 'completeTask'])
    ->name('tasks.complete');

/* صفحة طلب استشارة */
Route::get('/consultations/request', [ConsultationController::class, 'create'])
    ->name('consultations.create');

/* حفظ طلب الاستشارة */
Route::post('/consultations/request', [ConsultationController::class, 'store'])
    ->name('consultations.store');

Route::get('/manager-interface', [ConsultationController::class, 'managerIndex'])
    ->name('manager.interface');

Route::post('/assign-task', [ConsultationController::class, 'storeTask'])
    ->name('tasks.assign');

<<<<<<< HEAD

Route::get('/manager-interface', [ConsultationController::class, 'managerIndex'])
    ->name('manager.interface');

// صفحة الموظف القانوني للإستشارات
Route::get('/employee/legal', [ConsultationController::class, 'legalEmployeePage'])
    ->name('employee.legal');

// لوحة تحكم الموظف القانوني 
Route::get('/employee/interface', [ConsultationController::class, 'employeeInterfacePage'])
    ->name('employee.interface');

=======
>>>>>>> 463ba191e023cfcbb99ce9910a12e5f91bcd8701
});