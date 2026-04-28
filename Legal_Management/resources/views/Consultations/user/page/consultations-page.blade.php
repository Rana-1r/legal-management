 <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>منصة الإدارة القانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }
    </style>
</head>


<body class="bg-gray-100">

<!-- Navbar -->
<header class="bg-wadimakkah-dark text-white shadow-lg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <div class="text-white px-16 py-6 flex items-center justify-between">
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

            <div class="flex gap-8 text-sm font-medium">
                <a href="{{ route('user-interface') }}" class="hover:text-wadimakkah-light transition">الرئيسية</a>
                <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
                <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
              <a href="{{ route('consultations.page') }}">الاستشارات</a>
                <a href="#" class="hover:text-wadimakkah-light transition">المستندات والتقارير</a>
                <a href="#" class="hover:text-wadimakkah-light transition">
                    اللغة العربية
                    <i class="fas fa-globe text-wadimakkah-light"></i>
                </a>
            </div>

            <div class="flex items-center gap-6">
                <a href="{{ route('profile.show') }}" class="hover:text-blue-300 transition"><i class="fas fa-user-circle text-2xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-bell text-xl"></i></a>
                <a href="#" class="hover:text-blue-300 transition"><i class="fas fa-cog text-xl"></i></a>
            </div>
        </div>
    </header>
    <!--  العنوان -->
<div class="mt-10 text-center">
    <h1 class="text-3xl font-bold text-gray-800">
        منصة الإدارة القانونية
    </h1>
    <p class="text-sm text-gray-500 mt-2">
        المنصة الموحدة لإدارة الخدمات القانونية بشركة وادي مكة
    </p>
</div>

<!-- Search -->
<div class="flex justify-center mt-6 px-10">
    <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3">

        <!-- icon -->
        <svg class="w-5 h-5 text-gray-400 ml-3"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <circle cx="11" cy="11" r="8" stroke-width="2"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke-width="2"/>
        </svg>

        <input type="text"
               placeholder="ابحث عن قضية، عقد، مستند..."
               class="flex-1 outline-none text-sm bg-transparent"/>
    </div>
</div>

<!-- Space between search and stats -->
<div class="mt-10"></div>

<!-- Stats -->
<div class="px-10">
    <div class="grid grid-cols-3 gap-6">

        <div class="bg-gray-200 p-6 rounded-lg text-center">
            <p class="text-sm text-gray-500">قيد المراجعة</p>
            <h2 class="text-xl font-bold">3</h2>
        </div>

        <div class="bg-gray-200 p-6 rounded-lg text-center">
            <p class="text-sm text-gray-500">الاستشارات</p>
            <h2 class="text-xl font-bold">6</h2>
        </div>

        <div class="bg-gray-200 p-6 rounded-lg text-center">
            <p class="text-sm text-gray-500">تم الرد</p>
            <h2 class="text-xl font-bold">3</h2>
        </div>

    </div>
</div>

<!-- Services -->
<div class="px-10 mt-10 grid grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="font-bold mb-2">استشارتي</h3>
        <p class="text-xs text-gray-500 mb-4">
            عرض جميع الاستشارات الخاصة بك مع إمكانية مراجعة الردود والتحديثات
        </p>
        <button class="bg-gray-200 px-4 py-1 rounded text-xs">الانتقال إلى الخدمة</button>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="font-bold mb-2">متابعة حالة الاستشارات</h3>
        <p class="text-xs text-gray-500 mb-4">
            متابعة جميع الطلبات ومعرفة حالتها والتحديثات المرتبطة بها
        </p>
        <button class="bg-gray-200 px-4 py-1 rounded text-xs">الانتقال إلى الخدمة</button>
    </div>

    <div class="bg-white p-6 rounded-xl shadow text-center">
        <h3 class="font-bold mb-2">طلب استشارة قانونية</h3>
        <p class="text-xs text-gray-500 mb-4">
            تقديم طلب استشارة قانونية ومتابعة حالتها حتى استلام الرد النهائي
        </p>
        <button class="bg-gray-200 px-4 py-1 rounded text-xs">الانتقال إلى الخدمة</button>
    </div>

</div>

<!-- Notifications -->
<div class="px-10 mt-10">
    <h3 class="text-sm font-bold mb-3">الإشعارات 🔔</h3>

    <div class="bg-white p-4 rounded-xl shadow space-y-2">
        <div class="bg-gray-100 p-2 rounded">تم الرد على الاستشارة رقم 3021 ✔️</div>
        <div class="bg-gray-100 p-2 rounded">تم تحديث الاستشارة رقم 3028 ✔️</div>
        <div class="bg-gray-100 p-2 rounded">تم الرد على الاستشارة رقم 3025 ✔️</div>
        <div class="bg-gray-100 p-2 rounded">تم الرد على الاستشارة رقم 3027 ✔️</div>
    </div>
</div>

<!-- TABLE -->
<div class="px-10 mt-10">

    <h3 class="text-sm font-bold mb-4 text-right">آخر الطلبات</h3>
 <div class="bg-white border border-gray-300 rounded-xl shadow-lg overflow-hidden">

        <table class="w-full text-sm text-center">

            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3">رقم الاستشارة</th>
                    <th class="p-3">عنوان الاستشارة</th>
                    <th class="p-3">الحالة</th>
                    <th class="p-3">المحامي المسؤول</th>
                    <th class="p-3">الإجراءات</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 font-semibold">3053</td>
                    <td>عقد</td>
                    <td class="text-gray-500">مكتملة</td>
                    <td>الباسم</td>
                    <td>
                        <button class="bg-blue-500 text-white px-4 py-1 rounded text-xs hover:bg-blue-600">
                            عرض
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 font-semibold">3054</td>
                    <td>نزاع</td>
                    <td class="text-gray-500">مكتملة</td>
                    <td>الباسم</td>
                    <td>
                        <button class="bg-blue-500 text-white px-4 py-1 rounded text-xs hover:bg-blue-600">
                            عرض
                        </button>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 font-semibold">3055</td>
                    <td>مراجعة عقد جزائي</td>
                    <td class="text-gray-500">مكتملة</td>
                    <td>الباسم</td>
                    <td>
                        <button class="bg-blue-500 text-white px-4 py-1 rounded text-xs hover:bg-blue-600">
                            عرض
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>

        <!-- Show More -->
        <div class="text-left px-4 py-3 border-t bg-gray-50">
            <a href="#" class="text-blue-500 text-sm font-medium hover:underline flex items-center gap-1">
                عرض المزيد ←
            </a>
        </div>

    </div>

</div>
<!-- Tailwind  -->
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