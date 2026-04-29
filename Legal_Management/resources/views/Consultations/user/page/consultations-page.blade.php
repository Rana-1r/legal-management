<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>منصة الإدارة القانونية</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">


<!-- NAVBAR -->
<header class="bg-wadimakkah-dark text-white shadow-lg">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <div class="px-16 py-6 flex items-center justify-between">

        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

        <div class="flex gap-8 text-sm font-medium">
            <a href="{{ route('user-interface') }}">الرئيسية</a>
            <a href="#">القضايا</a>
            <a href="#">العقود</a>
            <a href="{{ route('consultations.user') }}">الاستشارات</a>
            <a href="#">المستندات والتقارير</a>
        </div>

        <div class="flex items-center gap-6">
            <i class="fas fa-user-circle text-2xl"></i>
            <i class="fas fa-bell text-xl"></i>
            <i class="fas fa-cog text-xl"></i>
        </div>

    </div>
</header>


<!-- HEADER-->
<div class="mt-10 text-center">

    <h1 class="text-3xl font-bold text-gray-800">
        منصة الإدارة القانونية
    </h1>

    <p class="text-sm text-gray-500 mt-2">
        المنصة الموحدة لإدارة الخدمات القانونية بشركة وادي مكة
    </p>

</div>


<!-- SEARCH -->
<div class="flex justify-center mt-6 px-10">

    <div class="flex items-center bg-white shadow-md rounded-xl w-full max-w-3xl px-4 py-3 border border-gray-200">

        <!-- search icon -->
        <svg class="w-5 h-5 text-gray-400 ml-3"
             fill="none"
             stroke="currentColor"
             stroke-width="2"
             viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>

        <input type="text"
               placeholder="ابحث عن استشارة بالرقم الخاص بها..."
               class="flex-1 outline-none text-sm bg-transparent"/>

    </div>

</div>

<!--STATS  -->
<div class="px-10 mt-10">

    <h3 class="text-lg font-bold text-gray-800 mb-6">
        حالة الاستشارات القانونية
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl text-center">
            <p class="text-gray-600 font-bold mb-2">قيد المراجعة</p>
            <span class="text-4xl font-black text-[#1e3a8a]">
                {{ $under_review ?? 0 }}
            </span>
        </div>

        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl text-center">
            <p class="text-gray-600 font-bold mb-2">الاستشارات</p>
            <span class="text-4xl font-black text-[#1e3a8a]">
                {{ $total ?? 0 }}
            </span>
        </div>

        <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl text-center">
            <p class="text-gray-600 font-bold mb-2">تم الرد</p>
            <span class="text-4xl font-black text-[#1e3a8a]">
                {{ $replied ?? 0 }}
            </span>
        </div>

    </div>

</div>


<!-- SERVICES -->
<div class="px-10 mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
    

    <div class="bg-white p-6 rounded-xl shadow-sm border text-center">
        <h3 class="font-bold mb-2">طلب استشارة قانونية</h3>
        <p class="text-xs text-gray-500 mb-4">
            تتيح هذه الخدمة للمستخدم تقديم طلب استشارة قانونية جديدة عبر إدخال تفاصيل الطلب وتحديد نوع الاستشارة وإرفاق المستندات اللازمة لمراجعتها من قبل الإدارة القانونية.
      <a href="{{ route('consultations.create') }}"
   class="bg-gray-200 px-4 py-1 text-xs rounded-md hover:bg-gray-300">
    الانتقال إلى الخدمة
</a>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border text-center">
        <h3 class="font-bold mb-2">متابعة حالة الاستشارات</h3>
        <p class="text-xs text-gray-500 mb-4">
تتيح هذه الخدمة للمستخدم تتبع تقدم استشاراته ومعرفة آخر التحديثات على كل طلب، مع إمكانية الاطلاع على تفاصيل الحالة والتغييرات التي تطرأ عليها بشكل مستمر ودقيق.       </p>
        <button class="bg-gray-100 px-4 py-1 rounded text-xs">الانتقال الى الخدمة</button>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border text-center">
        <h3 class="font-bold mb-2">استشاراتي</h3>
        <p class="text-xs text-gray-500 mb-4">
    تتيح هذه الخدمة للمستخدم إدارة واستعراض جميع طلبات الاستشارات الخاصة به، مع عرض التفاصيل الكاملة لكل استشارة، والاطلاع على الردود والتوصيات القانونية المرتبطة بها.
        </p>
        <button class="bg-gray-100 px-4 py-1 rounded text-xs">الانتقال الى الخدمة</button>
    </div>

</div>

<!-- Notifications -->
<div class="px-10 mt-10">
<h3 class="text-sm font-bold mb-3 text-gray-700">الإشعارات 🔔</h3>

<div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 space-y-2">
<div class="bg-gray-50 p-3 rounded flex justify-between"><span>تم الرد على الاستشارة رقم 3021</span><span class="text-green-600">✔</span></div>
<div class="bg-gray-50 p-3 rounded flex justify-between"><span>تم تحديث الاستشارة رقم 3028</span><span class="text-green-600">✔</span></div>
</div>
</div>

<!--  TABLE-->
<div class="mt-10 px-10">

    <h2 class="text-lg font-bold mb-4">آخر الطلبات</h2>

    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <div class="bg-gray-50 px-6 py-4 border-b flex justify-between">
            <h3>آخر الاستشارات</h3>
            <span class="text-xs bg-blue-100 px-2 py-1 rounded">
                {{ count($consultations ?? []) }}
            </span>
        </div>

        <table class="w-full text-sm text-right">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">رقم</th>
                    <th>عنوان</th>
                    <th>الحالة</th>
                    <th>المحامي</th>
                    <th>إجراء</th>
                </tr>
            </thead>

            <tbody>

                @forelse($consultations ?? [] as $c)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4 text-blue-900 font-bold">#{{ $c->id }}</td>
                    <td>{{ $c->title }}</td>

                    <td>
                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">
                            {{ $c->status }}
                        </span>
                    </td>

                    <td>{{ $c->lawyer }}</td>

                    <td>
                        <button class="bg-blue-800 text-white px-3 py-1 rounded text-xs">
                            عرض
                        </button>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-400">
                     لا توجد طلبات حالياً
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

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