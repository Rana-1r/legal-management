<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User_wm;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        return view('register');
    }

    public function register(Request $request) {

        // 1. التحقق من صحة المدخلات
        $request->validate([

            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users_wm,email',
            'password' => 'required|min:8|confirmed', // confirmed تتطلب حقل password_confirmation
        ]);

        \App\Models\User_wm::create([

           'full_name' => $request->full_name,
           'email' => $request->email,
           'password_hash' => \Illuminate\Support\Facades\Hash::make($request->password), 
        // لن نرسل role_id ولا department، سيبقون Null في قاعدة البيانات تلقائياً
    ]);

    return redirect('/')->with('success', 'تم إنشاء حسابك بنجاح!');
}
}