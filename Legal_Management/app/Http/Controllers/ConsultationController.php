<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\User_wm;

class ConsultationController extends Controller
{
    /**
     * صفحة المستخدم
     */
  public function userPage()
{
    $consultations = Consultation::latest()->take(5)->get();

    return view('Consultations.user.page.consultations-page', [

        'consultations' => $consultations,

        // الإحصائيات
        'total' => Consultation::count(),

        'under_review' => Consultation::where('status', 'قيد المراجعة')->count(),

        'replied' => Consultation::where('status', 'تم الرد')->count(),

        // إشعارات
        'notifications' => []
    ]);
}

    /**
     * صفحة المدير
     */
    public function managerPage()
    {
        $stats = [
            'under_review'   => Consultation::where('status', 'قيد المراجعة')->count(),
            'needs_approval' => Consultation::where('status', 'بحاجة إلى اعتماد')->count(),
            'closed'         => Consultation::where('is_closed', true)->count(),
        ];

        $needsAssignment = Consultation::whereNull('assigned_to')->get();

        $pendingApprovals = Consultation::where('status', 'بحاجة إلى اعتماد')->get();

        $lawyers = User_wm::where('role_id', 1)->get();

        return view('Consultations.legalManager.legalmanager', [
            'stats'            => $stats,
            'needsAssignment'  => $needsAssignment,
            'pendingApprovals' => $pendingApprovals,
            'lawyers'          => $lawyers
        ]);

    }

    public function assignLawyer(Request $request, $id) 
    {
        $request->validate([
            'lawyer_id' => 'required|exists:users_wm,user_id',
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->assigned_to = $request->lawyer_id;
        $consultation->status = 'قيد المراجعة';
        $consultation->save();

        return redirect()->back()->with('success', 'تم إسناد المحامي بنجاح');

    }

    /**
     * صفحة الموظف القانوني
     */
    public function employeePage()
    {
        $userId = auth()->id();

    // جلب المهام من الجدول الجديد
    $myTasks = \App\Models\Task::where('assigned_to', $userId)->get();
  
    // حساب الإحصائيات
    $stats = [
        'total_tasks' => \App\Models\Task::where('assigned_to', $userId)->count(),
        'pending'     => \App\Models\Task::where('assigned_to', $userId)->where('status', 'pending')->count(),
        'completed'   => \App\Models\Task::where('assigned_to', $userId)->where('status', 'completed')->count(),
    ];
    
    // التعديل هنا ليتناسب مع المسار: Consultations/legalemployee.blade.php
    return view('Consultations.legalemployee', compact('myTasks', 'stats'));
    }
}