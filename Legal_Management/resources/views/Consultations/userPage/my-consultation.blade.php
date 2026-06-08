<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>إدارة الاستشارات القانونية</title>

    <!-- Tailwind -->
<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- إعداد ألوان مخصصة -->
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

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f7fb;
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header class="bg-wadimakkah-dark text-white shadow-lg">

    <div class="px-16 py-6 flex items-center justify-between">

        <!-- Logo -->
        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

        <!-- Links -->
        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('user-interface') }}">الرئيسية</a>
            <a href="#">القضايا</a>
            <a href="#">العقود</a>
            <a href="{{ route('consultations.page') }}">الاستشارات</a>
            <a href="#">المستندات والتقارير</a>

            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية
                <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>

        <!-- Icons -->
        <div class="flex items-center gap-6">
            <i class="fas fa-user-circle text-2xl"></i>
            <i class="fas fa-bell text-xl"></i>
            <i class="fas fa-cog text-xl"></i>
        </div>

    </div>
</header>


<!-- ================= CONTENT ================= -->
<div class="max-w-5xl mx-auto mt-10 px-6">

    <!-- Title -->
    <h1 class="text-3xl font-bold text-center mb-6">
        إدارة الاستشارات القانونية
    </h1>

    <!-- Search -->
    <div class="flex justify-center mb-10">
        <div class="flex items-center bg-white shadow-md rounded-xl w-full max-w-2xl px-4 py-3 border border-gray-200">

            <svg class="w-5 h-5 text-gray-400 ml-3" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>

            <input type="text"
                   placeholder="ابحث عن استشارة بالرقم الخاص بها..."
                   class="flex-1 outline-none text-sm bg-transparent">
        </div>
    </div>

    <!-- Table Title -->
    <h2 class="text-lg font-bold mb-4 text-right">
        جدول استشاراتي
    </h2>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">

        <table class="w-full text-sm text-center">

            <thead class="bg-gray-100 text-gray-600 text-xs">
                <tr>
                    <th class="py-3">رقم الاستشارة</th>
                    <th>عنوان الاستشارة</th>
                    <th>الحالة</th>
                    <th>تاريخ الإرسال</th>
                    <th>المحامي المسؤول</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                @forelse($consultations as $consultation)
                <tr class="border-t hover:bg-gray-50 transition">

                    <td class="py-3 font-medium">
                        {{ $consultation->consultation_id }}
               
                    </td>

                    <td>
                        {{ $consultation->consulation_type }}
                    </td>

                    <td>
                        <span class="
                            px-2 py-1 rounded text-xs font-semibold

                            @if($consultation->status == 'قيد المراجعة')
                                bg-yellow-100 text-yellow-700
                            @elseif($consultation->status == 'تم الرد')
                                bg-green-100 text-green-700
                            @else
                                bg-gray-100 text-gray-600
                            @endif
                        ">
                            {{ $consultation->status }}
                        </span>
                    </td>

                    <td>
                        {{ $consultation->request_date }}
                    </td>

                   <td>
          {{ optional($consultation->assignedTo)->full_name ?? 'لم يتم التعيين بعد' }}
</td>

                 <td class="p-4 text-center">

    @if($consultation->status == 'مكتملة' || $consultation->status == 'تم الرد')

        <a href="{{ route('consultation.response', $consultation->consultation_id) }}"
           class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">

            عرض

        </a>

    @elseif(in_array($consultation->status, ['متأخرة', 'قيد المراجعة', 'قيد الاعتماد']))

        <a href="{{ route('consultation.details', $consultation->consultation_id) }}"
           class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">

            عرض

        </a>

    @endif

</td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="py-6 text-gray-400">
                        لا توجد استشارات
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>

        <div class="p-3 text-left">
            <a href="#" class="text-blue-500 text-sm hover:underline">
                عرض المزيد ←
            </a>
        </div>

    </div>
    

</div>


<!-- ================= FOOTER ================= -->
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
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
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