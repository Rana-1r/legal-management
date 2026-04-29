<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم الموظف | منصة الإدارة القانونية</title>
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

<body class="bg-gray-50">

<header class="bg-wadimakkah-dark text-white shadow-lg">
    <div class="text-white px-16 py-6 flex items-center justify-between">
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('user-interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="{{ route('legal.manager') }}" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية
                <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>

        <div class="flex items-center gap-6">
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
        </div>
    </div>
</header>

<div class="mt-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800">لوحة تحكم الموظف القانوني</h1>
    <p class="text-sm text-gray-500 mt-2">متابعة المهام والإنجازات الخاصة بك</p>
</div>

<div class="flex justify-center mt-6 px-10">
    <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <circle cx="11" cy="11" r="8" stroke-width="2"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-width="2"></line>
        </svg>
        <input type="text" placeholder="ابحث عن قضية، عقد، مستند..." class="flex-1 outline-none text-sm bg-transparent">
    </div>
</div>

<div class="px-16 mt-12">
    <div class="grid grid-cols-3 gap-6">
        @foreach([
            ['title' => 'قيد المراجعة', 'val' => $stats['under_review'] ?? 0],
            ['title' => 'بحاجة إلى اعتماد', 'val' => $stats['needs_approval'] ?? 0],
            ['title' => 'مغلقة', 'val' => $stats['closed'] ?? 0]
        ] as $stat)
        <div class="bg-white p-6 rounded-xl shadow-md text-center">
            <h3 class="font-bold text-sm mb-2 text-gray-600">{{ $stat['title'] }}</h3>
            <p class="text-3xl font-black text-wadimakkah-dark">{{ $stat['val'] }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="mt-12">
    <h2 class="bg-[#344C93] text-white text-center py-3 font-bold text-lg w-full">الإدارات</h2>
    <div class="px-16 mt-6">
        <div class="bg-[#f5f6f8] p-8 rounded-2xl shadow-sm">
            <div class="grid grid-cols-3 gap-6 text-center">
                <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
                    <h3 class="font-bold text-sm mb-2">القضايا</h3>
                    <p class="text-xs text-gray-500 leading-6 mb-4">استعرض القضايا المسندة لك، تابع حالتها، وحدث بياناتها.</p>
                    <div class="mt-auto">
                        <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">الانتقال إلى الصفحة</button>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
                    <h3 class="font-bold text-sm mb-2">العقود</h3>
                    <p class="text-xs text-gray-500 leading-6 mb-4">راجع العقود، عدل البنود، وتابع حالات الاعتماد.</p>
                    <div class="mt-auto">
                        <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">الانتقال إلى الصفحة</button>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md flex flex-col h-full">
                    <h3 class="font-bold text-sm mb-2">الإستشارات القانونية</h3>
                    <p class="text-xs text-gray-500 leading-6 mb-4">اطلع على الاستشارات، قدم الردود، وأرسلها للاعتماد.</p>
                    <div class="mt-auto">
                        <button class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">الانتقال إلى الصفحة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-12 px-16 mb-16">
    <h2 class="bg-[#344C93] text-white text-center py-3 font-bold text-lg w-full mb-6">المهام المسندة لي</h2>
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full text-right border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4">اسم المهمة</th>
                    <th class="p-4">الحالة</th>
                    <th class="p-4 text-center">الإجراء</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($myTasks as $task)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 font-bold text-wadimakkah-dark">{{ $task->title }}</td>
                    <td class="p-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ $task->status }}</span></td>
                    <td class="p-4 text-center">
                        <form action="{{ route('tasks.complete', $task->task_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gray-200 text-gray-700 px-4 py-1 text-xs rounded-md hover:bg-gray-300">إتمام المهمة</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-6 text-center text-gray-500">لا توجد مهام مسندة إليك حالياً.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<footer class="bg-wadimakkah-dark text-white py-12 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-6 grid grid-cols-4 gap-10 text-sm">
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
            <h5 class="font-bold mb-4">وسائل التواصل الاجتماعي</h5>
            <div class="flex gap-4 text-2xl text-gray-300">
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-youtube"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-wadimakkah-light"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
        <div class="flex flex-col items-center text-center px-6 -mt-4">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20 mb-4 opacity-80">
            <p class="text-xs text-gray-400">شركة وادي مكة للتقنية</p>
            <p class="text-xs text-gray-400">جميع الحقوق محفوظة @ 2026</p>
        </div>
    </div>
</footer>

</body>
</html>