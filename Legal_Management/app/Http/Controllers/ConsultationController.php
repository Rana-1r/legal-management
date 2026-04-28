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
        return view('Consultations.legal.manager.page');
    }

    /**
     * صفحة الموظف القانوني
     */
    public function employeePage()
    {
        return view('Consultations.legal.Employee');
    }
}