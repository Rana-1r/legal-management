<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Task; // لاستدعاء الأنشطة

class ProfileController extends Controller
{
    // 1. عرض صفحة البروفايل مع البيانات والأنشطة
    public function show()
    {
        $user = Auth::user();
        // جلب آخر 5 مهام مرتبطة بهذا المستخدم (الأنشطة)
        $activities = Task::where('assigned_to', $user->user_id)
                          ->latest()
                          ->take(5)
                          ->get();

        return view('Profile.profile', compact('user', 'activities'));
    }

    // 2. تحديث البيانات (الاسم، القسم، الهاتف)
    public function updateInfo(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only(['full_name', 'department', 'phone', 'job_title']));

        return back()->with('success', 'تم تحديث البيانات بنجاح');
    }

    // 3. تحديث الصورة الشخصية
    public function updatePhoto(Request $request)
    {
        $request->validate(['photo' => 'required|image|mimes:jpeg,png,jpg|max:2048']);

        $user = Auth::user();

        if ($request->hasFile('photo')) {
            // تخزين الصورة في مجلد public/profiles
            $path = $request->file('photo')->store('profiles', 'public');
            $user->photo = $path;
            $user->save();
        }

        return back()->with('success', 'تمت تغيير الصورة الشخصية');
    }
}