<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم الموظف | منصة الإدارة القانونية</title>
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

<body class="min-h-screen flex flex-col">

<header class="bg-wadimakkah-dark text-white shadow-lg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <div class="text-white px-16 py-6 flex items-center justify-between">
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">
        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('user-interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="{{ route('legal.manager') }}" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>
        <div class="flex items-center gap-6">
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
            <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
        </div>
    </div>
</header>

<main class="container mx-auto px-6 py-10 flex-grow">
<div class="mt-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800">لوحة تحكم الموظف القانوني</h1>
    <p class="text-sm text-gray-500 mt-2">متابعة المهام والإنجازات الخاصة بك</p>
</div>

<div class="flex justify-center mt-6 px-10 mb-12">
    <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3 border border-gray-200">
        <i class="fas fa-search text-gray-400 ml-2"></i>
        <input type="text" placeholder="ابحث عن قضية، عقد، مستند..." class="flex-1 outline-none text-sm bg-transparent">
    </div>
</div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    @foreach([
        ['title' => 'قيد المراجعة', 'val' => $stats['under_review'] ?? 0],
        ['title' => 'بحاجة إلى اعتماد', 'val' => $stats['needs_approval'] ?? 0],
        ['title' => 'مغلقة', 'val' => $stats['closed'] ?? 0]
    ] as $stat)
    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">{{ $stat['title'] }}</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $stat['val'] }}</span>
    </div>
    @endforeach
</div>
<div class="container mx-auto px-6 mb-12">
    <h2 class="text-xl font-bold text-gray-700 mb-6">الإدارات</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
            <h3 class="font-bold text-lg mb-2">القضايا</h3>
            <p class="text-gray-500 text-sm mb-6">استعرض القضايا المسندة لك، تابع حالتها، وحدث بياناتها</p>
            <a href="#" class="block bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">الانتقال إلى الصفحة</a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
            <h3 class="font-bold text-lg mb-2">العقود</h3>
            <p class="text-gray-500 text-sm mb-6">راجع العقود، عدل البنود، وتابع حالات الاعتماد</p>
            <a href="#" class="block bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">الانتقال إلى الصفحة</a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
            <h3 class="font-bold text-lg mb-2">الإستشارات القانونية</h3>
            <p class="text-gray-500 text-sm mb-6">اطلع على الاستشارات، قدم الردود، وأرسلها للاعتماد</p>
            <a href="#" class="block bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">الانتقال إلى الصفحة</a>
        </div>
    </div>
</div>
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
            <h3 class="font-bold text-gray-700">المهام المسندة لي</h3>
        </div>
        <div class="overflow-x-auto">
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
                    <tr class="hover:bg-gray-50 transition text-sm">
                        <td class="p-4 font-bold text-wadimakkah-dark">{{ $task->title }}</td>
                        <td class="p-4 font-bold text-wadimakkah-dark">{{ $task->status }}</td>
                        <td class="p-4 text-center">
                            <form action="{{ route('tasks.complete', $task->task_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-wadimakkah-dark hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">
                                    إتمام المهمة
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">لا توجد مهام مسندة إليك حالياً.</td>
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

</body>
</html>