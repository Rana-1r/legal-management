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
            <a href="{{ route('consultations.page') }}" class="font-semibold">الاستشارات</a>
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

           
            <!-- FILTER BAR -->
<form method="GET" action="{{ url('/consultations/status') }}">

<div class="mb-8 flex justify-center">

    <div class="w-[760px] bg-gray-100 rounded-lg shadow-sm px-4 py-2 flex items-center justify-between gap-3">

        <input
            type="text"
            name="consultation_id"
            value="{{ request('consultation_id') }}"
            placeholder="اكتب رقم الاستشارة..."
            class="bg-white px-3 py-1 rounded text-xs border outline-none"
        >

        <select
            name="status"
            class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 outline-none"
        >
            <option value="">حالة الإستشارة</option>

            <option value="قيد المراجعة"
                {{ request('status')=='قيد المراجعة' ? 'selected' : '' }}>
                قيد المراجعة
            </option>

            <option value="قيد الاعتماد"
                {{ request('status')=='قيد الاعتماد' ? 'selected' : '' }}>
                قيد الاعتماد
            </option>

            <option value="تم الرد"
                {{ request('status')=='تم الرد' ? 'selected' : '' }}>
                تم الرد
            </option>

            <option value="مكتملة"
                {{ request('status')=='مكتملة' ? 'selected' : '' }}>
                مكتملة
            </option>

            <option value="متأخرة"
                {{ request('status')=='متأخرة' ? 'selected' : '' }}>
                متأخرة
            </option>
        </select>

        <select
            name="consultation_type"
            class="bg-gray-200 px-4 py-1 rounded text-xs text-gray-700 outline-none"
        >
            <option value="">نوع الإستشارة</option>

            <option value="عمالي"
                {{ request('consultation_type')=='عمالي' ? 'selected' : '' }}>
                عمالي
            </option>

            <option value="عقود"
                {{ request('consultation_type')=='عقود' ? 'selected' : '' }}>
                عقود
            </option>

            <option value="شركات"
                {{ request('consultation_type')=='شركات' ? 'selected' : '' }}>
                شركات
            </option>
        </select>

        <button
            type="submit"
            class="bg-[#344C93] text-white px-4 py-1 rounded text-xs"
        >
            بحث
        </button>

    </div>

</div>

</form>
</div>
<div class="flex justify-center">

    <div class="w-[1000px] bg-white border rounded-xl shadow-sm overflow-hidden">

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
                                    {{ $consultation->consultation_id }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $consultation->consulation_type }}
                                </td>

                              <td class="py-3 px-4 font-semibold">

                      @if(in_array($consultation->status, ['تم الرد', 'مكتملة']))
           <span class="text-green-500 text-lg">●</span>

                       @elseif($consultation->status == 'متأخرة')
          <span class="text-red-500 text-lg">●</span>

                     @elseif(in_array($consultation->status, ['قيد المراجعة', 'قيد الاعتماد']))
         <span class="text-yellow-500 text-lg">●</span>

                      @else
               <span class="text-gray-500 text-lg">●</span>
          @endif

                {{ $consultation->status }}

</td>

                                <td class="py-3 px-4">
                                   {{ $consultation->assignedTo->full_name ?? 'لم يتم التعيين بعد' }}
                                </td>

                                <td class="py-3 px-4">
                                 {{ $consultation->updated_at ? $consultation->updated_at->diffForHumans() : '-' }}
                                </td>

                                <td class="py-3 px-4">
                                    {{ $consultation->created_at ? $consultation->created_at->diffForHumans() : '-' }}
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