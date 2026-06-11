<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConsultationController;

// ==========================================
// المسارات العامة (بدون تسجيل دخول)
// ==========================================

// التسجيل
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// تسجيل الدخول (الصفحة الرئيسية للموقع تم تفعيل الاسم البرمجي login لها)
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

// تسجيل الخروج
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ==========================================
// جميع صفحات المنصة المحمية (تتطلب تسجيل دخول)
// ==========================================
Route::middleware('auth')->group(function () {

    // البروفايل (مشترك لجميع الأدوار)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'updateInfo'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');

    // ------------------------------------------
    // مسارات العميل / اليوزر (Role: 3)
    // ------------------------------------------
    Route::middleware('role:3')->group(function () {
        
        Route::get('/user-interface', [DashboardController::class, 'index'])->name('user-interface');
        
        // صفحات الاستشارات عند اليوزر
        Route::get('/consultations-page', [ConsultationController::class, 'userPage'])->name('consultations.page');
        Route::get('/consultations/request', [ConsultationController::class, 'create'])->name('consultations.create');
        Route::post('/consultations/store', [ConsultationController::class, 'store'])->name('consultations.store');
        Route::get('/my-consultations', [ConsultationController::class, 'my'])->name('consultations.my');
        Route::get('/consultations/status', [ConsultationController::class, 'status'])->name('consultations.status');
        Route::get('/consultation/details/{id}', [ConsultationController::class, 'details'])->name('consultation.details');
        
        // صفحة عرض الرد القانوني
        Route::get('/consultation-response', [ConsultationController::class, 'showResponse'])->name('consultation.response');
    });

    // ------------------------------------------
    // مسارات المدير القانوني (Role: 2)
    // ------------------------------------------
    Route::middleware('role:2')->group(function () {
        
        Route::get('/legal-manager', [ConsultationController::class, 'managerPage'])->name('legal.manager');
        Route::get('/manager-interface', [ConsultationController::class, 'managerIndex'])->name('manager.interface');
        
        // تعيين محامي والمهام
        Route::post('/consultations/{id}/assign', [ConsultationController::class, 'assignLawyer'])->name('consultations.assign');
        Route::post('/assign-task', [ConsultationController::class, 'storeTask'])->name('tasks.assign');
        
        // اعتماد الاستشارة (قبول / رفض)
        Route::get('/consultations/{id}/approval', [ConsultationController::class, 'showApproval'])->name('consultations.showApproval');
        Route::post('/consultations/{id}/approve', [ConsultationController::class, 'approve'])->name('consultations.approve');
        Route::post('/consultations/{id}/reject', [ConsultationController::class, 'reject'])->name('consultations.reject');
        
        Route::get('/consultation/{id}/view-reply', [ConsultationController::class, 'viewReply'])->name('view-reply');
    });

    // ------------------------------------------
    // مسارات الموظف القانوني (Role: 1)
    // ------------------------------------------
    Route::middleware('role:1')->group(function () {
        
        Route::get('/employee/interface', [ConsultationController::class, 'employeeInterfacePage'])->name('employee.interface');
        Route::get('/employee/legal', [ConsultationController::class, 'legalEmployeePage'])->name('employee.legal');
        Route::get('/consultations/table', [ConsultationController::class, 'consultationsTable'])->name('consultations.table');
        Route::post('/tasks/{id}/complete', [ConsultationController::class, 'completeTask'])->name('tasks.complete');
    });

});