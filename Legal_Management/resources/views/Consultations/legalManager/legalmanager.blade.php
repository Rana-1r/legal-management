<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة الاستشارات القانونية</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f9fafb; }
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

<body class= min-h-screen flex flex-col>

<header class="bg-wadimakkah-dark text-white shadow-lg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <div class="text-white px-16 py-6 flex items-center justify-between">
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">
        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('manager.interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="{{ route('legal.manager') }}" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>
        <div class="flex items-center gap-6">
            <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
        </div>
    </div>
</header>

<main class="container mx-auto px-6 py-10 flex-grow">
    <div class="mt-10 text-center">
       <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
       <p class="text-gray-500 mt-2 mb-8">المنصة الموحدة للإدارة القانونية بشركة وادي مكة</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 mt-6">
        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
            <p class="text-gray-600 font-bold mb-2">قيد المراجعة</p>
            <span class="text-5xl font-black text-[#1e3a8a]">{{ $stats['under_review'] }}</span>
        </div>
        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
            <p class="text-gray-600 font-bold mb-2">بحاجة إلى اعتماد</p>
            <span class="text-5xl font-black text-[#1e3a8a]">{{ $stats['needs_approval'] }}</span>
        </div>
        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
            <p class="text-gray-600 font-bold mb-2">مغلقة</p>
            <span class="text-5xl font-black text-[#1e3a8a]">{{ $stats['closed'] }}</span>
        </div>
    </div>
    
    <h2 class="text-xl font-bold text-gray-700 mb-6">طلبات بحاجة إلى إسناد</h2>
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-12">
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">رقم الطلب</th>
                        <th class="p-4 text-center">نوع الإستشارة</th>
                        <th class="p-4 text-center">الأولوية</th>
                        <th class="p-4 text-center">إسناد لمحامي</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($needsAssignment as $consult)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">#{{ $consult->consultation_id }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">{{ $consult->consulation_type }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">
                            @if(isset($consult->priority) && $consult->priority)
                                <span class="items-center gap-1 text-[#1e3a8a]">
                                    <i class="fas fa-circle text-[8px] {{ $consult->priority == 'عالي' ? 'text-red-500' : 'text-blue-400' }}"></i> 
                                    {{ $consult->priority }} 
                                </span>
                            @else
                                <span class="text-gray-400 italic text-xs">لم تحدد بعد</span>
                            @endif
                        </td>
                        <td class="px-4 py-4">
                            <form action="{{ route('consultations.assign', $consult->consultation_id) }}" method="POST" class="flex items-center gap-2 justify-center">
                                @csrf
                                <select name="lawyer_id" required class="text-xs border rounded-md px-2 py-1.5 bg-white outline-none focus:ring-1 focus:ring-blue-500 text-[#1e3a8a]">
                                    <option value="">اختر محامي...</option>
                                    @foreach($lawyers as $lawyer)
                                        <option value="{{ $lawyer->user_id }}">{{ $lawyer->full_name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">
                                    إسناد
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <h2 class="text-xl font-bold text-gray-700 mb-6">طلبات بحاجة إلى اعتماد</h2>
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden mb-12">
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">رقم الطلب</th>
                        <th class="p-4 text-center">المحامي المسؤول</th>
                        <th class="p-4 text-center">الحالة</th>
                        <th class="p-4 text-center">الإجراء</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pendingApprovals as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">#{{ $item->consultation_id }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">{{ $item->assignedTo->full_name ?? 'غير معروف' }}</td>
                        <td class="px-4 py-4 text-center"><span class="font-bold text-wadimakkah-dark">{{ $item->status }}</span></td>
                        <td class="px-4 py-4 text-center">
                            <button class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">
                            عرض
                            </button>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <h2 class="text-xl font-bold text-gray-700 mb-6">أرشفة الاستشارات</h2>
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right border-collapse text-sm">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">رقم الطلب</th>
                        <th class="p-4 text-center">تاريخ الطلب</th>
                        <th class="p-4 text-center">المحامي المسؤول</th>
                        <th class="p-4 text-center">الحالة</th>
                        <th class="p-4 text-center">الإجراء</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($archivedConsultations as $archive)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">#{{ $archive->consultation_id }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">{{ $archive->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">{{ $archive->assignedTo->full_name ?? 'غير معروف' }}</td>
                        <td class="px-4 py-4 font-bold text-wadimakkah-dark text-center">{{ $archive->status }}</td>
                        <td class="px-4 py-4 text-center">
                            <button class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">
                                عرض الرد
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">لا توجد استشارات مؤرشفة حالياً</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<footer class="bg-wadimakkah-dark text-white py-12 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-6 grid grid-cols-4 gap-10 text-sm text-center">
        <div>
            <h5 class="font-bold mb-4">روابط مهمة</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-wadimakkah-light transition">سياسة الخصوصية</a></li>
                <li><a href="#" class="hover:text-wadimakkah-light transition">الشروط والأحكام</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold mb-4">المساعدة والدعم</h5>
            <ul class="space-y-2 text-gray-300">
                <li><a href="#" class="hover:text-wadimakkah-light transition">الدعم الفني</a></li>
                <li><a href="#" class="hover:text-wadimakkah-light transition">تواصل معنا</a></li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold mb-4 text-center">وسائل التواصل الاجتماعي</h5>
            <div class="flex gap-4 text-2xl text-gray-300 justify-center">
                <i class="fab fa-linkedin"></i><i class="fab fa-youtube"></i><i class="fab fa-instagram"></i>
            </div>
        </div>
        <div>
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20 mb-4 mx-auto opacity-80">
            <p class="text-xs text-gray-400">جميع الحقوق محفوظة @ 2026</p>
        </div>
    </div>
</footer>

@if(session('success'))
<div id="toast" class="fixed bottom-10 left-10 bg-green-600 text-white px-6 py-3 rounded-lg shadow-2xl z-50 flex items-center gap-3">
    <i class="fas fa-check-circle"></i>
    <span>{{ session('success') }}</span>
</div>
<script>
    setTimeout(() => { document.getElementById('toast').style.display = 'none'; }, 4000);
</script>
@endif
</body>
</html>