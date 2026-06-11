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
     * صفحة المستخدم (العميل)
     */
    public function userPage()
    {
        $consultations = Consultation::latest()->take(5)->get();
        $archivedConsultations = Consultation::where('is_archived', 1)->latest()->get();

        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('Consultations.userPage.consultations-page', [
            'archivedConsultations' => $archivedConsultations,
            'consultations'         => $consultations,
            'notifications'         => $notifications,
            
            // الإحصائيات العامة
            'total'                 => Consultation::count(),
            'under_review'          => Consultation::where('status', 'قيد المراجعة')->count(),
            'replied'               => Consultation::whereIn('status', ['تم الرد', 'مكتملة'])->count(),
        ]);
    }

    /**
     * صفحة حالة الاستشارات (اليوزر) + الفلترة
     */
    public function status()
    {
        $query = Consultation::query();

        // فلتر رقم الاستشارة
        if (request('consultation_id')) {
            $query->where('consultation_id', request('consultation_id'));
        }

        // فلتر نوع الاستشارة
        if (request('consultation_type')) {
            $query->where('consultation_type', request('consultation_type'));
        }

        // فلتر الحالة
        if (request('status')) {
            $query->where('status', request('status'));
        }

        $consultations = $query->latest()->get();

        return view('Consultations.userPage.consultation-status', compact('consultations'));
    }
    
    /**
     * استشاراتي (اليوزر)
     */
    public function my()
    {
        $consultations = Consultation::all();
        return view('Consultations.userPage.my-consultation', compact('consultations'));
    }

<<<<<<< Updated upstream
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

    $consultation->status = 'قيد الاسناد';

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

=======
>>>>>>> Stashed changes
    /**
     * عرض الرد القانوني التجريبي
     */
    public function showResponse()
    {
        $consultation = (object) [
            'id' => 3052,
            'status' => 'تم الرد',
            'lawyer' => 'أحمد السلمي',
            'response' => 'بعد مراجعة الطلب والمستندات المرفقة، تبين أن الحالة تستوجب اتخاذ الإجراءات القانونية اللازمة وفقًا للأنظمة المعمول بها داخل المملكة العربية السعودية.'
        ];

        return view('Consultations.userPage.show', compact('consultation'));
    }

    /**
     * تفاصيل استشارة محددة
     */
    public function details($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('Consultations.userPage.details', compact('consultation'));
    }

    /**
     * حفظ طلب استشارة جديد من اليوزر
     */
    public function store(Request $request)
    {
        $request->validate([
            'consulation_type' => 'required',
            'beneficiary'      => 'required|string|max:255',
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
        ]);

        $consultation = new Consultation();
        $consultation->title = $request->title;
        $consultation->consulation_type = $request->consulation_type;
        $consultation->request_by = auth()->id();
        $consultation->status = 'بحاجة إلى إسناد';
        $consultation->request_date = now();
        $consultation->is_closed = 0;
        $consultation->is_archived = 0;
        $consultation->save();
        
        return redirect()
            ->route('consultations.create')
            ->with('success', 'تم إرسال الاستشارة وهي الآن قيد الإسناد');
    }

    /**
     * صفحة المدير القانوني الرئيسية
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
        
        // جلب المحامين والموظفين (role_id: 1)
        $lawyers = User_wm::where('role_id', 1)->get();

        return view('Consultations.legalManager.legalmanager', [
            'stats'                 => $stats,
            'needsAssignment'       => $needsAssignment,
            'pendingApprovals'      => $pendingApprovals,
            'archivedConsultations' => $archivedConsultations,
            'lawyers'               => $lawyers
        ]);
    }

    /**
     * إسناد الاستشارة إلى محامٍ معين من قبل المدير
     */
    public function assignLawyer(Request $request, $id) 
    {
        $request->validate([
            'lawyer_id' => 'required|exists:users_wm,user_id',
        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->assigned_to = $request->lawyer_id;
<<<<<<< Updated upstream

        $consultation->status = 'قيد المراجعة';
        $consultation->save();
             Notification::create([
    'user_id' => $consultation->request_by,
    'title' => 'إسناد الاستشارة',
    'message' => 'تم إسناد الاستشارة رقم #' . $consultation->id . ' إلى محامٍ مختص.',
]);
        $consultation->status = 'قيد المراجعة';

=======
        $consultation->status = 'قيد المراجعة'; // تم اعتماد الحالة الأنسب وتصفية تعارض جيت
        $consultation->save();
        
        // إرسال إشعار للمستخدم
        Notification::create([
            'user_id' => $consultation->request_by,
            'title'   => 'إسناد الاستشارة',
            'message' => 'تم إسناد الاستشارة رقم #' . $consultation->id . ' إلى محامٍ مختص للبدء بمراجعتها.',
        ]);
>>>>>>> Stashed changes

        return redirect()->back()->with('success', 'تم إسناد المحامي بنجاح');
    }

    /**
     * إنشاء مهمة وإسنادها لموظف
     */
    public function storeTask(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'assigned_to' => 'required|exists:users_wm,user_id',
            'due_date'    => 'nullable|date',
            'priority'    => 'required|in:high,medium,low',
        ]);

        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'due_date'    => $request->due_date,
            'priority'    => $request->priority,
            'status'      => 'pending',
        ]);

        return redirect()->back()->with('success', 'تم إنشاء المهمة وإسنادها للموظف بنجاح.');
    }

    /**
     * واجهة المدير القانوني الإحصائية (manager-interface)
     */
    public function managerIndex()
    {
        $stats = [
            'total_cases'         => Task::where('related_entity_Type', 'قضية')->count(), 
            'total_contracts'     => Task::where('related_entity_Type', 'عقد')->count(),
            'total_consultations' => Consultation::count(),
        ];

        $lawyers = User_wm::where('role_id', 1)->get();

        return view('Interfaces.manager-interface', [
            'stats'   => $stats,
            'lawyers' => $lawyers,
        ]);
    }

    /**
     * عرض شاشة الاعتماد للمدير
     */
    public function showApproval($id)
    {
        // تم مسح العلاقة الخاطئة والمستدعية من هنا والاعتماد على الموديل
        $consultation = Consultation::findOrFail($id);
        return view('Consultations.legalManager.showApproval', compact('consultation'));
    }

    /**
     * موافقة المدير واعتماد الاستشارة
     */
    public function approve($id) 
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => 'معتمدة']);

        return redirect()->route('legal.manager')->with('success', 'تم اعتماد الاستشارة بنجاح');
    }

    /**
     * رفض اعتماد الاستشارة من قبل المدير
     */
    public function reject($id) 
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update([
            'status'    => 'مرفوضة',
            'is_closed' => true
        ]);

        return redirect()->route('legal.manager')->with('fail', 'تم رفض اعتماد الاستشارة');
    }

    /**
     * استعراض الرد المكتوب للمدير مراجعتها
     */
    public function viewReply($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('Consultations.legalManager.viewReply', compact('consultation'));
    }

    /**
     * واجهة الموظف القانوني المدمجة والجديدة (Employee-interface)
     */
    public function employeeInterfacePage()
    {
        $userId = auth()->id();

        $myTasks = Task::where('assigned_to', $userId)->get();
        $myConsultations = Consultation::where('assigned_to', $userId)->get();

        // الإحصائيات (تعديل الحالات للغة العربية لتطابق قاعدة البيانات وتظهر الكروت بشكل صحيح)
        $stats = [
            'total_cases'         => Task::where('assigned_to', $userId)->where('related_entity_Type', 'قضية')->count(),
            'total_contracts'     => Task::where('assigned_to', $userId)->where('related_entity_Type', 'عقد')->count(),
            'total_consultations' => $myConsultations->count(),
            
            // إحصائيات إضافية اختيارية
            'total_assigned'      => $myConsultations->count(),
            'in_progress'         => $myConsultations->where('status', 'قيد المراجعة')->count(),
            'completed'           => $myConsultations->where('status', 'مكتملة')->count(),
        ];

        return view('Interfaces.Employee-interface', compact('myTasks', 'myConsultations', 'stats'));
    }

    /**
     * صفحة الموظف القانوني التفصيلية القديمة
     */
    public function legalEmployeePage()
    {
        $userId = auth()->id();

        $myConsultations = Consultation::where('assigned_to', $userId)->get();
        $myTasks = Task::where('assigned_to', $userId)->get();

        $stats = [
            'total_tasks'    => Task::where('assigned_to', $userId)->count(),
            'total_assigned' => Consultation::where('assigned_to', $userId)->count(),
            'in_progress'    => Consultation::where('assigned_to', $userId)->where('status', 'قيد المراجعة')->count(),
            'completed'      => Consultation::where('assigned_to', $userId)->where('status', 'مكتملة')->count(),
        ];

        return view('Consultations.legalEmployeePage.legalEmployee', compact('myTasks', 'stats', 'myConsultations'));
    }

    /**
     * إنهاء المهمة وتحويل حالتها إلى مكتملة
     */
    public function completeTask($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();

        return redirect()->back()->with('success', 'تم تحديث حالة المهمة!');
    }

    /**
     * الانتقال لصفحة إنشاء استشارة لليوزر
     */
    public function create()
    {
        return view('Consultations.userPage.request-consultation');
    }

    /**
     * جدول الاستشارات والمهام الشامل للموظف القانوني + الفلترة
     */
    public function consultationsTable(Request $request)
    {
        $query = Consultation::query();

        // بحث نصي بالعنوان
        if ($request->search) {
            $query->where('title', 'LIKE', "%{$request->search}%");
        }

        // فلترة القسم
        if ($request->department) {
            $query->where('department', $request->department);
        }

        // فلترة الموظف المسند إليه
        if ($request->employee) {
            $query->where('assigned_to', $request->employee);
        }

        // فلترة الحالة
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // فلترة التاريخ
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $consultations = $query->latest()->get();
        $employees = User_wm::all();

        return view('Consultations.legalEmployeePage.consultations-table', compact('consultations', 'employees'));
    }
}
