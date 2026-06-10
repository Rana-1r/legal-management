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


// البروفايل
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'updateInfo'])->name('profile.update');
Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');

Route::middleware(['auth', 'role:3'])->group(function () {

Route::get('/user-interface', [DashboardController::class, 'index'])
        ->name('user-interface');
// صفحة خدمات الاستشارات عند اليوزر
Route::get('/consultations-page', [ConsultationController::class, 'userPage'])
    ->name('consultations.page');

 // حفظ طلب الاستشارة
Route::post('/consultations/request', [ConsultationController::class, 'store'])
    ->name('consultations.store');

// استشاراتي
Route::get('/my-consultations', [ConsultationController::class, 'my'])
    ->name('consultations.my');

// حالة الاستشارات
Route::get('/consultations/status', [ConsultationController::class, 'status'])
    ->name('consultations.status');
    
    Route::post(
'/consultations/store',
[ConsultationController::class, 'store']
)->name('consultations.store');

Route::get('/consultation/details/{id}', [ConsultationController::class, 'details'])
    ->name('consultation.details');

    //صفحه عرض الرد القانوني
Route::get(
    '/consultation-response',
    [ConsultationController::class, 'showResponse']
)->name('consultation.response');

});

Route::middleware(['auth', 'role:2'])->group(function () {
    // صفحة المدير القانوني
Route::get('/legal-manager', [ConsultationController::class, 'managerPage'])
    ->name('legal.manager');

Route::get('/manager-interface', [ConsultationController::class, 'managerIndex'])
    ->name('manager.interface');

// تعيين محامي
Route::post('/consultations/{id}/assign', [ConsultationController::class, 'assignLawyer'])
    ->name('consultations.assign');

    // المهام
Route::post('/assign-task', [ConsultationController::class, 'storeTask'])
    ->name('tasks.assign');

    //اعتماد الاستشارة
Route::get('/consultations/{id}/approval', [ConsultationController::class, 'showApproval'])
    ->name('consultations.showApproval');

//قبول, رفض اعتماد الاستشارة
Route::post('/consultations/{id}/approve', [ConsultationController::class, 'approve'])
    ->name('consultations.approve');

Route::post('/consultations/{id}/reject', [ConsultationController::class, 'reject'])
    ->name('consultations.reject');


Route::get('/consultation/{id}/view-reply', [ConsultationController::class, 'viewReply'])
    ->name('view-reply');
});


Route::middleware(['auth', 'role:1'])->group(function () {
Route::post('/tasks/{id}/complete', [ConsultationController::class, 'completeTask'])
    ->name('tasks.complete');

// الموظف القانوني
Route::get('/employee/legal', [ConsultationController::class, 'legalEmployeePage'])
    ->name('employee.legal');

Route::get('/employee/interface', [ConsultationController::class, 'employeeInterfacePage'])
    ->name('employee.interface');

// جدول الاستشارات
Route::get('/consultations/table', [ConsultationController::class, 'consultationsTable'])
    ->name('consultations.table');

    // صفحة طلب استشارة
Route::get('/consultations/request', [ConsultationController::class, 'create'])
    ->name('consultations.create');
});

});