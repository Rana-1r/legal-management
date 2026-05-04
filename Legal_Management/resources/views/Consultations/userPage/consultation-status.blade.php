<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>حالة الاستشارات القانونية</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-white min-h-screen">

<!-- ================= NAVBAR ================= -->
<header class="bg-[#2f4597] text-white shadow-md">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <div class="px-16 py-5 flex items-center justify-between">

        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-16">

        <div class="flex gap-10 text-sm font-medium">
            <a href="{{ route('user-interface') }}">الرئيسية</a>
            <a href="#">القضايا</a>
            <a href="#">العقود</a>
            <a href="{{ route('consultations.user') }}" class="font-semibold">الاستشارات</a>
            <a href="#">المستندات والتقارير</a>
             <a href="#" class="hover:text-wadimakkah-light transition">
                    اللغة العربية
                    <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
        </div>

        <div class="flex items-center gap-5 text-xl">
            <i class="fas fa-user-circle"></i>
            <i class="fas fa-bell"></i>
            <i class="fas fa-cog"></i>
        </div>

    </div>
</header>

    <div class="flex">

        

        <main class="flex-1 px-20 py-10">

            <p class="text-sm mb-3">
                <span class="text-[#344C93] font-bold">الرئيسية</span>
                /
                الاستشارات القانونية
            </p>

            <h1 class="text-2xl font-extrabold mb-8">
                إدارة الاستشارات القانونية
            </h1>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- FILTER BAR -->
<div class="mb-8 flex justify-center">

    <div class="w-[760px] bg-gray-100 rounded-lg shadow-sm px-4 py-2 flex items-center justify-between gap-3">

        <button class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 flex items-center gap-1">
            <span>🔍</span>
            البحث برقم الإستشارة
        </button>

        <select class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 outline-none">
            <option>المستشار المسؤول</option>
        </select>

        <select class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 outline-none">
            <option>التاريخ</option>
        </select>

        <select class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 outline-none">
            <option>حالة الإستشارة</option>
            <option>قيد المراجعة</option>
            <option>قيد الاعتماد</option>
            <option>تم الرد</option>
        </select>

        <select class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 outline-none">
            <option>نوع الإستشارة</option>
            <option>عمالي</option>
            <option>عقود</option>
            <option>شركات</option>
        </select>

    </div>

</div>

            <div class="bg-white border rounded-xl shadow-sm overflow-hidden">

                <table class="w-full text-sm text-center">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="py-3 px-4">رقم الطلب</th>
                            <th class="py-3 px-4">نوع الاستشارة</th>
                            <th class="py-3 px-4">حالة الاستشارة</th>
                            <th class="py-3 px-4">المستشار المسؤول</th>
                            <th class="py-3 px-4">آخر تحديث</th>
                            <th class="py-3 px-4">المدة</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($consultations as $consultation)
                            <tr class="border-b hover:bg-gray-50">

                                <td class="py-3 px-4">
                                    {{ $consultation->id }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $consultation->consultation_type }}
                                </td>

                                <td class="py-3 px-4 font-semibold">
                                    @if($consultation->status == 'قيد المراجعة')
                                        <span class="text-yellow-500">●</span>
                                    @elseif($consultation->status == 'قيد الاعتماد')
                                        <span class="text-red-500">●</span>
                                    @elseif($consultation->status == 'تم الرد')
                                        <span class="text-green-500">●</span>
                                    @else
                                        <span class="text-blue-500">●</span>
                                    @endif

                                    {{ $consultation->status }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $consultation->responsible_consultant ?? 'لم يتم التعيين بعد' }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $consultation->updated_at->diffForHumans() }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $consultation->created_at->diffForHumans() }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-10 text-gray-400">
                                    لا توجد استشارات حتى الآن
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </main>
    </div>
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
    <!--  Footer -->
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
                <img src="{{ asset('images/Wadi Makkah Logo.png') }}" alt="Wadi Makkah Logo" class="h-20 mb-4 opacity-80">
    
                <p class="text-xs text-gray-400">شركة وادي مكة للتقنية</p>
                <p class="text-xs text-gray-400">جميع الحقوق محفوظة @ 2026</p>
            </div>

        </div>
    </footer>    
</body> 
</html>

</body>
</html>