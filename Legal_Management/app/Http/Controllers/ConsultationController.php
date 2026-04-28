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

        $notifications = [];

        return view('Consultations.user.page.consultations-page', [
            'consultations' => $consultations,
            'notifications' => $notifications
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

        return view('Consultations.legalManager.page.legalmanager', [
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

        // 1. جلب المهام المسندة للموظف
        $myTasks = Consultation::where('assigned_to', $userId)->get();
      
        // 2. جلب الإحصائيات الخاصة بهذا الموظف
        $stats = [
            'total_assigned' => Consultation::where('assigned_to', $userId)->count(),
            'in_progress'    => Consultation::where('assigned_to', $userId)->where('status', 'قيد المراجعة')->count(),
            'completed'      => Consultation::where('assigned_to', $userId)->where('is_closed', true)->count(),
        ];

        // 3. إرسال البيانات للـ View
        return view('Consultations.legal.Employee', [
            'myTasks' => $myTasks,
            'stats'   => $stats
        ]);
    }
}