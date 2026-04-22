<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//كنترولر الصفحة الرئيسية للمستخدم
class DashboardController extends Controller
{
    public function index()
    {
        return view('Interfaces.user-interface');
    }
}