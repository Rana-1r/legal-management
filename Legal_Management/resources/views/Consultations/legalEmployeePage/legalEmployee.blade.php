<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة الاستشارات - شركة وادي مكة</title>
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

<main class="flex-1 flex flex-col">
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

    <div class="p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">مؤشرات الإستشارات</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl border-b-4 border-blue-500 shadow-sm text-center">
                <h3 class="text-gray-500 text-sm mb-2">إجمالي الاستشارات</h3>
                <p class="text-3xl font-black text-wadimakkah-dark">{{ $stats['total_assigned'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border-b-4 border-yellow-500 shadow-sm text-center">
                <h3 class="text-gray-500 text-sm mb-2">قيد المراجعة</h3>
                <p class="text-3xl font-black text-wadimakkah-dark">{{ $stats['in_progress'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border-b-4 border-red-500 shadow-sm text-center">
                <h3 class="text-gray-500 text-sm mb-2">متأخرة</h3>
                <p class="text-3xl font-black text-wadimakkah-dark">0</p>
            </div>
            <div class="bg-white p-6 rounded-2xl border-b-4 border-green-500 shadow-sm text-center">
                <h3 class="text-gray-500 text-sm mb-2">مكتملة</h3>
                <p class="text-3xl font-black text-wadimakkah-dark">{{ $stats['completed'] }}</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b">
                <h3 class="font-bold text-gray-700">الاستشارات اليوم</h3>
            </div>
            <table class="w-full text-center text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4">رقم الاستشارة</th>
                        <th class="p-4">عنوان الاستشارة</th>
                        <th class="p-4">تاريخ الطلب</th>
                        <th class="p-4">الحالة</th>
                        <th class="p-4">الإجراء</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($myConsultations as $consultation)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="p-4 font-bold text-wadimakkah-dark">#{{ $consultation->id }}</td>
                        <td class="p-4 font-semibold text-gray-800">{{ $consultation->title }}</td>
                        <td class="p-4 text-gray-600">{{ $consultation->created_at->format('d/m/Y') }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $consultation->status == 'مكتملة' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ $consultation->status }}
                            </span>
                        </td>
                        <td class="p-4">
                            <a href="#" class="bg-wadimakkah-dark text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition">عرض</a>
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