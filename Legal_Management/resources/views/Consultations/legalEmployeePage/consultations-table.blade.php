<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>جدول الاستشارات</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'wadimakkah-dark': '#1e3a8a',
                        'wadimakkah-light': '#60a5fa',
                        'wadimakkah-bg': '#f9fafb',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-wadimakkah-bg min-h-screen flex">

<!-- Sidebar -->
<aside id="sidebar" class="w-64 bg-wadimakkah-dark text-white p-6 transition-all duration-300">
    <h2 class="text-xl font-bold mb-8 text-center border-b border-blue-700 pb-4">شركة وادي مكة</h2>
    <ul class="space-y-4">
        <li><a href="{{ route('employee.interface') }}" class="block p-3 rounded hover:bg-blue-800 transition"><i class="fas fa-home ml-2"></i>لوحة التحكم</a></li>        
        <li><a href="{{ route('employee.legal') }}"class="block p-3 rounded hover:bg-blue-800 transition"><i class="fas fa-chart-line ml-2"></i>مؤشرات الاستشارات</a></li>        
        <li><a href="{{ route('consultations.table') }}" class="block p-3 rounded hover:bg-blue-800 transition"><i class="fas fa-list ml-2"></i> قائمة الإستشارات</a></li>
        <li><a href="#" class="block p-3 rounded hover:bg-blue-800 transition"><i class="fas fa-exclamation-circle ml-2"></i> بحاجة لمراجعة</a></li>
        <li><a href="#" class="block p-3 rounded hover:bg-blue-800 transition"><i class="fas fa-bell ml-2"></i> تنبيهات</a></li>
        <li><a href="#" class="block p-3 rounded hover:bg-blue-800 transition"><i class="fas fa-history ml-2"></i> آخر الأنشطة</a></li>
    </ul>
</aside>


<!-- Main -->
<main class="flex-1 flex flex-col">
    

<!-- Header -->
<header class="bg-white shadow-sm px-8 py-4 flex items-center justify-between">
        <button onclick="document.getElementById('sidebar').classList.toggle('hidden')" class="text-wadimakkah-dark text-2xl">
            <i class="fas fa-bars"></i>
        </button>
        <div class="flex items-center gap-4 text-wadimakkah-dark font-bold">
           <a href="{{ route('profile.show') }}" class="flex items-center gap-3 text-wadimakkah-dark font-bold">
    @if(Auth::user()->photo)
        <img src="{{ asset('storage/' . Auth::user()->photo) }}" 
             alt="Profile" 
             class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm">
    @else
        <i class="fas fa-user-circle text-4xl"></i>
    @endif
    
    <span class="block">مرحباً بك، {{ auth()->user()->full_name }}</span>
</a>
        </div>
    </header>

<!-- Content -->
<div class="p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">سجل الإستشارات</h1>
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">

        <div class="bg-gray-50 px-6 py-4 border-b">
            <h3 class="font-bold text-gray-700">قائمة الاستشارات</h3>
        </div>

        <table class="w-full text-center text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4">رقم الاستشارة</th>
                    <th class="p-4">القسم</th>
                    <th class="p-4">الموظف</th>
                    <th class="p-4">الحالة</th>
                    <th class="p-4">تاريخ الطلب</th>
                    <th class="p-4">تاريخ الرد</th>
                    <th class="p-4">الإجراء</th>
                </tr>
            </thead>
<!-- 🔎 شريط الفلترة -->
<form method="GET" class="bg-white px-6 py-4 border-b grid grid-cols-1 md:grid-cols-5 gap-4">

    <!-- بحث -->
    <input 
        type="text" 
        name="search" 
        value="{{ request('search') }}"
        placeholder="ابحث عن استشارة..."
        class="border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-200"
    >

    <!-- القسم -->
    <select name="department" class="border rounded-lg px-3 py-2 text-sm">
        <option value="">كل الأقسام</option>
        <option value="القسم القانوني" {{ request('department')=='القسم القانوني' ? 'selected' : '' }}>القسم القانوني</option>
        <option value="الموارد البشرية" {{ request('department')=='الموارد البشرية' ? 'selected' : '' }}>الموارد البشرية</option>
        <option value="المالية" {{ request('department')=='المالية' ? 'selected' : '' }}>المالية</option>
    </select>

    <!-- الموظف -->
    <select name="employee" class="border rounded-lg px-3 py-2 text-sm">
        <option value="">كل الموظفين</option>
        @foreach($employees as $emp)
            <option value="{{ $emp->id }}" {{ request('employee')==$emp->id ? 'selected' : '' }}>
                {{ $emp->full_name }}
            </option>
        @endforeach
    </select>

    <!-- الحالة -->
    <select name="status" class="border rounded-lg px-3 py-2 text-sm">
        <option value="">كل الحالات</option>
        <option value="1" {{ request('status')=='1' ? 'selected' : '' }}>قيد المراجعة</option>
        <option value="2" {{ request('status')=='2' ? 'selected' : '' }}>مكتملة</option>
        <option value="3" {{ request('status')=='3' ? 'selected' : '' }}>مرفوضة</option>
    </select>

    <!-- التاريخ -->
    <input 
        type="date" 
        name="date" 
        value="{{ request('date') }}"
        class="border rounded-lg px-3 py-2 text-sm"
    >

    <!-- زر تطبيق -->
    <div class="md:col-span-5 flex justify-end">
        <button class="bg-wadimakkah-dark text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition">
            تطبيق الفلتر
        </button>
    </div>

</form>

            <tbody class="divide-y divide-gray-100">
                @foreach($consultations as $c)
                <tr class="hover:bg-blue-50 transition">

                    <td class="p-4 font-bold text-wadimakkah-dark">#{{ $c->id }}</td>

                    <td class="p-4 text-gray-700">
                        {{ $c->department ?? '—' }}
                    </td>

                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold
                            @if($c->status_id == 1) bg-blue-100 text-blue-700
                            @elseif($c->status_id == 2) bg-green-100 text-green-700
                            @else bg-gray-200 text-gray-700 @endif">
                            {{ $c->status->name ?? '—' }}
                        </span>
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $c->created_at->format('Y-m-d') }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $c->response_date ? $c->response_date->format('Y-m-d') : '—' }}
                    </td>

                    <td class="p-4">
                        <a href="{{ route('consultations.edit', $c->id) }}"
                           class="bg-wadimakkah-dark text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition">
                            عرض
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

</main>

</body>
</html>