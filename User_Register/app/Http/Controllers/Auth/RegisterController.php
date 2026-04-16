<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User_wm;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        return view('register');
    }

    public function register(Request $request) {

        // 1. التحقق من صحة المدخلات
        $request->validate([

            'full_name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:users_wm,email',
                'regex:/^[a-zA-Z0-9._%+-]+@wadimakkah\.sa$/',
        ],
            
            'password' => 'required|min:8|confirmed',
        ], [
            'email.regex' => 'الإيميل يجب أن ينتهي ب@wadimakkah.sa',
            'email.unique' => 'هذا الإيميل مستخدم مسبقاً',
            'password.confirmed' => 'كلمة المرور غير مطابقة',
        ]);

        \App\Models\User_wm::create([

           'full_name' => $request->full_name,
           'email' => $request->email,
           'password_hash' => Hash::make($request->password), 
        // لن نرسل role_id ولا department، سيبقون Null في قاعدة البيانات تلقائياً
    ]);

    return redirect()->route('login')->with('success', 'تم إنشاء حسابك بنجاح، سجل الدخول الآن');
}
}