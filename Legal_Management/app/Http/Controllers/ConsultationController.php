<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\User_wm;
use App\Models\Task;

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

    public function storeTask(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'assigned_to' => 'required|exists:users_wm,user_id',
            'due_date'    => 'nullable|date',
            'priority'    => 'required|in:high,medium,low',
        ]);

    \App\Models\Task::create([
        'title'       => $request->title,
        'description' => $request->description,
        'assigned_to' => $request->assigned_to,
        'due_date'    => $request->due_date,
        'priority'    => $request->priority,
        'status'      => 'pending', // الحالة الافتراضية
    ]);

    return redirect()->back()->with('success', 'تم إنشاء المهمة وإسنادها للموظف بنجاح.');
}

public function managerIndex()
{
    $stats = [
        'total_cases'         => \App\Models\Task::where('related_entity_Type', 'قضية')->count(), 
        'total_contracts'     => \App\Models\Task::where('related_entity_Type', 'عقد')->count(),
        'total_consultations' => \App\Models\Consultation::count(),
    ];

    $lawyers = \App\Models\User_wm::where('role_id', 1)->get();


    return view('Interfaces.manager-interface', [
        'stats'            => $stats,
        'lawyers'          => $lawyers,
    ]);
}
    /**
     * صفحة الموظف القانوني
     */
    public function employeePage()
{
    $userId = auth()->id();
    $myTasks = \App\Models\Task::where('assigned_to', $userId)->get();
 
    $stats = [
        'total_tasks'    => \App\Models\Task::where('assigned_to', $userId)->count(),
        'total_assigned' => \App\Models\Consultation::where('assigned_to', $userId)->count(), // أضفنا هذا
        'in_progress'    => \App\Models\Consultation::where('assigned_to', $userId)->where('status', 'قيد المراجعة')->count(),
        'completed'      => \App\Models\Consultation::where('assigned_to', $userId)->where('status', 'مكتملة')->count(),
    ];
    
    return view('Interfaces.Employee-interface', compact('myTasks', 'stats'));
}
public function completeTask($id)
{
    $task = \App\Models\Task::findOrFail($id);
    $task->status = 'completed'; // أو 'مكتملة' حسب قاعدة بياناتك
    $task->save();
    
    return redirect()->back()->with('success', 'تم تحديث حالة المهمة!');
}
}