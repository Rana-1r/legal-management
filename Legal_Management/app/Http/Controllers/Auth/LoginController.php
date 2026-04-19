<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_wm;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLoginForm() {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@wadimakkah\.sa$/'
            ],
            'password' => 'required',
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.regex' => 'الإيميل لازم ينتهي بـ @wadimakkah.sa',
            'password.required' => 'كلمة المرور مطلوبة',
        ]);

        $user = User_wm::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password_hash)) {
            return back()->withErrors([
                'email' => 'الإيميل أو كلمة المرور غلط',
            ]);
        }

    
        return redirect('/interface');
    }
}