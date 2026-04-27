<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\Notification;

class ConsultationController extends Controller
{
    /**
     * صفحة الاستشارات (اللي سويتيها)
     */
    public function page()
    {
        // بيانات من الداتابيس (لو ما عندك تجاهلي وبيشتغل عادي)
        $consultations = Consultation::latest()->take(5)->get();

        $notifications = Notification::latest()->take(3)->get();

        return view('interfaces.consultations', compact('consultations', 'notifications'));
    }


    /**
     * صفحة عرض كل الاستشارات (resource)
     */
    public function index()
    {
        $consultations = Consultation::latest()->paginate(10);

        return view('interfaces.consultations-index', compact('consultations'));
    }


    /**
     * صفحة إنشاء استشارة
     */
    public function create()
    {
        return view('interfaces.consultations-create');
    }


    /**
     * حفظ الاستشارة
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Consultation::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'قيد المراجعة',
        ]);

        return redirect()->route('consultations.page');
    }


    /**
     * عرض استشارة واحدة
     */
    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);

        return view('interfaces.consultations-show', compact('consultation'));
    }


    /**
     * استشاراتي
     */
    public function my()
    {
        $consultations = Consultation::latest()->get();

        return view('interfaces.consultations-my', compact('consultations'));
    }
}