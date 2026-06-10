<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\User_wm;
use App\Models\Task;
use App\Models\Notification;


class ConsultationController extends Controller
{
    /**
     * صفحة المستخدم
     */
    public function userPage()
    {
        $userId = auth()->id();

        $consultations = Consultation::where('request_by', $userId)
        ->where('is_archived', 0)
        ->latest()
        ->get();

        $archivedConsultations = Consultation::where('request_by', $userId)
        ->where('is_archived', 1)
        ->latest()
        ->get();

        $notifications = Notification::where('user_id', auth()->id())
        ->latest()
        ->get();

        return view('Consultations.userPage.consultations-page', compact('consultations'));
    }

    public function assignedTo()
{
    return $this->belongsTo(User_wm::class, 'assigned_to', 'user_id');
}

    /**
     * صفحة حالة الاستشارات (اليوزر)
     */
       public function status()
{
    $query = Consultation::query();

    // فلتر رقم الاستشارة
    if (request('consultation_id')) {
        $query->where(
            'consultation_id',
            request('consultation_id')
        );
    }

    // فلتر نوع الاستشارة
    if (request('consultation_type')) {
        $query->where(
            'consultation_type',
            request('consultation_type')
        );
    }

    // فلتر الحالة
    if (request('status')) {
        $query->where(
            'status',
            request('status')
        );
    }

    $consultations = $query->latest()->get();

    return view(
        'Consultations.userPage.consultation-status',
        compact('consultations')
    );
}
    
   public function my()
{
    $consultations = Consultation::all();

    return view('Consultations.userPage.my-consultation', compact('consultations'));
}
 public function showResponse()
{
    $consultation = (object) [

        'id' => 3052,

        'status' => 'تم الرد',

        'lawyer' => 'أحمد السلمي',

        'response' =>
        'بعد مراجعة الطلب والمستندات المرفقة، تبين أن الحالة تستوجب اتخاذ الإجراءات القانونية اللازمة وفقًا للأنظمة المعمول بها داخل المملكة العربية السعودية.'

    ];

    return view(
        'Consultations.userPage.show',
        compact('consultation')
    );
    
}

  
public function details($id)
{
    $consultation = Consultation::findOrFail($id);

    return view(
        'Consultations.userPage.details',
        compact('consultation')
    );
}
public function store(Request $request)
{
    $request->validate([
        'consulation_type' => 'required',
        'beneficiary' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $consultation = new Consultation();

    $consultation->title = $request->title;

    $consultation->consulation_type = $request->consulation_type;

    $consultation->request_by = auth()->id();

    $consultation->status = 'قيد المراجعة';

    $consultation->request_date = now();

    $consultation->is_closed = 0;

    $consultation->is_archived = 0;

    $consultation->save();
    
  return redirect()
    ->route('consultations.create')
    ->with(
        'success',
        'تم إرسال الاستشارة وهي الآن قيد الاسناد'
    );
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

        $archivedConsultations = Consultation::where('is_closed', true)->get();

        $lawyers = User_wm::where('role_id', 1)->get();

        return view('Consultations.legalManager.legalmanager', [
            'stats'            => $stats,
            'needsAssignment'  => $needsAssignment,
            'pendingApprovals' => $pendingApprovals,
            'archivedConsultations' => $archivedConsultations,
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
             Notification::create([
    'user_id' => $consultation->request_by,
    'title' => 'إسناد الاستشارة',

]);

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
            'status'      => 'pending',
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
            'stats'   => $stats,
            'lawyers' => $lawyers,
        ]);
    }

    public function showApproval($id)
    {
        $consultation = Consultation::with('assignedTo')->findOrFail($id);

        return view('Consultations.legalManager.showApproval', compact('consultation'));
    }

    public function approve($id) 
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => 'معتمدة']);

        return redirect()->route('legal.manager')->with('success', 'تم اعتماد الاستشارة بنجاح');
    }

    public function reject($id) 
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update([
            'status' => 'مرفوضة',
            'is_closed' => true
        ]);

        return redirect()->route('legal.manager')->with('fail', 'تم رفض اعتماد الاستشارة');
    }

    public function viewReply($id)
    {
        $consultation = Consultation::with('assignedTo')->findOrFail($id);

        return view('Consultations.legalManager.viewReply', compact('consultation'));
    }

    /**
     * صفحة الموظف القانوني
     */
    public function employeeInterfacePage()
{
    $userId = auth()->id();

    $myTasks = Task::where('assigned_to', $userId)->get();
    $myConsultations = Consultation::where('assigned_to', $userId)->latest()->get();

    $stats = [
            'under_review'   => Consultation::where('assigned_to', auth()->id())->where('status', 'قيد المراجعة')->count(),
            'needs_approval' => Consultation::where('assigned_to', auth()->id())->where('status', 'بحاجة إلى اعتماد')->count(),
            'closed'         => Consultation::where('assigned_to', auth()->id())->where('is_closed', true)->count(),
        ];

    return view('Interfaces.Employee-interface', compact('myTasks', 'myConsultations', 'stats'));
}

    public function legalEmployeePage()
    {
        // أول شيء: نجيب رقم المستخدم
        $userId = auth()->id();

        // استشارات الموظف
        $myConsultations = Consultation::where('assigned_to', $userId)->get();

        // مهام الموظف
        $myTasks = Task::where('assigned_to', $userId)->get();

        // الإحصائيات
        $stats = [
            'total_tasks'    => Task::where('assigned_to', $userId)->count(),
            'total_assigned' => Consultation::where('assigned_to', $userId)->count(),
            'in_progress'    => Consultation::where('assigned_to', $userId)
                                            ->where('status', 'قيد المراجعة')
                                            ->count(),
            'completed'      => Consultation::where('assigned_to', $userId)
                                            ->where('status', 'مكتملة')
                                            ->count(),
        ];

        return view('Consultations.legalEmployeePage.legalEmployee', compact(
            'myTasks',
            'stats',
            'myConsultations'
        ));
    }

    public function completeTask($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();

        return redirect()->back()->with('success', 'تم تحديث حالة المهمة!');
    }

    public function create()
    {
        return view('Consultations.userPage.request-consultation');
    }




     // جدول الاستشارات + فلترة
     public function consultationsTable(Request $request)
  {
    $consultations = \App\Models\Consultation::with('status')->latest()->get();
    $query = Consultation::query();

    // بحث نصي
    if ($request->search) {
        $query->where('title', 'LIKE', "%{$request->search}%");
    }

    // فلترة القسم
    if ($request->department) {
        $query->where('department', $request->department);
    }

    // فلترة الموظف
    if ($request->employee) {
        $query->where('assigned_to', $request->employee);
    }

    // فلترة الحالة
    if ($request->status) {
        $query->where('status_id', $request->status);
    }

    // فلترة التاريخ
    if ($request->date) {
        $query->whereDate('created_at', $request->date);
    }

    $consultations = $query->latest()->get();

    // الموظفين (للفلتر)
    $employees = User_wm::all();

    return view('Consultations.legalEmployeePage.consultations-table', compact('consultations', 'employees'));

 

}


}
