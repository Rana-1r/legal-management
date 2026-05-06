<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>منصة الإدارة القانونية</title>

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

<!-- NAVBAR -->
<header class="bg-wadimakkah-dark text-white shadow-lg">
    <div class="px-16 py-6 flex items-center justify-between">

        <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-20">

        <div class="flex gap-8 text-sm font-medium">
            <a href="#" class="hover:text-wadimakkah-light transition">الرئيسية</a>
            <a href="#" class="hover:text-wadimakkah-light transition">القضايا</a>
            <a href="#" class="hover:text-wadimakkah-light transition">العقود</a>
            <a href="#" class="hover:text-wadimakkah-light transition">الاستشارات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">المستندات</a>
            <a href="#" class="hover:text-wadimakkah-light transition">
                اللغة العربية <i class="fas fa-globe text-wadimakkah-light"></i>
            </a>
        </div>

        <div class="flex items-center gap-6">
            <i class="fas fa-user-circle text-2xl"></i>
            <i class="fas fa-bell text-xl"></i>
            <i class="fas fa-cog text-xl"></i>
        </div>

    </div>
</header>

<!-- MAIN -->
<main class="container mx-auto px-6 py-10 flex-grow">

<!-- HEADER -->
<div class="text-center mt-10">
    <h1 class="text-3xl font-bold text-gray-800">منصة الإدارة القانونية</h1>
    <p class="text-sm text-gray-500 mt-2">المنصة الموحدة لإدارة الخدمات القانونية</p>
</div>

<!-- SEARCH -->
<div class="flex justify-center mt-6 mb-12">
    <div class="flex items-center bg-white shadow-md rounded-lg w-full max-w-3xl px-4 py-3 border border-gray-200">
        <i class="fas fa-search text-gray-400 ml-2"></i>
        <input type="text" placeholder="ابحث عن استشارة..." class="flex-1 outline-none text-sm bg-transparent">
    </div>
</div>

<!-- STATS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">قيد المراجعة</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $under_review ?? 0 }}</span>
    </div>

    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">الاستشارات</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $total ?? 0 }}</span>
    </div>

    <div class="bg-blue-50 border-2 border-blue-200 p-6 rounded-2xl shadow-sm text-center">
        <p class="text-gray-600 font-bold mb-2">تم الرد</p>
        <span class="text-5xl font-black text-[#1e3a8a]">{{ $replied ?? 0 }}</span>
    </div>
</div>

<!-- SERVICES -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
        <h3 class="font-bold text-lg mb-2">طلب استشارة</h3>
        <p class="text-gray-500 text-sm mb-6">تتيح هذه الخدمة للمستخدم تقديم طلب استشارة قانونية جديدة عبر إدخال تفاصيل الطلب وتحديد نوع الاستشارة وإرفاق المستندات اللازمة لمراجعتها من قبل الإدارة القانونية.</p>
        <a href="#" class="block bg-gray-100 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">
    الانتقال إلى الخدمة
</a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
        <h3 class="font-bold text-lg mb-2">متابعة حالة الاستشارات</h3>
        <p class="text-gray-500 text-sm mb-6">تتيح هذه الخدمة للمستخدم تتبع تقدم استشاراته ومعرفة آخر التحديثات على كل طلب، مع إمكانية الاطلاع على تفاصيل الحالة والتغييرات التي تطرأ عليها بشكل مستمر ودقيق.</p>
        <a href="#" class="block bg-gray-100 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">
    الانتقال إلى الخدمة
</a>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition">
        <h3 class="font-bold text-lg mb-2">استشاراتي</h3>
        <p class="text-gray-500 text-sm mb-6">تتيح هذه الخدمة للمستخدم إدارة واستعراض جميع طلبات الاستشارات الخاصة به، مع عرض التفاصيل الكاملة لكل استشارة، والاطلاع على الردود والتوصيات القانونية المرتبطة بها.</p>
        <a href="#" class="block bg-gray-100 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200">
    الانتقال إلى الخدمة
</a>
    </div>

</div>

<!-- NOTIFICATIONS -->
<div class="mt-12">
    <h2 class="text-xl font-bold text-gray-700 mb-6">الإشعارات</h2>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <table class="w-full text-right text-sm border-collapse">

            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4">الإشعار</th>
                    <th class="p-4">الحالة</th>
                    <th class="p-4 text-center">الوقت</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">تم الرد على الاستشارة رقم 3021</td>
                    <td class="p-4 text-green-600 font-bold">✔ مكتمل</td>
                    <td class="p-4 text-center text-gray-400">الآن</td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">تم تحديث الاستشارة رقم 3028</td>
                    <td class="p-4 text-blue-600 font-bold">🔄 تحديث</td>
                    <td class="p-4 text-center text-gray-400">قبل 5 دقائق</td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">استشارة جديدة قيد المراجعة</td>
                    <td class="p-4 text-yellow-600 font-bold">⏳ قيد المعالجة</td>
                    <td class="p-4 text-center text-gray-400">قبل ساعة</td>
                </tr>

            </tbody>

        </table>
    </div>
</div>



<!-- TABLE -->
<div class="mt-10">
    <h2 class="text-xl font-bold text-gray-700 mb-6">آخر الطلبات</h2>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
        <table class="w-full text-right text-sm border-collapse">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="p-4">رقم</th>
                    <th class="p-4">عنوان</th>
                    <th class="p-4">الحالة</th>
                    <th class="p-4">المحامي</th>
                    <th class="p-4 text-center">إجراء</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse($consultations ?? [] as $c)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 font-bold text-wadimakkah-dark">#{{ $c->id }}</td>
                    <td class="p-4">{{ $c->title }}</td>
                    <td class="p-4">{{ $c->status }}</td>
                    <td class="p-4">{{ $c->lawyer }}</td>
                    <td class="p-4 text-center">
                        <button class="bg-[#1e3a8a] hover:bg-blue-800 text-white text-xs px-4 py-1.5 rounded-md transition shadow-sm">
                            عرض
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-6 text-center text-gray-500">لا توجد طلبات</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</main>

<!-- FOOTER -->
<footer class="bg-wadimakkah-dark text-white py-12 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-6 grid grid-cols-4 gap-10 text-sm text-center">

        <div>
            <h5 class="font-bold mb-4">روابط مهمة</h5>
            <ul class="space-y-2 text-gray-300 text-xs">
                <li><a href="#" class="hover:text-wadimakkah-light">سياسة الخصوصية</a></li>
                <li><a href="#" class="hover:text-wadimakkah-light">الشروط</a></li>
            </ul>
        </div>

        <div>
            <h5 class="font-bold mb-4 text-xs">الدعم</h5>
            <ul class="space-y-2 text-gray-300 text-xs">
                <li><a href="#">الدعم الفني</a></li>
                <li><a href="#">تواصل معنا</a></li>
            </ul>
        </div>

        <div>
            <h5 class="font-bold mb-4 text-xs">التواصل</h5>
            <div class="flex gap-4 justify-center text-xl text-gray-300">
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>

        <div>
            <img src="{{ asset('images/Wadi Makkah Logo.png') }}" class="h-16 mb-4 mx-auto opacity-80">
            <p class="text-[10px] text-gray-400">© 2026 WadiMakkah</p>
        </div>

    </div>
</footer>

</body>
</html>