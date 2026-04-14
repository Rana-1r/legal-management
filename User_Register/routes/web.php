<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// 2. مسار عرض الصفحة (عندما يكتب المستخدم /register في المتصفح)
Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('register');

// 3. مسار استقبال البيانات (عندما يضغط المستخدم على زر "إنشاء الحساب")
Route::post('/', [RegisterController::class, 'register']);